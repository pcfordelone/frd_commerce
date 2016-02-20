@extends('admin.layout')

@section('content')

    <h1>Imagens do Produto {{ $product->name }}</h1>

    <hr/>

    <a href="{{ route('products.image.create',['id'=>$product->id]) }}" >
        <button class="btn btn-primary">
            Cadastrar nova imagem
        </button>
    </a>
    <a href="{{ route('products.index') }}" >
        <button class="btn btn-info">
            Voltar
        </button>
    </a>

    <br/><br/>

    <table class="table">

        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Extensão</th>
            <th>Ação</th>
        </tr>

        @foreach($product->images as $image)
            <tr>
                <td>{{ $image->id }}</td>
                <td>
                    <img width="120px" src="{{ url('uploads/' . $image->id . '.' . $image->extension) }}">
                </td>
                <td>{{ $image->extension }}</td>

                <td>
                    <a href="{{ route('products.image.destroy',['id'=>$image->id]) }}">
                        <button class="btn btn-danger btn-sm">
                            Excluir
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach

    </table>

@endsection