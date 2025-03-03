<x-dashboard>
    <x-slot:title> Properties </x-slot>

    <!-- Improved Search Section -->
    <section class="py-12">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-6 relative z-20">
                <form method="GET" class="flex flex-col md:flex-row gap-4 items-center">
                    <input type="hidden" name="page" value="{{ request()->get('page') }}">
                    <div class="flex-grow">
                        <input type="text" name="keyword" value="{{ request()->get('keyword') }}" autocomplete="off" placeholder="Search by location, property name, or amenities" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FF5A5F] focus:border-[#FF5A5F]">
                    </div>
                    <div class="md:w-48">
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
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($properties as $property)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 border border-gray-200">
                        <img src="{{ $property->getImage() }}" alt="{{ $property->getTitle() }}" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900">{{ $property->getTitle() }}</h3>
                                    <p class="text-gray-600">{{ $property->city->getName() }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">{{ Str::limit($property->getDescription(), 100) }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-gray-900">{{ $property->getPrice() }} DH<span class="text-sm font-normal text-gray-600">/ night</span></span>
                                <div class="flex space-x-2">
                                    <form action="{{ route('properties.destroy', $property->getPrimaryKey()) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition duration-300 ease-in-out">Delete</button>
                                    </form>
                                </div>
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
                            $start = max($currentPage - 2, 1);
                            $end = min($currentPage + 2, $lastPage);
                        @endphp

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
</x-dashboard>