<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<!-- Welcome Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-custom bg-gradient-primary text-white">
            <div class="card-body py-5">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h1 class="display-4 fw-bold mb-2">Selamat Datang</h1>
                        <p class="lead mb-0 opacity-90">Sistem Manajemen Data STT Politeknik Bandung</p>
                        <p class="mt-3 opacity-75">Kelola data pegawai, cuti, dan informasi lainnya dengan mudah dan efisien.</p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <img src="<?= base_url('img/logo.png') ?>" alt="STT Politeknik Bandung" class="img-fluid" style="max-height: 120px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card shadow-custom h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-muted text-uppercase fw-bold small">Total Pegawai</div>
                        <div class="h2 mb-0 text-primary fw-bold"><?= $pegawaiCount ?></div>
                        <div class="text-muted small">Data pegawai terdaftar</div>
                    </div>
                    <div class="col-auto">
                        <div class="avatar-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-people-fill fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0">
                <a href="<?= base_url('pegawai') ?>" class="btn btn-primary btn-sm w-100">
                    <i class="bi bi-eye me-1"></i>Lihat Data
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card shadow-custom h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-muted text-uppercase fw-bold small">Master Cuti</div>
                        <div class="h2 mb-0 text-success fw-bold"><?= $masterCutiCount ?></div>
                        <div class="text-muted small">Jenis cuti tersedia</div>
                    </div>
                    <div class="col-auto">
                        <div class="avatar-circle bg-success text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-calendar-check-fill fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0">
                <a href="<?= base_url('master-cuti') ?>" class="btn btn-success btn-sm w-100">
                    <i class="bi bi-eye me-1"></i>Lihat Data
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card shadow-custom h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-muted text-uppercase fw-bold small">Pengajuan Cuti</div>
                        <div class="h2 mb-0 text-warning fw-bold"><?= $cutiPegawaiCount ?></div>
                        <div class="text-muted small">Total pengajuan cuti</div>
                    </div>
                    <div class="col-auto">
                        <div class="avatar-circle bg-warning text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-calendar-event-fill fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0">
                <a href="<?= base_url('cuti-pegawai') ?>" class="btn btn-warning btn-sm w-100">
                    <i class="bi bi-eye me-1"></i>Lihat Data
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card shadow-custom h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-muted text-uppercase fw-bold small">Sisa Cuti</div>
                        <div class="h2 mb-0 text-info fw-bold"><?= $sisaCutiCount ?></div>
                        <div class="text-muted small">Data sisa cuti pegawai</div>
                    </div>
                    <div class="col-auto">
                        <div class="avatar-circle bg-info text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-clock-fill fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0">
                <a href="<?= base_url('sisa-cuti') ?>" class="btn btn-info btn-sm w-100">
                    <i class="bi bi-eye me-1"></i>Lihat Data
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-custom">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-lightning-charge me-2"></i>Aksi Cepat</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3 col-sm-6">
                        <a href="<?= base_url('pegawai/create') ?>" class="btn btn-success w-100 py-3">
                            <i class="bi bi-person-plus-fill fs-4 d-block mb-2"></i>
                            <span>Tambah Pegawai</span>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="<?= base_url('master-cuti/create') ?>" class="btn btn-primary w-100 py-3">
                            <i class="bi bi-calendar-plus-fill fs-4 d-block mb-2"></i>
                            <span>Tambah Master Cuti</span>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="<?= base_url('cuti-pegawai/create') ?>" class="btn btn-warning w-100 py-3">
                            <i class="bi bi-calendar-event-fill fs-4 d-block mb-2"></i>
                            <span>Ajukan Cuti</span>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="<?= base_url('sisa-cuti/create') ?>" class="btn btn-info w-100 py-3">
                            <i class="bi bi-gear-fill fs-4 d-block mb-2"></i>
                            <span>Tambah Sisa Cuti</span>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="<?= base_url('master-cuti-pegawai') ?>" class="btn btn-secondary w-100 py-3">
                            <i class="bi bi-gear-fill fs-4 d-block mb-2"></i>
                            <span>Kelola Master Cuti Pegawai</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
