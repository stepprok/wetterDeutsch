<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bundesland;
use App\Models\Station;
use App\Models\Data;
use App\Config\ConfigAhoj;

class Main extends BaseController
{
    protected $bundesland;
    protected $station;
    protected $data;
    protected $perPageScroll = 20;

    public function __construct()
    {
        $this->bundesland = new Bundesland();
        $this->station = new Station();
        $this->data = new Data();
    }

    public function index()
    {
        return view('zeme', [
            "zeme" => $this->bundesland->findAll()
        ]);
    }

    public function stanice($id)
    {
        return view('stanice', [
            "zeme" => $this->bundesland->find($id),
            "stanice" => $this->station->where('bundesland', $id)->findAll(),
        ]);
    }

    public function data($idStanice)
    {
        $stanice = $this->station->find($idStanice);

        $dataStanic = $this->data
            ->where('Stations_ID', $idStanice)
            ->orderBy('date', 'desc')
            ->paginate($this->perPageScroll, 'scroll');

        return view('data', [
            "stanice" => $stanice,
            "dataStanic" => $dataStanic,
            "pager" => $this->data->pager,
            "idStanice" => $idStanice
        ]);
    }

    public function dataAjax($idStanice)
    {
        $page = $this->request->getGet('page') ?? 1;

        $dataStanic = $this->data
            ->where('Stations_ID', $idStanice)
            ->orderBy('date', 'desc')
            ->paginate($this->perPageScroll, 'scroll', $page);

        return view('partials/dataRows', [
            "dataStanic" => $dataStanic
        ]);
    }

    public function vse(){
        $stanice = $this->station->join('Bundesland','station.bundesland=bundesland.id','inner')->orderBy('place', 'asc')->findAll();
        $data = [
            "stanice" => $stanice,
        ];
        echo view('vsechnystanice', $data);
    }
}
