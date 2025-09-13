<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-custom">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Tambah Sisa Cuti Pegawai</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('sisa-cuti') ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- Pilih Pegawai -->
                    <div class="mb-3">
                        <label for="nip" class="form-label">Pilih Pegawai <span class="text-danger">*</span></label>
                        <select class="form-select <?= (session('errors.nip')) ? 'is-invalid' : '' ?>" id="nip" name="nip" required>
                            <option value="">Pilih Pegawai</option>
                            <?php foreach ($pegawai as $p): ?>
                                <option value="<?= esc($p['nip']) ?>" <?= old('nip') == $p['nip'] ? 'selected' : '' ?>>
                                    <?= esc($p['nip']) ?> - <?= esc($p['nama']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="form-text">Pilih pegawai yang akan dikelola sisa cutinya</div>
                        <?php if (session('errors.nip')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.nip') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Tahun 1 -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tahun_1" class="form-label">Tahun 1</label>
                            <input type="number" class="form-control <?= (session('errors.tahun_1')) ? 'is-invalid' : '' ?>" id="tahun_1" name="tahun_1" value="<?= old('tahun_1') ?>" min="2000" max="2100">
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
                                <input type="number" class="form-control <?= (session('errors.sisa_tahun_1')) ? 'is-invalid' : '' ?>" id="sisa_tahun_1" name="sisa_tahun_1" value="<?= old('sisa_tahun_1') ?>" min="0">
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
                            <input type="number" class="form-control <?= (session('errors.tahun_berjalan')) ? 'is-invalid' : '' ?>" id="tahun_berjalan" name="tahun_berjalan" value="<?= old('tahun_berjalan', date('Y')) ?>" min="2000" max="2100">
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
                                <input type="number" class="form-control <?= (session('errors.sisa_tahun_berjalan')) ? 'is-invalid' : '' ?>" id="sisa_tahun_berjalan" name="sisa_tahun_berjalan" value="<?= old('sisa_tahun_berjalan') ?>" min="0">
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
                            <input type="number" class="form-control <?= (session('errors.sisa_tahun_2')) ? 'is-invalid' : '' ?>" id="sisa_tahun_2" name="sisa_tahun_2" value="<?= old('sisa_tahun_2') ?>" min="0">
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
                            <input type="number" class="form-control bg-light" id="sisa_cuti" name="sisa_cuti" value="<?= old('sisa_cuti') ?>" readonly>
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
                            <i class="bi bi-check-circle me-1"></i>Simpan
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

// Set current year as default for tahun_berjalan
document.addEventListener('DOMContentLoaded', function() {
    const tahunBerjalanField = document.getElementById('tahun_berjalan');
    if (!tahunBerjalanField.value) {
        tahunBerjalanField.value = new Date().getFullYear();
    }
    calculateTotalSisaCuti(); // Calculate initial total
});
</script>
<?= $this->endSection() ?>
