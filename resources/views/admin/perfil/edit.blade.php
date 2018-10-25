@extends('adminlte::page')

@section('title', 'Editar Fornecedor')

@section('content_header')
<h1><i class="fa fa-edit"></i> Editar Fornecedor</h1>
<div class="breadcrumb">

</div>
@stop

@section('content')
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Fornecedor <b>{{ $perfils->sigla_perfil }}</b> </h3>
        </div>
        <form action="{{ route('perfil.update', ['agentes' => $perfils->id] ) }}" class="form-horizontal"  method="POST">
                {{ csrf_field() }}
                @include('admin.perfil._formedit')
            <div class="box-footer">
                <a href="{{ route('agente.index') }}" type="button"  class="btn btn-flat btn-danger"><i class="fa fa-remove"></i> CANCELAR</a>
                <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> SALVAR</button>
            </div>
        </form>
    </div>
</div>

@stop
