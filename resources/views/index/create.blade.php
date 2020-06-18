@extends('templates.template')

@section('content')
<h1 class="text-center">CRUD Teste</h1>
<h3 class="text-center">@if(isset($user))Editar @else Cadastrar @endif Cliente</h3>
<hr>

<div class="col-8 m-auto">
    @if(isset($user))
        <form class="" method="post" action="{{url("cliente/$user->id")}}" enctype="multipart/form-data" id="frm_cliente" name="frm_cliente">
            @method("PUT")
    @else
        
        <form class="" method="post" action="{{url('cliente')}}" enctype="multipart/form-data" id="frm_cliente" name="frm_cliente">
    @endif
        @csrf
        <div class="form-group row">
        
            <span class="col-md-2"><b>Nome:</b></span>
            <span class="col-md-10">
                <input required class="form-control"type="text" name="nome" id="nome" placeholder="Digite o Nome" @if(isset($user)) value="{{$user->nome}}" @endif>
            </span>
        </div>
        
        <div class="form-group row">
            <span class="col-md-2"><b>Email:</b></span>
            <span class="col-md-10">
                <input required class="form-control" type="email" name="email" id="email" placeholder="Digite o Email" @if(isset($user)) value="{{$user->email}}" @endif>
            </span>
        </div>
        <div class="form-group row">
            <span class="col-md-2"><b>Telefone:</b></span>
            <span class="col-md-10">
                <input required class="form-control"type="text" name="telefone" id="telefone" placeholder="Digite o Telefone" @if(isset($user))  value="{{$user->telefone}} @endif">
            </span>
        </div>
        <div class="form-group row">
            <span class="col-md-2"><b>Estado:</b></span>
            <span class="col-md-10">
                <input required class="form-control"type="text" name="estado" id="estado" placeholder="Digite o Estado" @if(isset($user)) value="{{$user->estado}}" @endif>
            </span>
        </div>
        <div class="form-group row">
            <span class="col-md-2"><b>Cidade:</b></span>
            <span class="col-md-10">
                <input required class="form-control"type="text" name="cidade" id="cidade" placeholder="Digite a Cidade" @if(isset($user)) value="{{$user->cidade}}" @endif>
            </span>
        </div>
        <div class="form-group row">
            <span class="col-md-2"><b>Data Nascimento:</b></span>
            <span class="col-md-10">
                <input required class="form-control"type="text" name="nascimento" id="nascimento" placeholder="Digite o Nascimento" @if(isset($user)) value="{{date( 'd/m/Y' , strtotime($user->nascimento))}}" @endif>
            </span>
        </div>
        <div class="form-group row">
            <span class="col-md-2"><b>Planos:</b></span>
            <span class="col-md-10">
                @php
                    foreach($plans as $plan){
                        //Localiza o planuser dos dados
                        if(isset($plansuser)){
                            
                        $planuser = $plansuser->where("id_plan",$plan->id)->where("id_user",$user->id)->all();
                        }else{
                            $planuser=array();   
                            
                        }

                         if(count($planuser)){
                             echo "<label class='form-control'><input  name='id_plan[]' id='id_plan' type='checkbox' checked='checked' value='$plan->id'/>$plan->plano</label>";
                         }else{
                             echo "<label class='form-control'><input  name='id_plan[]' id='id_plan' type='checkbox' value='$plan->id'/>$plan->plano</label>";
                         }
                    }
                @endphp

            </span>
        </div>
        <div class="text-center mt-3 mb-3">
        <input required type="submit" value="@if(isset($user))Editar @else Salvar @endif" class="btn btn-success"/>
            
            
            <a href="javascript:history.go(-1);">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </div>
    </form>
</div>

@endsection