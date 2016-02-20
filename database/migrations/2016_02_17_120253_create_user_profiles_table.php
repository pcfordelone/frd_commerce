<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adress', 255)->nullable(true);
            $table->string('number', 5)->nullable(true);
            $table->string('neighbourhood')->nullable(true);
            $table->string('uf', 2)->nullable(true);
            $table->string('city', 100)->nullable(true);
            $table->string('cep')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('cellphone')->nullable(true);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('user_profiles');
    }
}
