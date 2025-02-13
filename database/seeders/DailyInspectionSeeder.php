<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DailyInspectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('daily_inspection')->insert([
                'date' => Carbon::now()->subDays(rand(1, 30))->toDateString(), // Tanggal acak dalam 30 hari terakhir
                'id_user' => 2, // id_user yang tetap 2
                'id_barang' => $i, // id_barang antara 1 hingga 10
                'physical_condition' => rand(0, 1) ? 'good' : 'damage', // kondisi fisik barang, acak antara good atau damage
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
        $actions = ['none', 'repair', 'replacement', 'further inspection'];
        return $actions[array_rand($actions)];
    }
}
