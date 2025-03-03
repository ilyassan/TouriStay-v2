<x-dashboard>
    <x-slot:title> Properties </x-slot>

    <!-- Search Section -->
    <section class="py-6 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-4">
                <form method="GET" class="flex flex-col md:flex-row gap-3 items-center">
                    <input type="hidden" name="page" value="{{ request()->get('page') }}">
                    <div class="flex-grow">
                        <input 
                            type="text" 
                            name="keyword" 
                            value="{{ request()->get('keyword') }}" 
                            autocomplete="off" 
                            placeholder="Search by location, property name, or amenities" 
                            class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#FF5A5F] focus:border-[#FF5A5F] text-sm"
                        >
                    </div>
                    <div class="md:w-32">
                        <input 
                            type="number" 
                            name="items" 
                            value="{{ request()->get('items') ?? 10 }}" 
                            class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#FF5A5F] focus:border-[#FF5A5F] text-sm" 
                            placeholder="Items"
                        />
                    </div>
                    <button 
                        type="submit" 
                        class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-4 py-3 rounded-md font-medium transition duration-200 ease-in-out flex items-center justify-center text-sm"
                    >
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Properties Section -->
    <section class="py-4 bg-white">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($properties as $property)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-200 ease-in-out">
                        <img 
                            src="{{ $property->getImage() }}" 
                            alt="{{ $property->getTitle() }}" 
                            class="w-full h-48 object-cover"
                        >
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $property->getTitle() }}</h3>
                                    <p class="text-sm text-gray-600">{{ $property->city->getName() }}</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($property->getDescription(), 100) }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-base font-medium text-gray-900">{{ $property->getPrice() }} DH <span class="text-sm font-normal text-gray-600">/night</span></span>
                                <div class="flex space-x-2">
                                    <a 
                                        href="#" 
                                        class="text-[#FF5A5F] hover:text-[#E94E53] font-medium text-sm"
                                    >View</a>
                                    <form action="{{ route('properties.destroy', $property->getPrimaryKey()) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            class="text-red-600 hover:text-red-700 font-medium text-sm"
                                        >Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                <div class="text-gray-600 text-sm">
                    Showing {{ $properties->firstItem() }} - {{ $properties->lastItem() }} of {{ $properties->total() }} properties
                </div>
                <div class="flex items-center space-x-2">
                    <a 
                        href="{{ $properties->previousPageUrl() }}" 
                        class="flex items-center px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-600 bg-white hover:border-[#FF5A5F] hover:text-[#FF5A5F] transition duration-200 ease-in-out {{ $properties->onFirstPage() ? 'opacity-50 pointer-events-none' : '' }}"
                    >
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Prev
                    </a>
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
                                class="flex items-center justify-center w-8 h-8 rounded-md text-sm font-medium {{ 1 == $currentPage ? 'bg-[#FF5A5F] text-white' : 'text-gray-600 hover:bg-[#FF5A5F]/10 hover:text-[#FF5A5F]' }} transition duration-200 ease-in-out"
                            >1</a>
                            @if ($start > 2)
                                <span class="flex items-center justify-center w-8 h-8 text-gray-600">...</span>
                            @endif
                        @endif
                        @for ($page = $start; $page <= $end; $page++)
                            <a 
                                href="{{ $properties->url($page) }}" 
                                class="flex items-center justify-center w-8 h-8 rounded-md text-sm font-medium {{ $page == $currentPage ? 'bg-[#FF5A5F] text-white' : 'text-gray-600 hover:bg-[#FF5A5F]/10 hover:text-[#FF5A5F]' }} transition duration-200 ease-in-out"
                            >{{ $page }}</a>
                        @endfor
                        @if ($end < $lastPage)
                            @if ($end < $lastPage - 1)
                                <span class="flex items-center justify-center w-8 h-8 text-gray-600">...</span>
                            @endif
                            <a 
                                href="{{ $properties->url($lastPage) }}" 
                                class="flex items-center justify-center w-8 h-8 rounded-md text-sm font-medium {{ $lastPage == $currentPage ? 'bg-[#FF5A5F] text-white' : 'text-gray-600 hover:bg-[#FF5A5F]/10 hover:text-[#FF5A5F]' }} transition duration-200 ease-in-out"
                            >{{ $lastPage }}</a>
                        @endif
                    </div>
                    <a 
                        href="{{ $properties->nextPageUrl() }}" 
                        class="flex items-center px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-600 bg-white hover:border-[#FF5A5F] hover:text-[#FF5A5F] transition duration-200 ease-in-out {{ !$properties->hasMorePages() ? 'opacity-50 pointer-events-none' : '' }}"
                    >
                        Next
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-dashboard>