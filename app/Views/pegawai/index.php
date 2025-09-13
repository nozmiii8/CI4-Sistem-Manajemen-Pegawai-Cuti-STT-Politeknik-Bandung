<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="card shadow-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Pegawai</h5>
        <a href="<?= base_url('pegawai/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Pegawai
        </a>
    </div>
    <div class="card-body">
        <form method="get" action="<?= base_url('pegawai') ?>" class="mb-3 d-flex">
            <input type="text" name="q" value="<?= esc($keyword) ?>" class="form-control me-2" placeholder="Cari NIP, Nama, Email...">
            <button type="submit" class="btn btn-outline-secondary">
                <i class="bi bi-search"></i> Cari
            </button>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($pegawai) === 0): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">Data tidak ditemukan</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($pegawai as $p): ?>
                    <tr>
                        <td><?= esc($p['nip']) ?></td>
                        <td><?= esc($p['nama']) ?></td>
                        <td><?= esc($p['email']) ?></td>
                        <td><?= esc($p['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan') ?></td>
                        <td><?= esc(date('d-m-Y', strtotime($p['tgl_lahir']))) ?></td>
                        <td>
                            <a href="<?= base_url('pegawai/show/' . $p['nip']) ?>" class="btn btn-sm btn-info me-1" title="Lihat Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="<?= base_url('pegawai/edit/' . $p['nip']) ?>" class="btn btn-sm btn-primary me-1" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="<?= base_url('pegawai/delete/' . $p['nip']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data pegawai ini?');">
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

        <?= $pager->links('pegawai', 'bootstrap_pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>
