<x-app-layout>
    <x-slot:title> My Profile </x-slot>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")

        <!-- Profile Header Section -->
        <section class="relative py-16 bg-gradient-to-r from-[#FF5A5F] to-[#FF8A8F]">
            <div class="container mx-auto px-4 md:px-6 lg:px-8 relative z-10">
                <div class="flex flex-col md:flex-row items-center md:items-end space-y-6 md:space-y-0">
                    <div class="relative group">
                        <div class="w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border-4 border-white shadow-xl">
                            <img id="profile-image" src="{{ $user->getImage() }}" alt="Profile Photo" class="w-full h-full object-cover">
                        </div>
                        <label for="photo-upload" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full opacity-0 group-hover:opacity-100 cursor-pointer transition duration-300">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="sr-only">Change Photo</span>
                        </label>
                        <input id="photo-upload" name="image" type="file" class="hidden" accept="image/*">
                    </div>
                    <div class="md:ml-8 text-center md:text-left">
                        <h1 class="text-3xl md:text-4xl font-bold text-white">
                            <span id="display-name">{{ $user->getFullName() }}</span>
                            <span class="inline-block ml-3 px-3 py-1 bg-white text-[#FF5A5F] text-sm rounded-full font-medium uppercase" id="user-role">{{ $user->isTourist() ? "Tourist" : ($user->isAdmin() ? "Admin" : "Proprietor") }}</span>
                        </h1>
                        <p class="text-white text-lg opacity-90 mt-2" id="user-since">Member since {{ Carbon\Carbon::parse($user->getCreatedAt())->format('F Y') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Profile Content -->
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4 md:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto">
                    <!-- Tabs -->
                    <div class="border-b border-gray-200 mb-8">
                        <nav class="-mb-px flex space-x-8">
                            <a href="#" class="border-[#FF5A5F] text-[#FF5A5F] whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Personal Information
                            </a>
                        </nav>
                    </div>

                    <!-- Profile Form -->
                    <div id="profile-form" class="space-y-8">
                        <!-- Success Alert (Hidden by default) -->
                        <div id="success-alert" class="hidden bg-green-50 border-l-4 border-green-400 p-4 mb-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-green-700">Profile updated successfully!</p>
                                </div>
                                <div class="ml-auto pl-3">
                                    <button type="button" onclick="document.getElementById('success-alert').classList.add('hidden')" class="inline-flex text-green-500 hover:text-green-600">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Basic Info Section -->
                        <div class="bg-white shadow rounded-lg p-6 md:p-8">
                            <h2 class="text-xl font-semibold text-gray-900 mb-6">Basic Information</h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                    <input type="text" id="first_name" name="first_name" value="{{ $user->getFirstName() }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#FF5A5F] focus:border-[#FF5A5F]">
                                </div>
                                
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" value="{{ $user->getLastName() }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#FF5A5F] focus:border-[#FF5A5F]">
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                    <input type="email" id="email" name="email" value="{{ $user->getEmail() }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#FF5A5F] focus:border-[#FF5A5F]">
                                </div>
                                
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" value="{{ $user->getPhone() }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#FF5A5F] focus:border-[#FF5A5F]">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Buttons -->
                        <div class="flex justify-end space-x-4">
                            <button type="button" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 font-medium transition duration-300 ease-in-out">
                                Cancel
                            </button>
                            <button type="submit" class="px-6 py-3 bg-[#FF5A5F] hover:bg-[#E94E53] text-white rounded-lg font-medium transition duration-300 ease-in-out">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <!-- JavaScript for live image preview and form handling -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Variables
            const photoUpload = document.getElementById('photo-upload');
            const profileImage = document.getElementById('profile-image');
            const profileForm = document.getElementById('profile-form');
            const successAlert = document.getElementById('success-alert');
            const firstName = document.getElementById('first_name');
            const lastName = document.getElementById('last_name');
            const displayName = document.getElementById('display-name');
            const roleRadios = document.getElementsByName('role');
            const userRole = document.getElementById('user-role');
            
            // Handle image upload preview
            photoUpload.addEventListener('change', function(event) {
                if (event.target.files && event.target.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        profileImage.src = e.target.result;
                    }
                    
                    reader.readAsDataURL(event.target.files[0]);
                }
            });
        });
    </script>
</x-app-layout>