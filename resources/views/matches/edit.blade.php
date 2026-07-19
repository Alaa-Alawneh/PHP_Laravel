<x-layouts.app title="Edit Match">
    <div class="max-w-xl mx-auto">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h1 class="card-title text-2xl">Edit Match</h1>

                <form method="POST" action="{{ route('matches.update', $match) }}" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <x-text-input name="name"       label="Match Name" :value="$match->name" required />
                    <x-text-input name="match_date" label="Match Date" type="date"
                                    :value="$match->match_date->format('Y-m-d')" required />
                    <x-text-input name="match_time" label="Match Time" type="time"
                                    :value="\Carbon\Carbon::parse($match->match_time)->format('H:i')" required />
                    <x-text-input name="match_location"   label="Location" :value="$match->match_location" required />
                    <x-textarea-input name="description" label="Description (optional)" :value="$match->description" />

                    <button type="submit" class="btn btn-primary w-full">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>