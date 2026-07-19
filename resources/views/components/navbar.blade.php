<nav class="navbar bg-base-100 shadow px-4">
    <div class="flex-1">
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl">Sport Club</a>
    </div>
    <div class="flex-none gap-2">
        <a href="{{ route('home') }}" class="btn btn-ghost">Home</a>

        @guest
            <a href="{{ route('register') }}" class="btn btn-ghost">Sign Up</a>
            <a href="{{ route('login') }}" class="btn btn-primary">Sign In</a>
        @endguest

        @auth
            <a href="{{ route(auth()->user()->role->dashboardRoute()) }}" class="btn btn-ghost">Dashboard</a>
            @if (auth()->user()->role === \App\Enums\UserRole::Trainer)
                <a href="{{ route('players.index') }}" class="btn btn-ghost">Manage Players</a>
                <a href="{{ route('matches.index') }}" class="btn btn-ghost">Manage Matches</a>
                
            @endif
            <a href="#" class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-[1.2em]"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                <span class="px-2 ">{{ auth()->user()->first_name }}</span>
            </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    
        @csrf
                    <button type="submit" class="btn btn-outline btn-error">Logout</button>
                </form>
        @endauth
    </div>
</nav>