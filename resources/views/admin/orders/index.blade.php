@extends('admin.layout')

@section('content')

    <h1>Pedidos</h1>

    <hr/>

    {!! $orders->render() !!}

    <table class="table">

        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Cliente</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>

        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>R$ {{ $order->total }}</td>
                <td>{{ $order->user->name }}</td>
                {!! Form::open(['url' => route('orders.update', ['id'=>$order->id])]) !!}
                <td>
                    {!! Form::select('status', [
                        0 => 'Em andamento',
                        1 => 'Entregue'
                    ], $order->status) !!}
                </td>

                <td>
                    {!! Form::submit('Atualizar Status', ['class'=>'btn btn-sm btn-primary']) !!}
                    <a href="{{ route('orders.show', ['id' => $order->id]) }}" class="btn btn-info btn-sm">Detalhes</a>
                    <a href="{{ route('orders.destroy', ['id' => $order->id]) }}" class="btn btn-danger btn-sm">Excluir</a>
                </td>
                {!! Form::close() !!}
            </tr>
        @endforeach

    </table>

@endsection