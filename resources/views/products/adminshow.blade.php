@extends('default')

@section('title')
 Admin {{$products->categorie . " " . $products->name}}
@endsection

@section('content')
    @include('products.components.adminCard--show')
@endsection