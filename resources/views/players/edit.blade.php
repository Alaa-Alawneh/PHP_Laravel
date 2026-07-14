<x-layouts.app title="Edit Player">
    <div class="max-w-xl mx-auto">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h1 class="card-title text-2xl">Edit Player</h1>

                @if (session('status'))
                    <div role="alert" class="alert alert-success mb-2">
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('players.update', $player) }}" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <x-text-input name="first_name" label="First Name" :value="$player->first_name" required />
                    <x-text-input name="last_name"  label="Last Name"  :value="$player->last_name" required />
                    <x-text-input name="email"      label="Email" type="email" :value="$player->email" required />
                    <x-text-input name="password"   label="New Password (leave blank to keep)" type="password" />
                    <x-text-input name="password_confirmation" label="Confirm New Password" type="password" />

                    <button type="submit" class="btn btn-primary w-full">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>