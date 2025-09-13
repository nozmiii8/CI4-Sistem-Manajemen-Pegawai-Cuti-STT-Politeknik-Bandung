<?php

namespace App\Controllers;

use App\Models\MasterCutiModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class MasterCuti extends BaseController
{
    protected $masterCutiModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->masterCutiModel = new MasterCutiModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');
        $perPage = 10;

        if ($keyword) {
            $masterCuti = $this->masterCutiModel
                ->like('kode_cuti', $keyword)
                ->orLike('keterangan', $keyword)
                ->paginate($perPage, 'master_cuti');
        } else {
            $masterCuti = $this->masterCutiModel->paginate($perPage, 'master_cuti');
        }

        $data = [
            'title' => 'Master Jenis Cuti',
            'masterCuti' => $masterCuti,
            'pager' => $this->masterCutiModel->pager,
            'keyword' => $keyword
        ];

        return view('master_cuti/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Jenis Cuti'
        ];

        return view('master_cuti/create', $data);
    }

    public function store()
    {
        if (!$this->validate($this->masterCutiModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $this->masterCutiModel->save($this->request->getPost());
            return redirect()->to('/master-cuti')->with('success', 'Data jenis cuti berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data jenis cuti: ' . $e->getMessage());
        }
    }

    public function edit($kode_cuti)
    {
        $masterCuti = $this->masterCutiModel->find($kode_cuti);
        
        if (!$masterCuti) {
            throw new PageNotFoundException("Jenis cuti dengan kode $kode_cuti tidak ditemukan");
        }

        $data = [
            'title' => 'Edit Jenis Cuti',
            'masterCuti' => $masterCuti
        ];

        return view('master_cuti/edit', $data);
    }

    public function update($kode_cuti)
    {
        $masterCuti = $this->masterCutiModel->find($kode_cuti);
        
        if (!$masterCuti) {
            throw new PageNotFoundException("Jenis cuti dengan kode $kode_cuti tidak ditemukan");
        }

        if (!$this->validate($this->masterCutiModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $this->masterCutiModel->update($kode_cuti, $this->request->getPost());
            return redirect()->to('/master-cuti')->with('success', 'Data jenis cuti berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data jenis cuti: ' . $e->getMessage());
        }
    }

    public function delete($kode_cuti)
    {
        $masterCuti = $this->masterCutiModel->find($kode_cuti);
        
        if (!$masterCuti) {
            throw new PageNotFoundException("Jenis cuti dengan kode $kode_cuti tidak ditemukan");
        }

        try {
            $this->masterCutiModel->delete($kode_cuti);
            return redirect()->to('/master-cuti')->with('success', 'Data jenis cuti berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->to('/master-cuti')->with('error', 'Gagal menghapus data jenis cuti: ' . $e->getMessage());
        }
    }
}
