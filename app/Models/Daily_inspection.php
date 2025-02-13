<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily_inspection extends Model
{
    use HasFactory;

    protected $table = 'daily_inspection';
    protected $primaryKey = 'id';
    // public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }



}
