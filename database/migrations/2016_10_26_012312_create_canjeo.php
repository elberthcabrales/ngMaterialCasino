<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanjeo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canjeos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->enum('movi', ['venta', 'devolucion'])->default('venta');
           /*$table->float('importe', 8, 2);
           
            $table->float('credito', 8, 2); */
             $table->boolean('a_credito');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');//->onDelete('cascade')->onUpdate('cascade');

            $table->integer('jugador_id')->unsigned();
            $table->foreign('jugador_id')->references('id')->on('jugadores');//->onDelete('cascade')->onUpdate('cascade');
           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('canjeo');
    }
}
