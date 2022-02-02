<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num');
            $table->date('issue_date');
            $table->unsignedbigInteger('origin_company_id');
            $table->foreign('origin_company_id')->references('id')->on('companies')->onUpdate("cascade")->onDelete("cascade");
            $table->unsignedbigInteger('target_company_id');
            $table->foreign('target_company_id')->references('id')->on('companies')->onUpdate("cascade")->onDelete("cascade");
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
        Schema::dropIfExists('orders');
    }
}
