<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categoryId = 1;

            Media::create([
                'name' => 'Test Media 1',
                'description' => 'This is a test media.',
                'path' => 'test_media.mp4',
                'category_id' => $categoryId,
                'image_uri' => 'test_media.jpg',
                'thumbnail_uri' => 'test_media_thumbnail.jpg',
                'duration' => 60,
            ]);

            Media::create([
                'name' => 'Test Media 2',
                'description' => 'This is a test media 2.',
                'path' => 'test_media_2.mp4',
                'category_id' => $categoryId,
                'image_uri' => 'test_media_2.jpg',
                'thumbnail_uri' => 'test_media_2_thumbnail.jpg',
                'duration' => 120,
            ]);

            Media::create([
                'name' => 'Test Media 3',
                'description' => 'This is a test media 3.',
                'path' => 'test_media_3.mp4',
                'category_id' => $categoryId,
                'image_uri' => 'test_media_3.jpg',
                'thumbnail_uri' => 'test_media_3_thumbnail.jpg',
                'duration' => 180,
            ]);

            Media::create([
                'name' => 'Test Media 4',
                'description' => 'This is a test media 4.',
                'path' => 'test_media_4.mp4',
                'category_id' => $categoryId,
                'image_uri' => 'test_media_4.jpg',
                'thumbnail_uri' => 'test_media_4_thumbnail.jpg',
                'duration' => 240,
            ]);

            Media::create([
                'name' => 'Test Media 5',
                'description' => 'This is a test media 5.',
                'path' => 'test_media_5.mp4',
                'category_id' => $categoryId,
                'image_uri' => 'test_media_5.jpg',
                'thumbnail_uri' => 'test_media_5_thumbnail.jpg',
                'duration' => 120,
            ]);

    }
}
