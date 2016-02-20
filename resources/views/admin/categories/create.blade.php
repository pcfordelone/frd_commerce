@extends('admin.layout')

@section('content')
    <h1>Criar Nova Categoria</h1>

    @if ($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li class="alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open() !!}

        <!-- Nome Form Input -->
        <div class="form-group">
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <!-- Description Form Input -->
        <div class="form-group">
            {!! Form::label('description', 'Descrição:') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Adicionar Categoria', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection