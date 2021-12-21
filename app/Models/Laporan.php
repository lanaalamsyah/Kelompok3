<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    public function user()
    {
        return $this->hasMany('App\Models\user', 'user_id', 'id');
    }
    public function laporan()
    {
        return $this->hasMany('App\Models\PesananDetail', 'pesanan_id', 'id');
    }
}
