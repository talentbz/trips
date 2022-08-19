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
        DB::table('client_types')->insert([
            [
                'type_name_en'         => 'Factory',
                'type_name_ar'         => "مصنع",     
                'status'               => 1,
            ],
            [
                'type_name_en'         => 'Organization',
                'type_name_ar'         => "منظمة",     
                'status'               => 1,   
            ],
            [
                'type_name_en'         => 'Individuals',
                'type_name_ar'         => "فرادى",     
                'status'               => 1,   
            ],
            [
                'type_name_en'         => 'Other',
                'type_name_ar'         => "آخر",     
                'status'               => 1,   
            ]
        ]);
        DB::table('contract_types')->insert([
            [
                'type_name_en'         => 'Short Term',
                'type_name_ar'         => "المدى القصير",     
                'status'               => 1,
            ],
            [
                'type_name_en'         => 'Long Term',
                'type_name_ar'         => "طويل الأمد",     
                'status'               => 1,   
            ]
        ]);
        DB::table('cities')->insert([
            [
                'city_name_en'         => 'Irbid',
                'city_name_ar'         => "اربد",     
                'status'               => 1,
            ],
            [
                'city_name_en'         => 'Amman',
                'city_name_ar'         => "عمان",     
                'status'               => 1,   
            ]
        ]);
        DB::table('areas')->insert([
            [
                'area_name_en'         => 'Al Salam',
                'area_name_ar'         => "السلام",     
                'city_id'              => 1,
                'location_latitude'    => '31.917236',
                'location_longitude'   => '35.948906',
                'status'               => 1,
            ],
            [
                'area_name_en'         => 'Hafedh Ibrahim',
                'area_name_ar'         => "حافظ ابراهيم",     
                'city_id'              => 1,
                'location_latitude'    => '31.917236',
                'location_longitude'   => '35.948906',
                'status'               => 1,   
            ],
            [
                'area_name_en'         => 'Maadi',
                'area_name_ar'         => "المعادى",     
                'city_id'              => 2,
                'location_latitude'    => '31.917236',
                'location_longitude'   => '35.948906',
                'status'               => 1,   
            ],
            [
                'area_name_en'         => 'Qweismeh',
                'area_name_ar'         => "المعادى",     
                'city_id'              => 2,
                'location_latitude'    => '31.917236',
                'location_longitude'   => '35.948906',
                'status'               => 1,   
            ]
        ]);
        DB::table('clients')->insert([
            'name_en'             => 'Bibas Foam',
            'name_ar'             => 'Bibas Foam',     
            'client_type_id'      => '1',       
            'contract_type_id'    => '1',       
            'address'             => '',       
            'phone_number'        => '123456789',       
            'email'               => "client1@gmail.com",       
            'website'             => 'www.website.com',       
            'fax'                 => '12345',     
            'contract_start_date' => '2021-07-08',     
            'contract_end_date'   => '2021-07-10',     
            'liaison_name'        => 'Bibas Foam',     
            'liaison_phone'       => '123456789', 
            'record_number'       => '12345678', 
            'status'              => 1,                
        ]);
        DB::table('drivers')->insert([
            'name_en'             => 'Sufian Abu Laban',
            'name_ar'             => 'Sufian Abu Laban',     
            'age'                 => 30,       
            'phone'               => '123456789',       
            'license_number'      => '111-2222',       
            'address'             => 'address1',       
            'password'            => "123456",       
            'user_name'           => 'user1',       
            'license_expiry_date' => '2021-07-08',     
            'status'              => 1,            
        ]);
    }
}
