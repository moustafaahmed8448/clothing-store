@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Product Image -->
        <img 
            src="{{ $product->image && file_exists(public_path('storage/' . $product->image)) 
                ? asset('storage/' . $product->image) 
                : 'https://via.placeholder.com/600x400?text=No+Image' }}" 
            alt="{{ $product->name }}" 
            class="w-full h-64 object-cover"
        >

        <!-- Product Details -->
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
            <p class="text-gray-600 mb-4">${{ number_format($product->price, 2) }}</p>
            <p class="text-gray-800 mb-4">{{ $product->description }}</p>

            <!-- Display Colors -->
            @if($product->colors->count() > 0)
                <div class="mb-4">
                    <label for="color" class="block text-sm font-medium text-gray-700">Color:</label>
                    <select name="color" id="color" class="block w-full border rounded p-2">
                        @foreach($product->colors as $color)
                            <option value="{{ $color->id }}">{{ ucfirst($color->name) }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <p class="text-gray-600">No colors available for this product.</p>
            @endif

            <!-- Display Sizes -->
            @if($product->sizes->count() > 0)
                <div class="mb-4">
                    <label for="size" class="block text-sm font-medium text-gray-700">Size:</label>
                    <select name="size" id="size" class="block w-full border rounded p-2">
                        @foreach($product->sizes as $size)
                            <option value="{{ $size->id }}">{{ ucfirst($size->name) }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <p class="text-gray-600">No sizes available for this product.</p>
            @endif

            <!-- Quantity -->
            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" class="block w-full border rounded p-2">
            </div>

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add') }}" method="POST" class="mt-6">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="product_name" value="{{ $product->name }}">
                <input type="hidden" name="product_price" value="{{ $product->price }}">

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
