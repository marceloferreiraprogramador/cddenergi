@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1><i class="fa fa-file-o"></i> Acompanhamento Geracao</h1>


@stop

@section('content')

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        </div>
            <div class="box-body table-responsive no-padding">
                <form >
                    <div class="form-group">
                        <label>Cliente</label>
                            <select  onchange="funcao();" name="cliente" id="cliente" class="form-control">
                                @foreach( $clientes as $c )
                                        <option    value="{{ $c->name }}" ><p> {{ $c->name }} </p></option>
                                @endforeach
                            </select>
                    </div>

                    <div class="form-group">
                        <label>Ativos</label>
                        <select multiple class="form-control">
                            @foreach( $ativos as $a )
                                @if ('CDD' == 1)
                                        <option>{{ $a->name }} </option>
                                @endif
                            @endforeach
                            </select>
                    </div>

                    <div class="form-group">
                        <label>Mes</label>
                            <select placeholder=".col-xs-3" class="form-control">
                                <option> Jan </option>
                                <option> Fev </option>
                                <option> Mar </option>
                                <option> Abr </option>
                                <option> Jun </option>
                                <option> Jul </option>
                                <option> Ago </option>
                                <option> Set </option>
                                <option> Out </option>
                                <option> Nov </option>
                                <option> Dez </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Ano</label>
                            <select placeholder=".col-xs-3" class="form-control">
                                <option> 2017 </option>
                                <option> 2018 </option>
                                <option> 2019 </option>
                                <option> 2020 </option>
                                <option> 2021 </option>
                                <option> 2022 </option>
                        </select>
                    </div>
                </form>

                    <div class="col-xs-12">
                            <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Relatorio</h3>
                                <div class="box-tools">
                                  <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                                    <div class="input-group-btn">
                                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- /.box-header -->
                              <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">

                                    <tbody><tr>
                                    <th>Nome Ativo</th>
                                    <th>Potencia </th>
                                    <th>Garantia Fisica</th>
                                    <th>Geração</th>
                                    <th>Dados até o dia</th>
                                    <th>Horas Completas</th>
                                    <th>Horas Com erros</th>

                                  </tr>
                                  <tr>
                                    <td>CDD</td>
                                    <td>22</td>
                                    <td>S</td>
                                    <td><span class="label label-success">SIM</span></td>
                                    <td>17</td>
                                    <td>22</td>
                                    <td>2</td>

                                  </tr>
                                </tbody></table>
                              </div>
                              <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                          </div>

                </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Graficos</h3>
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
    function funcao(){
        var teste = document.getElementById("cliente").value ;
            alert(teste);



    }
    function myFunction() {
        document.getElementById("demo").innerHTML = "Hello World";
      }

</script>
@stop


