<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Novo Pedido</title>
</head>
<body>
    <h4>Um novo pedido acabou de ser realizado!</h4>
    <p>Estes são os dados do cliente:</p>
    <ul>
        <li>
            <strong>Nome: </strong>{{ $user->name }}
        </li>
        <li>
            <strong>Email: </strong>{{ $user->email }}
        </li>
        <li>
            <strong>Data do pedido: </strong>{{ $cart->order_date }}
        </li>
    </ul>
    <hr>
    <p>Detalhes do pedido!</p>
    <ul>
        @foreach($cart->details as $detail)
            <li>
                {{ $detail->product->name }} X {{ $detail->quantity }}
            </li>
        @endforeach
    </ul>
    <hr>
    <p>Valor total deo pedido $ {{ $cart->total }}</p>
    <hr>
    <p>
        <a href="{{ url('admin/orders/'.$cart->id) }}">CLIQUE AQUI</a> para ver os detalhes do pedido!
    </p>

</body>
</html>

