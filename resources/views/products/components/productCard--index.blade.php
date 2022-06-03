<li class="a-popup u-list-style-none gridCard" data-product-categorie={{$products->categorie}}>
    <a href="/products/{{$products->id}}">
        <article>
            <header class="gridCard__header u-flex-v-center">
                <h2 class="gridCard__heading"> {{$products->kind}} {{$products->name}}</h2>
            </header>
            <figure class="gridCard__figure">
                <img class="gridCard__image" src={{$products->image}} alt={{$products->name . "" .  $products->categorie}}/>
            </figure>
            <section class="gridCard__textSection u-flex-v-center">
                <p class="gridCard__text"> {{$products->description}}</p>
            </section>

        </article>
    </a>
</li>  
