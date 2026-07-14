<x-layouts.app title="Players">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Players</h1>
        <a href="{{ route('players.create') }}" class="btn btn-primary">+ Add Player</a>
    </div>

    @if (session('status'))
        <div role="alert" class="alert alert-success mb-4">
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($players as $player)
                    <tr class="hover:bg-base-300">
                        <td>{{ $player->first_name }} {{ $player->last_name }}</td>
                        <td>{{ $player->email }}</td>
                        <td>{{ $player->created_at->format('M d, Y') }}</td>
                        <td class="text-right space-x-1">
                            <a href="{{ route('players.edit', $player) }}" class="btn btn-sm btn-outline">Edit</a>

                            <form method="POST" action="{{ route('players.destroy', $player) }}"
                                class="inline"
                                onsubmit="return confirm('Delete this player?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-base-content/60 py-6">
                            No players yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $players->links() }}
    </div>
</x-layouts.app>