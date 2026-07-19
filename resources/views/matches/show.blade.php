<x-layouts.app title="Match Details">
    @if (session('status'))
        <div role="alert" class="alert alert-success mb-4">
            <span>{{ session('status') }}</span>
        </div>
    @endif

    
    <div class="card bg-base-100 shadow mb-6">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <h1 class="card-title text-2xl">{{ $match->name }}</h1>
                <a href="{{ route('matches.edit', $match) }}" class="btn btn-sm btn-outline">Edit</a>
            </div>

            <div class="overflow-x-auto">
                <table class="table">
                    <tbody>
                        <tr><th>Date</th><td>{{ $match->match_date->format('M d, Y') }}</td></tr>
                        <tr><th>Time</th><td>{{ \Carbon\Carbon::parse($match->match_time)->format('h:i A') }}</td></tr>
                        <tr><th>Location</th><td>{{ $match->match_location }}</td></tr>
                        <tr><th>Description</th><td>{{ $match->description ?: '—' }}</td></tr>
                        <tr><th>Assigned Players</th><td>{{ $match->players->count() }}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="card bg-base-100 shadow mb-6">
        <div class="card-body">
            <h2 class="card-title">Assigned Players</h2>

            @forelse ($match->players as $player)
                <div class="flex justify-between border-b border-base-content/10 py-2">
                    <span>{{ $player->first_name }} {{ $player->last_name }}</span>
                    <span class="text-base-content/60">{{ $player->email }}</span>
                </div>
            @empty
                <p class="text-base-content/60">No players assigned yet.</p>
            @endforelse
        </div>
    </div>


    <div class="card bg-base-100 shadow">
        <div class="card-body">
            <h2 class="card-title">Update Player Assignments</h2>

            <form method="POST" action="{{ route('matches.players.update', $match) }}">
                @csrf
                @method('PUT')

                <div class="grid sm:grid-cols-2 gap-2 my-4">
                    @foreach ($allPlayers as $player)
                        <label class="label cursor-pointer justify-start gap-3">
                            <input type="checkbox"
                                name="player_ids[]"
                                value="{{ $player->id }}"
                                class="checkbox checkbox-primary"
                                @checked($match->players->contains($player->id))>
                            <span>{{ $player->first_name }} {{ $player->last_name }}</span>
                        </label>
                    @endforeach
                </div>

                @error('player_ids')
                    <span class="block text-error text-sm mb-2">{{ $message }}</span>
                @enderror

                <button type="submit" class="btn btn-primary">Save Assignments</button>
            </form>
        </div>
    </div>
</x-layouts.app>