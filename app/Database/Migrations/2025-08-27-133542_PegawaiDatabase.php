<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PegawaiDatabase extends Migration
{
    public function up()
    {
        // master_pegawai
        if (!$this->db->tableExists('master_pegawai')) {
            $this->forge->addField([
                'nip'            => ['type' => 'VARCHAR', 'constraint' => 18],
                'nama'           => ['type' => 'VARCHAR', 'constraint' => 50],
                'alias'          => ['type' => 'VARCHAR', 'constraint' => 30],
                'gelar_depan'    => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
                'gelar_belakang' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
                'jenis_kelamin'  => ['type' => 'VARCHAR', 'constraint' => 1],
                'tgl_lahir'      => ['type' => 'DATE'],
                'no_hp'          => ['type' => 'VARCHAR', 'constraint' => 15],
                'email'          => ['type' => 'VARCHAR', 'constraint' => 60],
                'alamat'         => ['type' => 'TEXT', 'null' => true],
                'rt'             => ['type' => 'VARCHAR', 'constraint' => 4],
                'rw'             => ['type' => 'VARCHAR', 'constraint' => 4],
                'kd_provinsi'    => ['type' => 'VARCHAR', 'constraint' => 30],
                'kd_kab'         => ['type' => 'VARCHAR', 'constraint' => 30],
                'kd_kec'         => ['type' => 'VARCHAR', 'constraint' => 30],
                'kd_kel'         => ['type' => 'VARCHAR', 'constraint' => 30],
                'kodepos'        => ['type' => 'VARCHAR', 'constraint' => 6],
            ]);
            $this->forge->addKey('nip', true);
            $this->forge->createTable('master_pegawai', true, ['ENGINE' => 'InnoDB']);
        }

        // master_cuti
        if (!$this->db->tableExists('master_cuti')) {
            $this->forge->addField([
                'kode_cuti'       => ['type' => 'VARCHAR', 'constraint' => 3],
                'keterangan'      => ['type' => 'VARCHAR', 'constraint' => 100],
                'jatah_per_tahun' => ['type' => 'INT'],
                'menunggu_ct'     => ['type' => 'TINYINT'],
                'akumulasi'       => ['type' => 'TINYINT'],
            ]);
            $this->forge->addKey('kode_cuti', true);
            $this->forge->createTable('master_cuti', true, ['ENGINE' => 'InnoDB']);
        }

        // master_cuti_pegawai
        if (!$this->db->tableExists('master_cuti_pegawai')) {
            $this->forge->addField([
                'nip'        => ['type' => 'VARCHAR', 'constraint' => 18],
                'jatah_cuti' => ['type' => 'INT'],
            ]);
            $this->forge->addKey('nip', true);
            $this->forge->addForeignKey('nip', 'master_pegawai', 'nip', 'CASCADE', 'CASCADE');
            $this->forge->createTable('master_cuti_pegawai', true, ['ENGINE' => 'InnoDB']);
        }

        // t_cuti_pegawai
        if (!$this->db->tableExists('t_cuti_pegawai')) {
            $this->forge->addField([
                'id'           => ['type' => 'BIGINT', 'auto_increment' => true],
                'nip'          => ['type' => 'VARCHAR', 'constraint' => 18],
                'mulai_cuti'   => ['type' => 'DATE'],
                'selesai_cuti' => ['type' => 'DATE'],
                'lama_cuti'    => ['type' => 'INT'],
                'jenis_cuti'   => ['type' => 'VARCHAR', 'constraint' => 3],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('nip', 'master_pegawai', 'nip', 'CASCADE', 'CASCADE');
            $this->forge->addForeignKey('jenis_cuti', 'master_cuti', 'kode_cuti', 'CASCADE', 'CASCADE');
            $this->forge->createTable('t_cuti_pegawai', true, ['ENGINE' => 'InnoDB']);
        }

        // t_sisa_cuti
        if (!$this->db->tableExists('t_sisa_cuti')) {
            $this->forge->addField([
                'id'                  => ['type' => 'BIGINT', 'auto_increment' => true],
                'nip'                 => ['type' => 'VARCHAR', 'constraint' => 18],
                'sisa_tahun_2'        => ['type' => 'VARCHAR', 'constraint' => 4],
                'tahun_1'             => ['type' => 'INT'],
                'sisa_tahun_1'        => ['type' => 'VARCHAR', 'constraint' => 4],
                'tahun_berjalan'      => ['type' => 'INT'],
                'sisa_tahun_berjalan' => ['type' => 'INT'],
                'sisa_cuti'           => ['type' => 'INT'],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('nip', 'master_pegawai', 'nip', 'CASCADE', 'CASCADE');
            $this->forge->createTable('t_sisa_cuti', true, ['ENGINE' => 'InnoDB']);
        }
    }

    public function down()
    {
        // urutannya penting, drop child dulu
        $this->forge->dropTable('t_sisa_cuti', true);
        $this->forge->dropTable('t_cuti_pegawai', true);
        $this->forge->dropTable('master_cuti_pegawai', true);
        $this->forge->dropTable('master_cuti', true);
        $this->forge->dropTable('master_pegawai', true);
    }
}
