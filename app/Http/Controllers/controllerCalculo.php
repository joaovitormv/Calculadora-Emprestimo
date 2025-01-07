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
        $total = 0;
        $dados = array();

        for($i = 1; $i <= $periodo; $i++){
            $dados[$i]['mes'] = $i;
            $dados[$i]['restante'] = number_format($capital, 2, ",", ".");
            $dados[$i]['valorAtualizado'] = $capital + ($capital * $juros);
            $dados[$i]['parcela'] = $dados[$i]['valorAtualizado'] / $periodo - ($i - 1);
            $capital = $dados[$i]['restante'];

            $total += $dados[$i]['parcela'];
            $capital = $dados[$i]['valorAtualizado'] - $dados[$i]['parcela'];

            $dados[$i]['valorAtualizado'] = number_format($dados[$i]['valorAtualizado'], 2, ",", ".");
            $dados[$i]['parcela'] = number_format($dados[$i]['parcela'], 2, ",", ".");

            
        }

        return view('resposta', compact('dados'));
    }
}
