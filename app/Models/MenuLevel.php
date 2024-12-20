<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLevel extends Model
{
    use HasFactory;

    protected $fillable = ['level'];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_level');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_jenis_user');
    }
}

