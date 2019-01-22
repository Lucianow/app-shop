@extends('layouts.app')

@section('title' , 'Categorias - App-Shop')

@section('body-class', 'product-page')

@section('content')

    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">Categorias App-Shop</h2>

                <div class="team">
                    <div class="row">
                        <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">
                            <i class="material-icons">add_box</i> Incluir Categoria
                        </a>

                        <table class="table">

                            <thead>
                            <tr>

                                <th class="col-md-2">Nome</th>
                                <th class="col-md-4">Descrição</th>
                                <th class="text-center">Imagem</th>
                                <th class="text-center">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="text-left">{{ $category->name }}</td>
                                    <td class="text-left">{{ $category->description }}</td>
                                    <td class="text-center">
                                        <img src="{{ $category->featured_image_url }}" height="40" >
                                    </td>
                                    <td class="td-actions text-right">

                                        <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <a href="{{ url('/categories/'.$category->id) }}" rel="tooltip" title="Ver Categoria" class="btn btn-info btn-simple btn-xs" target="_blank">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                            <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar Categoria" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <button type="submit" rel="tooltip" title="Remover Categoria" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>

                        </table>
                        {{ $categories->links() }}

                    </div>
                </div>

            </div>


        </div>

    </div>

    @include('includes.footer')

@endsection
