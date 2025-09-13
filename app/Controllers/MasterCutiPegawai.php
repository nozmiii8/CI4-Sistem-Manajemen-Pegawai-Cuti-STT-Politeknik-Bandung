<?php

namespace App\Controllers;

use App\Models\MasterCutiPegawaiModel;
use App\Models\PegawaiModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class MasterCutiPegawai extends BaseController
{
    protected $masterCutiPegawaiModel;
    protected $pegawaiModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->masterCutiPegawaiModel = new MasterCutiPegawaiModel();
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');
        $perPage = 10;

        $builder = $this->masterCutiPegawaiModel
            ->select('master_cuti_pegawai.*, master_pegawai.nama as nama_pegawai')
            ->join('master_pegawai', 'master_pegawai.nip = master_cuti_pegawai.nip', 'left');

        if ($keyword) {
            $builder->groupStart()
                ->like('master_cuti_pegawai.nip', $keyword)
                ->orLike('master_pegawai.nama', $keyword)
                ->groupEnd();
        }

        $masterCutiPegawai = $builder->paginate($perPage, 'master_cuti_pegawai');

        $data = [
            'title' => 'Jatah Cuti Pegawai',
            'masterCutiPegawai' => $masterCutiPegawai,
            'pager' => $this->masterCutiPegawaiModel->pager,
            'keyword' => $keyword
        ];

        return view('master_cuti_pegawai/index', $data);
    }

    public function create()
    {
        $pegawai = $this->pegawaiModel->findAll();

        $data = [
            'title' => 'Tambah Jatah Cuti Pegawai',
            'pegawai' => $pegawai
        ];

        return view('master_cuti_pegawai/create', $data);
    }

    public function store()
    {
        if (!$this->validate($this->masterCutiPegawaiModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $this->masterCutiPegawaiModel->save($this->request->getPost());
            return redirect()->to('/master-cuti-pegawai')->with('success', 'Data jatah cuti pegawai berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data jatah cuti pegawai: ' . $e->getMessage());
        }
    }

    public function edit($nip)
    {
        $masterCutiPegawai = $this->masterCutiPegawaiModel->find($nip);
        
        if (!$masterCutiPegawai) {
            throw new PageNotFoundException("Jatah cuti pegawai dengan NIP $nip tidak ditemukan");
        }

        $pegawai = $this->pegawaiModel->findAll();

        $data = [
            'title' => 'Edit Jatah Cuti Pegawai',
            'masterCutiPegawai' => $masterCutiPegawai,
            'pegawai' => $pegawai
        ];

        return view('master_cuti_pegawai/edit', $data);
    }

    public function update($nip)
    {
        $masterCutiPegawai = $this->masterCutiPegawaiModel->find($nip);
        
        if (!$masterCutiPegawai) {
            throw new PageNotFoundException("Jatah cuti pegawai dengan NIP $nip tidak ditemukan");
        }

        if (!$this->validate($this->masterCutiPegawaiModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $this->masterCutiPegawaiModel->update($nip, $this->request->getPost());
            return redirect()->to('/master-cuti-pegawai')->with('success', 'Data jatah cuti pegawai berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data jatah cuti pegawai: ' . $e->getMessage());
        }
    }

    public function delete($nip)
    {
        $masterCutiPegawai = $this->masterCutiPegawaiModel->find($nip);
        
        if (!$masterCutiPegawai) {
            throw new PageNotFoundException("Jatah cuti pegawai dengan NIP $nip tidak ditemukan");
        }

        try {
            $this->masterCutiPegawaiModel->delete($nip);
            return redirect()->to('/master-cuti-pegawai')->with('success', 'Data jatah cuti pegawai berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->to('/master-cuti-pegawai')->with('error', 'Gagal menghapus data jatah cuti pegawai: ' . $e->getMessage());
        }
    }
}
