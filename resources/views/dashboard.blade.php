<x-dashboard>
    <x-slot:title> Dashboard </x-slot>

    <!-- Stats Overview Cards -->
    <section class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- New Properties Card -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-medium text-gray-500">New Properties</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $thisMonthPropertiesCount }}</h3>
                    </div>
                    <div class="bg-[#FF5A5F]/10 p-3 rounded-lg">
                        <i class="fas fa-home text-[#FF5A5F] text-xl"></i>
                    </div>
                </div>
                <span class="text-sm whitespace-nowrap font-medium {{ $propertiesRatio > 0 ? 'text-green-600' : 'text-red-600' }} flex items-center gap-1 mt-1">
                    <i class="fas fa-arrow-{{ $propertiesRatio > 0 ? 'up' : 'down' }} text-xs"></i> {{ $propertiesRatio }}% vs last month
                </span>
            </div>

            <!-- Pending Verifications -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-medium text-gray-500">Monthly Tourists</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $thisMonthTouristsCount }}</h3>
                    </div>
                    <div class="bg-amber-50 p-3 rounded-lg">
                        <i class="fas fa-user-check text-amber-500 text-xl"></i>
                    </div>
                </div>
                <span class="text-sm whitespace-nowrap font-medium {{ $touristsRatio > 0 ? 'text-green-600' : 'text-red-600' }} flex items-center gap-1 mt-1">
                    <i class="fas fa-arrow-{{ $touristsRatio > 0 ? 'up' : 'down' }} text-xs"></i> {{ $touristsRatio }}% vs last month
                </span>
            </div>

            <!-- Active Bookings -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-medium text-gray-500">Active Bookings</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ 120 }}</h3>
                    </div>
                    <div class="bg-green-50 p-3 rounded-lg">
                        <i class="fas fa-calendar-check text-green-500 text-xl"></i>
                    </div>
                </div>
                <span class="text-sm font-medium {{ 90 > 0 ? 'text-green-600' : 'text-red-600' }} flex items-center gap-1 mt-1">
                    <i class="fas fa-arrow-{{ 90 > 0 ? 'up' : 'down' }} text-xs"></i> {{ number_format(90, 1) }}% occupancy rate
                </span>
            </div>

            <!-- Total Revenue -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-medium text-gray-500">30d Revenue</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ number_format(96000) }} DH</h3>
                    </div>
                    <div class="bg-purple-50 p-3 rounded-lg">
                        <i class="fas fa-wallet text-purple-500 text-xl"></i>
                    </div>
                </div>
                <span class="text-sm font-medium text-gray-600 flex items-center gap-1 mt-1">
                    <i class="fas fa-globe text-xs"></i> All host cities
                </span>
            </div>
        </div>
    </section>

    <!-- Charts Section -->
    <section class="mb-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Booking Trends Chart -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Booking Trends</h3>
                <canvas id="bookingChart" height="300"></canvas>
            </div>

            <!-- Property Types Distribution -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Property Types</h3>
                <canvas id="propertyChart" height="300"></canvas>
            </div>
        </div>
    </section>

    <!-- Recent Activities Section -->
    <section>
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Activities</h3>
            <div class="space-y-4">
                @if (empty($latestActivities))
                    <p class="text-gray-600">No recent activities.</p>
                @else
                    @foreach ($latestActivities as $activity)
                        <div class="flex items-center gap-4">
                            @if ($activity['type'] === 'property')
                                <div class="bg-[#FF5A5F]/10 w-10 h-10 flex justify-center items-center rounded-full">
                                    <i class="fas fa-home text-[#FF5A5F]"></i>
                                </div>
                            @elseif ($activity['type'] === 'booking')
                                <div class="bg-green-100 w-10 h-10 flex justify-center items-center rounded-full">
                                    <i class="fas fa-calendar-check text-green-600"></i>
                                </div>
                            @elseif ($activity['type'] === 'register')
                                <div class="bg-blue-100 w-10 h-10 flex justify-center items-center rounded-full">
                                    <i class="fas fa-user-check text-blue-600"></i>
                                </div>
                            @endif
                            <div>
                                <p class="text-gray-800">{{ $activity['message'] }}</p>
                                <p class="text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($activity['created_at'])->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Booking Trends Data
        const usersData = {
            labels: @json($lastSixMonthTourists->keys()),
            datasets: [{
                label: 'Tourists',
                data: @json($lastSixMonthTourists->values()),
                borderColor: '#FF5A5F',
                tension: 0.4,
                fill: false
            }, {
                label: 'Proprietors',
                data: @json($lastSixMonthProprietors->values()),
                borderColor: '#7C3AED',
                tension: 0.4,
                fill: false
            }]
        };

        // Property Types Data
        const propertyTypes = @json($types);
        const propertyData = {
            labels: propertyTypes.map(p => p.name),
            datasets: [{
                data: propertyTypes.map(p => p.properties_count),
                backgroundColor: ['#FF5A5F', '#7C3AED', '#10B981', '#F59E0B', '#3B82F6']
            }]
        };

        // Render Booking Trends Chart
        const bookingCtx = document.getElementById('bookingChart').getContext('2d');
        new Chart(bookingCtx, {
            type: 'line',
            data: usersData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        // Render Property Types Chart
        const propertyCtx = document.getElementById('propertyChart').getContext('2d');
        new Chart(propertyCtx, {
            type: 'doughnut',
            data: propertyData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>

</x-dashboard>
