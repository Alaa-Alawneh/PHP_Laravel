<x-layouts.app title="Login">
    <div class="max-w-xl mx-auto">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h1 class="card-title text-2xl">Login</h1>

                <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
                    @csrf


                    <x-text-input
                        name="email"
                        label="Email"
                        type="email"
                        autocomplete="email"
                        required
                    />

                    <x-text-input
                        name="password"
                        label="Password"
                        type="password"
                        autocomplete="current-password"
                        required
                    />
                    @error('login')
                        <div role="alert" class="text-error text-sm mt-1">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror



                    <button type="submit" class="btn btn-primary w-full my-2">
                        login
                    </button>
                </form>

                <p class="text-sm text-center mt-4">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="link link-primary">Sign Up</a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.app>