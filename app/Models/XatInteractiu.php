<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XatInteractiu extends Model
{
    use HasFactory;

    protected $fillable = [
//        'xat_id',
//        'nom',
//        'creador',
//        'url',
//        'receiver_id',
//        'sender_id',
    ];

    public static function firstOrCreate(array $array)
    {
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function xat()
    {
        return $this->hasOne(Xat::class);
    }

}
