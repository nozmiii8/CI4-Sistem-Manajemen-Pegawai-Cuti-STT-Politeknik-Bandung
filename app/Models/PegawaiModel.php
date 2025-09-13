<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'master_pegawai';
    protected $primaryKey = 'nip';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = [
        'nip', 'nama', 'alias', 'gelar_depan', 'gelar_belakang', 'jenis_kelamin',
        'tgl_lahir', 'no_hp', 'email', 'alamat', 'rt', 'rw',
        'kd_provinsi', 'kd_kab', 'kd_kec', 'kd_kel', 'kodepos'
    ];
    protected $validationRules = [
        'nip' => 'required|max_length[18]',
        'nama' => 'required|max_length[50]',
        'alias' => 'max_length[30]',
        'gelar_depan' => 'max_length[20]',
        'gelar_belakang' => 'max_length[20]',
        'jenis_kelamin' => 'required|in_list[L,P]',
        'tgl_lahir' => 'required|valid_date',
        'no_hp' => 'max_length[15]',
        'email' => 'valid_email|max_length[60]',
        'rt' => 'max_length[4]',
        'rw' => 'max_length[4]',
        'kd_provinsi' => 'max_length[30]',
        'kd_kab' => 'max_length[30]',
        'kd_kec' => 'max_length[30]',
        'kd_kel' => 'max_length[30]',
        'kodepos' => 'max_length[6]'
    ];
    protected $validationMessages = [
        'nip' => [
            'required' => 'NIP wajib diisi',
            'max_length' => 'NIP maksimal 18 karakter'
        ],
        'nama' => [
            'required' => 'Nama wajib diisi',
            'max_length' => 'Nama maksimal 50 karakter'
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin wajib dipilih',
            'in_list' => 'Jenis kelamin harus L atau P'
        ],
        'tgl_lahir' => [
            'required' => 'Tanggal lahir wajib diisi',
            'valid_date' => 'Format tanggal lahir tidak valid'
        ],
        'email' => [
            'valid_email' => 'Format email tidak valid',
            'max_length' => 'Email maksimal 60 karakter'
        ]
    ];
}
