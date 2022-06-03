<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");;
            $table->string('categorie');
            $table->foreign("categorie")->references("categorie")->on("products_categorie")->onDelete("cascade");;
            $table->string('image');
            $table->string('description');
            $table->string('lenen')->default('uit te lenen');
            $table->integer('lener')->nullable();
            $table->integer('uitleenTijd')->default(60);
            $table->timestamps();
            
        });
    }

    /*
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table){
            $table->dropForeign('products_categorie_foreign');
        });

        Schema::table('products', function (Blueprint $table){
            $table->dropForeign('products_user_id_foreign');
        });

        Schema::dropIfExists('products');
    }
}
