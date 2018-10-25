@extends('adminlte::page')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
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
                            <select  name="cliente" id="cliente" class="form-control">
                                @foreach( $clientes as $c )
                                        <option    value="{{ $c->name }}" > <p> {{ $c->name }} </p></option>
                                @endforeach
                            </select>
                    </div>
                        <div class="box-footer">
                            <a style="background-color: #d8d8d8;border:none;color:black" href="{{ route('acompanhamentoGeracao.index2', ['id' => $c->cnpj]) }}" type="submit" class="btn btn-flat btn-success"><i class="fa fa-plus"></i>CRIAR ATIVO</a>
                        </div>
                </form>

                    <div class="form-group">
                        <label>Ativos</label>
                        <select class="form-control">
                                    <option> a </option>
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

                        <div id="myfirstchart" style="height: 250px;"></div>



<script>

        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            parseTime: false,
            gridTextSize:20,

            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
              { y: 'Jan', a: 20,b:15 },
              { y: 'Fev', a: 15,b:95 },
              { y: '3', a: 3,b:7 },
              { y: '4', a: 10,b:15 },
              { y: '5', a: 11,b:15 }
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'y',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['a','b'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['cliente A ', 'valor B']

        });
</script>




            </div>
        </div>
    </div>


</div>
<script>

    function myFunction() {
        document.getElementById("demo").innerHTML = "Hello World";
      }

</script>
@stop


