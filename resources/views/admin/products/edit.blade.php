@extends('admin.layout')

@section('content')
    <h1>Editar Produto: {{ $product->name }}</h1>

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
        {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
    </div>

    <!-- Category Form Input -->
    <div class="form-group">
        {!! Form::label('category_id', 'Categoria:') !!}
        {!! Form::select('category_id', $categories, $product->category->id, ['class'=>'form-control']) !!}
    </div>

    <!-- Price Form Input -->
    <div class="form-group">
        {!! Form::label('price', 'Valor:') !!}
        {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
    </div>

    <!-- Featured and Recomend Form Input -->
    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('featured', 'Destaque:') !!}
            {!! Form::checkbox('featured', 1, $product->featured) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::label('recommend', 'Recomendado:') !!}
            {!! Form::checkbox('recommend', 1, $product->recommend) !!}
        </div>
        <div class="clearfix"></div>
    </div>

    <!-- Tags Form Input -->
    <div class="form-group">
        {!! Form::label('tags', 'Tags:') !!}
        {!! Form::textarea('tags', $product->tag_list, ['class'=>'form-control']) !!}
    </div>

    <!-- Description Form Input -->
    <div class="form-group">
        {!! Form::label('description', 'Descrição:') !!}
        {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Editar Produto', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection