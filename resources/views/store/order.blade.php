@extends('store.layout')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="cart_info">

                <h2 class="title text-center">Pedido realizado com sucesso</h2>

                <h3>Detalhes do Pedido:</h3>
                <ul>
                    <li><strong>ID do Pedido: </strong>{{ $order->id }}</li>
                    <li><strong>Total:</strong> R$ {{ $order->total }}</li>
                    <li><strong>Status: </strong>@if ($order->status == 0) Em andamento @else Finalizado @endif</li>
                </ul>`
            </div>
        </div>
    </section>

@stop