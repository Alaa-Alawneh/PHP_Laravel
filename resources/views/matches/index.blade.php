<x-layouts.app title="Matches">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Matches</h1>
        <a href="{{ route('matches.create') }}" class="btn btn-primary">+ Add Matches</a>
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
                    <th>Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                    <th>Players</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matches as $match)
                    <tr class="hover:bg-base-300">
                        <td>{{ $match->name }}</td>
                        <td>{{ $match->match_date->format('M d, Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($match->match_time)->format('h:i A') }}</td>
                        <td>{{ $match->match_location }}</td>
                        <td><span class="badge badge-neutral">{{ $match->players_count }}</span></td>
                        <td class="text-right space-x-1">
                            <a href="{{ route('matches.show', $match) }}" class="btn btn-sm btn-outline">Details</a>
                            <a href="{{ route('matches.edit', $match) }}" class="btn btn-sm btn-outline">Edit</a>

                            <form method="POST" action="{{ route('matches.destroy', $match) }}"
                                class="inline"
                                onsubmit="return confirm('Delete this match?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-base-content/60 py-6">
                            No matches yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $matches->links() }}
    </div>
</x-layouts.app>