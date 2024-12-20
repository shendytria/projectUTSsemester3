<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUser extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'jenis_user';

    // Primary key dari tabel
    protected $primaryKey = 'ID_JENIS_USER';

    // Agar Laravel tidak menganggap primary key sebagai auto-increment integer
    public $incrementing = false;

    // Jika primary key bukan tipe integer, melainkan string
    protected $keyType = 'string';

    // Jika tabel tidak memiliki kolom timestamps (created_at, updated_at)
    public $timestamps = false;

    // Kolom-kolom yang bisa diisi
    protected $fillable = [
        'jenis_user',
        'JENIS_USER',
        'CREATE_BY',
        'CREATE_DATE',
        'UPDATE_BY',
        'UPDATE_DATE',
    ];

    // Relasi ke model User
    public function users()
    {
        return $this->hasMany(User::class, 'ID_JENIS_USER', 'ID_JENIS_USER');
    }
}
