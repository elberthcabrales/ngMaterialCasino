<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //aplicarle un soft delete o un activo boolean
        Schema::create('fichas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('color');
            $table->float('valor', 8, 2);
            $table->integer('stock');
            $table->integer('en_uso');
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
        Schema::drop('fichas');
    }
}
