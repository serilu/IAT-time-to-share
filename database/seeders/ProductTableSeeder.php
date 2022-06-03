<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => "Miku Figure",
            'user_id' => 1,
            'categorie' => "Anime",
            'image' => "/image/miku.jpg",
            'Description' => "Miku heeft een mooi figuur en is een figuur",
        ]);

        DB::table('products')->insert([
            'name' => "Marin Figure",
            'user_id' => 2,
            'image' => "/image/marin.jpg",
            'categorie' => "Anime",
            'Description' => "Marin is een lief meisje",
        ]);

        DB::table('products')->insert([
            'name' => "Yor Forger",
            'user_id' => 1,
            'image' => "/image/onyo.jpg",
            'categorie' => "Anime",
            'Description' => "Mommy",
        ]);
        
    }
}
