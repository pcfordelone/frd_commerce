@extends('store.layout')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">

                <h2 class="title text-center">Carrinho</h2>

                @if (session()->has('msg'))
                    <div class="alert alert-danger">
                        {{ session()->get('msg') }}
                    </div>
                @endif

                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Imagem</td>
                        <td class="description">Descrição</td>
                        <td class="price">Valor</td>
                        <td class="qtd">Qtd.</td>
                        <td class="total">Valor Total</td>
                        <td>Ação</td>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($cart->all() as $k=>$item)
                        {!! Form::open(['route' => ['cart.update', $k] ]) !!}
                        <tr>
                            <td class="cart_product">
                                <a href="{{ route('product', ['id' => $k]) }}">
                                    Image
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('product', ['id' => $k]) }}">{{ $item['name'] }}</a></h4>
                                <p>Cód. Produto: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{ $item['price'] }}
                            </td>
                            <td class="cart_qtd">
                                {!! Form::text('qtd', $item['qtd'], []) !!}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    R$ {{ $item['qtd'] * $item['price'] }}
                                </p>
                            </td>
                            <td>
                                {!! Form::submit('Atualizar Qtd.', ['class'=>'btn btn-default btn-sm']) !!}
                                {!! Form::close() !!}

                                <a href="{{ route('cart.destroy', ['id' => $k]) }}" class="cart_quantity_delete">
                                    <button class="btn btn-danger btn-sm">
                                        Remover Item
                                    </button>
                                </a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6">
                                Nenhum item encontrado
                            </td>
                        </tr>
                    @endforelse

                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right" style="margin: 5px;">
                                <span style="padding: 20px">TOTAL: {{ $cart->getTotal() }}</span>
                                <a href="{{ route('checkout.place') }}">
                                    <button class="btn btn-success">
                                        Finalizar Compra
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </section>

@stop