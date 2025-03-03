<x-app-layout>
    <x-slot:title> Home </x-slot>

    <!-- Hero Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">Find your perfect stay for <span class="text-[#FF5A5F]">World Cup 2030</span></h1>
                    <p class="mt-4 text-lg text-gray-600 max-w-lg">Discover unique accommodations across Morocco, Spain, and Portugal for the 2030 World Cup experience.</p>
                    <div class="mt-8 flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                        <button class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-6 py-3 rounded-lg text-lg font-semibold transition duration-150 ease-in-out shadow-sm">Find Accommodation</button>
                        <button class="bg-white text-gray-900 border-2 border-gray-200 hover:border-gray-300 px-6 py-3 rounded-lg text-lg font-semibold transition duration-150 ease-in-out">List Your Property</button>
                    </div>
                </div>
                <div class="md:w-96 md:h-96">
                    <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/81/2030_FIFA_World_Cup_Logo.svg/1200px-2030_FIFA_World_Cup_Logo.svg.png" alt="World Cup 2030 Host Cities">
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-10 bg-white -mt-8">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-xl p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Find your perfect accommodation</h2>
                <form class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Destination</label>
                        <select id="city" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#FF5A5F] focus:border-[#FF5A5F]">
                            <option value="">Choose a city</option>
                            <option value="marrakech">Marrakech, Morocco</option>
                            <option value="casablanca">Casablanca, Morocco</option>
                            <option value="rabat">Rabat, Morocco</option>
                            <option value="madrid">Madrid, Spain</option>
                            <option value="barcelona">Barcelona, Spain</option>
                            <option value="lisbon">Lisbon, Portugal</option>
                            <option value="porto">Porto, Portugal</option>
                        </select>
                    </div>
                    <div>
                        <label for="dates" class="block text-sm font-medium text-gray-700 mb-1">Dates</label>
                        <input type="text" id="dates" placeholder="Check-in — Check-out" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#FF5A5F] focus:border-[#FF5A5F]">
                    </div>
                    <div class="self-end">
                        <button type="submit" class="w-full bg-[#FF5A5F] hover:bg-[#E94E53] text-white p-3 rounded-lg font-semibold transition duration-150 ease-in-out">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section id="statistics" class="py-12 md:py-20 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-12">Our Platform in Numbers</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-[#FF5A5F] mb-4">
                        <i class="fas fa-users text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-gray-900">{{ $usersCount }}+</h3>
                    <p class="text-gray-600 mt-2">Active Users</p>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-[#FF5A5F] mb-4">
                        <i class="fas fa-home text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-gray-900">{{ $propertiesCount }}+</h3>
                    <p class="text-gray-600 mt-2">Properties Listed</p>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-[#FF5A5F] mb-4">
                        <i class="fas fa-city text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-gray-900">{{ $citiesCount }}+</h3>
                    <p class="text-gray-600 mt-2">Cities Covered</p>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-[#FF5A5F] mb-4">
                        <i class="fas fa-star text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-gray-900">4.8/5</h3>
                    <p class="text-gray-600 mt-2">Average Rating</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Properties Section -->
    <section id="properties" class="py-12 md:py-20 bg-white">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Properties</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover our best accommodations in World Cup 2030 host cities</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($properties as $property)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <div class="relative">
                            <img src="{{ $property->getImage() }}" alt="{{ $property->getTitle() }}" class="w-full h-56 object-cover">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm font-semibold text-[#FF5A5F]">{{ $property->city->getName() }}</span>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span class="ml-1 text-sm font-medium text-gray-700">4.9</span>
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $property->getTitle() }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($property->getDescription(), 100) }}</p>
                            <div class="flex items-center justify-between mt-6">
                                <span class="text-lg font-bold text-gray-900">{{ $property->getPrice() }} DH <span class="text-sm font-normal text-gray-600">/ night</span></span>
                                <a href="#" class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-4 py-2 rounded-md font-medium transition duration-150 ease-in-out">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-10">
                <a href="#" class="inline-flex items-center text-[#FF5A5F] hover:text-[#E94E53] font-semibold">
                    Explore more properties
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Host Section -->
    <section class="py-12 md:py-20 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="md:w-1/2">
                    <img src="https://placehold.co/500x400" alt="Host your property" class="rounded-xl shadow-lg">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Become a host for World Cup 2030</h2>
                    <p class="text-lg text-gray-600 mb-6">Earn extra income by renting your property during the World Cup 2030. Our platform makes it easy to list your space and connect with tourists from around the world.</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-[#FF5A5F] mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">List your property in less than 10 minutes</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-[#FF5A5F] mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Set your own prices and availability</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-[#FF5A5F] mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Get support from our dedicated host team</span>
                        </li>
                    </ul>
                    <button class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-6 py-3 rounded-lg text-lg font-semibold transition duration-150 ease-in-out shadow-sm">Start Hosting</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-12 md:py-20 bg-white">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Users Say</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover why travelers and hosts love using TouriStay</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-xl p-6 shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">"Finding accommodation for the World Cup was so easy with TouriStay. The platform is user-friendly and the property I booked was exactly as described. Great experience!"</p>
                    <div class="flex items-center">
                        <img src="https://placehold.co/40x40" alt="User" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <h4 class="text-sm font-semibold text-gray-900">Michael Johnson</h4>
                            <p class="text-xs text-gray-600">Brazil</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white rounded-xl p-6 shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">"As a property owner, listing my apartment on TouriStay has been incredibly profitable. The platform is easy to use and the customer service team is always available to help."</p>
                    <div class="flex items-center">
                        <img src="https://placehold.co/40x40" alt="User" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <h4 class="text-sm font-semibold text-gray-900">Sofia Martinez</h4>
                            <p class="text-xs text-gray-600">Spain</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white rounded-xl p-6 shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">"The search filters made it so easy to find exactly what I needed for my family during our World Cup trip. We found a perfect place in Casablanca with all the amenities we wanted."</p>
                    <div class="flex items-center">
                        <img src="https://placehold.co/40x40" alt="User" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <h4 class="text-sm font-semibold text-gray-900">James Wilson</h4>
                            <p class="text-xs text-gray-600">United Kingdom</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cities Section -->
    <section class="py-12 md:py-20 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Host Cities</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Explore accommodations in the official 2030 World Cup host cities</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                <!-- City Card: Marrakech -->
                <a href="#" class="group">
                    <div class="relative rounded-xl overflow-hidden h-40 md:h-60">
                        <img src="https://placehold.co/300x240" alt="Marrakech" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 w-full">
                            <h3 class="text-white font-semibold text-lg md:text-xl">Marrakech</h3>
                            <p class="text-white/90 text-sm">Morocco</p>
                        </div>
                    </div>
                </a>
                
                <!-- City Card: Casablanca -->
                <a href="#" class="group">
                    <div class="relative rounded-xl overflow-hidden h-40 md:h-60">
                        <img src="https://placehold.co/300x240" alt="Casablanca" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 w-full">
                            <h3 class="text-white font-semibold text-lg md:text-xl">Casablanca</h3>
                            <p class="text-white/90 text-sm">Morocco</p>
                        </div>
                    </div>
                </a>
                
                <!-- City Card: Madrid -->
                <a href="#" class="group">
                    <div class="relative rounded-xl overflow-hidden h-40 md:h-60">
                        <img src="https://placehold.co/300x240" alt="Madrid" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 w-full">
                            <h3 class="text-white font-semibold text-lg md:text-xl">Madrid</h3>
                            <p class="text-white/90 text-sm">Spain</p>
                        </div>
                    </div>
                </a>
                
                <!-- City Card: Barcelona -->
                <a href="#" class="group">
                    <div class="relative rounded-xl overflow-hidden h-40 md:h-60">
                        <img src="https://placehold.co/300x240" alt="Barcelona" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 w-full">
                            <h3 class="text-white font-semibold text-lg md:text-xl">Barcelona</h3>
                            <p class="text-white/90 text-sm">Spain</p>
                        </div>
                    </div>
                </a>
                
                <!-- City Card: Lisbon -->
                <a href="#" class="group">
                    <div class="relative rounded-xl overflow-hidden h-40 md:h-60">
                        <img src="https://placehold.co/300x240" alt="Lisbon" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 w-full">
                            <h3 class="text-white font-semibold text-lg md:text-xl">Lisbon</h3>
                            <p class="text-white/90 text-sm">Portugal</p>
                        </div>
                    </div>
                </a>
                
                <!-- City Card: Porto -->
                <a href="#" class="group">
                    <div class="relative rounded-xl overflow-hidden h-40 md:h-60">
                        <img src="https://placehold.co/300x240" alt="Porto" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 w-full">
                            <h3 class="text-white font-semibold text-lg md:text-xl">Porto</h3>
                            <p class="text-white/90 text-sm">Portugal</p>
                        </div>
                    </div>
                </a>
                
                <!-- City Card: Rabat -->
                <a href="#" class="group">
                    <div class="relative rounded-xl overflow-hidden h-40 md:h-60">
                        <img src="https://placehold.co/300x240" alt="Rabat" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 w-full">
                            <h3 class="text-white font-semibold text-lg md:text-xl">Rabat</h3>
                            <p class="text-white/90 text-sm">Morocco</p>
                        </div>
                    </div>
                </a>
                
                <!-- City Card: Valencia -->
                <a href="#" class="group">
                    <div class="relative rounded-xl overflow-hidden h-40 md:h-60">
                        <img src="https://placehold.co/300x240" alt="Valencia" class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 w-full">
                            <h3 class="text-white font-semibold text-lg md:text-xl">Valencia</h3>
                            <p class="text-white/90 text-sm">Spain</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-12 md:py-20 bg-white">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Find answers to common questions about using TouriStay for the World Cup 2030</p>
            </div>
            
            <div class="max-w-3xl mx-auto divide-y divide-gray-200">
                <!-- FAQ Item 1 -->
                <div class="py-5">
                    <details class="group">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                            <span class="text-lg font-semibold text-gray-900">How does TouriStay ensure the security of my booking?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="text-gray-700 mt-3 group-open:animate-fadeIn">
                            TouriStay uses secure payment processing and identity verification for all users. We also have a 24/7 customer support team to handle any issues that may arise before, during, or after your stay.
                        </p>
                    </details>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="py-5">
                    <details class="group">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                            <span class="text-lg font-semibold text-gray-900">What if I need to cancel my booking?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="text-gray-700 mt-3 group-open:animate-fadeIn">
                            Cancellation policies are set by each property owner and are clearly displayed on the listing page before you book. Many properties offer free cancellation up to a certain date. Check the specific policy for your booking in your reservation details.
                        </p>
                    </details>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="py-5">
                    <details class="group">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                            <span class="text-lg font-semibold text-gray-900">How can I list my property on TouriStay?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="text-gray-700 mt-3 group-open:animate-fadeIn">
                            To list your property, create an account and click on "List Your Property" in your dashboard. You'll need to provide details about your property, upload photos, set your availability calendar, and establish your house rules and pricing.
                        </p>
                    </details>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="py-5">
                    <details class="group">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                            <span class="text-lg font-semibold text-gray-900">Is there a service fee for using TouriStay?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="text-gray-700 mt-3 group-open:animate-fadeIn">
                            Yes, TouriStay charges a small service fee to guests and hosts to maintain the platform and provide customer support. The exact fee is displayed before you complete your booking or listing.
                        </p>
                    </details>
                </div>
                
                <!-- FAQ Item 5 -->
                <div class="py-5">
                    <details class="group">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                            <span class="text-lg font-semibold text-gray-900">How far in advance should I book for the World Cup?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="text-gray-700 mt-3 group-open:animate-fadeIn">
                            For major events like the World Cup, we recommend booking as soon as possible. Properties in popular locations close to stadiums tend to book up quickly. Booking 6-12 months in advance will give you the best selection and potentially better rates.
                        </p>
                    </details>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-12 md:py-20 bg-[#FF5A5F]">
        <div class="container mx-auto px-4 md:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready for the World Cup 2030?</h2>
            <p class="text-lg text-white/90 max-w-2xl mx-auto mb-8">Join TouriStay today to find your perfect accommodation or start hosting to earn extra income during this global event.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button class="bg-white text-[#FF5A5F] hover:bg-gray-100 px-8 py-3 rounded-lg text-lg font-semibold transition duration-150 ease-in-out shadow-sm">Create an Account</button>
                <button class="bg-transparent text-white border-2 border-white hover:bg-white/10 px-8 py-3 rounded-lg text-lg font-semibold transition duration-150 ease-in-out">Learn More</button>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Stay updated with TouriStay</h2>
                <p class="text-lg text-gray-600 mb-6">Subscribe to our newsletter for World Cup 2030 accommodation updates and exclusive offers.</p>
                <form class="flex flex-col sm:flex-row gap-3">
                    <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-lg border border-gray-300 focus:ring-[#FF5A5F] focus:border-[#FF5A5F]">
                    <button type="submit" class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-6 py-3 rounded-lg font-semibold transition duration-150 ease-in-out">Subscribe</button>
                </form>
                <p class="text-sm text-gray-600 mt-3">We respect your privacy. Unsubscribe at any time.</p>
            </div>
        </div>
    </section>
</x-app-layout>