@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Admin') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="{{ route('home') }}">Visualizar Usuarios</a><br>
                        <a href="{{ route('sala') }}">Visualizar Salas</a><br>
{{--                        {{ $data_consulta }}--}}
{{--                        {{ $ArrayCalendario }}--}}
                        <!-- <a href="#">Abrir Nova Sala</a><br>
                        <a href="#">Abrir Novo Horário</a><br> -->
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
