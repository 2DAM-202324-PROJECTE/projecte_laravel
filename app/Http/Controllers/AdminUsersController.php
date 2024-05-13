<?php

namespace App\Http\Controllers;


//use App\Livewire\Users\User;
use App\Models\Foto;
use Illuminate\Http\Request;
use App\Models\User;


class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

          $entrada = $request->all();

            if($archivo = $request->file('ruta')){
                $nombre = $archivo->getClientOriginalName();
                $archivo->move('images', $nombre);
                $foto = Foto::create(['ruta'=>$nombre]);
                $entrada['ruta'] = $foto->id;

            }else{
                User::created($entrada);
            }

//        User::create( $request->all());
 return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
