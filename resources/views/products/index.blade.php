@php
/** @var \Illuminate\Pagination\LengthAwarePaginator|\App\Domain\Product\Product[] $products */
@endphp

<x-app-layout title="Products">
        <form class="grid grid-cols-3 gap-12" method="GET" action="/" style="margin-bottom: 10px;">
        <select name="id[]">
            <option value="">All categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"@if(in_array($category->id, $ids)) selected @endif> {{ $category->value }}</option>
            @endforeach
        </select>
            @foreach($cities as $city)
                <div class="grid grid-cols-12">
                <input type="checkbox" name="id[]" value="{{ $city->id }}" @if(in_array($city->id, $ids)) checked @endif> {{ $city->value }}
                </div>
            @endforeach
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 font-display font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:ring focus:ring-red-700">Filter</button>
        </form>
    <div class="grid grid-cols-3 gap-12">
        @foreach($products as $product)
            <x-product
                :title="$product->name"
                :price="format_money($product->getItemPrice()->pricePerItemIncludingVat())"
                :actionUrl="action(\App\Http\Controllers\Cart\AddCartItemController::class, [$product])"
          />
        @endforeach
    </div>

    <div class="mx-auto mt-12">
        {{ $products->links() }}
    </div>
</x-app-layout>
