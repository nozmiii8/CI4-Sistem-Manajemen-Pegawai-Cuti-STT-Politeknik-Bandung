<?php

namespace App\Controllers;

use App\Models\SisaCutiModel;
use App\Models\PegawaiModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class SisaCuti extends BaseController
{
    protected $sisaCutiModel;
    protected $pegawaiModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->sisaCutiModel = new SisaCutiModel();
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');
        $perPage = 10;

        $builder = $this->sisaCutiModel
            ->select('t_sisa_cuti.*, master_pegawai.nama as nama_pegawai')
            ->join('master_pegawai', 'master_pegawai.nip = t_sisa_cuti.nip', 'left');

        if ($keyword) {
            $builder->groupStart()
                ->like('t_sisa_cuti.nip', $keyword)
                ->orLike('master_pegawai.nama', $keyword)
                ->groupEnd();
        }

        $sisaCuti = $builder->paginate($perPage, 'sisa_cuti');

        $data = [
            'title' => 'Sisa Cuti Pegawai',
            'sisaCuti' => $sisaCuti,
            'pager' => $this->sisaCutiModel->pager,
            'keyword' => $keyword
        ];

        return view('sisa_cuti/index', $data);
    }

    public function create()
    {
        $pegawai = $this->pegawaiModel->findAll();

        $data = [
            'title' => 'Tambah Sisa Cuti Pegawai',
            'pegawai' => $pegawai
        ];

        return view('sisa_cuti/create', $data);
    }

    public function store()
    {
        if (!$this->validate($this->sisaCutiModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $this->sisaCutiModel->save($this->request->getPost());
            return redirect()->to('/sisa-cuti')->with('success', 'Data sisa cuti berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data sisa cuti: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $sisaCuti = $this->sisaCutiModel->find($id);
        
        if (!$sisaCuti) {
            throw new PageNotFoundException("Sisa cuti dengan ID $id tidak ditemukan");
        }

        $pegawai = $this->pegawaiModel->findAll();

        $data = [
            'title' => 'Edit Sisa Cuti Pegawai',
            'sisaCuti' => $sisaCuti,
            'pegawai' => $pegawai
        ];

        return view('sisa_cuti/edit', $data);
    }

    public function update($id)
    {
        $sisaCuti = $this->sisaCutiModel->find($id);
        
        if (!$sisaCuti) {
            throw new PageNotFoundException("Sisa cuti dengan ID $id tidak ditemukan");
        }

        if (!$this->validate($this->sisaCutiModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $this->sisaCutiModel->update($id, $this->request->getPost());
            return redirect()->to('/sisa-cuti')->with('success', 'Data sisa cuti berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data sisa cuti: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $sisaCuti = $this->sisaCutiModel->find($id);
        
        if (!$sisaCuti) {
            throw new PageNotFoundException("Sisa cuti dengan ID $id tidak ditemukan");
        }

        try {
            $this->sisaCutiModel->delete($id);
            return redirect()->to('/sisa-cuti')->with('success', 'Data sisa cuti berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->to('/sisa-cuti')->with('error', 'Gagal menghapus data sisa cuti: ' . $e->getMessage());
        }
    }
}
