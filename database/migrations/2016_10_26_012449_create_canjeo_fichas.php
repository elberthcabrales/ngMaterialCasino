<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanjeoFichas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canjeo_ficha', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();


           
            $table->integer('canjeo_id')->unsigned();
            $table->foreign('canjeo_id')->references('id')->on('canjeos');//->onDelete('cascade')->onUpdate('cascade');


            $table->integer('ficha_id')->unsigned();
            $table->foreign('ficha_id')->references('id')->on('fichas');//->onDelete('cascade')->onUpdate('cascade');
           
            $table->integer('cantidad_ficha');
            $table->float('valor_actual', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('canjeo_fichas');
    }
}
