<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';

    protected $fillable = [
        'name',
        'description',
        'path',
        'category_id',
        'image_uri',
        'thumbnail_uri',
        'duration',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function xats()
    {
        return $this->hasMany(Xat::class);
    }


}
