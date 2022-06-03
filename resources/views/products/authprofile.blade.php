@extends('default')

@section('title')
Profile
@endsection

@section('content')

@include('products.components.checkbox--index')

<h1 class="status">Uit te lenen</h1>
    <ul class="u-grid-12 u-grid-gap-2">
    @foreach($users->allProducts as $products)
        @if($products->lenen == "uit te lenen")
            @include('products.components.productCard--index')
        @endif
    @endforeach
    </ul>




<h1 class="status">Uitgeleend</h1>
    <ul class="u-grid-12 u-grid-gap-2">
    @foreach($users->allProducts as $products)
        @if($products->lenen == "uitgeleend")
            @include('products.components.productCard--index')
        @endif
    @endforeach
    </ul>


<h1 class="status">Aan het lenen</h1>
<ul class="u-grid-12 u-grid-gap-2">
    @foreach($allproducts as $products)
        @if($products->lener == Auth::id())
            @include('products.components.productCard--index')
        @endif
    @endforeach
</ul>

<h1 class="status">Terugkerend</h1>
    <ul class="u-grid-12 u-grid-gap-2">
    @foreach($users->allProducts as $products)
        @if($products->lenen == "terugkerend")
            @include('products.components.accepteren--index')
        @endif
    @endforeach
    </ul>
@endsection




