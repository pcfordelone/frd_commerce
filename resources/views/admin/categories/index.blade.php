@extends('admin.layout')

@section('content')
    <h1>Categorias</h1>

    <hr/>

    <a href="{{ route('category.new') }}">
        <button class="btn btn-primary">
            Nova Categoria
        </button>
    </a>

    <br/><br/>

    {!! $categories->render() !!}

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('category.edit',['id'=>$category->id]) }}">
                        <button class="btn btn-sm btn-info">
                            Editar
                        </button>
                    </a>
                    <a href="{{ route('category.destroy',['id'=>$category->id]) }}">
                        <button class="btn btn-sm btn-danger">
                            Deletar
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection