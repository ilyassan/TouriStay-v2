<x-app-layout>
    <x-slot:title> Reset Password - TouriStay </x-slot>

    @if (session('status'))
        <x-slot:success>{{ session('status') }}</x-slot>
    @endif

    @if ($errors->any())
        <x-slot:error>{{ $errors->first() }}</x-slot>
    @endif

    <div class="min-h-screen bg-gray-50 py-10 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <!-- Heading -->
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Reset your password
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Enter your email address, and we'll send you a link to reset your password.
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#FF5A5F] focus:border-[#FF5A5F] sm:text-sm"
                                value="{{ old('email') }}">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#FF5A5F] hover:bg-[#E94E53] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FF5A5F]">
                            Send Reset Link
                        </button>
                    </div>
                </form>

                <!-- Back to Login -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Remember your password?
                        <a href="{{ route('login') }}" class="font-medium text-[#FF5A5F] hover:text-[#E94E53]">
                            Log in
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>