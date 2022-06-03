@extends('default')

@section('title')
 {{$products->categorie . " " . $products->name}}
@endsection

@section('content')
    @include('products.components.adminCard--show')
@endsection