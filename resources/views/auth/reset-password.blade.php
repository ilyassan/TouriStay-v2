<x-app-layout>
    <x-slot:title> Reset Password - TouriStay </x-slot>

    @if ($errors->any())
        <x-slot:error>{{ $errors->first() }}</x-slot>
    @endif

    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-10 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <!-- Heading -->
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Reset your password
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Enter your new password and confirm it to reset your password.
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#FF5A5F] focus:border-[#FF5A5F] sm:text-sm"
                                value="{{ old('email', $request->email) }}">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            New Password
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required autocomplete="new-password"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#FF5A5F] focus:border-[#FF5A5F] sm:text-sm">
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                            Confirm Password
                        </label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#FF5A5F] focus:border-[#FF5A5F] sm:text-sm">
                        </div>
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#FF5A5F] hover:bg-[#E94E53] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FF5A5F]">
                            Reset Password
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