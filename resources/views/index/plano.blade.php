@extends('templates.template')

@section('content')
<h1 class="text-center">CRUD Teste</h1>
<h3 class="text-center">@if(isset($plano))Editar @else Cadastrar @endif Plano</h3>
<hr>

<div class="col-8 m-auto">
    @if(isset($plano))
        <form class="" method="post" action="{{url("plano/$user->id")}}" enctype="multipart/form-data" id="frm_plano" name="frm_plano">
            @method("PUT")
    @else
        
        <form class="" method="post" action="{{url('plano')}}" enctype="multipart/form-data" id="frm_plano" name="frm_plano">
    @endif
        @csrf
        <div class="form-group row">
        
            <span class="col-md-2"><b>Plano:</b></span>
            <span class="col-md-10">
                <input required class="form-control"type="text" name="plano" id="plano" placeholder="Digite o Plano" @if(isset($plano)) value="{{$plano->plano}}" @endif>
            </span>
        </div>
        
        <div class="form-group row">
            <span class="col-md-2"><b>Email:</b></span>
            <span class="col-md-10">
                <input required class="form-control" type="text" name="mensalidade" id="mensalidade" placeholder="Digite a Mensalidade" @if(isset($plano)) value="{{$plano->mensalidade}}" @endif>
            </span>
        </div>
       
        <div class="text-center mt-3 mb-3">
        <input required type="submit" value="@if(isset($plano))Editar @else Salvar @endif" class="btn btn-success"/>
            
            
            <a href="javascript:history.go(-1);">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </div>
    </form>
</div>

@endsection