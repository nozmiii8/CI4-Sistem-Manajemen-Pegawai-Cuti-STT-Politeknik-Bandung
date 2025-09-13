<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-custom">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Tambah Jatah Cuti Pegawai</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('master-cuti-pegawai') ?>" method="post">
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
                        <div class="form-text">Pilih pegawai yang akan diberikan jatah cuti</div>
                        <?php if (session('errors.nip')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.nip') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Jatah Cuti -->
                    <div class="mb-4">
                        <label for="jatah_cuti" class="form-label">Jatah Cuti <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="number" class="form-control <?= (session('errors.jatah_cuti')) ? 'is-invalid' : '' ?>" id="jatah_cuti" name="jatah_cuti" value="<?= old('jatah_cuti') ?>" min="0" required>
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
                            <i class="bi bi-check-circle me-1"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
