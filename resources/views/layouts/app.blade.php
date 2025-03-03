<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TouriStay 2030 - {{ $title }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50">
            <!-- Navbar -->
            <nav class="bg-white shadow-sm fixed w-full z-50">
                <div class="container mx-auto px-4 md:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center">
                                <span class="ml-2 text-xl font-semibold text-[#FF5A5F]">TouriStay</span>
                            </a>
                        </div>
                        <div class="hidden md:flex md:items-center md:space-x-6">
                            @auth
                                @if (! auth()->user()->isAdmin())
                                    <a href="{{ route('home') }}"
                                        class="{{ Request::routeIs('home') ? 'text-[#FF5A5F]' : 'text-gray-700 hover:text-[#FF5A5F]' }} px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                                        Home
                                    </a>

                                    <a href="{{ route('properties.index') }}"
                                        class="{{ Request::routeIs('properties.index') ? 'text-[#FF5A5F]' : 'text-gray-700 hover:text-[#FF5A5F]' }} px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                                        Properties
                                    </a>
                                @endif
                                @if (auth()->user()->isTourist())
                                    <a href="{{ route('favorites.index') }}"
                                        class="{{ Request::routeIs('favorites.index') ? 'text-[#FF5A5F]' : 'text-gray-700 hover:text-[#FF5A5F]' }} px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                                        Favorites
                                    </a>    
                                @endif
                                @if (auth()->user()->isProprietor())
                                    <a href="{{ route('my-properties.index') }}"
                                        class="{{ Request::routeIs('my-properties.index', 'properties.create', 'properties.edit') ? 'text-[#FF5A5F]' : 'text-gray-700 hover:text-[#FF5A5F]' }} px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                                        My Properties
                                    </a>
                                @endif

                                <form action="{{ route('logout') }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit"
                                            class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-4 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out shadow-sm">
                                        Logout
                                    </button>
                                </form>

                                <a href="{{ route('profile.edit') }}"
                                    class="{{ Request::routeIs('profile.edit') ? 'text-[#FF5A5F]' : 'text-gray-700 hover:text-[#FF5A5F]' }} px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                                    <img src="https://placehold.co/50x50" class="rounded-full" alt="">
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-4 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out shadow-sm">
                                    Login
                                </a>
                                <a href="{{ route('register') }}"
                                   class="bg-gray-100 text-gray-700 hover:bg-gray-200 px-4 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                                    Register
                                </a>
                            @endauth
                        </div>
                        <div class="flex md:hidden items-center">
                            <button type="button" class="text-gray-700 hover:text-[#FF5A5F] transition-colors duration-200">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="pt-16">
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 pt-12 pb-6">
            <div class="container mx-auto px-4 md:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-10">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">About Us</h4>
                        <p class="text-gray-600">Our platform brings the community together to share inspiring experiences and recipes during TouriStay.</p>
                        <div class="flex mt-4 space-x-4">
                            <a href="#" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Quick Links</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">Home</a></li>
                            <li><a href="#experiences" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">Experiences</a></li>
                            <li><a href="#recipes" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">Recipes</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">Login</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">Register</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Categories</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">Spiritual Testimonials</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">Iftar Recipes</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">Suhoor Recipes</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">Fasting Tips</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-[#FF5A5F] transition-colors duration-200">Family Activities</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Contact</h4>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-envelope mt-1 mr-3"></i>
                                <span>contact@TouriStay.com</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-phone-alt mt-1 mr-3"></i>
                                <span>+212 5XX XX XX XX</span>
                            </li>
                        </ul>
                        <div class="mt-6">
                            <h5 class="text-sm font-semibold text-gray-900 mb-2">Stay Updated</h5>
                            <form class="flex">
                                <input type="email" placeholder="Your email" class="px-3 py-2 bg-gray-50 text-gray-700 rounded-l-md focus:ring-[#FF5A5F] focus:border-[#FF5A5F] w-full border border-gray-200" required>
                                <button type="submit" class="bg-[#FF5A5F] hover:bg-[#E94E53] px-4 py-2 rounded-r-md transition duration-150 ease-in-out text-white">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-6 mt-6">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-gray-600 text-sm">© 2025 TouriStay Platform. All rights reserved.</p>
                        <div class="flex space-x-4 mt-4 md:mt-0">
                            <a href="#" class="text-gray-600 hover:text-[#FF5A5F] text-sm transition-colors duration-200">Privacy Policy</a>
                            <a href="#" class="text-gray-600 hover:text-[#FF5A5F] text-sm transition-colors duration-200">Terms of Use</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Include SweetAlert2 only once -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @php
            $error = session()->has("error") ? session()->get("error") : (isset($error) ? $error : null);
            $success = session()->has("success") ? session()->get("success") : (isset($success) ? $success : null);
            $warning = session()->has("warning") ? session()->get("warning") : (isset($warning) ? $warning : null);
        @endphp

        @if (isset($error) && !empty($error))
            <script>
                let message = "{{ $error }}";
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: message,
                    confirmButtonColor: '#FF5A5F'
                });
            </script>
        @endif

        @if (isset($success) && !empty($success))
            <script>
                let message = "{{ $success }}";
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: message,
                    confirmButtonColor: '#FF5A5F'
                });
            </script>
        @endif

        @if (isset($warning) && !empty($success))
            <script>
                let message = "{{ $warning }}";
                Swal.fire({
                    icon: "warning",
                    title: "Warning",
                    text: message,
                    confirmButtonColor: '#FF5A5F'
                });
            </script>
        @endif
    </body>
</html>