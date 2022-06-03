let list_of_categorie = document.getElementsByTagName("li");

let checkbox_anime = document.getElementById("anime");
let checkbox_gaming = document.getElementById("gaming");

checkbox_anime.checked = true;
checkbox_gaming.checked = true;


for(let i = 0; i< list_of_categorie.length; i++){
    list_of_categorie[i].style.display = "";
}

checkbox_anime.addEventListener('change', function(){
    if(checkbox_anime.checked){
        for(let i = 0; i< list_of_categorie.length; i++){
            console.log(list_of_categorie[i].dataset);
            if (list_of_categorie[i].dataset.productCategorie == 'Anime'){
                list_of_categorie[i].style.display = '';
            }
        }
    }
    else{
        for(let i = 0; i< list_of_categorie.length; i++){
            if (list_of_categorie[i].dataset.productCategorie == 'Anime'){
                list_of_categorie[i].style.display = 'none';
            }
        }

    }

});


checkbox_gaming.addEventListener('change', function(){
    if(checkbox_gaming.checked){
        for(let i = 0; i< list_of_categorie.length; i++){
            if (list_of_categorie[i].dataset.productCategorie == 'Gaming'){
                list_of_categorie[i].style.display = '';
            }
        }
    }
    else{
        for(let i = 0; i< list_of_categorie.length; i++){
            if (list_of_categorie[i].dataset.productCategorie == 'Gaming'){
                list_of_categorie[i].style.display = 'none';
            }
        }

    }

});

