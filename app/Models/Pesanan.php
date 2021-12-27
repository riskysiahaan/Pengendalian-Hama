<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // public $table = 'pesanans';

    protected $fillable = [
        'nama_pemesan', 'panjang', 'lebar', 'alamat',
        'tanggal_pengerjaan', 'no_telp', 'email',
        'status', 'harga'
    ];

    public function jenis_penanganans()
    {
        return $this->belongsTo(JenisPenanganan::class,'id_penanganan','id');
    }

    public function jenis_tempats()
    {
        return $this->belongsTo(JenisTempat::class,'id_jenis_tempat','id');
    }
}
