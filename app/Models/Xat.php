<?php

namespace App\Models;



use App\Livewire\Users\Users;

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
        'media_id',
        'creador_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_xat', 'xat_id', 'user_id');
    }

    public function creador()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
