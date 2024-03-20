<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryId = 1;

        for ($i = 1; $i <= 20; $i++) {
            Media::create([
                'name' => "Test Media $i",
                'description' => "This is a test media $i.",
                'path' => "test_media_$i.mp4",
                'category_id' => $categoryId,
                'image_uri' => "test_media_$i.jpg",
                'thumbnail_uri' => "test_media_${i}_thumbnail.jpg",
                'duration' => 60 * $i, // Duration increases by 60 seconds for each media
            ]);
        }
    }
}
