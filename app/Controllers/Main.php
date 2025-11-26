<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bundesland; //importujeme model bundesland
use App\Models\Station;
use App\Models\Data;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Config\ConfigAhoj;

class Main extends BaseController
{
    var $bundesland;
    var $station;
    var $data;
    var $config;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) //konstruktor
    {
        parent::initController($request, $response, $logger);
        $this->bundesland = new Bundesland(); //vytvoříme novou instanci třídy Bundesland
        $this->station = new Station();
        $this->data = new Data();
        $this->config = new ConfigAhoj();
    }
    public function index()
    {
        $zeme = $this->bundesland->findAll(); //do zeme vypíšeme všechny data pomocí findAll()
        //var_dump($zeme);
        $data = [
            "zeme" => $zeme
        ]; //numericke pole = klíče jsou jenom čísla
        echo view('zeme', $data);
    }

    public function stanice($id)
    {
        $zeme = $this->bundesland->find($id);
        $stanice = $this->station->where('bundesland', $id)->findAll();
        $zemeName =  $zeme->name;

        $data = [
            "zeme" => $zeme,
            "stanice" => $stanice,
        ];

        echo view('stanice', $data);
    }


    public function data($idStanice)
    {
        $stanice = $this->station->find($idStanice);
        $dataStanic = $this->data->where('Stations_ID', $idStanice)->orderBy('date','desc')->paginate($this->config->stranek);
        $pager = $this->data->pager;
        $dataObalka = [
            "stanice" => $stanice,
            "dataStanic" => $dataStanic,
            'pager' => $pager
        ];
        echo view('data', $dataObalka);
    }
}
