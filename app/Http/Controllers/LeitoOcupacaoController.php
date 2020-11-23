<?php

namespace App\Http\Controllers;

use App\Models\LeitoOcupacao;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class LeitoOcupacaoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        //$leitosOcupacoes = LeitoOcupacao::all();
        $leitosOcupacoes = new Collection();
        $states = new Collection();
        $cities = [];
        if (!blank($leitosOcupacoes)) {
            foreach ($leitosOcupacoes as $key => $value) {
                if (array_key_exists($value->estadoSigla, $cities))
                    array_push($cities[$value->estadoSigla], $value->municipio);
                else
                    $cities[$value->estadoSigla] = [$value->municipio];
            }
        }
        return view("index", compact("states", "cities"));
    }

    public function populate()
    {
        $response = Http::withBasicAuth('user-api-leitos', 'aQbLL3ZStaTr38tj')->get('https://elastic-leitos.saude.gov.br/leito_ocupacao/_search');
        $json = $response->json();

        foreach ($json["hits"]["hits"] as $key => $value) {
            $leitoOcupacao = new LeitoOcupacao();
            dd($json, $json["hits"]["hits"], $value["_source"]);
        }
    }

    public function updateGraph(Request $request)
    {

        $response = Http::withBasicAuth('user-api-leitos', 'aQbLL3ZStaTr38tj')->get('https://elastic-leitos.saude.gov.br/leito_ocupacao/_search');
        $json = $response->json();

        foreach ($json["hits"]["hits"] as $key => $value) {
            $leitoOcupacao = new LeitoOcupacao();
            dd($json, $json["hits"]["hits"], $value["_source"]);
        }
    }
}
