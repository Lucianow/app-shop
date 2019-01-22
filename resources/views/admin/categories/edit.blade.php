@extends('layouts.app')

@section('title' , 'Editar Categoria App-Shop')

@section('body-class', 'product-page')

@section('content')

    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section">
                <h2 class="title">Editar Categorias</h2>

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

                <form action="{{ url('/admin/categories/'.$category->id.'/edit') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nome da categoria</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="control-label">Imagem da categoria</label>
                            <input type="file" name="image" >
                            <p class="help-block">Escolher nova imagem, se deseja atualizar a imagem atual!</p>
                        </div>

                    </div>

                    <textarea class="form-control" placeholder="Descrição da categoria" rows="5" name="description">{{ old('description', $category->description) }}</textarea>

                    <button type="submit" class="btn btn-primary">Atualizar Categoria</button>
                    <a href="{{ url('/admin/categories/') }}" type="button"  class="btn btn-default">Cancelar</a>

                </form>

            </div>

        </div>

    </div>

    @include('includes.footer')

@endsection