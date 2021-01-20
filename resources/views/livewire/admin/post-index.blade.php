<div class="card">
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre de un post ...">
    </div>
    @if ($posts->count())
        <div class="card-body">
            <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="col-span-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}">Editar</a>
                            </td width="10px">
                            <td>
                                <form action="{{route('admin.posts.destroy', $post)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$posts->links()}}
        </div>
    @else
        <div class="card-body text-center">
            <strong>No hay registros para esta condición ... </strong>
        </div>
    @endif
</div>
