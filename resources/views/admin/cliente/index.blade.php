@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1><i class="fa fa-file-o"></i> Tela Clientes</h1>


@stop

@section('content')


<form  method="POST">
        <a style="margin-left:2px; margin-bottom:10px"
        title="Permissões"  class="btn btn-flat btn-success" href="{{ route('cliente.new') }}" ><i class="fa fa-plus"></i> CLIENTE</a>
    </form>
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    @if($acao == "edicao")
                        <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Sucesso!!</strong> Sua empresa foi editada com sucesso!
                        </div>
                    @endif

                    <thead>
                        <tr>
                            <th  style="width:5%">Nome </th>
                            <th  style="width:15%" >RAZÃO SOCIAL </th>
                            <th style="width:45%">CNPJ </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $clientes as $c )
                            <tr>
                                <td>{{ $c->name }} </td>
                                <td>{{ $c->social }}</td>
                                <td>{{ $c->cnpj }}</td>
                                <td>
                                    <form  method="POST">
                                        <a href="{{ route('cliente.edit', ['clientes' => $c->id]) }}" class="btn btn-flat btn-info" ><i class="fa fa-edit"></i> EDITAR</a>
                                        <a href="{{ route('cliente.remove', ['id' => $c->id]) }}" class="btn btn-flat btn-danger"><i class="fa fa-trash-o"></i> DELETAR</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>



















    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">TESTESMARCELO</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                </div>
          </div>
          <!-- /.box-header -->
            <div class="box-body">
                <div class="row">






            </div>
            </div>
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


