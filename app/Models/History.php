<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_history';
    protected $table = 'history';
    public $timestamps = false;
    protected $fillable = [
        'query',
        'user_id',
        'tanggal',
    ];
}
