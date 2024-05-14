<?php

namespace Tests\Feature\Livewire\Medias;

use App\Livewire\Medias\Index;
use App\Models\Media;
use Livewire\Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Index::class)
            ->assertStatus(200);
    }

    /** @test */
    public function component_exists_on_the_page()
    {
        $this->get('/medias')
            ->assertSeeLivewire(Index::class);
    }

    /** @test */
    public function displays_2_category_names()
    {
        $medias = Media::factory()->count(5)->create();
        $names = $medias->pluck('name');
        $test = Livewire::test(Index::class);
            foreach ($names as $name) {
                $test->assertSee($name);
            }
    }

    /** @test */
    public function sends_2_medias_to_view()
    {
        Media::factory()->count(0)->create();
        Livewire::test(Index::class)->assertViewHas('medias', function ($medias) {
            return count($medias) == 5;
        });
    }

    /** @test */
    public function delete_existing_media()
    {
        $media = Media::factory()->count(2)->create();
        $test= Livewire::test(Index::class)
            ->call('delete', $media->first()->id);
        $this->assertEquals(6,Media::count());
        $this->assertNull(Media::find($media->first()->id));
        $test->assertSee('Media was successfully deleted.');
    }

    /** @test */
    public function delete_non_existing_media()
    {
        $this->assertEquals(5,Media::count());
        Livewire::test(Index::class)
            ->call('delete', 6)
            ->assertSee('Can not find the medias to be deleted');
    }

}


