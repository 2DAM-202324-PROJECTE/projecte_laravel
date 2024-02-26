<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'path',
        'category_id',
        'image_uri',
        'thumbnail_uri',
        'duration',
    ];

    public function Media()
    {
        return $this->belongsTo(Media::class);
    }
}
