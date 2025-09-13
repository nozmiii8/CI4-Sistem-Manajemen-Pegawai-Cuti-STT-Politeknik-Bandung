<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\MasterCutiModel;
use App\Models\CutiPegawaiModel;
use App\Models\MasterCutiPegawaiModel;
use App\Models\SisaCutiModel;

class Dashboard extends BaseController
{
    protected $pegawaiModel;
    protected $masterCutiModel;
    protected $cutiPegawaiModel;
    protected $masterCutiPegawaiModel;
    protected $sisaCutiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
        $this->masterCutiModel = new MasterCutiModel();
        $this->cutiPegawaiModel = new CutiPegawaiModel();
        $this->masterCutiPegawaiModel = new MasterCutiPegawaiModel();
        $this->sisaCutiModel = new SisaCutiModel();
    }

    public function index()
    {
        // Get counts from all models
        $data = [
            'title' => 'Dashboard',
            'pegawaiCount' => $this->pegawaiModel->countAll(),
            'masterCutiCount' => $this->masterCutiModel->countAll(),
            'cutiPegawaiCount' => $this->cutiPegawaiModel->countAll(),
            'masterCutiPegawaiCount' => $this->masterCutiPegawaiModel->countAll(),
            'sisaCutiCount' => $this->sisaCutiModel->countAll(),
        ];

        return view('dashboard/index', $data);
    }
}
