@extends('adminlte::page')

@section('title', 'Editar Acesso')

@section('content_header')
<h1><i class="fa fa-edit"></i> Adicionar novo ?</h1>
<div class="breadcrumb">

</div>
@stop

@section('content')
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Adicionar novo ?</h3>
        </div>

        <form  action="{{ route('fornecedor.store') }}" class="form-horizontal" method="POST">
            {{ csrf_field() }}
             @include('admin.fornecedor._formstore')
            <div class="box-footer">
                <a href="{{route('fornecedor.index') }}" type="button" class="btn btn-flat btn-danger"><i class="fa fa-remove"></i> CANCELAR</a>
                <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> CADASTRAR</button>
            </div>
        </form>

    </div>
</div>

@stop
