<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class validasi_pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
