<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'message';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'sender',
        'message_text',
        'subject',
        'message_description',
        'messege_status',
        'create_by',
        'create_date',
        'delete_mark',
        'update_by',
        'no_mk'
    ];
    public function messageTo()
    {
        return $this->hasMany(MessageTo::class, 'message_id', 'message_id');
    }

    public function recipients()
    {
        return $this->hasMany(MessageTo::class, 'id_message');
    }

    // Relationship to MessageKategori
    public function category()
    {
        return $this->belongsTo(MessageCategory::class, 'no_mk');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id', 'username'); // Assuming 'sender' contains 'username'
        // If 'sender' contains 'user_id', change to 'user_id'
    }
}
