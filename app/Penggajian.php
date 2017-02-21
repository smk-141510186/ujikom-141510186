<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    //
    protected $table='penggajians';
    protected $fillable=['tunjangan_pegawai_id','jumlah_jam_lembur','jumlah_uang_lembur','total_gaji','tanggal_pembelian','petugas_penerima'];

    public function TunjanganPegawai()
    {
    	return $this->belongsTO('App\TunjanganPegawai','tunjangan_pegawai_id');
    }
}
