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
        //\App\User::truncate();
        \App\User::create([
            'name' => 'Super Admin',
            'username' => 'super',
            'password' => bcrypt('123456'),
            'status' => config('constants.STATUS.ACTIVE'),
            'type' => 'Interno'
        ]);

        \App\User::create([
            'name' => 'Percy Alvarez',
            'username' => 'percy.alvarez',
            'password' => bcrypt('123456'),
            'status' => config('constants.STATUS.ACTIVE'),
            'type' => 'Interno'
        ]);

        \App\User::create([
            'name' => 'JORGE ENRIQUE VARGAS SOSSA',
            'username' => 'jorge.vargas',
            'password' => bcrypt('123456'),
            'status' => config('constants.STATUS.ACTIVE'),
            'type' => 'Interno'
        ]);

    }
}
