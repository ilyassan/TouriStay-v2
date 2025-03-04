<x-app-layout>
    <x-slot:title> Property Details </x-slot>

    @if ($errors->any())
        <x-slot:error>{{ $errors->first() }}</x-slot> 
    @endif

    <section class="py-6 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Property Image Gallery and Details Column -->
                <div class="lg:col-span-2 space-y-4">
                    <!-- Property Images with Gallery System -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-md">
                        <div class="relative">
                            <!-- Main Image with aspect ratio -->
                            <div class="aspect-w-16 aspect-h-9 overflow-hidden">
                                <img src="{{ $property->getImage() }}" alt="{{ $property->getTitle() }}" 
                                     class="w-full object-cover transition-transform duration-300 hover:scale-105">
                            </div>
                            <!-- Image navigation controls could be added here -->
                        </div>
                    </div>

                    <!-- Property Details Card -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <!-- Title and Rating -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-4">
                            <h1 class="text-2xl font-bold text-gray-900">{{ $property->getTitle() }}</h1>
                        </div>

                        <!-- Property Basic Info -->
                        <div class="flex flex-wrap items-center text-gray-600 text-sm mb-4 gap-2">
                            <div class="flex items-center bg-gray-100 px-3 py-1 rounded-full">
                                <svg class="w-4 h-4 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ $property->getBedrooms() }} Beds</span>
                            </div>

                            <div class="flex items-center bg-gray-100 px-3 py-1 rounded-full">
                                <svg class="w-4 h-4 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4zM8 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H9a1 1 0 01-1-1V4zM15 3a1 1 0 00-1 1v12a1 1 0 001 1h2a1 1 0 001-1V4a1 1 0 00-1-1h-2z"></path>
                                </svg>
                                <span>{{ $property->getBathrooms() }} Baths</span>
                            </div>

                            <div class="flex items-center bg-gray-100 px-3 py-1 rounded-full">
                                <svg class="w-4 h-4 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ $property->city->getName() }}, {{ "Morocco" }}</span>
                            </div>
                        </div>

                        <!-- Property Description -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">About this property</h3>
                            <p class="text-gray-700">{{ $property->getDescription() }}</p>
                        </div>

                        <!-- Property Amenities -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Amenities</h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                <div class="flex items-center p-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition">
                                    <svg class="w-5 h-5 text-[#FF5A5F] mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                                    </svg>
                                    <span class="text-gray-700">Wi-Fi</span>
                                </div>
                                <div class="flex items-center p-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition">
                                    <svg class="w-5 h-5 text-[#FF5A5F] mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-gray-700">Air Conditioning</span>
                                </div>
                                <div class="flex items-center p-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition">
                                    <svg class="w-5 h-5 text-[#FF5A5F] mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    <span class="text-gray-700">Kitchen</span>
                                </div>
                                <div class="flex items-center p-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition">
                                    <svg class="w-5 h-5 text-[#FF5A5F] mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                    </svg>
                                    <span class="text-gray-700">Parking</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Form Column -->
                <div class="lg:col-span-1 self-start sticky top-4">
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Reserve Your Stay</h3>
                        
                        <!-- Price Display -->
                        <div class="flex items-baseline mb-6">
                            <span class="text-2xl font-bold text-gray-900">{{ $property->getPrice() }} DH</span>
                            <span class="text-gray-600 text-sm ml-1"> / night</span>
                        </div>

                        <form method="POST" action="{{ route('reservations.store') }}" class="space-y-6" id="reservationForm">
                            @csrf
                            <input type="hidden" name="property_id" value="{{ $property->getPrimaryKey() }}">
                            
                            <!-- Date Selection with Icon on Left -->
                            <div class="space-y-4">
                                <div class="relative">
                                    <label for="check_in" class="block text-sm font-medium text-gray-700 mb-1.5">Check-In Date</label>
                                    <div class="relative group">
                                        <input type="text" id="check_in" name="from_date" 
                                               class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg bg-white shadow-sm 
                                               text-gray-900 text-sm focus:ring-2 focus:ring-[#FF5A5F] focus:border-[#FF5A5F] 
                                               transition-all duration-200 hover:border-gray-300" 
                                               placeholder="Select check-in date" required>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500 transition-colors" 
                                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="relative">
                                    <label for="check_out" class="block text-sm font-medium text-gray-700 mb-1.5">Check-Out Date</label>
                                    <div class="relative group">
                                        <input type="text" id="check_out" name="to_date" 
                                               class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg bg-white shadow-sm 
                                               text-gray-900 text-sm focus:ring-2 focus:ring-[#FF5A5F] focus:border-[#FF5A5F] 
                                               transition-all duration-200 hover:border-gray-300" 
                                               placeholder="Select check-out date" required>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500 transition-colors" 
                                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                @if (auth()->user()->isTourist())
                                <div class="relative">
                                    <label for="card-element" class="block text-sm font-medium text-gray-700 mb-1.5">Card</label>
                                    <div class="relative group">
                                        <div type="text" id="card-element" name="card" 
                                                class="w-full pl-4 pr-4 py-3 border border-gray-200 rounded-lg bg-white shadow-sm 
                                                text-gray-900 text-sm focus:ring-2 focus:ring-[#FF5A5F] focus:border-[#FF5A5F] 
                                                transition-all duration-200 hover:border-gray-300">
                                        </div>
    
                                    </div>
                                    <input type="hidden" name="stripe-token" id="stripe-token" value="">
                                </div>
                                @endif
                            </div>
                        </div>

                            <!-- Price Breakdown (No Service Fee) -->
                            <div id="priceBreakdown" class="mt-4 pt-4 border-t border-gray-200 bg-gray-50 p-4 rounded-lg space-y-3 hidden">
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm text-gray-600">
                                        <span>Number of nights</span>
                                        <span id="nightCount" onclick="createToken()">0</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600">
                                        <span>Price per night</span>
                                        <span>{{ $property->getPrice() }} DH</span>
                                    </div>
                                    <div class="flex justify-between text-base font-semibold text-gray-900 pt-2 border-t border-gray-200">
                                        <span>Total</span>
                                        <span id="totalAmount">0 DH</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Error Messages -->
                            <div id="dateError" class="text-sm text-red-600 font-medium mt-1 hidden">
                                Please select valid dates within the available range with no overlapping bookings.
                            </div>

                            @if (auth()->user()->isTourist())
                                <!-- Submit Button -->
                                <button type="submit" 
                                    class="w-full bg-[#FF5A5F] hover:bg-[#E94E53] text-white px-4 py-3 rounded-lg 
                                    font-semibold text-sm transition-all duration-200 shadow-md hover:shadow-lg 
                                    disabled:bg-gray-400 disabled:cursor-not-allowed disabled:shadow-none" 
                                    id="reserveButton" onclick="createToken()" disabled>
                                Reserve Now
                            </button>
                            @endif
                        </form>

                        <!-- Cancellation Policy -->
                        <div class="mt-6 flex items-center justify-center text-sm text-gray-600 bg-gray-50 py-2 rounded-lg">
                            <svg class="w-4 h-4 mr-1.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p>Free cancellation up to 48 hours before check-in</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        /* Enhanced styling for date picker */
        .flatpickr-day.selected {
            background: #FF5A5F !important;
            border-color: #FF5A5F !important;
            color: white !important;
        }
        .flatpickr-day.today {
            border-color: #FF5A5F !important;
            color: #FF5A5F !important;
        }
        .flatpickr-day:hover {
            border-color: #FF5A5F !important;
            background: rgba(255, 90, 95, 0.1) !important;
        }
        .unavailable-date {
            background-color: #fee2e2 !important;
            color: #dc2626 !important;
            text-decoration: line-through;
            cursor: not-allowed;
            opacity: 0.7;
        }
        .available-date {
            background-color: #fff !important;
            color: #374151 !important;
        }
        .flatpickr-calendar {
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .flatpickr-monthDropdown-months,
        .flatpickr-year {
            color: #FF5A5F !important;
        }
        /* For responsive image aspect ratio */
        .aspect-w-16 {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        }
        .aspect-w-16 > img {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            object-fit: cover;
        }
    </style>
    
    <script src="https://js.stripe.com/v3/"></script>
    @if (auth()->user()->isTourist())
        <script>
            var stripe = new Stripe('{{ env("STRIPE_KEY") }}');

            var elements = stripe.elements();
            var cardElement = elements.create("card");
            cardElement.mount("#card-element");

            function createToken(){
                stripe.createToken(cardElement).then(function(result){
                    console.log(result);
                    if(result.token){
                        document.getElementById("stripe-token").value = result.token.id;
                    }
                })
            }
        </script>
    @endif
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pricePerNight = {{ $property->getPrice() }};
            const availableFrom = new Date("{{ $property->available_from }}");
            const availableTo = new Date("{{ $property->available_to }}");
            const notAvailableRanges = {!! json_encode($notAvailableRanges) !!};

            let checkInDate, checkOutDate;
            const priceBreakdownDiv = document.getElementById('priceBreakdown');
            const nightCountSpan = document.getElementById('nightCount');
            const totalAmountSpan = document.getElementById('totalAmount');
            const dateErrorDiv = document.getElementById('dateError');
            const reserveButton = document.getElementById('reserveButton');

            // Normalize date strings to YYYY-MM-DD and handle potential invalid dates
            const normalizedRanges = notAvailableRanges.map(range => {
                const start = new Date(range[0]);
                const end = new Date(range[1]);
                return [
                    isNaN(start) ? null : start.toISOString().split('T')[0],
                    isNaN(end) ? null : end.toISOString().split('T')[0]
                ].filter(Boolean);
            }).filter(range => range.length === 2);

            // Check if a date falls within an unavailable range
            function isDateNotAvailable(date) {
                const dateStr = date.toISOString().split('T')[0];
                return normalizedRanges.some(range => 
                    dateStr >= range[0] && dateStr <= range[1]
                );
            }

            // Check for overlap with unavailable ranges
            function hasOverlap(checkIn, checkOut) {
                const checkInStr = checkIn.toISOString().split('T')[0];
                const checkOutStr = checkOut.toISOString().split('T')[0];
                return normalizedRanges.some(range => 
                    checkInStr <= range[1] && checkOutStr >= range[0]
                );
            }

            // Set minimum date to tomorrow
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            const tomorrowStr = tomorrow.toISOString().split('T')[0];

            // Initialize Flatpickr for check-in
            const checkInPicker = flatpickr("#check_in", {
                dateFormat: "Y-m-d",
                minDate: tomorrowStr > availableFrom.toISOString().split('T')[0] ? tomorrowStr : availableFrom,
                maxDate: availableTo,
                disable: [
                    function(date) {
                        return date < availableFrom || date > availableTo || isDateNotAvailable(date);
                    }
                ],
                onChange: function(selectedDates) {
                    checkInDate = selectedDates[0];
                    if (checkInDate) {
                        checkOutPicker.set('minDate', checkInDate);
                    }
                    validateDates();
                },
                onReady: function() {
                    highlightUnavailableDates(this);
                },
                onMonthChange: function() {
                    highlightUnavailableDates(this);
                }
            });

            // Initialize Flatpickr for check-out
            const checkOutPicker = flatpickr("#check_out", {
                dateFormat: "Y-m-d",
                minDate: availableFrom,
                maxDate: availableTo,
                disable: [
                    function(date) {
                        // Include check-in date dependency in disable logic
                        const minCheckOut = checkInDate || availableFrom;
                        return date < minCheckOut || date > availableTo || isDateNotAvailable(date);
                    }
                ],
                onChange: function(selectedDates) {
                    checkOutDate = selectedDates[0];
                    validateDates();
                },
                onReady: function() {
                    highlightUnavailableDates(this);
                },
                onMonthChange: function() {
                    highlightUnavailableDates(this);
                }
            });

            // Highlight unavailable dates visually
            function highlightUnavailableDates(picker) {
                const days = picker.element.closest('.flatpickr-calendar').querySelectorAll('.flatpickr-day');
                days.forEach(day => {
                    const dateStr = day.getAttribute('aria-label');
                    if (dateStr) {
                        const currentDate = new Date(dateStr);
                        const isCheckInPicker = picker.element.id === 'check_in';
                        const minDate = isCheckInPicker 
                            ? (tomorrowStr > availableFrom.toISOString().split('T')[0] ? tomorrow : availableFrom)
                            : (checkInDate || availableFrom);

                        if (
                            currentDate < minDate || 
                            currentDate > availableTo || 
                            isDateNotAvailable(currentDate)
                        ) {
                            day.classList.add('unavailable-date');
                            day.classList.remove('available-date');
                        } else {
                            day.classList.add('available-date');
                            day.classList.remove('unavailable-date');
                        }
                    }
                });
            }

            // Validate dates and update price breakdown
            function validateDates() {
                if (checkInDate && checkOutDate) {
                    const diffTime = checkOutDate - checkInDate;
                    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24)) + 1;

                    if (diffDays >= 1 && !hasOverlap(checkInDate, checkOutDate)) {
                        const total = diffDays * pricePerNight;
                        nightCountSpan.textContent = diffDays;
                        totalAmountSpan.textContent = `${total} DH`;
                        priceBreakdownDiv.classList.remove('hidden');
                        dateErrorDiv.classList.add('hidden');
                        reserveButton.disabled = false;
                    } else {
                        priceBreakdownDiv.classList.add('hidden');
                        dateErrorDiv.classList.remove('hidden');
                        reserveButton.disabled = true;
                    }
                } else {
                    priceBreakdownDiv.classList.add('hidden');
                    dateErrorDiv.classList.add('hidden');
                    reserveButton.disabled = true;
                }
            }
        });
    </script>
</x-app-layout>