<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryNoteLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_note_lines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('delivery_note_id');
            $table->foreign('delivery_note_id')->references('id')->on('delivery_notes')->onUpdate("cascade");
            $table->string('delivery_note_line_num');
            $table->unsignedbigInteger('order_line_id');
            $table->foreign('order_line_id')->references('id')->on('order_lines')->onUpdate("cascade");
            $table->date('issue_date');
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
        Schema::dropIfExists('delivery_note_lines');
    }
}
