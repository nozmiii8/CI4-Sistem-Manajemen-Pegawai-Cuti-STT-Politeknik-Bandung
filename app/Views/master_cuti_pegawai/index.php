<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="card shadow-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Jatah Cuti Pegawai</h5>
        <a href="<?= base_url('cuti-pegawai/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Jatah Cuti Pegawai
        </a>
    </div>
    <div class="card-body">
        <!-- Search -->
        <form method="get" action="<?= base_url('master-cuti-pegawai') ?>" class="mb-3 d-flex">
            <input type="text" name="q" value="<?= esc($keyword) ?>" class="form-control me-2" placeholder="Cari NIP atau nama pegawai...">
            <button type="submit" class="btn btn-outline-secondary">
                <i class="bi bi-search"></i> Cari
            </button>
        </form>

        <!-- Data Table -->
        <div class="card shadow-custom">
            <div class="card-header">
                <h5 class="mb-0">Daftar Jatah Cuti Pegawai</h5>
            </div>
            <div class="card-body p-0">
                <?php if (empty($masterCutiPegawai)): ?>
                    <div class="text-center py-5">
                        <i class="bi bi-person-x text-muted" style="font-size: 3rem;"></i>
                        <h5 class="text-muted mt-3">Tidak ada data jatah cuti pegawai</h5>
                        <p class="text-muted">Belum ada jatah cuti pegawai yang terdaftar dalam sistem</p>
                        <a href="<?= base_url('master-cuti-pegawai/create') ?>" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i>Tambah Jatah Cuti Pegawai Pertama
                        </a>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="border-0">#</th>
                                    <th class="border-0">NIP</th>
                                    <th class="border-0">Nama Pegawai</th>
                                    <th class="border-0">Jatah Cuti</th>
                                    <th class="border-0 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 + (($pager->getCurrentPage() - 1) * $pager->getPerPage()); ?>
                                <?php foreach ($masterCutiPegawai as $jatah): ?>
                                    <tr>
                                        <td class="fw-bold text-muted"><?= $no++ ?></td>
                                        <td><?= esc($jatah['nip']) ?></td>
                                        <td><?= esc($jatah['nama_pegawai']) ?></td>
                                        <td><?= esc($jatah['jatah_cuti']) ?> hari</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('master-cuti-pegawai/' . $jatah['nip'] . '/edit') ?>" class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="<?= base_url('master-cuti-pegawai/' . $jatah['nip'] . '/delete') ?>" method="post" class="d-inline">
                                                    <?= csrf_field() ?>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus jatah cuti pegawai <?= esc($jatah['nama_pegawai']) ?>?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <?php if ($pager->getPageCount() > 1): ?>
                        <div class="card-footer bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted">
                                    Menampilkan <?= count($masterCutiPegawai) ?> dari <?= $pager->getTotal() ?> data
                                </div>
                                <?= $pager->links('master_cuti_pegawai', 'bootstrap_pagination') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-exclamation-triangle text-warning me-2"></i>Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus jatah cuti pegawai <strong id="deleteItemName"></strong>?</p>
                <div class="alert alert-warning">
                    <i class="bi bi-info-circle me-2"></i>
                    Data yang dihapus tidak dapat dikembalikan.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a id="deleteLink" href="#" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(url, name) {
    document.getElementById('deleteItemName').textContent = name;
    document.getElementById('deleteLink').href = url;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
<?= $this->endSection() ?>
