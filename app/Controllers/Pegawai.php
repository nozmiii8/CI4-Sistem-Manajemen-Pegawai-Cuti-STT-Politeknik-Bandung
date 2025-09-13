<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pegawai extends BaseController
{
    protected $pegawaiModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');
        $perPage = 10;

        if ($keyword) {
            $pegawai = $this->pegawaiModel
                ->like('nip', $keyword)
                ->orLike('nama', $keyword)
                ->orLike('email', $keyword)
                ->paginate($perPage, 'pegawai');
        } else {
            $pegawai = $this->pegawaiModel->paginate($perPage, 'pegawai');
        }

        $data = [
            'title' => 'Data Pegawai',
            'pegawai' => $pegawai,
            'pager' => $this->pegawaiModel->pager,
            'keyword' => $keyword
        ];

        return view('pegawai/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pegawai'
        ];

        return view('pegawai/create', $data);
    }

    public function show($nip)
    {
        $pegawai = $this->pegawaiModel->find($nip);

        if (!$pegawai) {
            throw new PageNotFoundException("Pegawai dengan NIP $nip tidak ditemukan");
        }

        $data = [
            'title' => 'Detail Pegawai',
            'pegawai' => $pegawai
        ];

        return view('pegawai/show', $data);
    }

    public function store()
    {
        if (!$this->validate($this->pegawaiModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $this->pegawaiModel->save($this->request->getPost());
            return redirect()->to('/pegawai')->with('success', 'Data pegawai berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data pegawai: ' . $e->getMessage());
        }
    }

    public function edit($nip)
    {
        log_message('debug', "Pegawai::edit called with NIP: $nip");
        $pegawai = $this->pegawaiModel->find($nip);

        if (!$pegawai) {
            log_message('error', "Pegawai with NIP $nip not found");
            throw new PageNotFoundException("Pegawai dengan NIP $nip tidak ditemukan");
        }

        $data = [
            'title' => 'Edit Pegawai',
            'pegawai' => $pegawai
        ];

        return view('pegawai/edit', $data);
    }

    public function update($nip)
    {
        $pegawai = $this->pegawaiModel->find($nip);

        if (!$pegawai) {
            throw new PageNotFoundException("Pegawai dengan NIP $nip tidak ditemukan");
        }

        if (!$this->validate($this->pegawaiModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $this->pegawaiModel->update($nip, $this->request->getPost());
            return redirect()->to('/pegawai')->with('success', 'Data pegawai berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data pegawai: ' . $e->getMessage());
        }
    }

    public function delete($nip)
    {
        $pegawai = $this->pegawaiModel->find($nip);

        if (!$pegawai) {
            throw new PageNotFoundException("Pegawai dengan NIP $nip tidak ditemukan");
        }

        try {
            $this->pegawaiModel->delete($nip);
            return redirect()->to('/pegawai')->with('success', 'Data pegawai berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menghapus data pegawai: ' . $e->getMessage());
        }
    }
}
