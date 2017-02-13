<?php

use Illuminate\Database\Seeder;
use App\Ficha;
use Illuminate\Database\Eloquent\Model;

class FichaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	  Model::unguard();
        DB::table('fichas')->delete();


        $fichas = array(
                ['color' => 'azul', 'valor' => 20,'stock' => 2000, 'en_uso'=>0 ],
                 ['color' => 'rojo', 'valor' => 50,'stock' => 2000, 'en_uso'=>0 ],
                 ['color' => 'verde', 'valor' => 100,'stock' => 2000, 'en_uso'=>0 ],
                 ['color' => 'negro', 'valor' => 200,'stock' => 2000, 'en_uso'=>0 ],
        );

        foreach($fichas as $ficha)
        {
        	Ficha::create($ficha);
        }
          Model::unguard();
    }
}
