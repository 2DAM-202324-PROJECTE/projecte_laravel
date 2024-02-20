<?php

namespace Tests\Feature\Livewire\Categories;
use App\Livewire\Categories\Index;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $this->get('/categories')
            ->assertSeeLivewire('Index:class');
    }
    /** @test */
    public function displays_2_category_names()
    {
        $categories = Category::factory()->count(2)->create();
        $names = $categories->pluck('name');
        $test = Livewire::test(Index::class);
        foreach ($names as $name) {
            $test->assertSee($name);
        }
    }
    /** @test */
    public function sends_2_categories_to_view()
    {
        Category::factory()->count(2)->create();
        Livewire::test(Index::class)->assertViewHas('categories', function
        ($categories) {
            return count($categories) == 2;
        });
    }
}
