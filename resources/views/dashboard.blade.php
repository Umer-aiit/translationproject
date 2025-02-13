<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css') {{-- Ensure Tailwind is loaded --}}
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-800 text-white p-4 flex justify-between items-center">
        
        <h1 class="text-xl font-bold">Dashboard</h1>

        <!-- Right Side Buttons -->
        <div class="flex space-x-4">

            <!-- Language Button -->
            <div class="relative">
                <button id="langToggle" class="p-2 bg-gray-700 rounded-md">
                    🌐 {{ __('messages.language') }}
                </button>
                
                <!-- Language Dropdown -->
                <div id="langMenu" class="hidden absolute right-0 mt-2 w-40 bg-white text-gray-800 shadow-lg rounded-md">
                    <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 hover:bg-gray-200">English</a>
                    <a href="{{ route('language.switch', 'fr') }}" class="block px-4 py-2 hover:bg-gray-200">French</a>
                    <a href="{{ route('language.switch', 'sp') }}" class="block px-4 py-2 hover:bg-gray-200">Spanish</a>
                </div>
            </div>

            <!-- Page Selection Dropdown -->
            <div class="relative">
                <button id="dropdownToggle" class="p-2 bg-gray-700 rounded-md">
                    📄 Pages
                </button>
                
                <!-- Dropdown Menu -->
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-40 bg-white text-gray-800 shadow-lg rounded-md">
                    <a href="{{ route('page1') }}" class="block px-4 py-2 hover:bg-gray-200">Page 1</a>
                    <a href="{{ route('page2') }}" class="block px-4 py-2 hover:bg-gray-200">Page 2</a>
                    <a href="{{ route('page3') }}" class="block px-4 py-2 hover:bg-gray-200">Page 3</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content Section -->
    <div class="p-6">
        @yield('content') {{-- This will be replaced with Page 1, 2, or 3 --}}
    </div>


    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const dropdownToggle = document.getElementById("dropdownToggle");
            const dropdownMenu = document.getElementById("dropdownMenu");
            const langToggle = document.getElementById("langToggle");
            const langMenu = document.getElementById("langMenu");

            // Toggle dropdown menus
            dropdownToggle.addEventListener("click", function (event) {
                event.stopPropagation();
                dropdownMenu.classList.toggle("hidden");
            });

            langToggle.addEventListener("click", function (event) {
                event.stopPropagation();
                langMenu.classList.toggle("hidden");
            });

            // Close dropdowns if clicking outside
            document.addEventListener("click", function (event) {
                if (!dropdownMenu.classList.contains("hidden") && !dropdownMenu.contains(event.target) && !dropdownToggle.contains(event.target)) {
                    dropdownMenu.classList.add("hidden");
                }

                if (!langMenu.classList.contains("hidden") && !langMenu.contains(event.target) && !langToggle.contains(event.target)) {
                    langMenu.classList.add("hidden");
                }
            });
        });
    </script>

</body>
</html>
