@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Welcome to Our Clothing Store</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="bg-white border rounded-lg shadow hover:shadow-lg">
            <div class="p-4">
                <!-- Check if image exists, if not, show a placeholder -->
                @if($product->image && file_exists(public_path('storage/' . $product->image)))
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-t-lg w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-300 flex items-center justify-center text-white">
                        No Image Available
                    </div>
                @endif

                <h2 class="text-lg font-bold mt-4">{{ $product->name }}</h2>
                <p class="text-gray-600 mt-2">${{ number_format($product->price, 2) }}</p>

<!-- Display colors for the product -->
@if($product->colors->isEmpty())
    <p class="text-sm text-gray-500 mt-2">No colors available</p>
@else
    <p class="text-sm text-gray-500 mt-2">Colors: 
        @foreach($product->colors as $color)
            <span 
                class="inline-block text-white text-xs py-1 px-2 rounded-full"
                style="background-color: {{ $color->hex_code ?? '#ccc' }};">
                {{ ucfirst($color->name) }}
            </span>
        @endforeach
    </p>
@endif





                <!-- Display sizes for the product -->
                @if($product->sizes->count() > 0)
                    <p class="text-sm text-gray-500 mt-2">Sizes: 
                        @foreach($product->sizes as $size)
                            <span class="inline-block border text-xs py-1 px-2 rounded-full">{{ ucfirst($size->name) }}</span>
                        @endforeach
                    </p>
                @else
                    <p class="text-sm text-gray-500 mt-2">No sizes available</p>
                @endif

                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('products.show', $product->id) }}" class="block bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600">
                        View Details
                    </a>

                    <!-- Add to Cart Button -->
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" value="1" min="1" class="w-16 p-1 border rounded">
                        <select name="color_id" class="ml-2 border rounded p-1">
                            @foreach($product->colors as $color)
                                <option value="{{ $color->id }}">{{ ucfirst($color->name) }}</option>
                            @endforeach
                        </select>
                        <select name="size_id" class="ml-2 border rounded p-1">
                            @foreach($product->sizes as $size)
                                <option value="{{ $size->id }}">{{ ucfirst($size->name) }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="ml-2 bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($products->isEmpty())
    <p class="text-gray-600 mt-6">No products available at the moment.</p>
    @endif
</div>
@endsection
