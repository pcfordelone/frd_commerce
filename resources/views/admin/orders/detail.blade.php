@extends('admin.layout')

@section('content')

    <h1>Pedido - {{ $order->id }}</h1>

    <hr/>

    {!! Form::open() !!}
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit('Atualizar Status', ['class'=>'btn btn-primary']) !!}
            <a href="{{ route('orders.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('status', 'Status do Pedido:') !!}
                {!! Form::checkbox('status', 1, $order->status, []) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    <ul>
        <li><strong>Total:</strong> R$ {{ $order->total }}</li>
        <li><strong>Cliente:</strong> {{ $order->user->name }}</li>
        <li><strong>Status:</strong> @if ($order->status) Entregue @else Em andamento @endif</li>
    </ul>

    <hr/>

    <h3>Produtos do Pedido</h3>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Produto</th>
            <th>Valor Unitário</th>
            <th>Quantidade</th>
            <th>Valor Total</th>
        </tr>
        </thead>

        <tbody>
        @foreach($order->order_items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>R$ {{ $item->price }}</td>
                <td>{{ $item->qtd }}</td>
                <td>R$ {{ ($item->qtd * $item->price) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection