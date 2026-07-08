<x-layouts.app title="Home">
    <div class="hero bg-base-100 rounded-box shadow">
        <div class="hero-content text-center py-16">
            <div class="max-w-xl">
                <h1 class="text-5xl font-bold">Sport Club</h1>
                <p class="py-6">
                    Welcome to the Sport Club Management System, where trainers and
                    players connect, organize, and compete. 

                        @guest
                        Log in or Sign up to get started. 
                        @endguest

                </p>
                @guest
                <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                <a href="{{ route('login') }}" class="btn btn-outline">Sign In</a>
                @endguest
            </div>
        </div>
    </div>
</x-layouts.app>