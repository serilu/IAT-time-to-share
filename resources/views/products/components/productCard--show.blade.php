<article class="productCard a-popup">
        <figure class="productCard__figure">
            <img class="productCard__image" src={{$products->image}} alt={{$products->name . "" .  $products->categorie}}/>
        </figure>

        <section class="productCard__text">
        <a class="productCard__user__name" href="/profile/{{$users[$products->user_id -1]->id}}"> By {{$users[$products->user_id - 1]-> name}} </a>
           <p class="productCard__description"> {{$products->description}}</p>
        </section>

      

        @if($products->lenen == "uitgeleend")
        <p class="productCard__message">Dit product is uitgeleend aan {{$users[$products->lener-1]->name}} tot {{  gmdate("Y-m-d\ H:i:s",strtotime($products->updated_at) + $products->uitleenTijd) }}</p>
            <a class="productCard__back__to__home__own" href="/products"> Back to home</a>

        @elseif(Auth::id() == $products->user_id)
            <p class="productCard__message">Dit is jou zooi</p>
            <a class="productCard__back__to__home__own" href="/products"> Back to home</a>
        @else

        <section class="productCard__btnSection">
            <form enctype="multipart/form-data" action="/products/{{ $products->id }}" method="POST">
            @csrf
            @method("PUT")

            <button type="submit" name="lening" class="productCard__button">Lenen</button>
            
            </form>
            
            <a class="productCard__back__to__home" href="/products"> Back to home</a>
        </section>
        @endif
    </article>