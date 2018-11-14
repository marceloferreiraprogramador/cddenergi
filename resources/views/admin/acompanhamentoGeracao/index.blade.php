
@extends('adminlte::page')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
@section('title', 'Gestão')

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
                    <form  action="{{ route('acompanhamentoGeracao.new') }}"  method="POST" >
                            {{ csrf_field() }}

                        <div class="form-group">
                            <label style="display: block;"> Cliente</label>
                                <select style="width:550px;display: inline;margin-left: 5px; " name="cliente" id="cliente" class="form-control">
                                    @foreach( $clientes as $c )
                                            <option    value="{{ $c->cnpj }}" > <p> {{ $c->name }} </p></option>
                                    @endforeach
                                </select>
                                <button style="margin-left: 40px;" type="submit" class="btn btn-flat btn-success"><i class="fa fa-fw fa-arrow-circle-o-right"></i> Aplicar Cliente</button>

                        </div>
                    </form>

                        <div class="form-group">
                            <label>Ativos</label>
                            <select style="width:550px;margin-left:5px;" Disabled name="ativo" id="ativo" class="form-control">
                                @foreach( $ativos as $a )
                                        <option> {{ $a->num_ativo }} </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Mes</label>
                                <select style="width:550px;margin-left:5px;" Disabled placeholder=".col-xs-3" class="form-control"  name="mes" id="mes">
                                    <option> Jan </option>
                                    <option> Fev </option>
                                    <option> Mar </option>
                                    <option> Abr </option>
                                    <option> Mai </option>
                                    <option> Jun </option>
                                    <option> Jul </option>
                                    <option> Ago </option>
                                    <option> Set </option>
                                    <option selected > Out </option>
                                    <option> Nov </option>
                                    <option> Dez </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Ano</label>
                                <select style="width:550px;margin-left:5px;" Disabled name="ano" id="ano" placeholder=".col-xs-3" class="form-control">
                                    <option> 2017 </option>
                                    <option selected > 2018 </option>
                                    <option> 2019 </option>
                                    <option> 2020 </option>
                                    <option> 2021 </option>
                                    <option> 2022 </option>
                            </select>
                        </div>



            </div>
        </div>
    </div>
</div>
@stop


