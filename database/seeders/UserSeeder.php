<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data admin
        DB::table('users')->insert([
            'nip' => '1234567890',
            'name' => 'Admin User',
            'password' => FacadesHash::make('adminpassword'), // Ganti dengan password yang sesuai
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Menambahkan data inspector
        DB::table('users')->insert([
            'nip' => '0987654321',
            'name' => 'Inspector User',
            'password' => FacadesHash::make('inspectorpassword'), // Ganti dengan password yang sesuai
            'role' => 'inspector',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
