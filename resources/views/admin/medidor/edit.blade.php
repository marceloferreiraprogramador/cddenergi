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
            <h3 class="box-title">Editar Fornecedor <b>{{ $medidores->cod_medidor }}</b> </h3>
        </div>
        <form action="{{ route('medidor.update', ['medidores' => $medidores->id] ) }}" class="form-horizontal"  method="POST">
                {{ csrf_field() }}
                @include('admin.medidor._formedit')
            <div class="box-footer">
                <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> SALVAR</button>
            </div>
        </form>
    </div>
</div>

@stop
