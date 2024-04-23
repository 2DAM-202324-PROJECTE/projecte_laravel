<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'sender_id',
        'xatinteractiu_id',
    ];

//    protected $dates = ['read_at','receiver_deleted_at','sender_deleted_at',];

    /** relacion con el usuario que envia el mensaje */

//    public function conversation()
//    {
//        return $this->belongsTo(Conversation::class);
//    }

//    public function isRead(): bool
//    {
//        return $this->read_at !== null;
//    }


    public function sender()

    {
        return $this->belongsTo(User::class, 'sender_id');
    }



    public function xatinteractiu()
    {
        return $this->belongsTo(Xatinteractiu::class);
    }




}
