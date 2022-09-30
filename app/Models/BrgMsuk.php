<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrgMsuk extends Model
{
    use HasFactory;

    protected $table = 'brg_msk';

    protected $fillable = [
        'no_brg_msk',
        'id_barang',
        'id_user',
        'tgl_brg_msk',
        'jml_brg_msk',
        'total',
        'created_at',
        'updated_at',
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
