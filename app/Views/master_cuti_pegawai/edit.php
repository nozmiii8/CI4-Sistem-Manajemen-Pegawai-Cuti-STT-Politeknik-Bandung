<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-custom">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Edit Jatah Cuti Pegawai</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('master-cuti-pegawai/' . $masterCutiPegawai['nip']) ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- NIP (Read-only) -->
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-light" id="nip" name="nip" value="<?= esc($masterCutiPegawai['nip']) ?>" readonly>
                        <div class="form-text">NIP tidak dapat diubah</div>
                    </div>

                    <!-- Nama Pegawai (Read-only) -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pegawai</label>
                        <input type="text" class="form-control bg-light" id="nama" name="nama" value="<?= esc($masterCutiPegawai['nama_pegawai'] ?? '') ?>" readonly>
                        <div class="form-text">Nama pegawai berdasarkan data master pegawai</div>
                    </div>

                    <!-- Jatah Cuti -->
                    <div class="mb-4">
                        <label for="jatah_cuti" class="form-label">Jatah Cuti <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="number" class="form-control <?= (session('errors.jatah_cuti')) ? 'is-invalid' : '' ?>" id="jatah_cuti" name="jatah_cuti" value="<?= esc($masterCutiPegawai['jatah_cuti']) ?>" min="0" required>
                            <span class="input-group-text">hari per tahun</span>
                        </div>
                        <div class="form-text">Masukkan jumlah hari cuti yang dapat diambil pegawai per tahun</div>
                        <?php if (session('errors.jatah_cuti')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.jatah_cuti') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('master-cuti-pegawai') ?>" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-1"></i>Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
