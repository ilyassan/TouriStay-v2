<x-app-layout>
    <x-slot:title> My Properties - World Cup 2030 </x-slot>

    <!-- Header Section -->
    <section class="relative py-16 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold leading-tight mb-4">
                    Manage Your <span class="text-[#FF5A5F]">World Cup 2030</span> Properties
                </h1>
                <p class="text-lg mb-6 max-w-3xl mx-auto">
                    View, edit and track all your listed accommodations across Morocco, Spain, and Portugal.
                </p>
                <a href="{{ route('properties.create') }}" class="bg-[#FF5A5F] text-white hover:bg-[#E94E53] px-6 py-3 rounded-full text-lg font-semibold transition duration-300 ease-in-out inline-block mr-4">
                    Add New Property
                </a>
                <a href="#" class="bg-white border-2 border-[#FF5A5F] text-[#FF5A5F] hover:bg-[#FF5A5F] hover:text-white px-6 py-3 rounded-full text-lg font-semibold transition duration-300 ease-in-out inline-block">
                    View Booking Requests
                </a>
            </div>
        </div>
    </section>

    <!-- Property Stats Section -->
    <section class="py-8 bg-white">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Properties Card -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-pink-100 mr-4">
                            <svg class="w-6 h-6 text-[#FF5A5F]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Properties</p>
                            <p class="text-2xl font-bold">{{ $propertiesCount }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Active Listings Card -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 mr-4">
                            <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Active Listings</p>
                            <p class="text-2xl font-bold">{{ $activePropertiesCount }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Pending Bookings Card -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 mr-4">
                            <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Pending Bookings</p>
                            <p class="text-2xl font-bold">7</p>
                        </div>
                    </div>
                </div>
                
                <!-- Total Earnings Card -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 mr-4">
                            <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Earnings</p>
                            <p class="text-2xl font-bold">8,420 DH</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Filters and Controls -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold mb-4 md:mb-0">Your Properties</h2>
            </div>

            <!-- Property Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach ($properties as $property)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 border border-gray-200">
                        <div class="relative">
                            <span class="absolute top-3 left-3 {{ $property->isActive() ? 'bg-green-500' : 'bg-red-500' }} text-white text-xs font-bold px-3 py-1 rounded-full z-10">{{ $property->isActive() ? "Active" : "Inactive" }}</span>
                            <img src="{{ $property->getImage() }}" alt="Luxury Apartment in Marrakech" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900">{{ $property->type->getName() }}</h3>
                                    <p class="text-gray-600">{{ $property->city->getName()}}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center mt-4 mb-4">
                                <div class="flex items-center mr-4">
                                    <svg class="w-5 h-5 text-gray-500 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                                    </svg>
                                    <span class="text-gray-600">Sleeps {{ $property->getBedrooms() }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                                    </svg>
                                    <span class="text-gray-600">{{ $property->getBathrooms() }} BDR</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-lg font-bold text-gray-900">{{ $property->getPrice() }} DH <span class="text-sm font-normal text-gray-600">/ night</span></span>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span class="ml-1 text-gray-600">4.8 (24 reviews)</span>
                                </div>
                            </div>
                            
                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex gap-2">
                                    <a href="#" class="flex-1 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 py-2 rounded text-sm font-medium text-center transition duration-300 ease-in-out">Preview</a>
                                    <a href="{{ route('properties.edit', $property->getPrimaryKey()) }}" class="flex-1 bg-[#FF5A5F] text-white hover:bg-[#E94E53] py-2 rounded text-sm font-medium text-center transition duration-300 ease-in-out">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Booking Requests Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold">Recent Booking Requests</h2>
                <a href="#" class="text-[#FF5A5F] hover:text-[#E94E53] font-medium flex items-center">
                    View All
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Guest
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Property
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Dates
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                                        <span class="text-gray-700 font-medium">JD</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">John Doe</div>
                                        <div class="text-sm text-gray-500">United Kingdom</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Luxury Apartment with Pool</div>
                                <div class="text-sm text-gray-500">Marrakech, Morocco</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Jun 12 - Jun 19, 2030</div>
                                <div class="text-sm text-gray-500">7 nights</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                $1,050
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-green-600 hover:text-green-900 mr-3">Accept</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Decline</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                                        <span class="text-gray-700 font-medium">MS</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Maria Silva</div>
                                        <div class="text-sm text-gray-500">Brazil</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Beachfront Villa</div>
                                <div class="text-sm text-gray-500">Barcelona, Spain</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Jul 02 - Jul 09, 2030</div>
                                <div class="text-sm text-gray-500">7 nights</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                $1,960
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Confirmed
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">View Details</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                                        <span class="text-gray-700 font-medium">AK</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Ahmed Khalid</div>
                                        <div class="text-sm text-gray-500">Egypt</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Modern City Apartment</div>
                                <div class="text-sm text-gray-500">Lisbon, Portugal</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Jun 25 - Jun 29, 2030</div>
                                <div class="text-sm text-gray-500">4 nights</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                $480
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-green-600 hover:text-green-900 mr-3">Accept</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Decline</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    
    <!-- Help Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="bg-gray-50 rounded-xl p-8 shadow-md">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h2 class="text-2xl font-bold mb-4">Need Help Managing Your Properties?</h2>
                        <p class="text-gray-600 mb-6">Our dedicated host support team is available 24/7 to help you manage your World Cup 2030 accommodations.</p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#" class="bg-[#FF5A5F] text-white hover:bg-[#E94E53] px-6 py-3 rounded-lg font-medium text-center transition duration-300 ease-in-out flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Contact Support
                            </a>
                            <a href="#" class="bg-white border-2 border-[#FF5A5F] text-[#FF5A5F] hover:bg-[#FF5A5F] hover:text-white px-6 py-3 rounded-lg font-medium text-center transition duration-300 ease-in-out flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                Host Guide
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <img src="https://placehold.co/500x300" alt="Host Support" class="rounded-lg w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>