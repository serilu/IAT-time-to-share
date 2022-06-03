@extends('default')

@section('title')
    {{"All products"}}
@endsection

@section('content')

@include('products.components.checkbox--index')

<ul class="u-grid-12 u-grid-gap-2">
@foreach($products as $products)
    @if($products->lenen == "uit te lenen")
        @include('products.components.productCard--index')
    @endif
@endforeach
</ul>



@endsection