<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-custom">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Tambah Cuti Pegawai</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('cuti-pegawai') ?>" method="post">
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
                        <div class="form-text">Pilih pegawai yang akan mengajukan cuti</div>
                        <?php if (session('errors.nip')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.nip') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Nama (Auto-filled) -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pegawai <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= (session('errors.nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?>" maxlength="50" required readonly>
                        <div class="form-text">Nama akan terisi otomatis saat memilih pegawai</div>
                        <?php if (session('errors.nama')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.nama') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Jenis Cuti -->
                    <div class="mb-3">
                        <label for="jenis_cuti" class="form-label">Jenis Cuti <span class="text-danger">*</span></label>
                        <select class="form-select <?= (session('errors.jenis_cuti')) ? 'is-invalid' : '' ?>" id="jenis_cuti" name="jenis_cuti" required>
                            <option value="">Pilih Jenis Cuti</option>
                            <?php foreach ($masterCuti as $mc): ?>
                                <option value="<?= esc($mc['kode_cuti']) ?>" <?= old('jenis_cuti') == $mc['kode_cuti'] ? 'selected' : '' ?>>
                                    <?= esc($mc['kode_cuti']) ?> - <?= esc($mc['keterangan']) ?> (<?= esc($mc['jatah_per_tahun']) ?> hari)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="form-text">Pilih jenis cuti yang akan diajukan</div>
                        <?php if (session('errors.jenis_cuti')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.jenis_cuti') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Periode Cuti -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="mulai_cuti" class="form-label">Tanggal Mulai Cuti <span class="text-danger">*</span></label>
                            <input type="date" class="form-control <?= (session('errors.mulai_cuti')) ? 'is-invalid' : '' ?>" id="mulai_cuti" name="mulai_cuti" value="<?= old('mulai_cuti') ?>" required>
                            <?php if (session('errors.mulai_cuti')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.mulai_cuti') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label for="selesai_cuti" class="form-label">Tanggal Selesai Cuti <span class="text-danger">*</span></label>
                            <input type="date" class="form-control <?= (session('errors.selesai_cuti')) ? 'is-invalid' : '' ?>" id="selesai_cuti" name="selesai_cuti" value="<?= old('selesai_cuti') ?>" required>
                            <?php if (session('errors.selesai_cuti')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.selesai_cuti') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Lama Cuti (Auto-calculated) -->
                    <div class="mb-4">
                        <label for="lama_cuti" class="form-label">Lama Cuti (hari)</label>
                        <input type="number" class="form-control bg-light" id="lama_cuti" name="lama_cuti" value="<?= old('lama_cuti') ?>" readonly>
                        <div class="form-text">Lama cuti akan dihitung otomatis berdasarkan tanggal mulai dan selesai</div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('cuti-pegawai') ?>" class="btn btn-secondary">
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
// Auto-fill nama when pegawai is selected
document.getElementById('nip').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const namaField = document.getElementById('nama');

    if (selectedOption.value) {
        // Extract nama from option text (format: "NIP - Nama")
        const optionText = selectedOption.textContent;
        const nama = optionText.split(' - ')[1];
        namaField.value = nama || '';
    } else {
        namaField.value = '';
    }
});

// Auto-calculate lama cuti
function calculateLamaCuti() {
    const mulai = document.getElementById('mulai_cuti').value;
    const selesai = document.getElementById('selesai_cuti').value;
    const lamaField = document.getElementById('lama_cuti');

    if (mulai && selesai) {
        const mulaiDate = new Date(mulai);
        const selesaiDate = new Date(selesai);

        if (selesaiDate >= mulaiDate) {
            const diffTime = Math.abs(selesaiDate - mulaiDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // +1 to include both start and end dates
            lamaField.value = diffDays;
        } else {
            lamaField.value = '';
            alert('Tanggal selesai cuti harus setelah tanggal mulai cuti');
            document.getElementById('selesai_cuti').value = '';
        }
    } else {
        lamaField.value = '';
    }
}

document.getElementById('mulai_cuti').addEventListener('change', calculateLamaCuti);
document.getElementById('selesai_cuti').addEventListener('change', calculateLamaCuti);

// Set minimum date for mulai_cuti to today
document.getElementById('mulai_cuti').min = new Date().toISOString().split('T')[0];

// Set minimum date for selesai_cuti based on mulai_cuti
document.getElementById('mulai_cuti').addEventListener('change', function() {
    document.getElementById('selesai_cuti').min = this.value;
});
</script>
<?= $this->endSection() ?>
