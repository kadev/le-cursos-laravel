<?php

namespace Database\Seeders;

use DB;
use Hash;
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
            'name' => 'Darwin Cruz',
            'email' => 'darwincruz01@gmail.com',
            'password' => Hash::make('123456'),
            'title' => 'Desarrollador web',
            'birthday' => '1994-09-01',
            'country' => 'México',
            'address' => 'Cancún, Quintana Roo',
            'phone' => '9838097728',
            'role_id' => '1',
            'enabled' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Rodolfo Cruz',
            'email' => 'cruzcaceres@hotmail.com',
            'password' => Hash::make('123456'),
            'title' => 'Docente',
            'birthday' => '1970-02-22',
            'country' => 'México',
            'address' => 'Cancún, Quintana Roo',
            'phone' => '9988457738',
            'role_id' => '1',
            'enabled' => '0'
        ]);
    }
}
