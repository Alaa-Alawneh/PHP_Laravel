<x-layouts.app title="Register">
    <div class="max-w-xl mx-auto">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h1 class="card-title text-2xl">Create Account</h1>

                <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                    @csrf

                    <x-text-input
                        name="first_name"
                        label="First Name"
                        required
                    />

                    <x-text-input
                        name="last_name"
                        label="Last Name"
                        required
                    />

                    <x-text-input
                        name="email"
                        label="Email"
                        type="email"
                        required
                    />

                    <x-text-input
                        name="password"
                        label="Password"
                        type="password"
                        required
                    />

                    <x-text-input
                        name="password_confirmation"
                        label="Confirm Password"
                        type="password"
                        required
                    />

                    <label class="form-control w-full">
                        <span class="label-text">Role</span>

                        <select
                            name="role"
                            class="select select-bordered w-full @error('role') select-error @enderror"
                            required
                        >
                            <option value="">Select a role</option>
                            <option value="trainer" @selected(old('role') === 'trainer')>
                                Trainer
                            </option>
                            <option value="player" @selected(old('role') === 'player')>
                                Player
                            </option>
                        </select>

                        @error('role')
                            <span class="text-error text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </label>

                    <button type="submit" class="btn btn-primary w-full my-2">
                        Register
                    </button>
                </form>

                <p class="text-sm text-center mt-4">
                    Already have an account?
                    <a href="{{ route('login') }}" class="link link-primary">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.app>