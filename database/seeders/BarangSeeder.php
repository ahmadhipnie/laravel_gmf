<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('barang')->insert([
                'kode_barang' => 'BRG' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'work_order_number' => 'WO' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'owner' => 'Owner ' . $i,
                'model' => 'Model ' . $i,
                'serial_number' => 'SN' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'register_no' => 'REG' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'last_inspection_date' => Carbon::now()->subDays(rand(1, 365)),
                'release_inspection_date' => Carbon::now()->subDays(rand(1, 365)),
                'next_inspection_date' => Carbon::now()->addDays(rand(30, 365)),
                'deskripsi' => 'Barang ' . $i,
                'panjang' => rand(100, 200),
                'lebar' => rand(50, 100),
                'tinggi' => rand(30, 70),
                'location' => 'Location ' . $i,
                'img_url' => 'img_barang_' . $i . '.jpg',
                'cleaning' => (bool) rand(0, 1),
                'lubricant' => (bool) rand(0, 1),
                'adjustment' => (bool) rand(0, 1),
                'part_replacement' => (bool) rand(0, 1),
                'recheck' => (bool) rand(0, 1),
                'calibration' => (bool) rand(0, 1),
                'modification' => (bool) rand(0, 1),
                'repair' => (bool) rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
