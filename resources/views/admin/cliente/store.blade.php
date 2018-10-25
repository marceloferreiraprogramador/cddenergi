@extends('adminlte::page')

@section('title', 'Editar Acesso')

@section('content_header')
<h1><i class="fa fa-edit"></i> Adicionar novo Cliente</h1>
<div class="breadcrumb">

</div>
@stop

@section('content')
<div class="col-md-13">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Adicionar novo Cliente</h3>
        </div>

        <form  action="{{ route('cliente.store') }}" class="form-horizontal" method="POST">
            {{ csrf_field() }}
             @include('admin.cliente._formstore')
            <div class="box-footer">
                <a href="{{route('cliente.index') }}" type="button" class="btn btn-flat btn-danger"><i class="fa fa-remove"></i> CANCELAR</a>
                <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> CADASTRAR</button>
            </div>
        </form>

    </div>
</div>

@stop
