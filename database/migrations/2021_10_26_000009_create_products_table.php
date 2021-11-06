<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
    		$table->increments('id');
    		$table->unsignedbigInteger('article_id');
    		$table->foreign('article_id')->references('id')->on('articles')->onUpdate("cascade");
    		$table->unsignedbigInteger('company_id');
   		    $table->foreign('company_id')->references('id')->on('companies')->onUpdate("cascade");;
    		$table->decimal('price');
    		$table->integer('stock');
    		$table->string('color_name');
    		$table->decimal('weight');
    		$table->string('size');
    		$table->unsignedbigInteger('family_id');
    		$table->foreign('family_id')->references('id')->on('families')->onUpdate("cascade");;
   		    $table->tinyInteger('deleted');
    		$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
