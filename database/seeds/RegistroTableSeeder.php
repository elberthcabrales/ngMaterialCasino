<?php

use Illuminate\Database\Seeder;
use App\Registro;
use Illuminate\Database\Eloquent\Model;
use App\User;

class RegistroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

       // DB::table('registro')->delete();
        $user = User::find(1);
        $registro = new Registro;
        $registro->concepto="prueba xxxx";
        $registro->valor=100;
        $registro->nota="registro de prueba";
        $registro->Registro="Ganancia";
        $registro->user()->associate($user);
        $registro->save();
      

        Model::reguard();
    }
}
