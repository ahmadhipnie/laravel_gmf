<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastInspection extends Model
{
    use HasFactory;

    protected $table = 'last_inspection';
    protected $primaryKey = 'id';

    protected $fillable = [
        'date_of_last_inspection',
        'id_user',
        'id_barang',
        'last_know_condition',
        'functioning_properly',
        'notes_finding',
        'corrective_action_taken',
        'additional_notes',
        'follow_up_action',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}
