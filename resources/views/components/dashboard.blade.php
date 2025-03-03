<!DOCTYPE html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }} Admin - {{ $title ?? 'Dashboard' }}</title>
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/css/all.min.css', 'resources/css/fontawesome.min.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed overflow-y-scroll no-scrollbar top-0 left-0 h-screen w-64 bg-white shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 border-b">
                <span class="text-[#FF5A5F] font-bold text-2xl">TouriStay Admin</span>
                <!-- Mobile Close Button -->
                <button type="button" class="absolute right-4 top-4 lg:hidden text-gray-500 hover:text-gray-700" id="close-sidebar">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        
            <!-- Navigation Menu -->
            <nav class="py-4">
                <!-- Admin Info -->
                <div class="px-4 mb-3">
                    <div class="flex items-center gap-3 px-4 py-2 text-gray-600">
                        <i class="fas fa-user-shield text-xl"></i>
                        <span class="font-medium">{{ Auth::user()->name ?? 'Admin User' }}</span>
                    </div>
                </div>
        
                <!-- Sidebar Links -->
                <div class="px-4 space-y-1">
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'text-white bg-[#FF5A5F]' :  'text-gray-600 hover:bg-gray-100'}} flex items-center gap-3 px-4 py-2 rounded-lg">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>

                    <!-- Content Management -->
                    <div class="space-y-1 pt-2">
                        <p class="px-4 text-xs font-semibold text-gray-400 uppercase">Properties Management</p>
                        <a href="{{ route("properties.admin") }}" class="{{ Request::routeIs('properties.admin') ? 'text-white bg-[#FF5A5F]' :  'text-gray-600 hover:bg-gray-100'}} flex items-center gap-3 px-4 py-2 rounded-lg">
                            <i class="fas fa-folder"></i>
                            <span>Properties</span>
                        </a>
                    </div>
                    
                    <!-- Logout Section -->
                    <form action="{{ route('logout') }}" method="POST" class="space-y-1 pt-2">
                        @csrf
                        <p class="px-4 text-xs font-semibold text-gray-400 uppercase">Account</p>
                        <button class="flex w-full items-center gap-3 px-4 py-2 text-[#E94E53] hover:bg-gray-100 rounded-lg">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </nav>
        </aside>
        
        <main class="lg:ml-64 min-h-screen flex flex-col-reverse w-full">
            <div class="p-4 bg-gray-100 min-h-screen">
                <!-- Page Content -->
                <div class="bg-white shadow-sm rounded-lg p-6">
                    {{ $slot }}
                </div>
            </div>

            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex h-16 items-center justify-between px-4 py-3">
                    <h1 class="text-xl font-semibold text-gray-800">{{ $title ?? "Dashboard" }}</h1>
                    
                    <div class="flex items-center gap-4">
                        {{ $headerActions ?? '' }}
                        
                        <button id="sidebarToggle" class="lg:hidden bg-[#FF5A5F] text-white p-2 rounded-lg">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </header>
        </main>
    </div>

        <!-- Overlay for mobile view -->
        <div class="fixed inset-0 bg-black bg-opacity-50 z-10 hidden transition-opacity lg:hidden" id="sidebar-overlay"></div>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <script>
            // Mobile menu toggle functionality
            document.addEventListener('DOMContentLoaded', function() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                const toggleButton = document.getElementById('sidebarToggle');
                const closeButton = document.getElementById('close-sidebar');
                
                function openSidebar() {
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('translate-x-0');
                    overlay.classList.remove('hidden');
                }
                
                function closeSidebar() {
                    sidebar.classList.remove('translate-x-0');
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
                
                toggleButton.addEventListener('click', openSidebar);
                closeButton.addEventListener('click', closeSidebar);
                overlay.addEventListener('click', closeSidebar);
                
                // Close sidebar when clicking outside on mobile
                document.addEventListener('click', function(event) {
                    if (!sidebar.contains(event.target) && !toggleButton.contains(event.target) && 
                        window.innerWidth < 1024 && !sidebar.classList.contains('-translate-x-full')) {
                        closeSidebar();
                    }
                });
            });
    
            // Flash messages
            @if(session('success'))
                Swal.fire("Success", "{{ session('success') }}", "success");
            @endif
    
            @if(session('error'))
                Swal.fire("Error", "{{ session('error') }}", "error");
            @endif
    
            @if(session('warning'))
                Swal.fire("Warning", "{{ session('warning') }}", "warning");
            @endif
        </script>
        
        {{ $scripts ?? '' }}
</body>
</html>
