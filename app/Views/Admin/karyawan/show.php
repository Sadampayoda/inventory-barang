<!-- APPPATH/Views/Admin/karyawan/show.php -->

<?php $this->extend('componen/app') ?>

<?php $this->section('content') ?>
    <div class="container mt-5">
        <div class="row justify-content-end">
            <div class="col-11">
                <div class="card">
                    <div class="card-header">
                        Detail Karyawan
                    </div>
                    <div class="card-body">
                        <p><strong>Nama Karyawan:</strong> <?= esc($karyawan['username'] ?? '') ?></p>
                        <p><strong>Bagian:</strong> <?= esc($karyawan['level'] ?? '') ?></p>
                        <p><strong>Nomor HP:</strong> <?= esc($karyawan['noHp'] ?? '') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection(); ?>
