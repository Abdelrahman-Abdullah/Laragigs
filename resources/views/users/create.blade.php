<x-layout>

    <x-card class="max-w-2xl mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register
                </h2>
                <p class="mb-4">Create an account to post gigs</p>
            </header>

            <form action="/users" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">
                        Name
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name"
                    />
                    <x-form_error errorName="name" />
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2"
                    >Email</label
                    >
                    <input
                        type="email"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="email"
                    />
                    <x-form_error errorName="email" />

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
                    <x-form_error errorName="password" />
                </div>

                <div class="mb-6">
                    <label
                        for="password2"
                        class="inline-block text-lg mb-2"
                    >
                        Confirm Password
                    </label>
                    <input
                        type="password"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="password_confirmation"
                    />
                    <x-form_error errorName="password_confirmation" />

                </div>

                <x-main_Button>
                    Sign Up
                </x-main_Button>

                <div class="mt-8">
                    <p>
                        Already have an account?
                        <a href="/login" class="text-laravel"
                        >Login</a
                        >
                    </p>
                </div>
            </form>

    </x-card>

</x-layout>
