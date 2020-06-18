@extends('templates.template')

@section('content')
<h1 class="text-center">CRUD Teste</h1>
<h3 class="text-center">Cliente/Plano</h3>
<hr>
<div class="text-center mt-3 mb-3">
    <a href="{{url('create/cliente')}}">
        <button class="btn btn-secondary">Cadastrar Cliente</button>
    </a>
    <a href="{{url('create/plano')}}">
        <button class="btn btn-secondary">Cadastrar Plano</button>
    </a>
    
</div>
<div class="col-10 m-auto">
<table class="table table-bordered text-center">
    @csrf
    <thead class="thead-dark">
      <tr>
        <th scope="col" >Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Estado</th>
        <th scope="col">Cidade</th>
        <th scope="col">Planos</th>
        <th scope="col">Ação</th>
      </tr>
    </thead>
    <tbody>
        @foreach($user as $item)
            
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->nome}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->estado}}</td>
                <td>{{$item->cidade}}</td>
                <td>@php
                    $planuser = $item->find($item->id)->relPlanUser; 
                    $planfree=false;
                    foreach($planuser as $pu){
                        $plan = $plans->find($pu->id_plan);
                        echo $plan->plano.' | ';
                        if($pu->id_plan===1){
                            $planfree=true;
                        }
                    } 
                 @endphp</td>
                <td>
                    <a href="{{url("cliente/$item->id")}}" class="btn-group">
                        <button class="btn btn-sm btn-light">Visualizar</button>
                    </a>
                    <a href="{{url("cliente/$item->id/edit")}}" class="btn-group">
                        <button class="btn btn-sm btn-primary">Editar</button>
                    </a>
                    @php
                        if($item->estado =='São Paulo' && $planfree==true){
                            echo '';
                        }else{
                            echo '<a href="cliente/'.$item->id.'" class="btn-group btn-del"><button class="btn btn-sm btn-danger">Excluir</button></a>';
                        }
                    @endphp
                    
                    
                </td>
            </tr>
        @endforeach
        
      
      
    </tbody>
  </table>
</div>
@endsection