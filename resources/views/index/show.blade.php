@extends('templates.template')

@section('content')
<h1 class="text-center">CRUD Teste</h1>
<h3 class="text-center">Visualizar Cliente</h3>
<hr>
<div class="text-center mt-3 mb-3">
    <a href="{{url("cliente/$user->id/edit")}}">
        <button class="btn btn-primary">Editar</button>
    </a>
    <a href="{{url("cliente/$user->id")}}" class="btn-group">
        <button class="btn btn-danger btn-del">Excluir</button>
    </a>
    <a href="javascript:history.go(-1);">
        <button class="btn btn-warning">Voltar</button>
    </a>
</div>
@csrf
<div class="col-8 m-auto">
    <div class="row">
        <span class="col-2"><b>Nome:</b></span>
        <span class="col-10">{{$user->nome}}</span>
    </div>
    <div class="row">
        <span class="col-2"><b>Email:</b></span>
        <span class="col-10">{{$user->email}}</span>
    </div>
    <div class="row">
        <span class="col-2"><b>Telefone:</b></span>
        <span class="col-10">{{$user->telefone}}</span>
    </div>
    <div class="row">
        <span class="col-2"><b>Estado:</b></span>
        <span class="col-10">{{$user->estado}}</span>
    </div>
    <div class="row">
        <span class="col-2"><b>Cidade:</b></span>
        <span class="col-10">{{$user->cidade}}</span>
    </div>
    <div class="row">
        <span class="col-2"><b>Data Nascimento:</b></span>
        <span class="col-10">{{date( 'd/m/Y' , strtotime($user->nascimento))}}</span>
    </div>
    <div class="row">
        <span class="col-2"><b>Planos:</b></span>
        <span class="col-10">
            @php
                foreach($plansuser as $pu){
                    $plan = $plans->find($pu->id_plan);
                    echo $plan->plano.'|';
                }
            @endphp

        </span>
    </div>
    
</div>
@endsection