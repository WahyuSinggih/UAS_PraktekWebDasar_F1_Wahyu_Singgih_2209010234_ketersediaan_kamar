<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $fillable = ['nomor_kamar', 'tipe_kamar_id', 'status'];

    public function tipeKamar()
    {
        return $this->belongsTo(TipeKamar::class);
    }

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}