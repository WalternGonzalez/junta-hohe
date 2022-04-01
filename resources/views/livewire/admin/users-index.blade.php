{{-- BUTTON BUSCAR --}}

<form action="{{ route('users.index') }}" method="GET">
    <div class="btn-group">
        <input type="text" name="busqueda" class="form-control">
        <input type="submit" value="Buscar" class="btn btn-primary" >

    </div>
  </form> <br>


{{-- TABLA PARA USUARIOS --}}

    <div class="card">
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