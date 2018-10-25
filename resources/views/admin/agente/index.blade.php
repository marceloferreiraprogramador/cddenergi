@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1><i class="fa fa-file-o"></i> CCEE</h1>


@stop

@section('content')

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">CLIENTE <b>{{ $clientes->name }}</b></h3>
        </div>

        <a href="{{route('cliente.edit',['clientes' => $clientes->id]) }}" style="background-color:rgb(7, 46, 67); border: none" class="btn btn-flat btn-success"><i></i> CLIENTE</a>
        <button style="background-color:rgb(7, 46, 67); border: none" class="btn btn-flat btn-success"><i ></i> CONTATO</button>
        <button style="background-color:#00acd6; border: none" class="btn btn-flat btn-success"><i></i> CCEE</button>
        <p style="display: none" > {{ $teste = 1 }} </p>
        @if($acao=="novoAgente")
            <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Sucesso!!</strong>Agente salvo com sucesso!
            </div>
        @endif
        @if($acao=="edicaoAgente")
            <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Sucesso!!</strong> Agente editado com sucesso!
            </div>
        @endif
        @foreach( $agentes as $a )
            @if ( $a->cnpj == $sessao->cnpj_sessions)
                <div  class="box box-info" style="padding-bottom: 20px">
                  <b> <h4 style="margin-left: 30px " >Codigo Agente: </b>{{ $a->codigo_agente }} </h4>
                <b> <h4 style="margin-left: 30px " >Codigo Representante:</b> {{ $a->codigo_representante }} </h4>
                    <a style="margin-left: 30px "  href="{{ route('agente.edit', ['agente' => $a->id]) }}" class="btn btn-flat btn-info" ><i class="fa fa-edit"></i> EDITAR AGENTE</a>
                    <p style="display: none" > {{ $teste = 0 }} </p>
                </div>
                @break
            @endif
            <p style="display: none" > {{ $teste = 1 }} </p>

        @endforeach
        @if($teste == 1)
            <form  action="{{ route('agente.store') }}" class="form-horizontal" method="POST">
                {{ csrf_field() }}
                @include('admin.agente._formstore')
                    <div  class="box-footer" >
                            <button style="margin-left: 40%" type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> SALVAR AGENTE</button>
                        </div>
            </form>
        @endif

        <form style="margin-top: 100px; margin-left: 30px"  method="POST">
                <a style="margin-left:2px; margin-bottom:10px"
                title="Permissões"  class="btn btn-flat btn-success" href="{{ route('perfil.new') }}" ><i class="fa fa-plus"></i> ADICIONAR PERFIL</a>
        </form>
        @include('admin.agente._avisos')

            <div  class="box box-info">
                <table class="table table-hover">

                    <thead>
                        <tr >
                            <th  style="width:35%"> </th>
                            <th  style="width:15%" >perfil codigo agente </th>
                            <th style="width:20%">perfil codigo representante </th>
                            <th style="width:40%">Ação </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach( $perfils as $p )
                         @if (  $p->cnpj  == $sessao->cnpj_sessions)
                                <tr style="background-color:rgb(8, 56, 82); color:oldlace;">
                                    <td>PERFIL </td>
                                    <td>{{ $p->sigla_perfil }}</td>
                                    <td>{{ $p->codigo_perfil }}</td>
                                    <td>
                                        <form  method="POST">
                                            <a href="{{ route('perfil.edit', ['perfils' => $p->id]) }}" class="btn btn-flat btn-info" ><i class="fa fa-edit"></i> EDITAR</a>
                                            <a href="{{ route('perfil.remove', ['id' => $p->id]) }}" class="btn btn-flat btn-danger" ><i class="fa fa-trash-o"></i> DELETAR</a>
                                            <a style="background-color: #d8d8d8;border:none;color:black" href="{{ route('ativo.index', ['id' => $p->codigo_perfil]) }}" type="submit" class="btn btn-flat btn-success"><i class="fa fa-plus"></i>CRIAR ATIVO</a>
                                        </form>
                                        </td>
                                </tr>
                                @foreach( $ativos as $a )
                                    @if (  $a->id_perfil  == $p->codigo_perfil)
                                        <tr style="background-color: #d8d8d8;">
                                            <td><b>ATIVO:</b> {{ $a->id_perfil }} &emsp; &emsp;| &emsp; &emsp;<b>Classe:</b> {{ $a->class }}    </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <form  method="POST">
                                                    <a  href="{{ route('ativo.edit', ['ativos' => $a->id]) }}" class="btn btn-flat btn-info" ><i class="fa fa-edit"></i> EDITAR</a>
                                                    <a href="{{ route('ativo.remove', ['id' => $a->id]) }}" class="btn btn-flat btn-danger" ><i class="fa fa-trash-o"></i> DELETAR</a>
                                                    <a style="background-color: #ffffff;border:none;color:black" href="{{ route('medidor.index', ['id' => $a->num_ativo]) }}" type="submit" class="btn btn-flat btn-success"><i class="fa fa-plus"></i>CRIAR MEDIDOR</a>

                                                </form>
                                                </td>
                                        </tr>

                                        @foreach( $medidores as $m )
                                            @if (  $a->num_ativo  == $m->num_ativo)

                                                <tr  >
                                                    <td><b> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;Codigo Medidor:</b> {{ $m->cod_medidor }}  &emsp;<b>Medidor Fronteira:</b> {{ $m->medidor_fontreira }}    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <form  method="POST">
                                                            <a href="{{ route('medidor.edit', ['medidores' => $m->id]) }}" class="btn btn-flat btn-info" ><i class="fa fa-edit"></i> EDITAR</a>
                                                         <a href="{{ route('medidor.remove', ['id' => $m->id]) }}" class="btn btn-flat btn-danger" ><i class="fa fa-trash-o"></i> DELETAR</a>

                                                        </form>
                                                        </td>
                                                </tr>
                                            @endif

                                        @endforeach


                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
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

