@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Editar una categoria</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de catagoría']) !!}

                    @error('name')
                        <spam class="text-danger">{{$message}}</spam>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}

                    @error('slug')
                        <spam class="text-danger">{{$message}}</spam>
                    @enderror                    
                </div>
                {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
