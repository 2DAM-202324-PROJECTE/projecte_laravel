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
        $entrada = $request->all(); // Recoger todos los datos del formulario

        // Procesar la carga de la foto si existe en el formulario
        if ($archivo = $request->file('foto_id')) {
            $nombre = $archivo->getClientOriginalName(); // Obtener el nombre original del archivo
            $archivo->move('images', $nombre); // Mover el archivo a la carpeta 'images'

            // Crear una entrada en la tabla de fotos y guardar la referencia
            $foto = Foto::create(['ruta' => $nombre]);
            $entrada['foto_id'] = $foto->id; // Guardar el ID de la foto en el array de entrada
        }

        // Cifrar la contraseña antes de guardarla en la base de datos
        $entrada['password'] = bcrypt($request->password);

        // Crear el usuario con todos los datos de entrada (incluido el ID de la foto si está presente)
        User::create($entrada);

        // Redirigir al usuario al índice de usuarios después de crear el usuario
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
