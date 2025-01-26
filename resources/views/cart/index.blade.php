@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Product</th>
                        <th class="px-4 py-2">Size</th>
                        <th class="px-4 py-2">Color</th>
                        <th class="px-4 py-2">Quantity</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('cart') as $key => $item)
                        <tr>
                            <td class="px-4 py-2">{{ $item['name'] }}</td>
                            <td class="px-4 py-2">{{ $item['size'] }}</td>  <!-- Display size name -->
                            <td class="px-4 py-2">{{ $item['color'] }}</td>  <!-- Display color name -->
                            <td class="px-4 py-2">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_key" value="{{ $key }}">
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 p-1 border rounded">
                                    <button type="submit" class="text-blue-500 ml-2">Update</button>
                                </form>
                            </td>
                            <td class="px-4 py-2">${{ number_format($item['price'], 2) }}</td>
                            <td class="px-4 py-2">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_key" value="{{ $key }}">
                                    <button type="submit" class="text-red-500">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6 flex justify-between">
                <div class="font-bold">
                    Total: ${{ number_format(array_reduce(session('cart'), function($carry, $item) {
                        return $carry + ($item['price'] * $item['quantity']);
                    }, 0), 2) }}
                </div>
                <div>
                    <a href="{{ route('checkout.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    @else
        <p>No products in your cart.</p>
    @endif
</div>
@endsection
