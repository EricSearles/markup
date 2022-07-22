@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
        @endif
            SALAS <br>
            <br>
            @foreach($salas as $sala)
                ID: {{ $sala->id }} -
                Nome Sala: {{ $sala->nome }} -
                Status ID: {{ $sala->status_id }}<br>
            @endforeach
            <a href="{{ route('sala.criar') }}">Abrir Nova Sala</a><br>
            <a href="#">Abrir Novo Horário</a><br>
        </div>
    </div>
@endsection
