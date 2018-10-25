@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1><i class="fa fa-file-o"></i> Tela ATIVOS</h1>


@stop

@section('content')

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        </div>
            <div class="box-body table-responsive no-padding">
                <form action="{{ route('ativo.store') }}" class="form-horizontal" method="POST">
                    {{ csrf_field() }}
                     @include('admin.ativo._formstore')
                    <div class="box-footer">
                        <a  type="button" class="btn btn-flat btn-danger"><i class="fa fa-remove"></i> CANCELAR</a>
                        <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> CADASTRAR</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
@stop
