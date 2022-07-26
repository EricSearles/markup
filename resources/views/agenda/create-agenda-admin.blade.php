@extends('layouts.app')
@section('content')
<div class="container">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-5 titulo">Criar Horario na Agenda</h2>
                <a href="{{ route('sala.show',$sala) }}">Voltar</a><br>
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

        <form action={{ route('agenda.cadastrar') }} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label><span class="text-danger">*</span> Data </label>
                    <input type="date"  name="data"  class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label><span class="text-danger">*</span> Horarios </label>
                    <select name="horario_id" class="form-control">
                        <option value="0">Selecione o horário</option>
                        @foreach($horarios as $horario)
                        <option value="{{ $horario->id }}">{{ $horario->inicio }} - {{ $horario->termino }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p>
                <span class="text-danger">* </span>Campo obrigatório
            </p>
            <input type="hidden"  name="sala_id" value="{{ $sala }}">
            <input type="hidden"  name="status_id" value="3">
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>

</div>

@stop



