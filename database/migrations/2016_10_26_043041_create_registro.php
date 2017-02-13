<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro', function (Blueprint $table) {
            
            $table->increments('id');
            $table->timestamps();
            $table->string('concepto');
            $table->float('valor',8,2);
            //el insert de eloquent buscara hacerlo en user_id y no en users_id
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');//->onDelete('cascade')->onUpdate('cascade');

            $table->string('nota');

            $table->enum('Registro', ['Gasto', 'Ganancia'])->default('Gasto');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('registro');
    }
}
