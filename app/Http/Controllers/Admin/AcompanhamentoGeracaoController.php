<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clientes;
use App\Ativos;
use App\Geracoes;
use App\Medidores;
use App\Perfils;

class AcompanhamentoGeracaoController extends Controller
{
    public function index()
    {
        $clientes = Clientes::all();
        $ativos = Ativos::all();
        $dadosSelecionados = "";

        return view('admin.acompanhamentoGeracao.index', compact('clientes', 'ativos','dadosSelecionados'));
    }



    public function new(Request $request)
    {
        $dadoCliente = $request->all();
        $clientes = Clientes::where('cnpj',$dadoCliente['cliente'] )->get();
        $ativos = Ativos::all();
        $medidor = Medidores::all();
        $perfils = Perfils::where('cnpj',$dadoCliente['cliente'] )->get();

        $dadosSelecionados = "";
        $geracoes = '';
        $contador = 0;
        return view('admin.acompanhamentoGeracao.medidor', compact('medidor','clientes', 'ativos','dadosSelecionados','dadoCliente','geracoes','contador'));
    }



    public function medidor(Request $request)
    {
        $medidor="";
        $medidor = Medidores::where('num_ativo', $dadoCliente['ativo'])->get();
        $dadosSelecionados = $request->all();
        $dadoCliente['cliente'] = $dadosSelecionados['cnpjCliente'];

        $data = $dadosSelecionados['mes'] .'/'. $dadosSelecionados['ano'];
        $clientes = Clientes::where('cnpj',$dadoCliente['cliente'] )->get();
        $ativos = Ativos::all();
        print_r($clientes);exit();


        //dados do banco com o filtro
        $geracoes = Geracoes::where('COL1', $dadosSelecionados['ativo'])->where('COL3','like','%'.$data)->get();

        //quantidade de dados retornados
        $contador = 0 ;
        $contador = Geracoes::where('COL1', $dadosSelecionados['ativo'])->where('COL3','like','%'.$data)->count();
        //utlima data do mes
        $ultimaData = $geracoes[$contador-1]['COL3'];
        //geracao MWh
        $geracaoMWh =Geracoes::where('COL1', $dadosSelecionados['ativo'])->where('COL3','like','%'.$data)->sum('COL6');
        $geracaoMWh= $geracaoMWh/1000;

        // Total horas bem feitas
        $contadorHrsBoas = Geracoes::where('COL1', $dadosSelecionados['ativo'])->where('COL3','like','%'.$data)->where('COL7','Completo')->count();

        // Total horas mal feitas
        $contadorHrsRuim = Geracoes::where('COL1', $dadosSelecionados['ativo'])->where('COL3','like','%'.$data)->where('COL7','Faltante')->count();

        //geracao MW
        $geracaoMW= $geracaoMWh/$contadorHrsBoas;
        return view('admin.acompanhamentoGeracao.medidor', compact('medidor','clientes', 'ativos','dadosSelecionados','dadoCliente','geracoes','contador','geracaoMWh','contadorHrsBoas','contadorHrsRuim','geracaoMW','ultimaData'));
    }

    public function newDois(Request $request)
    {
        $dadoCliente = $request->all();
        $ativos = $dadoCliente['ativo'];
        $dadoCliente['cliente'] = $dadoCliente['cnpjCliente'];
        $clientes = Clientes::all();
        $ativoSelecionado = Ativos::where('num_ativo', $dadoCliente['ativo'])->get();
        $arrayMes = 0;
        $medidor = Medidores::where('num_ativo', $dadoCliente['ativo'])->get();
        $dadosSelecionados = "";
        $geracoes = '';
        $contador = 0;
        return view('admin.acompanhamentoGeracao.store', compact('arrayMes','ativoSelecionado','medidor','clientes', 'ativos','dadosSelecionados','dadoCliente','geracoes','contador'));
    }

