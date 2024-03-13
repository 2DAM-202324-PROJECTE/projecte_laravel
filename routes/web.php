<?php


use App\Livewire\Categories\CreateorupdateCategories;
use App\Livewire\Categories\Index;
use App\Livewire\Medias\Createorupdatemedias;
use App\Livewire\Medias\IndexMedias;
use App\Livewire\Xats\Createorupdatexat;
use App\Livewire\Xats\IndexXat;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/categories', Index::class)->name('categories');

Route::get('/categories/create', CreateorupdateCategories::class)->name('categories.create');
Route::get('/categories/update/{id}', CreateorupdateCategories::class)->name('categories.update');


Route::get('/medias', IndexMedias::class)->name('medias');
Route::get('/medias/create', Createorupdatemedias::class)->name('medias.create');
Route::get('/medias/update/{id}', Createorupdatemedias::class)->name('medias.update');



Route::get('/xats', IndexXat::class)->name('xats');
Route::get('/xats/create', Createorupdatexat::class)->name('xats.create');
Route::get('/xats/update/{id}', Createorupdatexat::class)->name('xats.update');

