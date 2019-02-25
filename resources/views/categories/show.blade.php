@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title' , 'App-Shop | Categoria')

@section('styles')
    <style>

        .team {
            padding-bottom: 50px;
        }
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        .team .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display:         flex;
            flex-wrap: wrap;
        }
        .team .row > [class*='col-'] {
            display: flex;
            flex-direction: column;
        }

    </style>

@endsection

@section('content')
    <div class="header header-filter" style="background-image: url('{{ asset('img/examples/city.jpg') }}');"></div>

    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="profile">
                        <div class="avatar">
                            <img src="{{ $category->featured_image_url }}" alt="Imagem representativa da categoria {{ $category->name }}" class="img-circle img-responsive img-raised">
                        </div>

                        <div class="name">
                            <h3 class="title">{{ $category->name }}</h3>
                        </div>


                        @if (session('notification'))
                            <div class="alert alert-success">
                                {{ session('notification') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{ $category->description }}</p>
                </div>

                <div class="section text-center">
                    <div class="title text-center">
                        <h3>Produtos</h3>
                    </div>
                    <div class="team">
                    <div class="row">

                        @foreach($products as $product)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <a href="{{ url('/products/'.$product->id) }}">
                                        <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle">
                                    </a>
                                    <h4 class="title">
                                        <a href="{{ url('/products/'.$product->id) }}">{{ strtoupper($product->name) }}</a>
                                    </h4>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        {{ $products->links() }}
                    </div>
                </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Selecione a quantidade</h4>
                </div>
                <form method="post" action="{{ url('/cart') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="modal-body">
                        <input type="number" name="quantity" value="1" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info btn-simple">Incluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('includes.footer')
@endsection