<?php


use App\Livewire\Customer\Cataleg;
use App\Livewire\Persona\Persones;
use App\Livewire\SalaXat\Xat;
use App\Livewire\SalaXat\XatInteractiu;
use App\Livewire\Users\User;
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

/////////////////////
Route::middleware(['auth'])->group(function () {
    Route::get('/categories', function(){
        return view('categories.index');
    })->name('categories');

    Route::get('/categories/create', function () {
        return view('categories.createorupdate');
    })-> name ('categories.create') ;

    Route::get('/categories/update/{id}', function ($id) {
        return view('categories.createorupdate')->with([
            'id' => $id,
        ]);
    })-> name ('categories.update') ;
});

///////////////////////////
Route::middleware(['auth'])->group(function () {
    Route::get('/medias', function(){
        return view('medias.index');
    })->name('medias');

    Route::get('/medias/save', function () {
        return view('medias.createorupdatemedias');
    })-> name ('medias.save') ;

    Route::get('/medias/update/{id}', function ($id) {
        return view('medias.createorupdatemedias')->with([
            'id' => $id,
        ]);
    })-> name ('medias.update') ;
});

///////////////////////////
Route::middleware(['auth'])->group(function () {
    Route::get('/xats', IndexXat::class)->name('xats');
    Route::get('/xats/create', Createorupdatexat::class)->name('xats.create');
    Route::get('/xats/update/{id}', Createorupdatexat::class)->name('xats.update');
});

Route::get('/salaxat/xatinteractiu/{query}', XatInteractiu::class)->name('xat');

//Route::get('/user', \App\Livewire\Users\User::class)->name('user');

Route::get('/persones', Persones::class)->name('persones');

Route::get('/cataleg', Cataleg::class)->name('cataleg');


