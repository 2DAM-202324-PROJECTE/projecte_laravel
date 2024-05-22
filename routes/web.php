<?php


//use App\Livewire\Customer\Cataleg;
use App\Http\Controllers\AdminUsersController;
use App\Livewire\Customer\CatalegDocumentals;
use App\Livewire\Customer\Llistatxats;
use App\Livewire\Customer\Llistaxats;
use App\Livewire\Customer\Xatlist;

use App\Livewire\Customer\CatalegPelis;
use App\Livewire\Customer\Homepage;
use App\Livewire\Customer\MediaPreview;
use App\Livewire\Persona\Persones;
use App\Livewire\SalaMedia\LligarMedia;

//use App\Livewire\SalaXat\Xat;
//use App\Livewire\SalaXat\XatInteractiu;
use App\Livewire\Users\User;
use App\Livewire\Xats\Createorupdatexats;
use App\Livewire\Xats\Index;
use Illuminate\Support\Facades\Route;
use App\Livewire\Medias\MediaPlayer;

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
    Route::get('/homepage', function () {
        return view('customer.homepage');
    })->name('homepage');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('role:admin');
    Route::get('/categories', function () {
        return view('categories.index');
    })->name('categories')->middleware('role:admin');

    Route::get('/categories/create', function () {
        return view('categories.createorupdate');
    })->name('categories.create')->middleware('role:admin');

    Route::get('/categories/update/{id}', function ($id) {
        return view('categories.createorupdate')->with([
            'id' => $id,
        ]);
    })->name('categories.update')->middleware('role:admin');

    Route::get('/medias', function () {
        return view('medias.index');
    })->name('medias')->middleware('role:admin');

    Route::get('/medias/save', function () {
        return view('medias.createorupdatemedias');
    })->name('medias.save')->middleware('role:admin');

    Route::get('/medias/update/{id}', function ($id) {
        return view('medias.createorupdatemedias')->with([
            'id' => $id,
        ]);
    })->name('medias.update')->middleware('role:admin');

    Route::get('/xats', function () {
        return view('xats.index');
    })->name('xats')->middleware('role:admin');

    Route::get('/xats/create', function () {
        return view('xats.createorupdatexats');
    })->name('xats.create')->middleware('role:admin');

    Route::get('/xats/update/{id}', function ($id) {
        return view('xats.createorupdatexats')->with([
            'id' => $id,
        ]);
    })->name('xats.update')->middleware('role:admin');


//    Route::get('/xats/{id}', function ($id) {
//        return view('xats.show', ['id' => $id]);
//    })->name('xats.show');
    Route::get('/customer/xatmedia/{id}', function ($id) {
        return view('customer.xatmedia')->with([
            'id' => $id,
        ]);
    })->name('customer.xatmedia');



    Route::get('/catalegPelis', function () {
        return view('customer.catalegpelis');
    })->name('catalegPelis');

    Route::get('/catalegDocumentals', function () {
        return view('customer.catalegdocumentals');
    })->name('catalegDocumentals');


    Route::get('/customer/createuserxat/{id}', function ($id) {
        return view('customer.createuserxat', ['id' => $id]);
    })->name('customer.createuserxat');









//    // Ruta para la lista de usuarios
//    Route::get('admin/users', [AdminUsersController::class, 'index'])->name('admin.users.index');
//
//// Ruta para crear un nuevo usuario
//    Route::get('admin/users/create', [AdminUsersController::class, 'create'])->name('create');
//
//    Route::get('admin/users/update/{id}', [AdminUsersController::class, 'update'])->name('update');
//
//    Route::get('admin/users/delete/{id}', [AdminUsersController::class, 'delete'])->name('delete');
//
//    Route::post('admin/users/store', [AdminUsersController::class, 'store'])->name('admin.users.store');



//    Route::get('/user', \App\Livewire\Users\User::class)->name('user');
//
//    Route::get('/persones', Persones::class)->name('persones');
//
//
//    Route::get('/xatinamedia', LligarMedia::class)->name('xatinamedia');



    Route::get('/media-preview/{id}', MediaPreview::class)->name('media-preview');


    Route::get('/media-preview/{id}', MediaPreview::class)->name('media-preview');

    Route::get('/media-player/{id}', MediaPlayer::class)->name('media-player');


    Route::get('/llistaxats', Llistaxats::class)->name('llistaxats');

    // Ruta per a veure la llista de xats des del botó join chatroom al modal
    Route::get('/join-chat/{id}', function ($id) {
        return view('customer.join-chat')->with([
            'id' => $id,
        ]);
    })-> name ('join-chat') ;


    // Ruta per a hostejar un xat des del botó host chatroom al modal
    Route::get('/createuserxat/{id}', function ($id) {
        return view('customer.createuserxat')->with([
            'id' => $id,
        ]);
    })-> name ('createuserxat') ;

});

