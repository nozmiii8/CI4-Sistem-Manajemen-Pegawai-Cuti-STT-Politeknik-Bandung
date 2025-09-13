<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterCutiModel extends Model
{
    protected $table = 'master_cuti';
    protected $primaryKey = 'kode_cuti';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = [
        'kode_cuti', 'keterangan', 'jatah_per_tahun', 'menunggu_ct', 'akumulasi'
    ];
    protected $validationRules = [
        'kode_cuti' => 'required|max_length[3]',
        'keterangan' => 'required|max_length[100]',
        'jatah_per_tahun' => 'required|integer',
        'menunggu_ct' => 'required|in_list[0,1]',
        'akumulasi' => 'required|in_list[0,1]'
    ];
    protected $validationMessages = [
        'kode_cuti' => [
            'required' => 'Kode cuti wajib diisi',
            'max_length' => 'Kode cuti maksimal 3 karakter'
        ],
        'keterangan' => [
            'required' => 'Keterangan wajib diisi',
            'max_length' => 'Keterangan maksimal 100 karakter'
        ],
        'jatah_per_tahun' => [
            'required' => 'Jatah per tahun wajib diisi',
            'integer' => 'Jatah per tahun harus berupa angka'
        ],
        'menunggu_ct' => [
            'required' => 'Status menunggu CT wajib dipilih',
            'in_list' => 'Status menunggu CT harus 0 atau 1'
        ],
        'akumulasi' => [
            'required' => 'Status akumulasi wajib dipilih',
            'in_list' => 'Status akumulasi harus 0 atau 1'
        ]
    ];
}
