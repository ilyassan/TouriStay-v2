<x-app-layout>
    <x-slot:title> My Reservations </x-slot>

    <!-- Hero Section -->
    <section class="relative py-20 overflow-hidden bg-gray-50">
        <div class="container mx-auto px-4 md:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-4">
                    Your <span class="text-[#FF5A5F]">Reservations</span>
                </h1>
                <p class="text-lg mb-6 max-w-2xl mx-auto text-gray-600">
                    View and manage your bookings for the World Cup 2030 across Morocco, Spain, and Portugal.
                </p>
            </div>
        </div>
    </section>

    <!-- Reservations Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            
            <!-- Filters and Sort -->
            <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                <h2 class="text-2xl font-semibold text-gray-900">
                    My Reservations <span class="text-sm font-normal text-gray-500">({{ count($reservations) }} bookings)</span>
                </h2>
            </div>
            
            <!-- Empty State (Hidden since we have static data) -->
            <div class="hidden text-center py-16 border-2 border-dashed border-gray-200 rounded-xl bg-gray-50">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 00-10 10c0 4.42 3.58 8 8 8s8-3.58 8-8a10 10 0 00-10-10zm0 14a2 2 0 110-4 2 2 0 010 4zm0-6a2 2 0 110-4 2 2 0 010 4z"></path>
                </svg>
                <h3 class="text-xl font-medium text-gray-900 mb-2">No reservations yet</h3>
                <p class="text-gray-600 max-w-md mx-auto mb-6">
                    Start exploring properties and book your stay for the World Cup 2030.
                </p>
                <a href="#" class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-6 py-3 rounded-lg font-medium transition duration-300 ease-in-out inline-block">
                    Explore Properties
                </a>
            </div>

            <!-- Reservations Grid with Static Data -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($reservations as $reservation)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 border border-gray-200">
                    <img src="https://placehold.co/400x224" alt="Luxury Villa in Marrakech" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">{{ $reservation->property->type->getName() }} in {{ $reservation->property->city->getName() }}</h3>
                                <p class="text-gray-600">{{ $reservation->property->city->getName() }}, Morocco</p>
                            </div>
                            <span class="text-sm font-medium px-2 py-1 rounded-full bg-green-100 text-green-800">
                                Confirmed
                            </span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            <span class="font-medium">Dates:</span>{{ \Carbon\Carbon::parse($reservation->getFromDate())->format('M j, Y') }} - {{ \Carbon\Carbon::parse($reservation->getToDate())->format('M j, Y') }}
                        </p>
                        <p class="text-gray-600 mb-4">
                            <span class="font-medium">Bedrooms:</span> {{ $reservation->property->getBedrooms() }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex space-x-2">
                                <a href="{{ route('properties.show', $reservation->property->getPrimaryKey() ) }}" class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-4 py-2 rounded-lg font-medium transition duration-300 ease-in-out">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>