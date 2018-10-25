@extends('adminlte::page')

@section('title', 'Editar Fornecedor')

@section('content_header')
<h1><i class="fa fa-edit"></i> Dados Gerais</h1>
<div class="breadcrumb">

</div>
@stop

@section('content')
<div class="col-md-13">
    <div class="box ">
        <div class="box-header with-border">
            <h3 class="box-title"> Cliente <b>{{ $clientes->name }}</b> </h3>
        </div>
        <button style="background-color:#00acd6; border: none" class="btn btn-flat btn-success"> <i></i> CLIENTE</a>
        <button style="background-color:rgb(7, 46, 67); border: none;margin-left:3px" class="btn btn-flat btn-success"><i ></i> CONTATO</button>
        <a href="{{route('agente.index', ['id' => $clientes->id] ) }}" style="background-color:rgb(7, 46, 67); border: none" class="btn btn-flat btn-success"><i></i> CCEE</a>

        @if($acao == "cadastro")
            <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Sucesso!!</strong> Sua empresa foi criada com sucesso!
            </div>
        @endif
        <div class="box box-info">
            <form action="{{ route('cliente.update', ['clientes' => $clientes->id] ) }}" class="form-horizontal"  method="POST">
                    {{ csrf_field() }}
                    @include('admin.cliente._formedit')
                <div class="box-footer" >
                    <a href="{{ route('cliente.index') }}" type="button"  class="btn btn-flat btn-danger"><i class="fa fa-remove"></i> CANCELAR</a>
                    <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> SALVAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 2000);
</script>
@stop
