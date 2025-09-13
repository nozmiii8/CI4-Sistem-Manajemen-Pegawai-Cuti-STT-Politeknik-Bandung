<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <!-- Header Card -->
        <div class="card shadow-custom mb-4">
            <div class="card-header bg-gradient-primary text-white">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="avatar-circle bg-white text-primary d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 50%;">
                            <i class="bi bi-person-fill" style="font-size: 24px;"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="mb-1 text-white"><?= esc($pegawai['nama']) ?></h4>
                        <p class="mb-0 opacity-75">NIP: <?= esc($pegawai['nip']) ?></p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="<?= base_url('pegawai/edit/' . $pegawai['nip']) ?>" class="btn btn-light btn-sm me-2">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                        <a href="<?= base_url('pegawai') ?>" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Personal Information -->
        <div class="card shadow-custom mb-4">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i>Informasi Pribadi</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="info-item">
                            <label class="form-label fw-bold text-muted">NIP</label>
                            <p class="mb-0 fs-5"><?= esc($pegawai['nip']) ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <label class="form-label fw-bold text-muted">Nama Lengkap</label>
                            <p class="mb-0 fs-5">
                                <?php
                                $nama = esc($pegawai['nama']);
                                if (!empty($pegawai['gelar_depan'])) {
                                    $nama = esc($pegawai['gelar_depan']) . ' ' . $nama;
                                }
                                if (!empty($pegawai['gelar_belakang'])) {
                                    $nama .= ', ' . esc($pegawai['gelar_belakang']);
                                }
                                echo $nama;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <label class="form-label fw-bold text-muted">Alias</label>
                            <p class="mb-0 fs-5"><?= !empty($pegawai['alias']) ? esc($pegawai['alias']) : '<span class="text-muted">-</span>' ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <label class="form-label fw-bold text-muted">Jenis Kelamin</label>
                            <p class="mb-0 fs-5">
                                <span class="badge bg-<?= $pegawai['jenis_kelamin'] === 'L' ? 'primary' : 'success' ?> fs-6">
                                    <i class="bi bi-gender-<?= $pegawai['jenis_kelamin'] === 'L' ? 'male' : 'female' ?> me-1"></i>
                                    <?= $pegawai['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <label class="form-label fw-bold text-muted">Tanggal Lahir</label>
                            <p class="mb-0 fs-5">
                                <i class="bi bi-calendar-event me-2"></i>
                                <?= date('d F Y', strtotime($pegawai['tgl_lahir'])) ?>
                                <small class="text-muted">(<?= date('Y') - date('Y', strtotime($pegawai['tgl_lahir'])) ?> tahun)</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="card shadow-custom mb-4">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-telephone-fill me-2"></i>Informasi Kontak</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="info-item">
                            <label class="form-label fw-bold text-muted">Email</label>
                            <p class="mb-0 fs-5">
                                <i class="bi bi-envelope me-2"></i>
                                <a href="mailto:<?= esc($pegawai['email']) ?>" class="text-decoration-none">
                                    <?= esc($pegawai['email']) ?>
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <label class="form-label fw-bold text-muted">No. HP</label>
                            <p class="mb-0 fs-5">
                                <i class="bi bi-phone me-2"></i>
                                <a href="tel:<?= esc($pegawai['no_hp']) ?>" class="text-decoration-none">
                                    <?= !empty($pegawai['no_hp']) ? esc($pegawai['no_hp']) : '<span class="text-muted">-</span>' ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Address Information -->
        <div class="card shadow-custom mb-4">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-geo-alt-fill me-2"></i>Informasi Alamat</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="info-item">
                            <label class="form-label fw-bold text-muted">Alamat Lengkap</label>
                            <p class="mb-0 fs-5">
                                <i class="bi bi-house me-2"></i>
                                <?php
                                $alamat = [];
                                if (!empty($pegawai['alamat'])) $alamat[] = esc($pegawai['alamat']);
                                if (!empty($pegawai['rt'])) $alamat[] = 'RT ' . esc($pegawai['rt']);
                                if (!empty($pegawai['rw'])) $alamat[] = 'RW ' . esc($pegawai['rw']);
                                if (!empty($pegawai['kd_kel'])) $alamat[] = 'Kel. ' . esc($pegawai['kd_kel']);
                                if (!empty($pegawai['kd_kec'])) $alamat[] = 'Kec. ' . esc($pegawai['kd_kec']);
                                if (!empty($pegawai['kd_kab'])) $alamat[] = 'Kab. ' . esc($pegawai['kd_kab']);
                                if (!empty($pegawai['kd_provinsi'])) $alamat[] = 'Prov. ' . esc($pegawai['kd_provinsi']);
                                if (!empty($pegawai['kodepos'])) $alamat[] = esc($pegawai['kodepos']);

                                echo !empty($alamat) ? implode(', ', $alamat) : '<span class="text-muted">-</span>';
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="card shadow-custom">
            <div class="card-body text-center">
                <div class="btn-group" role="group">
                    <a href="<?= base_url('pegawai/edit/' . $pegawai['nip']) ?>" class="btn btn-primary">
                        <i class="bi bi-pencil me-1"></i>Edit Data
                    </a>
                    <a href="<?= base_url('pegawai') ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
