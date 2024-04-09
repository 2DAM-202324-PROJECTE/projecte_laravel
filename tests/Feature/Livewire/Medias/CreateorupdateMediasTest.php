<?php

namespace Tests\Feature\Livewire\Medias;

use App\Livewire\Medias\Createorupdatemedias;
use App\Models\Media;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Livewire;
use Tests\TestCase;

class CreateorupdateMediasTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(CreateorupdateMedias::class)
            ->assertStatus(200);
    }

    /** @test */
    public function component_exists_on_the_page_for_creation()
    {
        $this->get('/medias/create')
            ->assertSeeLivewire(CreateorupdateMedias::class);
    }

    /** @test */
    public function component_exists_on_the_page_for_edition()
    {
        $medias = Media::factory()->count(5)->create();
        $this->get('/medias/update/'.$medias->first()->id)
            ->assertSeeLivewire(CreateorupdateMedias::class);
    }

    /** @test */
    public function show_empty_form_for_creation()
    {
        Livewire::test(Createorupdatemedias::class)
            ->assertViewHas('name', '');
    }

    /** @test */
    public function show_name_for_update()
    {
        $media = Media::factory()->create();

        Livewire::test(Createorupdatemedias::class, ['id' => $media->id])
            ->assertViewHas('name', $media->name);
    }

    /** @test */
    public function save_new_media()
    {
        $newName = fake()->name();
        Livewire::test(Createorupdatemedias::class)
            ->set('name', $newName)
            ->call('save')
            ->assertRedirect('/medias');

        $this->assertCount(6,Media::where('name', $newName)->get());
    }

    /** @test */
    public function update_media()
    {
        $newName = fake()->name();
        $newDescription = fake()->sentence();
        $newPath = fake()->url();
        $media = Media::factory()->create();
        Livewire::test(Createorupdatemedias::class, ['id' => $media->id])
            ->set('name', $newName)
            ->set('description', $newDescription)
            ->set('path', $newPath)
            ->call('update')
            ->assertRedirect('/medias');
        $mediaUpdated = Media::find($media->id);
        $this->assertEquals($newName, $mediaUpdated->name);
        $this->assertEquals($newDescription ,$mediaUpdated->description);
        $this->assertEquals($newPath, $mediaUpdated->path);
    }

    /** @test */
    public function show_form_for_non_existing_media()
    {
        $this->assertEquals(5,Media::count());
        Livewire::test(Createorupdatemedias::class, ['id' => 6])
            ->assertSee('Can not find the media to be updated');
    }

    /** @test */
    public function update_non_existing_media()
    {
        $this->expectException(ModelNotFoundException::class);
        $newName = fake()->name();
        $media = Media::factory()->create();
        $test = Livewire::test(Createorupdatemedias::class, ['id' => $media->id])
            ->set('name', $newName);
        $media->delete();
        $this->assertEquals(5,Media::count());
        $test->call('update');
    }

    /** @test */
    public function save_new_media_with_validation_error()
    {
        Livewire::test(Createorupdatemedias::class)
            ->set('name', '')
            ->set('description', '')
            ->set('path', '')
            ->call('save')
            ->assertHasErrors(['name', 'description', 'path']);
    }

    /** @test */
    public function update_media_with_empty_name()
    {
        $media = Media::factory()->create();
        Livewire::test(Createorupdatemedias::class, ['id' => $media->id])
            ->set('name', '')
            ->set('description', '')
            ->set('path', '')
            ->call('update')
            ->assertHasErrors(['name', 'description', 'path']);
    }

}
