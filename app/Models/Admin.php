<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin'; // nama tabel sesuai dengan database

    protected $primaryKey = 'id'; // kolom primary key

    public $timestamps = true; // jika pakai created_at dan updated_at

    protected $fillable = [
        'username_admin',
        'password_admin',
        'created_at',
        'updated_at',
    ];
}
