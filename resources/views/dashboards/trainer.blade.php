<x-layouts.app title="Dashboard">
    <div class="hero bg-base-100 rounded-box shadow">
        <div class="hero-content text-center py-16">
            <div class="max-w-xl">
                <h1 class="text-5xl font-bold">Sport Club</h1>
                <p class="py-6">
                    Welcome {{ auth()->user()->first_name }}, we're glad to have you as a trainer in our system :)
                </p>
                <p class="mb-5">
                    here are your information
                </p>
                <x-user-info :user="auth()->user()"/></x-layouts.app>
            </div>
        </div>
    </div>
