<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function pesanana_details()
    {
        return $this->hasMany('App\Models\PesananDetail', 'barang_id', 'id');
    }
}