<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_row')->unsigned(); // Ref a tabla desconocida
            $table->integer('answer_number')->unsigned(); // Ref a tabla desconocida
            // Campo del descriptor de campos al cual responde
            $table->integer('field_descriptor_id')->unsigned();
            $table->foreign('field_descriptor_id')->references('id')->on('field_descriptors');
            // Usuario que respondio el
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
        Schema::drop('form_answers');
    }
}