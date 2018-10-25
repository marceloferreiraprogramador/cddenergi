@extends('adminlte::page')

@section('title', 'Editar Acesso')

@section('content_header')
<h1><i class="fa fa-edit"></i> Adicionar novo medidor</h1>
<div class="breadcrumb">

</div>
@stop

@section('content')
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Adicionar novo medidor</h3>
        </div>

        <form  action="{{ route('medidor.store') }}" class="form-horizontal" method="POST">
            {{ csrf_field() }}
             @include('admin.medidor._formstore')
            <div class="box-footer">
                <a href="{{ route('agente.index') }}"type="button" class="btn btn-flat btn-danger"><i class="fa fa-remove"></i> CANCELAR</a>
                <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> CADASTRAR</button>
            </div>
        </form>

    </div>
</div>

@stop
