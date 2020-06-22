<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Difusor con seed',
            'email' => 'd@d.com',
            'password' => bcrypt('pasopaso'),
            'rol' => 'dif',
        ]);
        DB::table('users')->insert([
            'name' => 'Autor con seed',
            'email' => 'a@a.com',
            'password' => bcrypt('pasopaso'),
            'rol' => 'aut',
        ]);
    }
}
