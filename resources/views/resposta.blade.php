@extends('layout')

@section('content')
<div class="texto">
    <h2>Cálculo efetuado</h2>
</div>

<div class="row">
    <div class="col-md-3">Mês</div>
    <div class="col-md-3">Restante</div>
    <div class="col-md-3">Valor restante com juros</div>
    <div class="col-md-3">Valor da parcela</div>
</div>

@foreach ($dados as $item)
<div class="row">
    <div class="col-md-3">{{$item["mes"]}}</div>
    <div class="col-md-6">R$ {{$item["restante"]}}</div>
    <div class="col-md-3">R$ {{$item["capitalAtualizado"]}}</div>
    <div class="col-md-3">R$ {{$item["parcela"]}}</div>
</div>


@endforeach

<button onclick="window.location.href='/';" type="button"
    class="btn btn-lg btn-primary btn-block botao">
    Voltar
</button>
@endsection