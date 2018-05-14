@extends('layouts.app')

@section('title' , 'Benvindo a App-Shop')

@section('body-class', 'product-page')

@section('content')

    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section">
                <h2 class="title text-center">Registrar Novos Produtos</h2>

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

                <form action="{{ url('/admin/products') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nome do produto</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Preço do produto</label>
                                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-label">Descrição do produto</label>
                        <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                    </div>

                    <textarea class="form-control" placeholder="Descrição detalhada do produto" rows="5" name="long_description">{{ old('long_description') }}</textarea>

                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <a href="{{ url('/admin/products/') }}" type="button"  class="btn btn-default">Cancelar</a>

                </form>

            </div>

        </div>

    </div>


    @include('includes.footer')

@endsection
