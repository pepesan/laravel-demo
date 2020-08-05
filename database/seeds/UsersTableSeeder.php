<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'pepesan27',
            'email' => 'pepesan@cursosdedesarrollo.com',
            'password' => Hash::make('1234')
        ]);
    }
}
