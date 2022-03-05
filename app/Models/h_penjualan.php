<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class h_penjualan extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = [
        'nomor_resep', 'tanggal', 'no_rm_pasien','no_registrasi_pasien','jenis_pasien','total'
    ];
}
