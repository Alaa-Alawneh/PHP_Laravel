<x-layouts.app title="Add Player">
    <div class="max-w-xl mx-auto">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h1 class="card-title text-2xl">Add Player</h1>

                <form method="POST" action="{{ route('players.store') }}" class="space-y-4">
                    @csrf
                    <x-text-input name="first_name" label="First Name" required />
                    <x-text-input name="last_name"  label="Last Name"  required />
                    <x-text-input name="email"      label="Email" type="email" required />
                    <x-text-input name="password"   label="Temporary Password" type="password" required />
                    <x-text-input name="password_confirmation" label="Confirm Password" type="password" required />

                    <button type="submit" class="btn btn-primary w-full">Create Player</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>