    public function store(Request $request)
    {

        $medidor="";
        $dadosSelecionados = $request->all();

        $ativoSelecionado =  Ativos::where('num_ativo', $dadosSelecionados['AtivoFiltro'])->get();
        $dadoCliente['cliente'] = $dadosSelecionados['cnpjCliente'];
        $data = $dadosSelecionados['mes'] .'/'. $dadosSelecionados['ano'];
        $clientes = Clientes::all();
        $ativos = Ativos::all();
        $medidor = Medidores::where('num_ativo', $dadosSelecionados['AtivoFiltro'])->get();







        $contMesComDados=0;
        $arrayMes = array();
        $arrayMesValor = array();

        for($i=1;$i <=12;$i++){
            if($i < 10){
                $temDadoNoMes = Geracoes::where('COL2', $dadosSelecionados['medidor'])->where('COL3','like','%'.'0'.$i. '/'.$dadosSelecionados['ano'])->count();
                if($temDadoNoMes != 0){
                    $contMesComDados ++;
                    $temDadoNoMes =0;
                    $arrayMes[$contMesComDados] = $i;

                    $geracaoMWh =Geracoes::where('COL2', $dadosSelecionados['medidor'])->where('COL3','like','%'.'0'.$i. '/'.$dadosSelecionados['ano'])->sum('COL6');
                    $arrayMesValor[$contMesComDados]= $geracaoMWh/1000;
                }
            }else{
                $temDadoNoMes = Geracoes::where('COL2', $dadosSelecionados['medidor'])->where('COL3','like','%'.$i. '/'.$dadosSelecionados['ano'])->count();
                if($temDadoNoMes != 0){
                    $contMesComDados ++;
                    $temDadoNoMes =0;
                    $arrayMes[$contMesComDados] = $i;


                    $geracaoMWh =Geracoes::where('COL2', $dadosSelecionados['medidor'])->where('COL3','like','%'.$i. '/'.$dadosSelecionados['ano'])->sum('COL6');
                    $arrayMesValor[$contMesComDados]= $geracaoMWh/1000;

                }
            }
        }
        $valorMesEmString = implode(',', $arrayMes);
        $arrayMesValorEmString = implode('-', $arrayMesValor);












        //dados do banco com o filtro
        $geracoes = Geracoes::where('COL2', $dadosSelecionados['medidor'])->where('COL3','like','%'.$data)->get();

        //quantidade de dados retornados
        $contador = 0 ;
        $contador = Geracoes::where('COL2', $dadosSelecionados['medidor'])->where('COL3','like','%'.$data)->count();
        //utlima data do mes
        $ultimaData = $geracoes[$contador-1]['COL3'];
        //geracao MWh
        $geracaoMWh =Geracoes::where('COL2', $dadosSelecionados['medidor'])->where('COL3','like','%'.$data)->sum('COL6');
        $geracaoMWh= $geracaoMWh/1000;


        //geracao MWh
        $geracaoMWhhorahora =Geracoes::where('COL2', $dadosSelecionados['medidor'])->where('COL3','like','%'.$data)->get();
        $result = count($geracaoMWhhorahora);
        $valorHora = "";
        $campoDia="";
        for($i=0;$i < $result;$i++){
            $valorHora .= $geracaoMWhhorahora[$i]['COL6']/1000 . '-';
            $campoDia .= $geracaoMWhhorahora[$i]['COL3'] .' '. $geracaoMWhhorahora[$i]['COL4'].'h'  . '-';

        }

        // Total horas bem feitas
        $contadorHrsBoas = Geracoes::where('COL2', $dadosSelecionados['medidor'])->where('COL3','like','%'.$data)->where('COL7','Completo')->count();

        // Total horas mal feitas
        $contadorHrsRuim = Geracoes::where('COL2', $dadosSelecionados['medidor'])->where('COL3','like','%'.$data)->where('COL7','Faltante')->count();

        $horaAhora =Geracoes::where('COL2', $dadosSelecionados['medidor'])->where('COL3','like','%'.$data)->get();
        //geracao MW
        $geracaoMW= $geracaoMWh/$contadorHrsBoas;
        return view('admin.acompanhamentoGeracao.store', compact('data','campoDia','valorHora','arrayMesValorEmString','valorMesEmString','arrayMes','medidor','ativoSelecionado','clientes', 'ativos','dadosSelecionados','dadoCliente','geracoes','contador','geracaoMWh','contadorHrsBoas','contadorHrsRuim','geracaoMW','ultimaData'));
    }

    public function edit(Fornecedores $fornecedores)
    {
        return view('admin.acompanhamentoGeracao.edit', compact('clientes', 'ativos'));
    }

    public function update(Request $request, $id)
    {
        $addfornecedores = $request->all();
        $fornecedores = Fornecedores::findOrfail($id);
        $fornecedores->update($addfornecedores);

        return redirect()->route('acompanhamentoGeracao.index');
    }
    public function delete($id)
    {
        $fornecedores = Fornecedores::findOrfail($id);
        $fornecedores->delete();
        return redirect()->route('acompanhamentoGeracao.index');

    }
}
