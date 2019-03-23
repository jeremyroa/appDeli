<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cliente::class)->create([
            'dni' => '26371828',
            'name' => 'Jeremy',
            'email' => 'jmra0611@gmail.com',
            'password' => bcrypt('123')
        ]);
        factory(Cliente::class,10)->create();    
    }
}
