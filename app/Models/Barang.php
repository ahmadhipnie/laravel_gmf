<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_barang',
        'work_order_number',
        'owner',
        'model',
        'serial_number',
        'register_no',
        'last_inspection_date',
        'release_inspection_date',
        'next_inspection_date',
        'deskripsi',
        'panjang',
        'lebar',
        'tinggi',
        'location',
        'img_url',
        'cleaning',
        'lubricant',
        'adjustment',
        'part_replacement',
        'recheck',
        'calibration',
        'modification',
        'repair',
        'qr_code',

        'created_at',
        'updated_at',
    ];


}
