@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Checkout</h1>

    @if(session('cart') && count(session('cart')) > 0)
    <form action="{{ route('checkout.store') }}" method="POST">
    @csrf

            <!-- Customer Name -->
            <div class="mb-4">
                <label for="customer_name" class="block text-sm font-medium text-gray-700">Customer Name:</label>
                <input type="text" name="customer_name" id="customer_name" class="block w-full border rounded p-2" value="{{ old('customer_name') }}" required>
                @error('customer_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Shipping Address:</label>
                <textarea name="address" id="address" class="block w-full border rounded p-2" required>{{ old('address') }}</textarea>
                @error('address')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Cart Items Table -->
            <div class="bg-white shadow-lg rounded-lg mb-6">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Product</th>
                            <th class="px-4 py-2">Size</th>
                            <th class="px-4 py-2">Color</th>
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $item)
                            <tr>
                                <td class="px-4 py-2">{{ $item['name'] }}</td>
                                <td class="px-4 py-2">{{ $item['size'] }}</td>
                                <td class="px-4 py-2">{{ $item['color'] }}</td>
                                <td class="px-4 py-2">{{ $item['quantity'] }}</td>
                                <td class="px-4 py-2">${{ number_format($item['price'], 2) }}</td>
                                <td class="px-4 py-2">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Total Amount -->
                <div class="mt-4 px-4 py-2 font-bold text-lg">
                    Total: ${{ number_format($cart_total, 2) }}
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Complete Checkout
            </button>
        </form>
    @else
        <p>No products in your cart.</p>
    @endif
</div>
@endsection
