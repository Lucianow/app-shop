@extends('layouts.app')

@section('title' , 'Benvindo a App-Shop')

@section('body-class', 'landing-page')

@section('styles')
    <style>
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
        .tt-query, /* UPDATE: newer versions use tt-input instead of tt-query */
        .tt-hint {
            width: 396px;
            height: 30px;
            padding: 8px 12px;
            font-size: 24px;
            line-height: 30px;
            border: 2px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        .tt-query { /* UPDATE: newer versions use tt-input instead of tt-query */
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
            color: #999;
        }

        .tt-menu { /* UPDATE: newer versions use tt-menu instead of tt-dropdown-menu */
            width: 422px;
            margin-top: 12px;
            padding: 8px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
            padding: 3px 20px;
            font-size: 18px;
            line-height: 24px;
        }

        .tt-suggestion.tt-is-under-cursor { /* UPDATE: newer versions use .tt-suggestion.tt-cursor */
            color: #fff;
            background-color: #0097cf;

        }

        .tt-suggestion p {
            margin: 0;
        }
    </style>
@endsection

@section('content')

    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">App-Shop</h1>
                    <h4>Sua loja de compras on-line! </h4>
                    <br />
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                        <i class="fa fa-play"></i> Conheça a App-Shop
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center section-landing">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="title">Porque confiar no App-Shop?</h2>
                        <h5 class="description">Você pode estar perguntando, porque App-Shop? App-Shop é uma loja on-line feita em Laravel! Laravel é um framework para construção de aplicativos PHP!</h5>
                    </div>
                </div>

                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">chat</i>
                                </div>
                                <h4 class="info-title">First Feature</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <h4 class="info-title">Second Feature</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">fingerprint</i>
                                </div>
                                <h4 class="info-title">Third Feature</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section text-center">
                <h2 class="title">Visite nossas Categorias</h2>


                    <form class="form-inline" method="get" action="{{ url('/search') }}" >
                        <input type="text" placeholder="Encontrar Produtos" class="form-control" name="query" id="search" >
                        <button class="btn btn-primary btn-just-icon ">
                            <i class="material-icons">search</i>
                        </button>
                    </form>



                <div class="team">
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <a href="{{ url('/categories/'.$category->id) }}">
                                        <img src="{{ $category->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle">
                                    </a>
                                    <h4 class="title">
                                        <a href="{{ url('/categories/'.$category->id) }}">{{ strtoupper($category->name) }}</a>
                                        <br />

                                    </h4>
                                    <p>{{ $category->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>


            <div class="section landing-section">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-center title">Faça seu cadastro</h2>
                        <h4 class="text-center description">Cadastre-se no App-Shop, e receba as novidades e atualizações toda semana!</h4>
                        <form class="contact-form" method="get" action="{{ route('register') }}">
                            <div class="row">
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group label-floating">--}}
                                        {{--<label class="control-label">Nome</label>--}}
                                        {{--<input type="text" class="form-control" name="name">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group label-floating">--}}
                                        {{--<label class="control-label">Email</label>--}}
                                        {{--<input type="email" class="form-control" name="email">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>


                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                    <button class="btn btn-primary btn-raised">
                                        Realizar o Cadastro
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@include('includes.footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(function(){
            //
            var products = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: '{{ url("/products/json") }}'
            });

            //iniciar o Typeahead no campo de busca
            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            },{
                name: 'products',
                source: products
            });
        });
    </script>
@endsection

