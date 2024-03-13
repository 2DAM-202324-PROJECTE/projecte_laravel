<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xat extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'xat';

    protected $fillable = [
        'nom',
        'descripcio',
        'url',
        'password',
        'foto',
        'tipus',
        'privacitat',
        'idioma',
        'usuari_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'usuari_id');
    }
}
