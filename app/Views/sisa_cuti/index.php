<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="card shadow-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-calendar-check me-2"></i> Sisa Cuti Pegawai</h5>
        <a href="<?= base_url('sisa-cuti/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Sisa Cuti
        </a>
    </div>
    <div class="card-body">
        <!-- Search -->
        <form method="get" action="<?= base_url('sisa-cuti') ?>" class="mb-3 d-flex">
            <input type="text" name="q" value="<?= esc($keyword) ?>" class="form-control me-2" placeholder="Cari NIP atau nama pegawai...">
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
                        <th>Tahun 1</th>
                        <th>Sisa Tahun 1</th>
                        <th>Tahun Berjalan</th>
                        <th>Sisa Berjalan</th>
                        <th>Total Sisa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($sisaCuti) === 0): ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">Data tidak ditemukan</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($sisaCuti as $sisa): ?>
                        <tr>
                            <td><?= esc($sisa['nip']) ?></td>
                            <td><?= esc($sisa['nama_pegawai']) ?></td>
                            <td><?= $sisa['tahun_1'] ?: '<span class="text-muted">-</span>' ?></td>
                            <td>
                                <?= $sisa['sisa_tahun_1'] ? '<span class="badge bg-info">'.esc($sisa['sisa_tahun_1']).' hari</span>' : '<span class="text-muted">-</span>' ?>
                            </td>
                            <td><?= $sisa['tahun_berjalan'] ?: '<span class="text-muted">-</span>' ?></td>
                            <td>
                                <?= $sisa['sisa_tahun_berjalan'] ? '<span class="badge bg-success">'.esc($sisa['sisa_tahun_berjalan']).' hari</span>' : '<span class="text-muted">-</span>' ?>
                            </td>
                            <td>
                                <?= $sisa['sisa_cuti'] ? '<span class="badge bg-primary">'.esc($sisa['sisa_cuti']).' hari</span>' : '<span class="text-muted">-</span>' ?>
                            </td>
                            <td>
                                <a href="<?= base_url('sisa-cuti/' . $sisa['id'] . '/edit') ?>" class="btn btn-sm btn-primary me-1" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?= base_url('sisa-cuti/' . $sisa['id'] . '/delete') ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data sisa cuti <?= esc($sisa['nama_pegawai']) ?>?');">
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
        <?= $pager->links('sisa_cuti', 'bootstrap_pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>
