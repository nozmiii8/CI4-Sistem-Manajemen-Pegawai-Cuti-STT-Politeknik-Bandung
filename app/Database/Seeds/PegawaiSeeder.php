<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        // ===================== MASTER PEGAWAI =====================
        $dataPegawai = [
            [
                'nip' => '198001012005011001', 'nama' => 'Budi Santoso', 'alias' => 'Budi',
                'gelar_depan' => 'Drs.', 'gelar_belakang' => 'M.Si', 'jenis_kelamin' => 'L',
                'tgl_lahir' => '1980-01-01', 'no_hp' => '0811111111', 'email' => 'budi@example.com',
                'alamat' => 'Jl. Merdeka No.1 Jakarta', 'rt' => '01', 'rw' => '02',
                'kd_provinsi' => '31', 'kd_kab' => '3171', 'kd_kec' => '317101', 'kd_kel' => '31710101', 'kodepos' => '10110'
            ],
            [
                'nip' => '198505152010011002', 'nama' => 'Siti Aminah', 'alias' => 'Siti',
                'gelar_depan' => '', 'gelar_belakang' => 'S.Pd', 'jenis_kelamin' => 'P',
                'tgl_lahir' => '1985-05-15', 'no_hp' => '0822222222', 'email' => 'siti@example.com',
                'alamat' => 'Jl. Pahlawan No.2 Bandung', 'rt' => '03', 'rw' => '04',
                'kd_provinsi' => '32', 'kd_kab' => '3273', 'kd_kec' => '327301', 'kd_kel' => '32730101', 'kodepos' => '40211'
            ],
            [
                'nip' => '199001202012011003', 'nama' => 'Andi Pratama', 'alias' => 'Andi',
                'gelar_depan' => '', 'gelar_belakang' => 'S.Kom', 'jenis_kelamin' => 'L',
                'tgl_lahir' => '1990-01-20', 'no_hp' => '0833333333', 'email' => 'andi@example.com',
                'alamat' => 'Jl. Asia Afrika No.10 Bandung', 'rt' => '02', 'rw' => '03',
                'kd_provinsi' => '32', 'kd_kab' => '3273', 'kd_kec' => '327302', 'kd_kel' => '32730201', 'kodepos' => '40212'
            ],
            [
                'nip' => '199211112014021004', 'nama' => 'Dewi Lestari', 'alias' => 'Dewi',
                'gelar_depan' => '', 'gelar_belakang' => 'S.E', 'jenis_kelamin' => 'P',
                'tgl_lahir' => '1992-11-11', 'no_hp' => '0844444444', 'email' => 'dewi@example.com',
                'alamat' => 'Jl. Diponegoro No.5 Jakarta', 'rt' => '05', 'rw' => '06',
                'kd_provinsi' => '31', 'kd_kab' => '3172', 'kd_kec' => '317201', 'kd_kel' => '31720101', 'kodepos' => '10220'
            ],
            [
                'nip' => '198703182008031005', 'nama' => 'Rudi Hartono', 'alias' => 'Rudi',
                'gelar_depan' => '', 'gelar_belakang' => 'S.T', 'jenis_kelamin' => 'L',
                'tgl_lahir' => '1987-03-18', 'no_hp' => '0855555555', 'email' => 'rudi@example.com',
                'alamat' => 'Jl. Braga No.15 Bandung', 'rt' => '07', 'rw' => '08',
                'kd_provinsi' => '32', 'kd_kab' => '3273', 'kd_kec' => '327303', 'kd_kel' => '32730301', 'kodepos' => '40213'
            ],
            [
                'nip' => '199512012017041006', 'nama' => 'Fitri Handayani', 'alias' => 'Fitri',
                'gelar_depan' => '', 'gelar_belakang' => 'A.Md', 'jenis_kelamin' => 'P',
                'tgl_lahir' => '1995-12-01', 'no_hp' => '0866666666', 'email' => 'fitri@example.com',
                'alamat' => 'Jl. Cihampelas No.20 Bandung', 'rt' => '09', 'rw' => '10',
                'kd_provinsi' => '32', 'kd_kab' => '3273', 'kd_kec' => '327304', 'kd_kel' => '32730401', 'kodepos' => '40214'
            ],
            [
                'nip' => '198202022006051007', 'nama' => 'Hendra Wijaya', 'alias' => 'Hendra',
                'gelar_depan' => '', 'gelar_belakang' => 'S.Psi', 'jenis_kelamin' => 'L',
                'tgl_lahir' => '1982-02-02', 'no_hp' => '0877777777', 'email' => 'hendra@example.com',
                'alamat' => 'Jl. Sudirman No.7 Jakarta', 'rt' => '11', 'rw' => '12',
                'kd_provinsi' => '31', 'kd_kab' => '3171', 'kd_kec' => '317102', 'kd_kel' => '31710201', 'kodepos' => '10120'
            ],
            [
                'nip' => '199308082015061008', 'nama' => 'Maya Putri', 'alias' => 'Maya',
                'gelar_depan' => '', 'gelar_belakang' => 'S.Hum', 'jenis_kelamin' => 'P',
                'tgl_lahir' => '1993-08-08', 'no_hp' => '0888888888', 'email' => 'maya@example.com',
                'alamat' => 'Jl. Gajah Mada No.9 Jakarta', 'rt' => '13', 'rw' => '14',
                'kd_provinsi' => '31', 'kd_kab' => '3171', 'kd_kec' => '317103', 'kd_kel' => '31710301', 'kodepos' => '10130'
            ],
            [
                'nip' => '199701052018071009', 'nama' => 'Arif Nugroho', 'alias' => 'Arif',
                'gelar_depan' => '', 'gelar_belakang' => 'S.Si', 'jenis_kelamin' => 'L',
                'tgl_lahir' => '1997-01-05', 'no_hp' => '0899999999', 'email' => 'arif@example.com',
                'alamat' => 'Jl. Asia Raya No.11 Bekasi', 'rt' => '15', 'rw' => '16',
                'kd_provinsi' => '32', 'kd_kab' => '3275', 'kd_kec' => '327501', 'kd_kel' => '32750101', 'kodepos' => '17111'
            ],
            [
                'nip' => '198912232011081010', 'nama' => 'Nina Agustina', 'alias' => 'Nina',
                'gelar_depan' => '', 'gelar_belakang' => 'S.Farm', 'jenis_kelamin' => 'P',
                'tgl_lahir' => '1989-12-23', 'no_hp' => '0810000000', 'email' => 'nina@example.com',
                'alamat' => 'Jl. Kuningan No.12 Jakarta', 'rt' => '17', 'rw' => '18',
                'kd_provinsi' => '31', 'kd_kab' => '3175', 'kd_kec' => '317501', 'kd_kel' => '31750101', 'kodepos' => '12910'
            ],
            [
                'nip' => '199304142013091011', 'nama' => 'Doni Saputra', 'alias' => 'Doni',
                'gelar_depan' => '', 'gelar_belakang' => 'S.Kes', 'jenis_kelamin' => 'L',
                'tgl_lahir' => '1993-04-14', 'no_hp' => '0811112222', 'email' => 'doni@example.com',
                'alamat' => 'Jl. Gatot Subroto No.21 Jakarta', 'rt' => '19', 'rw' => '20',
                'kd_provinsi' => '31', 'kd_kab' => '3175', 'kd_kec' => '317502', 'kd_kel' => '31750201', 'kodepos' => '12920'
            ],
            [
                'nip' => '198605062009101012', 'nama' => 'Yuni Kartika', 'alias' => 'Yuni',
                'gelar_depan' => '', 'gelar_belakang' => 'S.M', 'jenis_kelamin' => 'P',
                'tgl_lahir' => '1986-05-06', 'no_hp' => '0812223333', 'email' => 'yuni@example.com',
                'alamat' => 'Jl. Melati No.8 Bogor', 'rt' => '21', 'rw' => '22',
                'kd_provinsi' => '32', 'kd_kab' => '3271', 'kd_kec' => '327101', 'kd_kel' => '32710101', 'kodepos' => '16111'
            ],
            [
                'nip' => '199111202012111013', 'nama' => 'Eka Prasetyo', 'alias' => 'Eka',
                'gelar_depan' => '', 'gelar_belakang' => 'S.Kep', 'jenis_kelamin' => 'L',
                'tgl_lahir' => '1991-11-20', 'no_hp' => '0813334444', 'email' => 'eka@example.com',
                'alamat' => 'Jl. Pandanaran No.15 Semarang', 'rt' => '23', 'rw' => '24',
                'kd_provinsi' => '33', 'kd_kab' => '3374', 'kd_kec' => '337401', 'kd_kel' => '33740101', 'kodepos' => '50133'
            ],
            [
                'nip' => '199405052015121014', 'nama' => 'Lina Marlina', 'alias' => 'Lina',
                'gelar_depan' => '', 'gelar_belakang' => 'S.E', 'jenis_kelamin' => 'P',
                'tgl_lahir' => '1994-05-05', 'no_hp' => '0814445555', 'email' => 'lina@example.com',
                'alamat' => 'Jl. Diponegoro No.7 Semarang', 'rt' => '25', 'rw' => '26',
                'kd_provinsi' => '33', 'kd_kab' => '3374', 'kd_kec' => '337402', 'kd_kel' => '33740201', 'kodepos' => '50134'
            ],
            [
                'nip' => '198812022010011015', 'nama' => 'Tono Setiawan', 'alias' => 'Tono',
                'gelar_depan' => '', 'gelar_belakang' => 'S.Sn', 'jenis_kelamin' => 'L',
                'tgl_lahir' => '1988-12-02', 'no_hp' => '0815556666', 'email' => 'tono@example.com',
                'alamat' => 'Jl. Majapahit No.11 Semarang', 'rt' => '27', 'rw' => '28',
                'kd_provinsi' => '33', 'kd_kab' => '3374', 'kd_kec' => '337403', 'kd_kel' => '33740301', 'kodepos' => '50135'
            ],
            [
                'nip' => '199602162019021016', 'nama' => 'Rina Wulandari', 'alias' => 'Rina',
                'gelar_depan' => '', 'gelar_belakang' => 'S.Tr.Kom', 'jenis_kelamin' => 'P',
                'tgl_lahir' => '1996-02-16', 'no_hp' => '0816667777', 'email' => 'rina@example.com',
                'alamat' => 'Jl. Pandawa No.20 Yogyakarta', 'rt' => '29', 'rw' => '30',
                'kd_provinsi' => '34', 'kd_kab' => '3471', 'kd_kec' => '347101', 'kd_kel' => '34710101', 'kodepos' => '55111'
            ],
        ];

        $this->db->table('master_pegawai')->insertBatch($dataPegawai);

        // ===================== MASTER CUTI =====================
        $dataCuti = [
            ['kode_cuti' => 'CT1', 'keterangan' => 'Cuti Tahunan', 'jatah_per_tahun' => 12, 'menunggu_ct' => 0, 'akumulasi' => 1],
            ['kode_cuti' => 'CT2', 'keterangan' => 'Cuti Sakit',   'jatah_per_tahun' => 0,  'menunggu_ct' => 0, 'akumulasi' => 0],
            ['kode_cuti' => 'CT3', 'keterangan' => 'Cuti Melahirkan', 'jatah_per_tahun' => 90, 'menunggu_ct' => 0, 'akumulasi' => 0],
        ];
        $this->db->table('master_cuti')->insertBatch($dataCuti);

        // ===================== MASTER CUTI PEGAWAI =====================
        $dataCutiPegawai = [];
        foreach ($dataPegawai as $pegawai) {
            $dataCutiPegawai[] = [
                'nip' => $pegawai['nip'],
                'jatah_cuti' => 12
            ];
        }
        $this->db->table('master_cuti_pegawai')->insertBatch($dataCutiPegawai);

        // ===================== SISA CUTI =====================
        $dataSisaCuti = [];
        foreach ($dataPegawai as $pegawai) {
            $dataSisaCuti[] = [
                'nip' => $pegawai['nip'],
                'sisa_tahun_2' => '2022',
                'tahun_1' => 2023,
                'sisa_tahun_1' => rand(0, 3),
                'tahun_berjalan' => 2024,
                'sisa_tahun_berjalan' => rand(5, 12),
                'sisa_cuti' => rand(6, 15),
            ];
        }
        $this->db->table('t_sisa_cuti')->insertBatch($dataSisaCuti);

        // ===================== TRANSAKSI CUTI =====================
        $dataTCuti = [];
        foreach (array_slice($dataPegawai, 0, 5) as $pegawai) { // contoh 5 orang cuti
            $dataTCuti[] = [
                'nip' => $pegawai['nip'],
                'nama' => $pegawai['nama'],
                'mulai_cuti' => '2024-07-01',
                'selesai_cuti' => '2024-07-05',
                'lama_cuti' => 5,
                'jenis_cuti' => 'CT1',
            ];
        }
        $this->db->table('t_cuti_pegawai')->insertBatch($dataTCuti);
    }
}
