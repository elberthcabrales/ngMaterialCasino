<?php

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('p_apellido');
            $table->string('s_apellido');
            $table->enum('Rol', ['Cajero', 'Encargado'])->default('Cajero');
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); //necesario para softdelete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
