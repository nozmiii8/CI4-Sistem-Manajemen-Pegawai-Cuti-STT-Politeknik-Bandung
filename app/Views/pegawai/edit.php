<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-custom">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Edit Data Pegawai</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('pegawai/' . $pegawai['nip']) ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- NIP (Read-only) -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nip" class="form-label">NIP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control bg-light" id="nip" name="nip" value="<?= esc($pegawai['nip']) ?>" maxlength="18" readonly>
                            <small class="text-muted">NIP tidak dapat diubah</small>
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select class="form-select <?= (session('errors.jenis_kelamin')) ? 'is-invalid' : '' ?>" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" <?= $pegawai['jenis_kelamin'] === 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="P" <?= $pegawai['jenis_kelamin'] === 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                            <?php if (session('errors.jenis_kelamin')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.jenis_kelamin') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Nama -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="gelar_depan" class="form-label">Gelar Depan</label>
                            <input type="text" class="form-control" id="gelar_depan" name="gelar_depan" value="<?= esc($pegawai['gelar_depan']) ?>" maxlength="20" placeholder="Dr.">
                        </div>
                        <div class="col-md-4">
                            <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?= (session('errors.nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= esc($pegawai['nama']) ?>" maxlength="50" required>
                            <?php if (session('errors.nama')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.nama') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                            <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
                            <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" value="<?= esc($pegawai['gelar_belakang']) ?>" maxlength="20" placeholder="S.Kom.">
                        </div>
                    </div>

                    <!-- Alias -->
                    <div class="mb-3">
                        <label for="alias" class="form-label">Alias</label>
                        <input type="text" class="form-control" id="alias" name="alias" value="<?= esc($pegawai['alias']) ?>" maxlength="30" placeholder="Nama panggilan">
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" class="form-control <?= (session('errors.tgl_lahir')) ? 'is-invalid' : '' ?>" id="tgl_lahir" name="tgl_lahir" value="<?= esc($pegawai['tgl_lahir']) ?>" required>
                        <?php if (session('errors.tgl_lahir')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.tgl_lahir') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Kontak -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control <?= (session('errors.email')) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= esc($pegawai['email']) ?>" maxlength="60">
                            <?php if (session('errors.email')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.email') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label for="no_hp" class="form-label">No. HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= esc($pegawai['no_hp']) ?>" maxlength="15" placeholder="081234567890">
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" maxlength="255"><?= esc($pegawai['alamat']) ?></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="rt" class="form-label">RT</label>
                            <input type="text" class="form-control" id="rt" name="rt" value="<?= esc($pegawai['rt']) ?>" maxlength="4">
                        </div>
                        <div class="col-md-3">
                            <label for="rw" class="form-label">RW</label>
                            <input type="text" class="form-control" id="rw" name="rw" value="<?= esc($pegawai['rw']) ?>" maxlength="4">
                        </div>
                        <div class="col-md-6">
                            <label for="kodepos" class="form-label">Kode Pos</label>
                            <input type="text" class="form-control" id="kodepos" name="kodepos" value="<?= esc($pegawai['kodepos']) ?>" maxlength="6">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="kd_kel" class="form-label">Kelurahan</label>
                            <input type="text" class="form-control" id="kd_kel" name="kd_kel" value="<?= esc($pegawai['kd_kel']) ?>" maxlength="30">
                        </div>
                        <div class="col-md-4">
                            <label for="kd_kec" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kd_kec" name="kd_kec" value="<?= esc($pegawai['kd_kec']) ?>" maxlength="30">
                        </div>
                        <div class="col-md-4">
                            <label for="kd_kab" class="form-label">Kabupaten</label>
                            <input type="text" class="form-control" id="kd_kab" name="kd_kab" value="<?= esc($pegawai['kd_kab']) ?>" maxlength="30">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="kd_provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="kd_provinsi" name="kd_provinsi" value="<?= esc($pegawai['kd_provinsi']) ?>" maxlength="30">
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('pegawai/show/' . $pegawai['nip']) ?>" class="btn btn-info">
                            <i class="bi bi-eye me-1"></i>Lihat Detail
                        </a>
                        <div>
                            <a href="<?= base_url('pegawai') ?>" class="btn btn-secondary me-2">
                                <i class="bi bi-arrow-left me-1"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle me-1"></i>Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
