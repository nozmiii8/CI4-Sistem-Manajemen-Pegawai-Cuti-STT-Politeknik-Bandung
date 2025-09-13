<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-custom">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Tambah Jenis Cuti</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('master-cuti') ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- Kode Cuti -->
                    <div class="mb-3">
                        <label for="kode_cuti" class="form-label">Kode Cuti <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= (session('errors.kode_cuti')) ? 'is-invalid' : '' ?>" id="kode_cuti" name="kode_cuti" value="<?= old('kode_cuti') ?>" maxlength="3" required style="text-transform: uppercase;">
                        <div class="form-text">Kode unik untuk jenis cuti (maksimal 3 karakter)</div>
                        <?php if (session('errors.kode_cuti')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.kode_cuti') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= (session('errors.keterangan')) ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan" value="<?= old('keterangan') ?>" maxlength="100" required placeholder="Contoh: Cuti Tahunan">
                        <?php if (session('errors.keterangan')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.keterangan') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Jatah Per Tahun -->
                    <div class="mb-3">
                        <label for="jatah_per_tahun" class="form-label">Jatah Per Tahun <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="number" class="form-control <?= (session('errors.jatah_per_tahun')) ? 'is-invalid' : '' ?>" id="jatah_per_tahun" name="jatah_per_tahun" value="<?= old('jatah_per_tahun') ?>" min="0" required>
                            <span class="input-group-text">hari</span>
                        </div>
                        <div class="form-text">Jumlah hari cuti yang dapat diambil per tahun</div>
                        <?php if (session('errors.jatah_per_tahun')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.jatah_per_tahun') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Menunggu CT -->
                    <div class="mb-3">
                        <label class="form-label">Menunggu CT (Calon Tetap) <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="menunggu_ct" id="menunggu_ct_0" value="0" <?= old('menunggu_ct', '0') == '0' ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="menunggu_ct_0">
                                        <i class="bi bi-x-circle text-secondary me-1"></i>Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="menunggu_ct" id="menunggu_ct_1" value="1" <?= old('menunggu_ct') == '1' ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="menunggu_ct_1">
                                        <i class="bi bi-check-circle text-success me-1"></i>Ya
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-text">Apakah cuti ini menunggu status calon tetap?</div>
                        <?php if (session('errors.menunggu_ct')): ?>
                            <div class="invalid-feedback d-block">
                                <?= session('errors.menunggu_ct') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Akumulasi -->
                    <div class="mb-4">
                        <label class="form-label">Akumulasi <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="akumulasi" id="akumulasi_0" value="0" <?= old('akumulasi', '0') == '0' ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="akumulasi_0">
                                        <i class="bi bi-x-circle text-secondary me-1"></i>Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="akumulasi" id="akumulasi_1" value="1" <?= old('akumulasi') == '1' ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="akumulasi_1">
                                        <i class="bi bi-check-circle text-success me-1"></i>Ya
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-text">Apakah cuti ini dapat diakumulasikan ke tahun berikutnya?</div>
                        <?php if (session('errors.akumulasi')): ?>
                            <div class="invalid-feedback d-block">
                                <?= session('errors.akumulasi') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('master-cuti') ?>" class="btn btn-secondary">
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
// Auto uppercase kode_cuti
document.getElementById('kode_cuti').addEventListener('input', function() {
    this.value = this.value.toUpperCase();
});
</script>
<?= $this->endSection() ?>
