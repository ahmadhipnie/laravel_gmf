<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LastInspectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('last_inspection')->insert([
                'date_of_last_inspection' => Carbon::now()->subDays(rand(1, 30))->toDateString(), // Tanggal inspeksi acak dalam 30 hari terakhir
                'id_user' => 2, // id_user yang tetap 2
                'id_barang' => $i, // id_barang antara 1 hingga 10
                'last_know_condition' => rand(0, 1) ? 'good' : 'damage', // kondisi barang, acak antara good atau damage
                'functioning_properly' => rand(0, 1) ? 'yes' : 'no', // apakah berfungsi dengan baik
                'notes_finding' => 'Finding notes for item ' . $i, // Catatan temuan
                'corrective_action_taken' => rand(0, 1) ? 'Corrective action taken' : null, // Tindakan korektif, kadang ada, kadang tidak
                'additional_notes' => 'Additional notes for item ' . $i, // Catatan tambahan
                'follow_up_action' => $this->getFollowUpAction(), // Action tindak lanjut
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Menentukan tindakan tindak lanjut secara acak.
     *
     * @return string
     */
    private function getFollowUpAction()
    {
        $actions = ['none', 'further repair', 'replacement', 're-inspection required'];
        return $actions[array_rand($actions)];
    }
}
