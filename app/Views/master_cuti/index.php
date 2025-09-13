<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="card shadow-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Master Cuti</h5>
        <a href="<?= base_url('master-cuti/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Jenis Cuti
        </a>
    </div>
    <div class="card-body">
        <!-- Search -->
        <form method="get" action="<?= base_url('master-cuti') ?>" class="mb-3 d-flex">
            <input type="text" name="q" value="<?= esc($keyword) ?>" class="form-control me-2" placeholder="Cari kode cuti atau keterangan...">
            <button type="submit" class="btn btn-outline-secondary">
                <i class="bi bi-search"></i> Cari
            </button>
        </form>

        <!-- Data Table -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Kode Cuti</th>
                        <th>Keterangan</th>
                        <th>Jatah/Tahun</th>
                        <th>Menunggu CT</th>
                        <th>Akumulasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($masterCuti) === 0): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Data tidak ditemukan</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($masterCuti as $cuti): ?>
                        <tr>
                            <td><?= esc($cuti['kode_cuti']) ?></td>
                            <td><?= esc($cuti['keterangan']) ?></td>
                            <td><?= esc($cuti['jatah_per_tahun']) ?> hari</td>
                            <td><?= $cuti['menunggu_ct'] ? 'Ya' : 'Tidak' ?></td>
                            <td><?= $cuti['akumulasi'] ? 'Ya' : 'Tidak' ?></td>
                            <td>
                                <a href="<?= base_url('master-cuti/' . $cuti['kode_cuti'] . '/edit') ?>" class="btn btn-sm btn-primary me-1" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?= base_url('master-cuti/' . $cuti['kode_cuti'] . '/delete') ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jenis cuti ini?');">
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

        <?= $pager->links('master_cuti', 'bootstrap_pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>
