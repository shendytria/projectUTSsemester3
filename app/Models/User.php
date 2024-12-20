<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'user_id';
    protected $fillable = ['nama_user', 'username', 'email', 'password', 'id_jenis_user'];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'setting_menu_user', 'user_id', 'menu_id');
    }

    public function menuLevel()
    {
        return $this->belongsTo(MenuLevel::class, 'id_jenis_user');
    }

    public function receivedMessages()
    {
        return $this->hasManyThrough(
            Message::class,         // The final related model
            MessageTo::class,       // The intermediate model
            'to',                   // Foreign key on MessageTo table (the recipient)
            'id',                   // Foreign key on Message table
            'username',             // Local key on User table (assuming the 'to' field is username)
            'id_message'            // Local key on MessageTo table
        );
    }
}
