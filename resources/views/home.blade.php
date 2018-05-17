@extends('layouts.app')

@section('title' , 'App-Shop | Dashboard')

@section('body-class', 'product-page')

@section('content')

<div class="header header-filter" style="background-image: url('{{ asset('img/examples/city.jpg') }}');"></div>

<div class="main main-raised">
        <div class="container">
            <div class="section text-center section-landing">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="title">Dashboard</h2>
                        <h4 class="title">Você tem {{ auth()->user()->cart->details->count()  }} {{ auth()->user()->cart->details->count() ==1 ? 'produto': 'produtos' }} em seu carrinho</h4>
                        @if(session('notification'))
                            <div class="alert alert-success">
                                {{ session('notification') }}
                            </div>
                        @endif

                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                </button>

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-8 col-md-offset-4">
                            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                                <li class="active">
                                    <a href="#dashboard" role="tab" data-toggle="tab">
                                        <i class="material-icons">shopping_cart</i>
                                        Carro de Compras
                                    </a>
                                </li>
                                <li>
                                    <a href="#tasks" role="tab" data-toggle="tab">
                                        <i class="material-icons">more</i>
                                        Pedidos Realizados
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">Foto</th>
                                <th class="col-md-3">Nome</th>
                                <th class="text-right">Preço</th>
                                <th class="text-right">Quantidade</th>
                                <th class="text-right">Sub Total</th>
                                <th class="text-center">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(auth()->user()->cart->details as $detail)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ $detail->product->featured_image_url }}" height="64" class="img-rounded">
                                    </td>
                                    <td class="text-left">
                                        <a href="{{ url('/products/'.$detail->product->id ) }}">{{ strtoupper($detail->product->name) }}</a>
                                    </td>
                                    <td class="text-right">R$ {{ number_format($detail->product->price, '2', ',', '.') }}</td>
                                    <td class="text-right">{{ $detail->quantity }}</td>
                                    <td class="text-right">R$ {{ $detail->quantity * $detail->product->price }}</td>
                                    <td class="td-actions text-right">

                                        <form method="post" action="{{ url('/cart') }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">

                                            <a href="{{ url('/products/'.$detail->product->id) }}" rel="tooltip" title="Ver Detalhes do Produto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                            <button type="submit" rel="tooltip" title="Remover Produto" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            <form action="{{ url('/order') }}" method="post">
                                {{csrf_field()}}
                                <button class="btn btn-primary btn-round">
                                    <i class="material-icons">done</i> Realizar Pedido
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@include('includes.footer')

@endsection
