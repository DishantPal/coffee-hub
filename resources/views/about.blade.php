<!-- resources/views/about.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#f3e5dc] text-[#5c3d2e]">

    <!-- Navbar -->
    <nav class="bg-[#3e2723] text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('coffee_shops.index') }}" class="text-xl font-bold">Coffee Hub</a>
            <div>
                <a href="{{ route('about') }}" class="mx-4">About Us</a>
                <a href="{{ route('contact') }}" class="mx-4">Contact Us</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center mb-6">About Us</h1>
        <p class="text-lg leading-8">
            Welcome to Coffee Hub, your number one source for discovering the best coffee shops around you.
            We're dedicated to providing you with the very best coffee experiences, with an emphasis on quality,
            variety, and atmosphere.
        </p>
        <p class="text-lg leading-8 mt-4">
            Founded in 2024, Coffee Hub has come a long way from its beginnings. We hope you enjoy visiting
            our featured coffee shops as much as we enjoy showcasing them to you.
        </p>
    </main>

    <!-- Footer -->
    <footer class="bg-[#3e2723] text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            &copy; 2024 Coffee Hub. All rights reserved.
        </div>
    </footer>

</body>
</html>
