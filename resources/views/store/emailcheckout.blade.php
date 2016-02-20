<h2>Seu pedido foi realizado com sucesso.</h2>

<hr/>

<h3>Detalhes do pedido:</h3>

<ul>
    <li><strong>ID do pedido: </strong>{{ $order->id }}</li>
    <li><strong>Total: R$</strong>{{ $order->total }}</li>
    <li><strong>Status: </strong>@if($order->status==0)Em andamento @else Finalizado @endif</li>
</ul>

<hr/>

<h3>Produtos comprados:</h3>

<br/><br/>

<table>
    <thead>
    <tr>
        <th>Produto</th>
        <th>Preço</th>
        <th>Quantidade</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->order_items as $item)
    <tr>
        <td>{{ $item->product->name }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->qtd }}</td>
    </tr>
    @endforeach
    </tbody>
</table>