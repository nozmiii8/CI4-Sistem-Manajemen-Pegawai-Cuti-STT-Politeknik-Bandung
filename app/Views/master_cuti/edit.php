<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-custom">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Edit Jenis Cuti</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('master-cuti/' . $masterCuti['kode_cuti']) ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- Kode Cuti (Read-only) -->
                    <div class="mb-3">
                        <label for="kode_cuti" class="form-label">Kode Cuti <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-light" id="kode_cuti" name="kode_cuti" value="<?= esc($masterCuti['kode_cuti']) ?>" maxlength="3" readonly>
                        <small class="text-muted">Kode cuti tidak dapat diubah</small>
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= (session('errors.keterangan')) ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan" value="<?= esc($masterCuti['keterangan']) ?>" maxlength="100" required>
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
                            <input type="number" class="form-control <?= (session('errors.jatah_per_tahun')) ? 'is-invalid' : '' ?>" id="jatah_per_tahun" name="jatah_per_tahun" value="<?= esc($masterCuti['jatah_per_tahun']) ?>" min="0" required>
                            <span class="input-group-text">hari</span>
                        </div>
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
                                    <input class="form-check-input" type="radio" name="menunggu_ct" id="menunggu_ct_0" value="0" <?= $masterCuti['menunggu_ct'] == '0' ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="menunggu_ct_0">
                                        <i class="bi bi-x-circle text-secondary me-1"></i>Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="menunggu_ct" id="menunggu_ct_1" value="1" <?= $masterCuti['menunggu_ct'] == '1' ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="menunggu_ct_1">
                                        <i class="bi bi-check-circle text-success me-1"></i>Ya
                                    </label>
                                </div>
                            </div>
                        </div>
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
                                    <input class="form-check-input" type="radio" name="akumulasi" id="akumulasi_0" value="0" <?= $masterCuti['akumulasi'] == '0' ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="akumulasi_0">
                                        <i class="bi bi-x-circle text-secondary me-1"></i>Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="akumulasi" id="akumulasi_1" value="1" <?= $masterCuti['akumulasi'] == '1' ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="akumulasi_1">
                                        <i class="bi bi-check-circle text-success me-1"></i>Ya
                                    </label>
                                </div>
                            </div>
                        </div>
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
                            <i class="bi bi-check-circle me-1"></i>Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
