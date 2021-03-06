@extends('layouts.app')

@section('title' , 'Imagem de Produtos')

@section('body-class', 'product-page')

@section('content')

    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">Imagens do Produto "{{ $product->name }}"</h2>

                <div class="team">
                    <div class="row">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <span class="btn btn-raised btn-round btn-default btn-file">
                                        <input type="file" name="photo"  required/>
                                    </span>
                                    <button type="submit" class="btn btn-primary btn-round">
                                        Adicionar Imagens
                                    </button>
                                    <a href="{{ url('/admin/products') }}" class="btn btn-info btn-round">
                                        Retornar
                                    </a>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            @foreach($images as $image)
                                <div class="col-md-4">
                                    <div class="panel panel-primary" style="background-color: #f9f2f4">
                                        <div class="panel-body ">
                                            <img src="{{ $image->url }}" width="250" height="250" >
                                            <form method="post" action="">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                                <button type="submit" class="btn btn-danger btn-round">
                                                    <i class="fa fa-trash-o"></i>  Excluir Imagem
                                                </button>
                                                @if ($image->featured)
                                                    <button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round"
                                                            rel="tooltip" title="Imagem Principal do Produto">
                                                        <i class="material-icons">favorite</i>
                                                    </button>
                                                @else
                                                    <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-default btn-fab btn-fab-mini btn-round">
                                                        <i class="material-icons">favorite</i>
                                                    </a>
                                                @endif
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('includes.footer')

@endsection
