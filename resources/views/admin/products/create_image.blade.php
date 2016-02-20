@extends('admin.layout')

@section('content')
    <h1>Upload de Imagem</h1>

    @if ($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li class="alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['products.image.store', $product->id], 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}

    <!-- Nome Form Input -->
    <div class="form-group">
        {!! Form::label('image', 'Imagem:') !!}
        {!! Form::file('image', null, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Upload', ['class'=>'btn btn-primary']) !!}

    <a href="{{ route('products.images', ['id'=>$product->id]) }}" >
        <button type="button" class="btn btn-primary">
            Voltar
        </button>
    </a>

    {!! Form::close() !!}

@endsection