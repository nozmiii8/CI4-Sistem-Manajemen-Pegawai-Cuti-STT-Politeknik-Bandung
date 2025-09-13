<?php

namespace App\Controllers;

use App\Models\CutiPegawaiModel;
use App\Models\PegawaiModel;
use App\Models\MasterCutiModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Exceptions\PageNotFoundException;

class CutiPegawai extends BaseController
{
    protected $cutiPegawaiModel;
    protected $pegawaiModel;
    protected $masterCutiModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->cutiPegawaiModel = new CutiPegawaiModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->masterCutiModel = new MasterCutiModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');
        $perPage = 10;

        $builder = $this->cutiPegawaiModel
            ->select('t_cuti_pegawai.*, master_pegawai.nama as nama_pegawai, master_cuti.keterangan as keterangan_cuti')
            ->join('master_pegawai', 'master_pegawai.nip = t_cuti_pegawai.nip', 'left')
            ->join('master_cuti', 'master_cuti.kode_cuti = t_cuti_pegawai.jenis_cuti', 'left');

        if ($keyword) {
            $builder->groupStart()
                ->like('t_cuti_pegawai.nip', $keyword)
                ->orLike('t_cuti_pegawai.nama', $keyword)
                ->orLike('master_pegawai.nama', $keyword)
                ->orLike('master_cuti.keterangan', $keyword)
                ->groupEnd();
        }

        $cutiPegawai = $builder->paginate($perPage, 'cuti_pegawai');

        $data = [
            'title' => 'Data Cuti Pegawai',
            'cutiPegawai' => $cutiPegawai,
            'pager' => $this->cutiPegawaiModel->pager,
            'keyword' => $keyword
        ];

        return view('cuti_pegawai/index', $data);
    }

    public function create()
    {
        $pegawai = $this->pegawaiModel->findAll();
        $masterCuti = $this->masterCutiModel->findAll();

        $data = [
            'title' => 'Tambah Cuti Pegawai',
            'pegawai' => $pegawai,
            'masterCuti' => $masterCuti
        ];

        return view('cuti_pegawai/create', $data);
    }

    public function store()
    {
        if (!$this->validate($this->cutiPegawaiModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $postData = $this->request->getPost();
            
            // Hitung lama cuti
            $mulai = new Time($postData['mulai_cuti']);
            $selesai = new Time($postData['selesai_cuti']);
            $lamaCuti = $selesai->difference($mulai)->getDays() + 1;
            
            $postData['lama_cuti'] = $lamaCuti;

            $this->cutiPegawaiModel->save($postData);
            return redirect()->to('/cuti-pegawai')->with('success', 'Data cuti pegawai berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data cuti pegawai: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $cutiPegawai = $this->cutiPegawaiModel->find($id);
        
        if (!$cutiPegawai) {
            throw new PageNotFoundException("Cuti pegawai dengan ID $id tidak ditemukan");
        }

        $pegawai = $this->pegawaiModel->findAll();
        $masterCuti = $this->masterCutiModel->findAll();

        $data = [
            'title' => 'Edit Cuti Pegawai',
            'cutiPegawai' => $cutiPegawai,
            'pegawai' => $pegawai,
            'masterCuti' => $masterCuti
        ];

        return view('cuti_pegawai/edit', $data);
    }

    public function update($id)
    {
        $cutiPegawai = $this->cutiPegawaiModel->find($id);
        
        if (!$cutiPegawai) {
            throw new PageNotFoundException("Cuti pegawai dengan ID $id tidak ditemukan");
        }

        if (!$this->validate($this->cutiPegawaiModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $postData = $this->request->getPost();
            
            // Hitung lama cuti
            $mulai = new Time($postData['mulai_cuti']);
            $selesai = new Time($postData['selesai_cuti']);
            $lamaCuti = $selesai->difference($mulai)->getDays() + 1;
            
            $postData['lama_cuti'] = $lamaCuti;

            $this->cutiPegawaiModel->update($id, $postData);
            return redirect()->to('/cuti-pegawai')->with('success', 'Data cuti pegawai berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data cuti pegawai: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $cutiPegawai = $this->cutiPegawaiModel->find($id);
        
        if (!$cutiPegawai) {
            throw new PageNotFoundException("Cuti pegawai dengan ID $id tidak ditemukan");
        }

        try {
            $this->cutiPegawaiModel->delete($id);
            return redirect()->to('/cuti-pegawai')->with('success', 'Data cuti pegawai berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->to('/cuti-pegawai')->with('error', 'Gagal menghapus data cuti pegawai: ' . $e->getMessage());
        }
    }
}
