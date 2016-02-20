@extends('store.layout')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="cart_info">

                <h2 class="title text-center">Meus Pedidos</h2>

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>R$ {{ $order->total }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td></td>

                            <td>
                                <a href="{{ route('order.detail', ['id' => $order->id]) }}" class="btn btn-info btn-sm">Detalhes</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@stop