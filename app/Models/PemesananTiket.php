<?php

namespace App\Models;

use App\Models\Tiket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemesananTiket extends Model
{
    use HasFactory;

    protected $table = 'pemesanan_tiket';
    protected $fillable = [
        'id',
        'tiket_id',
        'kode_tiket',
        'nama',
        'status',
        'waktu_check_in'
    ];

    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'tiket_id');
    }
}
