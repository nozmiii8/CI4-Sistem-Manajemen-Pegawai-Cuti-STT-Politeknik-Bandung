<?php

namespace App\Models;

use CodeIgniter\Model;

class CutiPegawaiModel extends Model
{
    protected $table = 't_cuti_pegawai';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'nip', 'nama', 'mulai_cuti', 'selesai_cuti', 'lama_cuti', 'jenis_cuti'
    ];
    protected $validationRules = [
        'nip' => 'required|max_length[18]',
        'nama' => 'required|max_length[50]',
        'mulai_cuti' => 'required|valid_date',
        'selesai_cuti' => 'required|valid_date',
        'jenis_cuti' => 'required|max_length[3]'
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
        'mulai_cuti' => [
            'required' => 'Tanggal mulai cuti wajib diisi',
            'valid_date' => 'Format tanggal mulai cuti tidak valid'
        ],
        'selesai_cuti' => [
            'required' => 'Tanggal selesai cuti wajib diisi',
            'valid_date' => 'Format tanggal selesai cuti tidak valid'
        ],
        'jenis_cuti' => [
            'required' => 'Jenis cuti wajib dipilih',
            'max_length' => 'Jenis cuti maksimal 3 karakter'
        ]
    ];
}
