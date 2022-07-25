@extends('layouts.app')
@section('content')
<div class="container">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-5 titulo">Criar Horario</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <hr>

        <form action={{ route('horario.cadastrar') }} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label><span class="text-danger">*</span> Horário Início </label>
                    <input type="time"  name="inicio" min="08:00" max="18:00"  class="form-control" required>
                </div>
            </div>
            <p>
                <span class="text-danger mt-2"> </span>Os períodos tem duração de 01:00 hora contados do horario de início.
            </p>
            <p>
                <span class="text-danger">* </span>Campo obrigatório
            </p>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>

</div>

@stop



