<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-custom">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Edit Sisa Cuti Pegawai</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('sisa-cuti/' . $sisaCuti['id']) ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- NIP (Read-only) -->
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-light" id="nip" name="nip" value="<?= esc($sisaCuti['nip']) ?>" readonly>
                        <div class="form-text">NIP tidak dapat diubah</div>
                    </div>

                    <!-- Nama Pegawai (Read-only) -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pegawai</label>
                        <input type="text" class="form-control bg-light" id="nama" name="nama" value="<?= esc($sisaCuti['nama_pegawai'] ?? '') ?>" readonly>
                        <div class="form-text">Nama pegawai berdasarkan data master pegawai</div>
                    </div>

                    <!-- Tahun 1 -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tahun_1" class="form-label">Tahun 1</label>
                            <input type="number" class="form-control <?= (session('errors.tahun_1')) ? 'is-invalid' : '' ?>" id="tahun_1" name="tahun_1" value="<?= esc($sisaCuti['tahun_1']) ?>" min="2000" max="2100">
                            <div class="form-text">Tahun cuti tahun sebelumnya</div>
                            <?php if (session('errors.tahun_1')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.tahun_1') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label for="sisa_tahun_1" class="form-label">Sisa Cuti Tahun 1</label>
                            <div class="input-group">
                                <input type="number" class="form-control <?= (session('errors.sisa_tahun_1')) ? 'is-invalid' : '' ?>" id="sisa_tahun_1" name="sisa_tahun_1" value="<?= esc($sisaCuti['sisa_tahun_1']) ?>" min="0">
                                <span class="input-group-text">hari</span>
                            </div>
                            <div class="form-text">Sisa cuti dari tahun sebelumnya</div>
                            <?php if (session('errors.sisa_tahun_1')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.sisa_tahun_1') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Tahun Berjalan -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tahun_berjalan" class="form-label">Tahun Berjalan</label>
                            <input type="number" class="form-control <?= (session('errors.tahun_berjalan')) ? 'is-invalid' : '' ?>" id="tahun_berjalan" name="tahun_berjalan" value="<?= esc($sisaCuti['tahun_berjalan']) ?>" min="2000" max="2100">
                            <div class="form-text">Tahun cuti saat ini</div>
                            <?php if (session('errors.tahun_berjalan')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.tahun_berjalan') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label for="sisa_tahun_berjalan" class="form-label">Sisa Cuti Tahun Berjalan</label>
                            <div class="input-group">
                                <input type="number" class="form-control <?= (session('errors.sisa_tahun_berjalan')) ? 'is-invalid' : '' ?>" id="sisa_tahun_berjalan" name="sisa_tahun_berjalan" value="<?= esc($sisaCuti['sisa_tahun_berjalan']) ?>" min="0">
                                <span class="input-group-text">hari</span>
                            </div>
                            <div class="form-text">Sisa cuti dari tahun berjalan</div>
                            <?php if (session('errors.sisa_tahun_berjalan')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.sisa_tahun_berjalan') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Sisa Tahun 2 -->
                    <div class="mb-3">
                        <label for="sisa_tahun_2" class="form-label">Sisa Cuti Tahun 2</label>
                        <div class="input-group">
                            <input type="number" class="form-control <?= (session('errors.sisa_tahun_2')) ? 'is-invalid' : '' ?>" id="sisa_tahun_2" name="sisa_tahun_2" value="<?= esc($sisaCuti['sisa_tahun_2']) ?>" min="0">
                            <span class="input-group-text">hari</span>
                        </div>
                        <div class="form-text">Sisa cuti dari 2 tahun yang lalu (jika ada)</div>
                        <?php if (session('errors.sisa_tahun_2')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.sisa_tahun_2') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Total Sisa Cuti (Auto-calculated) -->
                    <div class="mb-4">
                        <label for="sisa_cuti" class="form-label">Total Sisa Cuti</label>
                        <div class="input-group">
                            <input type="number" class="form-control bg-light" id="sisa_cuti" name="sisa_cuti" value="<?= esc($sisaCuti['sisa_cuti']) ?>" readonly>
                            <span class="input-group-text">hari</span>
                        </div>
                        <div class="form-text">Total sisa cuti akan dihitung otomatis</div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('sisa-cuti') ?>" class="btn btn-secondary">
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

<script>
// Auto-calculate total sisa cuti
function calculateTotalSisaCuti() {
    const sisaTahun1 = parseInt(document.getElementById('sisa_tahun_1').value) || 0;
    const sisaTahunBerjalan = parseInt(document.getElementById('sisa_tahun_berjalan').value) || 0;
    const sisaTahun2 = parseInt(document.getElementById('sisa_tahun_2').value) || 0;

    const total = sisaTahun1 + sisaTahunBerjalan + sisaTahun2;
    document.getElementById('sisa_cuti').value = total;
}

// Add event listeners to input fields
document.getElementById('sisa_tahun_1').addEventListener('input', calculateTotalSisaCuti);
document.getElementById('sisa_tahun_berjalan').addEventListener('input', calculateTotalSisaCuti);
document.getElementById('sisa_tahun_2').addEventListener('input', calculateTotalSisaCuti);

// Calculate initial total on page load
document.addEventListener('DOMContentLoaded', function() {
    calculateTotalSisaCuti();
});
</script>
<?= $this->endSection() ?>
