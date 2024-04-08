<!-- APPPATH/Views/Admin/barang/show.php -->

<?php $this->extend('componen/app') ?>

<?php $this->section('content') ?>
    <div class="container mt-5">
        <div class="row justify-content-end">
            <div class="col-11">

                <div class="card">
                    <div class="card-header">
                        Detail Barang
                    </div>
                    <div class="card-body">
                        <p><strong>Nama Barang:</strong> <?= esc($barang['nama_barang'] ?? '') ?></p>
                        <p><strong>Kategori:</strong> <?= esc($barang['kategori'] ?? '') ?></p>
                        <p><strong>Merk:</strong> <?= esc($barang['merk'] ?? '') ?></p>
                        <p><strong>Stok:</strong> <?= esc($barang['stok'] ?? '') ?></p>
                        <p><strong>Harga Beli:</strong> <?= esc('Rp ' . number_format($barang['harga_beli'] ?? 0, 0, ',', '.')) ?></p>
                        <p><strong>Harga Jual:</strong> <?= esc('Rp ' . number_format($barang['harga_jual'] ?? 0, 0, ',', '.')) ?></p>
                        <p><strong>Satuan:</strong> <?= esc($barang['satuan'] ?? '') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection(); ?>
