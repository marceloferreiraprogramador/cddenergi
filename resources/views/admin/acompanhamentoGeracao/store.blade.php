@extends('adminlte::page')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

@section('title', 'Gestão')

@section('content_header')
<h1><i class="fa fa-file-o"></i> Acompanhamento Geracao</h1>


@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header"></div>
                <div class="box-body table-responsive no-padding">
                    <form  action="{{ route('acompanhamentoGeracao.store') }}"  method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label style="display: block"> Cliente</label>
                                <select style="width:550px;display: inline;margin-left: 5px" Disabled onchange="teste()" name="cliente" id="cliente" class="form-control">
                                    <option    value="{{ $dadoCliente['cliente'] }}" > <p> {{ $dadoCliente['cliente'] }} </p></option>
                                </select>
                                <a  style= "margin-left: 40px "href="{{ route('acompanhamentoGeracao.index') }}" type="button"  class="btn btn-flat btn-danger"><i class="fa fa-fw fa-arrow-circle-left"></i> Redefinir Cliente</a>
                            </div>

                            <div style="display: none" class="form-group">
                                <label class="col-sm-2 control-label">cnpjCliente</label>
                                <div class="col-sm-8">
                                    <input value="{{ $dadoCliente['cliente'] }}" type="text" name="cnpjCliente" id="cnpjCliente" class="form-control" >
                                </div>
                            </div>
                        </div>
                             <div class="form-group">
                            <label>Ativos</label>
                            <select Disabled  style="width:550px;margin-left: 5px" name="ativo" id="ativo" class="form-control">
                                <option> {{ $ativoSelecionado[0]->name}} </option>
                            </select>
                        </div>
                        <div style="display: none" class="form-group">
                            <label class="col-sm-2 control-label">AtivoFiltro</label>
                            <div class="col-sm-8">
                                <input value="{{ $ativoSelecionado[0]->num_ativo  }}" type="text" name="AtivoFiltro" id="AtivoFiltro" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Medidor</label>
                            <select  style="width:550px;margin-left: 5px" name="medidor" id="medidor" class="form-control">
                                @foreach( $medidor as $m )
                                        <option> {{ $m->cod_medidor }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Mes</label>
                                <select style="width:550px;margin-left:5px;"  placeholder=".col-xs-3" class="form-control"  name="mes" id="mes">
                                    <option value="1"> Jan </option>
                                    <option value="2"> Fev </option>
                                    <option value="3"> Mar </option>
                                    <option value="4"> Abr </option>
                                    <option value="5"> Mai </option>
                                    <option value="6"> Jun </option>
                                    <option value="7"> Jul </option>
                                    <option value="8"> Ago </option>
                                    <option value="9"> Set </option>
                                    <option value="10"> Out </option>
                                    <option value="11"> Nov </option>
                                    <option value="12"> Dez </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ano</label>
                                <select style="width:550px;margin-left: 5px" name="ano" id="ano" placeholder=".col-xs-3" class="form-control">
                                    <option> 2017 </option>
                                    <option selected > 2018 </option>
                                    <option> 2019 </option>
                                    <option> 2020 </option>
                                    <option> 2021 </option>
                                    <option> 2022 </option>
                            </select>
                        </div>
                        <div class="box-footer">
                            <button style="margin-left:43%" type="submit" class="btn btn-flat btn-success"><i class="fa fa-fw fa-bar-chart-o"></i> Gerar Grafico</button>
                        </div>
                    </form>

                    @if($dadosSelecionados !="")

                    <div class="col-xs-13">
                        <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">Relatorio Data {{ $data }}</h3>
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
                                <th>Potencia (MW)</th>
                                <th>Garantia Fisica (MW)</th>
                                <th>Geração (MW)</th>
                                <th>Geração (MWh)</th>
                                <th>Dados até o dia</th>
                                <th>Horas Completas</th>
                                <th>Horas Com erros</th>

                              </tr>
                              <tr>
                                <td>Usina Exemplo</td>
                                <td>1,5</td>
                                <td>0,95</td>
                                <td>{{ $geracaoMW }}</td>
                                <td>{{ $geracaoMWh }}</td>
                                <td>{{ $ultimaData }}</td>
                                <td><span class="label label-success">{{ $contadorHrsBoas }}</span></td>
                                <td><span class="label label-danger">{{ $contadorHrsRuim }}</span></td>
                              </tr>
                            </tbody></table>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      @endif
                </div>


            </div>
        </div>


        @if($dadosSelecionados !="")


            <div class="col-md-13">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Grafico Hora a Hora</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                        </div>
                </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                                <div id="graficoHora" ></div>
                                <canvas id="hora"style="display: block; width: 100%; height: 400px;"></canvas>

                                <script>
                                    var valorHoraString ="<?php echo $campoDia ?>"
                                    var valorHoraarray = valorHoraString.split('-');

                                    var valorHoraStrinValor ="<?php echo $valorHora ?>"
                                    var valorHoraarrayValor = valorHoraStrinValor.split('-');


                                    var ctx = document.getElementById("hora");
                                var hora = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: valorHoraarray,
                                        datasets: [{
                                            label: 'Geração (MW)',
                                            data: valorHoraarrayValor,
                                            backgroundColor: [
                                                'rgba(7, 46, 67, 0.2)',
                                            ],
                                            borderColor: [
                                                'rgba(7, 46, 67, 1)',

                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        devicePixelRatio:false,
                                        beginAtZero	:false,                                        responsive:false
                                    }
                                });
                                </script>
                    </div>
                </div>
            </div>
            </div>
        @endif















        @if($dadosSelecionados !="")


        <div class="col-md-13">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafico historico</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                    </div>
              </div>
              <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                            <div id="graficoAnoDiv" ></div>
                            <canvas id="graficoAno"style="display: block; width: 100%; height: 400px;"></canvas>

                            <script>
                                var valorMesString ="<?php echo $valorMesEmString ?>"
                                var valorMesarray = valorMesString.split(',');

                                var valorMesStrinValor ="<?php echo $arrayMesValorEmString ?>"
                                var valorMesarrayValor = valorMesStrinValor.split('-');


                                var ctx = document.getElementById("graficoAno");
                            var graficoAno = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: valorMesarray,
                                    datasets: [{
                                        label: 'Geração (MWh)',
                                        data: valorMesarrayValor,


                                        backgroundColor: [
                                            'rgba(7, 46, 67, 0.2)',
                                        ],
                                        borderColor: [
                                            'rgba(7, 46, 67, 1)',

                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive:false
                                }
                            });
                            </script>
                </div>
            </div>
        </div>
        </div>
        @endif


























    </div>












</div>

@stop


