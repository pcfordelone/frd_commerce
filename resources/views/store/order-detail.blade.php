@extends('store.layout')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="cart_info">

                <h2 class="title text-center">Pedido - {{ $order->id }}</h2>

                <hr/>

                <a href="{{ route('orders') }}" class="btn btn-primary">Voltar</a>

                <hr/>

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
            </div>
        </div>
    </section>

@stop