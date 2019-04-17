@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-4 h-100">
                <div class="card">
                    <div class="card-header text-center text-black-50 font-weight-bold">
                        Selecciona el tipo de Usuario
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <div>
                                <a href="{{ Request::is('select-login') ? route('login.cliente') : route('register.cliente') }}" class="btn btn-danger">
                                    Cliente
                                </a>
                            </div>
                            <div>
                                <a href="{{ Request::is('select-login') ? route('login') : route('register') }}" class="btn btn-danger">
                                    Usuario
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection