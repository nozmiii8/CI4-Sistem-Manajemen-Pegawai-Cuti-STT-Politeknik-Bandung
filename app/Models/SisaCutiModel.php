<?php

namespace App\Models;

use CodeIgniter\Model;

class SisaCutiModel extends Model
{
    protected $table = 't_sisa_cuti';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'nip', 'sisa_tahun_2', 'tahun_1', 'sisa_tahun_1', 
        'tahun_berjalan', 'sisa_tahun_berjalan', 'sisa_cuti'
    ];
    protected $validationRules = [
        'nip' => 'required|max_length[18]',
        'sisa_tahun_2' => 'max_length[4]',
        'tahun_1' => 'integer',
        'sisa_tahun_1' => 'max_length[4]',
        'tahun_berjalan' => 'integer',
        'sisa_tahun_berjalan' => 'integer',
        'sisa_cuti' => 'integer'
    ];
    protected $validationMessages = [
        'nip' => [
            'required' => 'NIP wajib diisi',
            'max_length' => 'NIP maksimal 18 karakter'
        ],
        'sisa_tahun_2' => [
            'max_length' => 'Sisa tahun 2 maksimal 4 karakter'
        ],
        'tahun_1' => [
            'integer' => 'Tahun 1 harus berupa angka'
        ],
        'sisa_tahun_1' => [
            'max_length' => 'Sisa tahun 1 maksimal 4 karakter'
        ],
        'tahun_berjalan' => [
            'integer' => 'Tahun berjalan harus berupa angka'
        ],
        'sisa_tahun_berjalan' => [
            'integer' => 'Sisa tahun berjalan harus berupa angka'
        ],
        'sisa_cuti' => [
            'integer' => 'Sisa cuti harus berupa angka'
        ]
    ];
}
