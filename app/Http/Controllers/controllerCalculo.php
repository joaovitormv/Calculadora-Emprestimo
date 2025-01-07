<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerCalculo extends Controller
{
    public function Calcular(Request $request){
        $capital = $request->input('capital');
        $taxa = $request->input('taxa');
        $periodo = $request->input('periodo');
        $juros = $taxa / 100;

        $dados = array();

        for($i = 1; $i <= $periodo; $i++){
            $dados[$i]['mes'] = $i;
            $dados[$i]['restante'] = $capital + ($capital * $juros);
            $dados[$i]['valorAtualizado'] = $dados[$i]['restante'] + ($dados[$i]['restante'] * $juros);
            $dados[$i]['parcela'] = $dados[$i]['valorAtualizado'] / $periodo
        }

        return view('resposta', compact('dados'));
    }
}
