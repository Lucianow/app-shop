@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')

    <div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">

                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="header header-primary text-center">
                                <h4>Registrar</h4>

                            </div>
                            <p class="text-divider">Insira seus dados!</p>
                            <div class="content">

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">person</i>
										</span>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nome..." required autofocus>

                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email...">

                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
                                    <input id="password" type="password" placeholder="Senha..." class="form-control" name="password" required />
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
                                    <input id="password-confirm" type="password" placeholder="Confirmar senha..." class="form-control" name="password_confirmation" required />
                                </div>

                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-info btn-sm"> <i class="material-icons">add</i> FAZER REGISTRO</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        @include('includes.footer')

    </div>

@endsection
