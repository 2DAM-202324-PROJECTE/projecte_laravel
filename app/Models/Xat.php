<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xat extends Model
{
    use HasFactory;
    protected $guarded = [];
    //protected $fillable = ['title', 'description'];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function missatges()
    {
        return $this->belongsTo(Message::class);
    }
}
