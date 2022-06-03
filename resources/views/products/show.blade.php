@extends('default')

@section('title')
 {{$products->categorie . " " . $products->name}}
@endsection

@section('content')
    @include('products.components.productCard--show')
@endsection