<?php

use Illuminate\Database\Seeder;
use App\Comida;

class ComidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comida::class,10)->create();
    }
}
