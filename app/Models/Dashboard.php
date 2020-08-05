<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'dashboard';
    protected $fillable = ['nama','gambar','fasilitas','deskripsi','harga'];
}
