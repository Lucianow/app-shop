@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title' , 'Resultado de Busca')

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
                            <img src="/img/search.jpg" alt="Imagem representativa de uma lupa" class="img-circle img-responsive img-raised">
                        </div>

                        <div class="name">
                            <h3 class="title">Resultado de busca</h3>
                        </div>


                        @if (session('notification'))
                            <div class="alert alert-success">
                                {{ session('notification') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="description text-center">
                    <p>Foram encontrados {{ $products->count() }} ítens para o produto <strong>{{ $query }}</strong>!</p>
                </div>

                <div class="section text-center">

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



    @include('includes.footer')
@endsection