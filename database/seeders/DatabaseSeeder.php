<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('123456'),                
            'role'     => 1,
        ]);

        DB::table('bus_types')->insert([
            'type_en'   => 'Hyundai',
            'type_ar'   => 'هيونداي',
            'status'    => 1,                
        ]);
        DB::table('bus_models')->insert([
            'bus_type_id' => 1,
            'model_en'    => 'Elantra',
            'model_ar'    => 'النترا',
            'status'      => 1,                
        ]);
        DB::table('bus_sizes')->insert([
            'size'     => 10,
            'status'   => 1,                
        ]);
        DB::table('bus_maintenance_types')->insert([
            'type_en'   => 'Periodical',
            'type_ar'   => 'النترا',     
            'status'    => 1,                
        ]);
        DB::table('buses')->insert([
            'bus_no'               => '131245-14',
            'bus_size_id'          => 1,     
            'license_no'           => '131245-20',       
            'license_expiry_date'  => '2012-12-15',       
            'bus_type_id'          => 1,       
            'bus_model_id'         => 1,       
            'model_year'           => "1980",       
            'status'               => 1,       
            'owner_ship'           => 1,                
        ]);
    }
}
