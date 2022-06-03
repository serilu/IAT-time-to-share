<article class="productCard a-popup">
        <figure class="productCard__figure">
            <img class="productCard__image" src={{$products->image}} alt={{$products->name . "" .  $products->categorie}}/>
        </figure>

        <section class="productCard__text">
            <a class="productCard__back__to__home" href="/profile/{{$users[$products->user_id -1]->id}}"> By {{$users[$products->user_id - 1]-> name}} </a>
           <p> {{$products->description}}</p>
        </section>

        <form enctype="multipart/form-data" action="/accept/{{ $products->id }}" method="POST">
            @csrf
            <label for="review">Laat een review achter:</label><br>
            <input type="text" id="review" name="review">
            
            <button type="submit" name="accepteren" class="productCard__button">Accepteren</button>
            <a class="productCard__back__to__home" href="/profile"> Back to profile</a>
        </form>

    </article>

