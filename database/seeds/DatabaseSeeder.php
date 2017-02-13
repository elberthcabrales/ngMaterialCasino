<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //DB::table('users')->delete();

        $users = array(
            ['name' => 'elberth', 'email' => 'elberthcabrales@gmail.com', 'password' => Hash::make('cabrales')],
                ['name' => 'elberth12x', 'email' => 'elberthcabrales41x@gmail.com', 'password' => Hash::make('cabrales')],
                ['name' => 'elberth11zs', 'email' => 'elberthcabrale4s3x@gmail.com', 'password' => Hash::make('cabrales')],
                ['name' => 'elberth13zs', 'email' => 'elberthcabralesqqx@gmail.com', 'password' => Hash::make('cabrales')],
                ['name' => 'elberth14zs', 'email' => 'elberthcabralesrsx@gmail.com', 'password' => Hash::make('cabrales')],
                ['name' => 'elberth15zs', 'email' => 'elberthcabralesddx@gmail.com', 'password' => Hash::make('cabrales')],
                ['name' => 'elberth16zs', 'email' => 'elberthcabralessfx@gmail.com', 'password' => Hash::make('cabrales')],
                ['name' => 'elberth17zs', 'email' => 'elberthcabralescsx@gmail.com', 'password' => Hash::make('cabrales')],
                ['name' => 'elberth161zs', 'email' => 'elberthcabraleasdsx@gmail.com', 'password' => Hash::make('cabrales')],

        );
            
        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
    }
}
