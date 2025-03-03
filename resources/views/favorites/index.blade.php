<x-app-layout>
    <x-slot:title> My Favorites </x-slot>

    <!-- Hero Section -->
    <section class="relative py-20 overflow-hidden bg-gray-50">
        <div class="container mx-auto px-4 md:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-4">
                    Your <span class="text-[#FF5A5F]">Favorite</span> Properties
                </h1>
                <p class="text-lg mb-6 max-w-2xl mx-auto text-gray-600">
                    Manage your saved properties across Morocco, Spain, and Portugal for the World Cup 2030.
                </p>
            </div>
        </div>
    </section>

    <!-- Favorites Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            
            <!-- Filters and Sort -->
            <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                <h2 class="text-2xl font-semibold text-gray-900">My Favorites <span class="text-sm font-normal text-gray-500">({{ count($properties) }} properties)</span></h2>
            </div>
            
            <!-- Empty State (Hidden by default using the hidden class) -->
            <div class="hidden text-center py-16 border-2 border-dashed border-gray-200 rounded-xl bg-gray-50">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <h3 class="text-xl font-medium text-gray-900 mb-2">No favorites yet</h3>
                <p class="text-gray-600 max-w-md mx-auto mb-6">Start exploring properties and click the heart icon to add them to your favorites.</p>
                <a href="#" class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-6 py-3 rounded-lg font-medium transition duration-300 ease-in-out inline-block">
                    Explore Properties
                </a>
            </div>

            <!-- Favorites Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($properties as $property)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 border border-gray-200 relative">
                        <div class="absolute top-4 right-4 z-10">
                            <button class="bg-white p-2 rounded-full shadow-md text-[#FF5A5F] hover:bg-[#FF5A5F] hover:text-white transition duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <img src="{{ $property->getImage() }}" alt="Luxury Apartment in Marrakech" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900">{{ $property->getTitle() }}</h3>
                                    <p class="text-gray-600">{{ $property->city->getName() }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">{{ Str::limit($property->getDescription(), 97) }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-gray-900">{{ $property->getPrice() }} DH <span class="text-sm font-normal text-gray-600">/ night</span></span>
                                <button class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-4 py-2 rounded-lg font-medium transition duration-300 ease-in-out">Book Now</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </section>
</x-app-layout>