<h1>
    hola desde la vista del administrador


            <table width="500" border="1">
                <tr>
                    <th>Id</th>
                    <th>Role Od</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Creat</th>
                    <th>Actualitzat</th>
                </tr>
                @if($users)
                @foreach($users as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <th>{{$user->role_id}}</th>
                    <th>{{$user->name}}</th>
                    <th>{{$user->email}}</th>
                    <th>{{$user->created_at}}</th>
                    <th>{{$user->updated_at}}</th>
                </tr>
                @endforeach
                @endif
            </table>


</h1>
