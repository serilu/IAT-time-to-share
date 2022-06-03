@extends('default')

@section('title')
Create Product
@endsection

@section('content')

<article class="create-form">
    <form enctype="multipart/form-data" class="create-form__form" action="/products" method="post">
        @csrf

        <section class="create-form__section">
            <label for="name">Naam</label>
            <input class="create-form__input" name="name" id="name" type="text">
        </section>

        <section class="create-form__section">
            <label for="categorie">Categorie</label>
            <select class="create-form__input" name="categorie" id="categorie">
                @foreach($products_categorie as $products_categorie)
                <option value={{$products_categorie->categorie}}>{{$products_categorie->categorie}}</option>
                @endforeach
            </select>
        </section>

        <section class="create-form__section">
            <label for="description">Description</label>
            <textarea class="create-form__input create-form__input--big" name="description" id="description"></textarea>
        </section>

        <section class="create-form__section">
            <label for="leentijd">Uitleen Tijd</label>
            <select class="create-form__input" name="leentijd" id="leentijd">
                <option value="60">1 minuut</option>
                <option value="120">2 minuten</option>
            </select>
        </section>

  

        <section class="create-form__section">
            <label for="image">Image</label>
                <input type="file" id="Image" name="image">
        </section>                                                                                                                                                                                                               

        <section class="create-form__section">
            <button class="create-form__button" type="Submit">Submit</button>
        </section>

    </form>
</article>
@endsection