<?php

use Illuminate\Database\Seeder;
use App\Jugador;
use Illuminate\Database\Eloquent\Model;

class JugadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('jugadores')->delete();

        $jugadores = array(
                ['apodo' => 'jose', 'celular' => '323120393932'],
                ['apodo' => 'generico', 'celular' => 'no aplica'],
        );
            
        
        foreach ($jugadores as $jugador)
        {
            Jugador::create($jugador);
        }

        Model::reguard();
    }
}
