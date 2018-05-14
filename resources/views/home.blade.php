@extends('layouts.app')

@section('title' , 'App-Shop | Dashboard')

@section('body-class', 'product-page')

@section('content')

<div class="header header-filter" style="background-image: url('{{ asset('img/examples/city.jpg') }}');"></div>

<div class="main main-raised">
        <div class="container">
            <div class="section text-center section-landing">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="title">Dashboard</h2>

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

                        <ul class="nav nav-pills nav-pills-primary" role="tablist">
                            <li>
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
                </div>
            </div>
        </div>
</div>

@include('includes.footer')

@endsection
