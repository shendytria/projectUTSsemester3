<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jenis_user';
    protected $table = 'jenis_user';

    protected $fillable = [
        'id_jenis_user',
        'nama_jenis_user'
    ];
}
