<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'dni' => '26371828',
            'name' => 'Jeremy',
            'password' => bcrypt('123')
        ]);
        factory(User::class,10)->create();
    }
}
