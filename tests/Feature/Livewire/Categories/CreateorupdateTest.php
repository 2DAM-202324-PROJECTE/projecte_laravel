<?php

namespace Tests\Feature\Livewire\Categories;

use App\Livewire\Categories\Createorupdate;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateorupdateTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Createorupdate::class)
            ->assertStatus(200);
    }
    /** @test */
    public function component_exists_on_the_page_for_creation()
    {
        $this->get('/categories/create')
            ->assertSeeLivewire(Createorupdate::class);
    }
    /** @test */
    public function component_exists_on_the_page_for_edition()
    {
        $categories = Category::factory()->count(2)->create();
        $this->get('/categories/update/'.$categories->first()->id
        )
            ->assertSeeLivewire(Createorupdate::class);
    }
    /** @test */
    public function show_empty_form_for_creation()
    {
        Livewire::test(Createorupdate::class)
            ->assertViewHas('name', '');
    }
    /** @test */
    public function show_name_for_update()
    {
        $category = Category::factory()->create();
        Livewire::test(Createorupdate::class, ['id' => $category->id])
            ->assertViewHas('name', $category->name);
    }
    /** @test */
    public function save_new_category()
    {
        $newName = fake()->name();
        Livewire::test(Createorupdate::class)
            ->set('name' , $newName)
            ->call('save')
            ->assertRedirect('/categories');
        $this->assertCount(1,Category::where('name',$newName)->get());
    }
    /** @test */
    public function update_category()
    {
        $newName = fake()->name();
        $category = Category::factory()->create();
        Livewire::test(Createorupdate::class, ['id' => $category->id])
            ->set('name' , $newName)
            ->call('update')
            ->assertRedirect('/categories');
        $categoryUpdated = Category::find($category->id);
        $this->assertEquals($newName, $categoryUpdated->name);
    }
    /** @test */
    public function show_form_for_non_existing_category()
    {
        $this->assertEquals(0,Category::count());
        Livewire::test(Createorupdate::class, ['id' => 1])
            ->assertSee('Can not find the category to be updated.');
    }
    /** @test */
    public function update_non_existing_category()
    {
        $this->expectException(ModelNotFoundException::class);
        $newName = fake()->name();
        $category = Category::factory()->create();
        $test = Livewire::test(Createorupdate::class, ['id' => $category->id])
            ->set('name' , $newName);
        $category->delete();
        $this->assertEquals(0,Category::count());
        $test->call('update');
    }
}
