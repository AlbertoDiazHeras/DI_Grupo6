<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('cif');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('del_term_id');
            $table->foreign('del_term_id')->references('id')->on('delivery_terms')->onUpdate("cascade");
            $table->unsignedBigInteger('transport_id');
            $table->foreign('transport_id')->references('id')->on('transports')->onUpdate("cascade");
            $table->unsignedBigInteger('payment_term_id');
            $table->foreign('payment_term_id')->references('id')->on('payment_terms')->onUpdate("cascade");
            $table->unsignedBigInteger('bank_entity_id');
            $table->foreign('bank_entity_id')->references('id')->on('bank_entities')->onUpdate("cascade");
            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id')->references('id')->on('discounts')->onUpdate("cascade");
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
        Schema::dropIfExists('companies');
    }
}
