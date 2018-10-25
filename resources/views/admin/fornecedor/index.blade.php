@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1><i class="fa fa-file-o"></i> Tela Fornecedores</h1>


@stop

@section('content')
<form  method="POST">
        <a style="margin-left:2px; margin-bottom:10px"
        title="Permissões"  class="btn btn-flat btn-success" href="{{ route('fornecedor.new') }}" ><i class="fa fa-plus"></i> ADICIONAR NOVO FORNECEDOR</a>
    </form>
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Fornecedores</h3>
        </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th  style="width:5%">Id </th>
                            <th  style="width:15%" >Nome </th>
                            <th style="width:45%">Observacao </th>
                            <th style="width:35%">Ação </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $fornecedores as $f )
                            <tr>
                                <td>{{ $f->id }} </td>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->obs }}</td>
                                <td>
                                    <form  method="POST">
                                        <a href="{{ route('fornecedor.edit', ['fornecedores' => $f->id]) }}" class="btn btn-flat btn-info" ><i class="fa fa-edit"></i> EDITAR</a>
                                        <a href="{{ route('fornecedor.remove', ['id' => $f->id]) }}" class="btn btn-flat btn-danger" ><i class="fa fa-trash-o"></i> DELETAR</a>                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
@stop
