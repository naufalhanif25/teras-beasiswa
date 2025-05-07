<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoBeasiswa extends Model
{
    protected $table = 'info_beasiswa';
    protected $primaryKey = 'id_beasiswa';
    public $timestamps = false;
    
    protected $fillable = [
        'nama_beasiswa',
        'deskripsi',
        'tanggal_buka',
        'tanggal_tutup',
        'cover',
        'kategori',
        'url_sumber',
        'url_panduan'
    ];
}