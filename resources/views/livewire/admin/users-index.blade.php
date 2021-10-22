
{{-- TABLA PARA USUARIOS --}}

<div>
    <div class="card">
        {{-- header de busqueda por letras --}} 
       <div class="card-headear">
            <input wire:model="search" class="form-control" placeholder="ingrese el nombre o correo del usuario">

       </div>

        <div class="card-body">

            <table class="table  table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td width= "10px">
                                <a class="btn btn-primary" href="{{route('users.edit', $user)}}">Editar </a>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- FOOTER PARA PAGINACION --}}
            <div class="card-footer">
                {{$users->links()}}
            </div>
    </div>
</div>
