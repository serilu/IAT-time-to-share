<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ProductsCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products_categorie_array = ['Anime', 'Gaming'];

        foreach($products_categorie_array as $category){
            DB::table('products_categorie')->insert([
                'categorie' => $category,

            ]);

        }
        
    }
}
