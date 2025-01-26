<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store</title>

    <!-- Add your CSS libraries here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Add any other styles or scripts here -->
</head>
<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <nav class="bg-blue-500 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-white text-2xl font-bold">Clothing Store</a>
            <div>
                <a href="{{ route('cart.index') }}" class="text-white mr-4">Cart</a>
                <a href="{{ route('products.index') }}" class="text-white">Products</a>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <main class="py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-500 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Clothing Store. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
