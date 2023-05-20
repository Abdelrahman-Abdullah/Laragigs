<x-layout>
    <x-card class="p-10 max-w-2xl mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Log In
                </h2>
                <p class="mb-4">Log in to post gigs</p>
            </header>

            <form action="/users/login" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2"
                    >Email</label
                    >
                    <input
                        type="email"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="email"
                        value="{{old('email')}}"
                    />
                    <x-form_error errorName="email"/>
                </div>

                <div class="mb-6">
                    <label
                        for="password"
                        class="inline-block text-lg mb-2"
                    >
                        Password
                    </label>
                    <input
                        type="password"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="password"
                    />
                    <x-form_error errorName="password"/>
                </div>

                <x-main_Button>
                    Sign In
                </x-main_Button>

                <div class="mt-8">
                    <p>
                        Don't have an account?
                        <a href="/register" class="text-laravel"
                        >Register</a
                        >
                    </p>
                </div>
            </form>
    </x-card>
</x-layout>
