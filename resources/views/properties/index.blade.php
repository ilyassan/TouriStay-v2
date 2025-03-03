<x-app-layout>
    <x-slot:title> Properties </x-slot>

    <!-- Enhanced Hero Section -->
    <section class="relative py-24 overflow-hidden">
        <div class="container mx-auto px-4 md:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    Experience the <span class="text-[#FF5A5F]">World Cup 2030</span> in Style
                </h1>
                <p class="text-xl mb-8 max-w-3xl mx-auto">
                    Book your dream accommodation across Morocco, Spain, and Portugal. Enjoy comfort, convenience, and unforgettable memories.
                </p>
                <a href="#properties" class="bg-white border-2 border-[#FF5A5F] text-[#FF5A5F] hover:bg-[#FF5A5F] hover:text-white px-8 py-4 rounded-full text-lg font-semibold transition duration-300 ease-in-out inline-block">
                    Explore Properties
                </a>
            </div>
        </div>
    </section>

    <!-- Improved Search Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-6 -mt-20 relative z-20">
                <form class="flex flex-col md:flex-row gap-4 items-center">
                    <input type="hidden" name="page" value="{{ request()->get('page') }}">
                    <div class="flex-grow">
                        <input type="text" name="keyword" value="{{ request()->get('keyword') }}" autocomplete="off" id="search" placeholder="Search by location, property name, or amenities" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-[#FF5A5F] focus:border-[#FF5A5F]">
                    </div>
                    <div class="md:w-20">
                        <input type="number" name="items" value="{{ request()->get('items') ?? 3 }}" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-[#FF5A5F] focus:border-[#FF5A5F]"/>
                    </div>
                    <button type="submit" class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-6 py-4 rounded-lg font-medium transition duration-300 ease-in-out flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Properties Section -->
    <section id="properties" class="py-8 bg-white">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($properties as $property)
                    @php
                        $isFavorite = count($property->favorites) > 0;
                    @endphp
                    <div class="bg-white relative rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 border border-gray-200">
                        <form method="POST" action="{{ route('favorites.store') }}" class="absolute top-4 right-4 z-10">
                            @csrf
                            <input type="hidden" name="property_id" value="{{ $property->getPrimaryKey() }}">
                            <button class="p-2 rounded-full shadow-md <?= $isFavorite ? 'hover:bg-white text-white bg-[#FF5A5F] hover:text-gray-400' : 'bg-white hover:text-white hover:bg-[#FF5A5F] text-gray-400' ?> transition duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </form>
                        <img src="{{ $property->getImage() }}" alt="Luxury Apartment in Marrakech" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900">Luxury</h3>
                                    <p class="text-gray-600">{{ $property->city->getName() }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">{{ Str::limit($property->getDescription(), 50) }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-gray-900"> {{ $property->getPrice() }} DH <span class="text-sm font-normal text-gray-600">/ night</span></span>
                                @if (auth()->id() == $property->getOwnerId())
                                    <a href="{{ route('properties.edit', $property->getPrimaryKey()) }}" class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-4 py-2 rounded-lg font-medium transition duration-300 ease-in-out">View</a>
                                @else
                                    <button class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-4 py-2 rounded-lg font-medium transition duration-300 ease-in-out">Book Now</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                <div class="text-gray-600">
                    Showing {{ $properties->firstItem() }} - {{ $properties->lastItem() }} of {{ $properties->total() }} results
                </div>
                
                <div class="flex items-center space-x-2">
                    {{-- Previous Page Link --}}
                    <a 
                        href="{{ $properties->previousPageUrl() }}" 
                        class="flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 bg-white hover:border-[#FF5A5F] hover:text-[#FF5A5F] transition duration-300 ease-in-out {{ $properties->onFirstPage() ? 'opacity-50 pointer-events-none' : '' }}"
                    >
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Previous
                    </a>

                    {{-- Page Numbers with Dots --}}
                    <div class="hidden sm:flex space-x-1">
                        @php
                            $currentPage = $properties->currentPage();
                            $lastPage = $properties->lastPage();
                            $start = max($currentPage - 2, 1); // Show 2 pages before current
                            $end = min($currentPage + 2, $lastPage); // Show 2 pages after current
                        @endphp

                        {{-- Always show the first page --}}
                        @if ($start > 1)
                            <a 
                                href="{{ $properties->url(1) }}" 
                                class="flex items-center justify-center w-10 h-10 rounded-lg text-sm font-medium transition duration-300 ease-in-out 
                                    {{ 1 == $currentPage 
                                        ? 'bg-[#FF5A5F] text-white' 
                                        : 'text-gray-600 hover:bg-[#FF5A5F]/10 hover:text-[#FF5A5F]' }}"
                            >
                                1
                            </a>
                            @if ($start > 2)
                                <span class="flex items-center justify-center w-10 h-10 text-gray-600">...</span>
                            @endif
                        @endif

                        {{-- Show pages around the current page --}}
                        @for ($page = $start; $page <= $end; $page++)
                            <a 
                                href="{{ $properties->url($page) }}" 
                                class="flex items-center justify-center w-10 h-10 rounded-lg text-sm font-medium transition duration-300 ease-in-out 
                                    {{ $page == $currentPage 
                                        ? 'bg-[#FF5A5F] text-white' 
                                        : 'text-gray-600 hover:bg-[#FF5A5F]/10 hover:text-[#FF5A5F]' }}"
                            >
                                {{ $page }}
                            </a>
                        @endfor

                        {{-- Always show the last page --}}
                        @if ($end < $lastPage)
                            @if ($end < $lastPage - 1)
                                <span class="flex items-center justify-center w-10 h-10 text-gray-600">...</span>
                            @endif
                            <a 
                                href="{{ $properties->url($lastPage) }}" 
                                class="flex items-center justify-center w-10 h-10 rounded-lg text-sm font-medium transition duration-300 ease-in-out 
                                    {{ $lastPage == $currentPage 
                                        ? 'bg-[#FF5A5F] text-white' 
                                        : 'text-gray-600 hover:bg-[#FF5A5F]/10 hover:text-[#FF5A5F]' }}"
                            >
                                {{ $lastPage }}
                            </a>
                        @endif
                    </div>

                    {{-- Next Page Link --}}
                    <a 
                        href="{{ $properties->nextPageUrl() }}" 
                        class="flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 bg-white hover:border-[#FF5A5F] hover:text-[#FF5A5F] transition duration-300 ease-in-out {{ !$properties->hasMorePages() ? 'opacity-50 pointer-events-none' : '' }}"
                    >
                        Next
                        <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </section>
</x-app-layout>