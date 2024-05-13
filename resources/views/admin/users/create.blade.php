<h1>
    Hola desde la vista de creación de usuarios
</h1>
{!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\AdminUsersController@store', 'files'=>true]) !!}

<table>
    <tr>
        <td>{!! Form::label('name', 'Nombre: ') !!}</td>
        <td>{!! Form::text('name', null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('password', 'Contraseña: ') !!}</td>
        <td>{!! Form::password('password', ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('email', 'E-Mail: ') !!}</td>
        <td>{!! Form::text('email', null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('role_id', 'Rol: ') !!}</td>
        <td>{!! Form::text('role_id', null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('foto', 'Foto: ') !!}</td>
        <td>{!! Form::file('ruta', null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::submit('Crear usuario', ['class' => 'btn btn-primary']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::reset('Borrar', ['class' => 'btn btn-primary']) !!}</td>
    </tr>

</table>
{!! Form::close() !!}
