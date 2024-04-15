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

        for ($i = 1; $i <= 40; $i++) {
            Media::create([
                'name' => "Test Media $i",
                'description' => "This is a test media $i.",
                'path' => "test_media_$i.mp4",
                'category_id' => $categoryId,
                'image_uri' => "hhh.jpg",
                'thumbnail_uri' => "hhh.jpg",
                'duration' => 60 * $i, // Duration increases by 60 seconds for each media
            ]);
        }
        for ($i = 1; $i <= 20; $i++) {
            Media::create([
                'name' => "Test $i",
                'description' => "This is a test media $i.",
                'path' => "test_media_$i.mp4",
                'category_id' => 2,
                'image_uri' => "aaa.jpg",
                'thumbnail_uri' => "aaa.jpg",
                'duration' => 60 * $i, // Duration increases by 60 seconds for each media
            ]);
        }
    }
}
