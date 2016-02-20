@extends('admin.layout')

@section('content')
    <h1>Editar Categoria: {{ $category->name }}</h1>

    @if ($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li class="alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open(['method'=>'put']) !!}

        <!-- Nome Form Input -->
        <div class="form-group">
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
        </div>

        <!-- Description Form Input -->
        <div class="form-group">
            {!! Form::label('description', 'Descrição:') !!}
            {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Editar Categoria', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection