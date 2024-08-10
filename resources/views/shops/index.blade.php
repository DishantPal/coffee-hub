<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Hub</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-[#f3e5dc] text-[#5c3d2e]">

    <!-- Navbar -->
    <nav class="bg-[#3e2723] text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('shops.index') }}" class="text-xl font-bold">Coffee Hub</a>
            <div>
                <a href="{{ route('about') }}" class="mx-4">About Us</a>
                <a href="{{ route('contact') }}" class="mx-4">Contact Us</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <header class="bg-[#5d4037] text-white p-6">
        <h1 class="text-4xl font-bold text-center">Discover Your Favorite Coffee Shops</h1>
    </header>
    <main class="container mx-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($coffeeShops as $shop)
            <div class="flex flex-col justify-between bg-[#fffaf1] p-4 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 relative">

                <!-- Promotion Tag -->
                @if($shop->is_promoted)
                    <x-bi-bookmark-star-fill class="absolute top-2 right-2 text-green-500 w-6 h-6 font-bold" />
                @endif

                <!-- Shop Name -->
                <h2 class="text-2xl font-semibold line-clamp-2 flex-grow">{{ $shop->name }}</h2>

                <!-- Shop Image -->
                <div class="mt-4 mb-4 w-full rounded shadow-sm">
                    <img src="{{$shop->logo}}" class="w-full h-40 object-cover rounded shadow-sm" />
                </div>

                <!-- Social Media Links -->
                <div class="flex justify-between items-center">
                    <div class="flex space-x-4">
                        @php
                            $socialLinks = json_decode($shop->social_links, true);
                        @endphp

                        @if(!empty($socialLinks['facebook']))
                            <a href="{{ $socialLinks['facebook'] }}" class="text-[#3b5998]" target="_blank">
                                <x-bi-facebook />
                            </a>
                        @endif
                        @if(!empty($socialLinks['twitter']))
                            <a href="{{ $socialLinks['twitter'] }}" class="text-[#1DA1F2]" target="_blank">
                                <x-bi-twitter />
                            </a>
                        @endif
                        @if(!empty($socialLinks['instagram']))
                            <a href="{{ $socialLinks['instagram'] }}" class="text-[#E1306C]" target="_blank">
                                <x-bi-instagram />
                            </a>
                        @endif
                        @if(!empty($shop->website))
                            <a href="{{ $shop->website }}" class="text-[#5767e2]" target="_blank">
                                <x-bi-globe />
                            </a>
                        @endif
                    </div>

                    <a href="{{ route('shops.show', $shop) }}" class="cursor-pointer text-[#5767e2] font-bold flex items-center">
                        <span class="mr-2">View Details</span>
                    </a>
                </div>

            </div>

            @endforeach
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#3e2723] text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            &copy; 2024 Coffee Hub. All rights reserved.
        </div>
    </footer>

</body>
</html>
