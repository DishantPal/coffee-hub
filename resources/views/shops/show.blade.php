<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $shop->name ?? 'Shop Details' }} - Coffee Hub Details</title>
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

    <!-- Shop Details -->
    <main class="container mx-auto p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Shop Info Card -->
            <div class="bg-[#fffaf1] p-6 rounded-lg shadow-lg">
                <div class="flex space-x-4 justify-around">
                    <div class="w-[600px] rounded shadow-sm">
                        {{-- <img src="{{$shop->logo}}" /> --}}
                        <img src="{{$shop->logo}}" class="w-full rounded shadow-sm" />
                    </div>
                    <div>
                        <h2 class="mb-4 text-2xl font-semibold">{{ $shop->name }}</h2>
                        <p><strong>Description:</strong> {{ $shop->description ?? 'No description available' }}</p>
                        <p><strong>Address:</strong> {{ $shop->address ?? 'No address available' }}</p>
                    </div>
                </div>
            </div>

            <!-- Amenities and Social Links -->
            <div class="bg-[#fffaf1] p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">More Details</h2>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Business Hours -->
                    <div class="mt-4">
                        <h3 class="text-xl font-semibold">Business Hours</h3>
                        @if(!empty($shop->business_hours))
                            <ul class="list-disc list-inside">
                                @foreach(json_decode($shop->business_hours, true) as $day => $hours)
                                    <li><strong>{{ ucfirst($day) }}:</strong> {{ $hours }} </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No business hours available</p>
                        @endif
                    </div>

                    <!-- Amenities -->
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold">Amenities</h3>
                        @if(!empty($shop->amenities))
                            <div class="flex flex-wrap gap-2 mt-2">
                                @foreach(json_decode($shop->amenities, true) as $amenity)
                                    <span class="bg-[#795548] text-white rounded-full px-3 py-1 text-sm">{{ $amenity }}</span>
                                @endforeach
                            </div>
                        @else
                            <p>No amenities available</p>
                        @endif
                    </div>

                    @if($shop->social_links || $shop->website)
                    <div class="mt-4">
                        <h3 class="text-xl font-semibold">Follow Us</h3>
                        <div class="mt-2 flex space-x-4">
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
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="bg-[#fffaf1] p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-4">Products</h2>
            @if($shop->products && $shop->products->count() > 0)
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-[#5d4037] text-white">
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Category</th>
                            <th class="px-4 py-2">Ratings</th>
                            <th class="px-4 py-2">Reviews</th>
                            <th class="px-4 py-2">Ingredients</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shop->products as $product)
                            <tr class="border-b">
                                <td class="px-4 py-2">
                                    @if(!empty($product->image))
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-16 h-16 rounded">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{ $product->name ?? 'No name available' }}</td>
                                <td class="px-4 py-2">{{ $product->description ?? 'No description available' }}</td>
                                <td class="px-4 py-2">${{ number_format($product->price ?? 0, 2) }}</td>
                                <td class="px-4 py-2">{{ $product->category ?? 'Uncategorized' }}</td>
                                <td class="px-4 py-2">{{ $product->ratings ?? 'No ratings' }} / 5</td>
                                <td class="px-4 py-2">{{ $product->reviews_count ?? 'No review available' }}</td>
                                <td class="px-4 py-2">
                                    @if(!empty($product->ingredients))
                                        <ul class="list-disc list-inside">
                                            @php
                                                $ingredients = json_decode($product->ingredients, true);
                                            @endphp
                                            @foreach($ingredients as $ingredient)
                                                <li>{{ trim($ingredient) }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No ingredients available</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No products available</p>
            @endif
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
