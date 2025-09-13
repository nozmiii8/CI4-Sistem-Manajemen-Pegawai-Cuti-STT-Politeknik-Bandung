<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="card shadow-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Cuti Pegawai</h5>
        <a href="<?= base_url('cuti-pegawai/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Cuti Pegawai
        </a>
    </div>
    <div class="card-body">
        <!-- Search -->
        <form method="get" action="<?= base_url('cuti-pegawai') ?>" class="mb-3 d-flex">
            <input type="text" name="q" value="<?= esc($keyword) ?>" class="form-control me-2" placeholder="Cari NIP, nama pegawai, atau jenis cuti...">
            <button type="submit" class="btn btn-outline-secondary">
                <i class="bi bi-search"></i> Cari
            </button>
        </form>

        <!-- Data Table -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Cuti</th>
                        <th>Mulai Cuti</th>
                        <th>Selesai Cuti</th>
                        <th>Lama Cuti</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($cutiPegawai) === 0): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">Data tidak ditemukan</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($cutiPegawai as $cuti): ?>
                        <tr>
                            <td><?= esc($cuti['nip']) ?></td>
                            <td><?= esc($cuti['nama_pegawai']) ?></td>
                            <td><?= esc($cuti['keterangan_cuti']) ?></td>
                            <td><?= date('d-m-Y', strtotime($cuti['mulai_cuti'])) ?></td>
                            <td><?= date('d-m-Y', strtotime($cuti['selesai_cuti'])) ?></td>
                            <td><?= esc($cuti['lama_cuti']) ?> hari</td>
                            <td>
                                <a href="<?= base_url('cuti-pegawai/' . $cuti['id'] . '/edit') ?>" class="btn btn-sm btn-primary me-1" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?= base_url('cuti-pegawai/' . $cuti['id'] . '/delete') ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus cuti pegawai ini?');">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?= $pager->links('cuti_pegawai', 'bootstrap_pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>
