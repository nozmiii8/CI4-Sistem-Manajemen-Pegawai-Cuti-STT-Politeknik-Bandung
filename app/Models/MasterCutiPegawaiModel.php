<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterCutiPegawaiModel extends Model
{
    protected $table = 'master_cuti_pegawai';
    protected $primaryKey = 'nip';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = [
        'nip', 'jatah_cuti'
    ];
    protected $validationRules = [
        'nip' => 'required|max_length[18]',
        'jatah_cuti' => 'required|integer'
    ];
    protected $validationMessages = [
        'nip' => [
            'required' => 'NIP wajib diisi',
            'max_length' => 'NIP maksimal 18 karakter'
        ],
        'jatah_cuti' => [
            'required' => 'Jatah cuti wajib diisi',
            'integer' => 'Jatah cuti harus berupa angka'
        ]
    ];
}
