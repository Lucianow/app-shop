@extends('layouts.app')

@section('title' , 'Produtos - App-Shop')

@section('body-class', 'product-page')

@section('content')

    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">Produtos App-Shop</h2>

                <div class="team">
                    <div class="row">
                        <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">
                            <i class="material-icons">add_box</i> Incluir Produto
                        </a>

                        <table class="table">

                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2">Nome</th>
                                <th class="col-md-4">Descrição</th>
                                <th>Categoria</th>
                                <th class="text-right">Preço</th>
                                <th class="text-center">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td class="text-left">{{ $product->name }}</td>
                                    <td class="text-left">{{ $product->description }}</td>
                                    <td class="text-left">{{ $product->category_name}}</td>
                                    <td class="text-right">R$ {{ number_format($product->price, '2', ',', '.') }}</td>
                                    <td class="td-actions text-right">

                                        <form method="post" action="{{ url('/admin/products/'.$product->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <a href="{{ url('/products/'.$product->id) }}" rel="tooltip" title="Ver Produto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                            <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar Produto" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imagens do Produto" class="btn btn-warning btn-simple btn-xs">
                                                <i class="fa fa-image"></i>
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
                        {{ $products->links() }}

                    </div>
                </div>

            </div>


        </div>

    </div>

    @include('includes.footer')

@endsection
