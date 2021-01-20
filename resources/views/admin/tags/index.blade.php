@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <div class="d-flex">
        <h1>Mostrar detalle de etiqueta</h1>
        <a class="btn btn-secondary ml-auto" href="{{route('admin.tags.create')}}">Agregar etiqueta</a>
    </div>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="col-span-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.tags.edit', $tag)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.tags.destroy', $tag)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Elimnar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop
