<?php

use Illuminate\Database\Seeder;
use App\Jugador;
use App\Canjeo;
use App\Ficha;
use App\User;

class CanjeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jugador = new Jugador;
        $jugador_generico = $jugador->where('apodo','generico')->firstOrFail();

        $ficha = new Ficha;
        $ficha_azul = $ficha->where('color','azul')->firstOrFail();
        $ficha_roja = $ficha->where('color','rojo')->firstOrFail();

        $canjeo = new Canjeo;
        //$canjeo = $canjeo->firstOrFail();
        $canjeo->movi='venta';
        $canjeo->a_credito=false;
        //$canjeo->credito=0;
        //$canjeo->en_uso=0;
        $user= new User;
        $canjeo->user()->associate($user->firstOrFail());
        $canjeo->jugador()->associate($jugador_generico);
        $canjeo->save();

        //el error me lo daba con user_id porque no tenia tal
       /* $canjeo->fichas()->attach($ficha_azul->id,['cantidad_ficha'=>10,'valor_actual'=> $ficha_azul->valor,'user_id'=>1]);
        esta funcion de atache hace un inserte directo en la tabla pivote
       */
        //cada que agregue una ficha haremos que esta cantidad de fichas afecte a
        //el atributo en en_uso y stok... dependiendo del tipo de movimiento
       $data= Array(

         ['ficha_id'=>$ficha_azul->id,'cantidad_ficha'=>10,'valor_actual'=> $ficha_azul->valor]
         ,
         ['ficha_id'=>$ficha_roja->id,'cantidad_ficha'=>40,'valor_actual'=> $ficha_roja->valor]
         );

       $canjeo->fichas()->attach($data);
       $canjeo->save();
        print($canjeo);
    }
}
