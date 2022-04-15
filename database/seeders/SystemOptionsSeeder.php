<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_options')->insert([
            'key' => 'system-admin-status',
            'value' => 'development', //1. Development, Maintenance, Production
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('system_options')->insert([
            'key' => 'system-student-status',
            'value' => 'development',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('system_options')->insert([
            'key' => 'frontend-register-prospects-status',
            'value' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('system_options')->insert([
            'key' => 'frontend-register-prospects-default-cover',
            'value' => '',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('system_options')->insert([
            'key' => 'frontend-register-prospects-default-main-color',
            'value' => '',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('system_options')->insert([
            'key' => 'frontend-purchase-page-status',
            'value' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('system_options')->insert([
            'key' => 'frontend-purchase-page-default-cover',
            'value' => '',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('system_options')->insert([
            'key' => 'frontend-purchase-page-default-main-color',
            'value' => '',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
