<!-- resources/views/contact.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
        <h1 class="text-4xl font-bold text-center mb-6">Contact Us</h1>
        <p class="text-lg leading-8 text-center">
            Have questions, comments, or suggestions? We’d love to hear from you! Get in touch with us through any of the following ways:
        </p>
        <div class="mt-8 text-center">
            <p>Email: <a href="mailto:support@coffeehub.com" class="text-[#8d6e63] underline">support@coffeehub.com</a></p>
            <p>Phone: <a href="tel:+1234567890" class="text-[#8d6e63] underline">+1 234 567 890</a></p>
            <p>Address: 123 Coffee Street, Beansville, CA 90210</p>
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
