<?php

namespace App\Models;

use App\Models\PemesananTiket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';
    protected $fillable = [
        'id',
        'nama_event',
        'waktu_mulai_event',
        'lokasi_event',
        'bintang_tamu'
    ];
    protected $dates = [
        'waktu_mulai_event'
    ];

    public function PemesananTiket()
    {
        return $this->hasMany(PemesananTiket::class);
    }
    
}
