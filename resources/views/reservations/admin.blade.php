<x-dashboard>
    <x-slot:title> Reservations </x-slot>

    <!-- Search Section -->
    <section class="py-6 bg-gray-50">
        <div class="container mx-auto">
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-4">
                <form method="GET" class="flex flex-col md:flex-row gap-3 items-center">
                    <div class="flex-grow">
                        <input type="text" value="{{ request()->get('keyword') }}" name="keyword" placeholder="Search by property, tourist, or status" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#FF5A5F] focus:border-[#FF5A5F] text-sm">
                    </div>
                    <div class="md:w-32">
                        <input type="number" name="items" value="{{ request()->get('items') ?? 10 }}" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#FF5A5F] focus:border-[#FF5A5F] text-sm" placeholder="Items"/>
                    </div>
                    <button type="submit" class="bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-4 py-3 rounded-md font-medium transition duration-200 ease-in-out flex items-center justify-center text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Reservations Table -->
    <section class="py-4 bg-white">
        <div class="container mx-auto">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-xs font-semibold text-gray-900 uppercase">Property</th>
                                <th class="px-4 py-2 text-xs font-semibold text-gray-900 uppercase">Tourist</th>
                                <th class="px-4 py-2 text-xs font-semibold text-gray-900 uppercase">Check-In</th>
                                <th class="px-4 py-2 text-xs font-semibold text-gray-900 uppercase">Check-Out</th>
                                <th class="px-4 py-2 text-xs font-semibold text-gray-900 uppercase">Total</th>
                                <th class="px-4 py-2 text-xs font-semibold text-gray-900 uppercase">Fee</th>
                                <th class="px-4 py-2 text-xs font-semibold text-gray-900 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($reservations as $reservation)
                            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $reservation->property->type->getName() }} in {{ $reservation->property->city->getName() }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $reservation->tourist->getFullName() }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ \Carbon\Carbon::parse($reservation->getFromDate())->format('M j, Y'); }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ \Carbon\Carbon::parse($reservation->getToDate())->format('M j, Y'); }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 font-medium">{{ $reservation->getTotalPrice() }} DH</td>
                                <td class="px-4 py-3 text-sm text-gray-900 font-medium">{{ $reservation->getTotalPrice() * 0.15 }} DH</td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Confirmed
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                <div class="text-gray-600 text-sm">
                    Showing {{ $reservations->firstItem() }} - {{ $reservations->lastItem() }} of {{ $reservations->total() }} reservations
                </div>
                <div class="flex items-center space-x-2">
                    <a 
                        href="{{ $reservations->previousPageUrl() }}" 
                        class="flex items-center px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-600 bg-white hover:border-[#FF5A5F] hover:text-[#FF5A5F] transition duration-200 ease-in-out {{ $reservations->onFirstPage() ? 'opacity-50 pointer-events-none' : '' }}"
                    >
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Prev
                    </a>
                    <div class="hidden sm:flex space-x-1">
                        @php
                            $currentPage = $reservations->currentPage();
                            $lastPage = $reservations->lastPage();
                            $start = max($currentPage - 2, 1);
                            $end = min($currentPage + 2, $lastPage);
                        @endphp
                        @if ($start > 1)
                            <a 
                                href="{{ $reservations->url(1) }}" 
                                class="flex items-center justify-center w-8 h-8 rounded-md text-sm font-medium {{ 1 == $currentPage ? 'bg-[#FF5A5F] text-white' : 'text-gray-600 hover:bg-[#FF5A5F]/10 hover:text-[#FF5A5F]' }} transition duration-200 ease-in-out"
                            >1</a>
                            @if ($start > 2)
                                <span class="flex items-center justify-center w-8 h-8 text-gray-600">...</span>
                            @endif
                        @endif
                        @for ($page = $start; $page <= $end; $page++)
                            <a 
                                href="{{ $reservations->url($page) }}" 
                                class="flex items-center justify-center w-8 h-8 rounded-md text-sm font-medium {{ $page == $currentPage ? 'bg-[#FF5A5F] text-white' : 'text-gray-600 hover:bg-[#FF5A5F]/10 hover:text-[#FF5A5F]' }} transition duration-200 ease-in-out"
                            >{{ $page }}</a>
                        @endfor
                        @if ($end < $lastPage)
                            @if ($end < $lastPage - 1)
                                <span class="flex items-center justify-center w-8 h-8 text-gray-600">...</span>
                            @endif
                            <a 
                                href="{{ $reservations->url($lastPage) }}" 
                                class="flex items-center justify-center w-8 h-8 rounded-md text-sm font-medium {{ $lastPage == $currentPage ? 'bg-[#FF5A5F] text-white' : 'text-gray-600 hover:bg-[#FF5A5F]/10 hover:text-[#FF5A5F]' }} transition duration-200 ease-in-out"
                            >{{ $lastPage }}</a>
                        @endif
                    </div>
                    <a 
                        href="{{ $reservations->nextPageUrl() }}" 
                        class="flex items-center px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-600 bg-white hover:border-[#FF5A5F] hover:text-[#FF5A5F] transition duration-200 ease-in-out {{ !$reservations->hasMorePages() ? 'opacity-50 pointer-events-none' : '' }}"
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