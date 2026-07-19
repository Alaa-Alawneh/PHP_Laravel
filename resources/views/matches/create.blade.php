<x-layouts.app title="Create Match">
    <div class="max-w-xl mx-auto">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h1 class="card-title text-2xl">Create Match</h1>

                <form method="POST" action="{{ route('matches.store') }}" class="space-y-4">
                    @csrf
                    <x-text-input name="name"       label="Match Name" required />
                    <x-text-input name="match_date" label="Match Date" type="date" required />
                    <x-text-input name="match_time" label="Match Time" type="time" required />
                    <x-text-input name="match_location"   label="Location" required />
                    <x-textarea-input name="description" label="Description (optional)" />

                    <button type="submit" class="btn btn-primary w-full">Create Match</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>