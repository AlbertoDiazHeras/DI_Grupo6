<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('secondname');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate("cascade")->default(1);
            $table->string('type')->nullable();
            $table->string('code')->nullable(); // confirmation_code
            $table->tinyInteger('email_confirmed')->default(0);
            $table->tinyInteger('actived')->default(0);
            $table->tinyInteger('iscontact');
            $table->tinyInteger('deleted');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
