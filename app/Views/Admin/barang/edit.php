<!-- APPPATH/Views/Admin/barang/edit.php -->

<?php $this->extend('componen/app') ?>

<?php $this->section('content') ?>
    <div class="container mt-5">
        <!-- Form Edit Data -->
        <div class="row justify-content-end">
            <div class="col-11">
                <div class="card">
                    <div class="card-header">
                        Form Edit Data
                    </div>
                    <?php if (session()->has('errors')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h5><i class="icon fas fa-ban"></i> Error!</h5>
                            <ul>
                                <?php foreach (session('errors') as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php elseif(session()->has('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h5><i class="icon fas fa-ban"></i> Error!</h5>
                            <ul>
                                <li><?= session('error') ?></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <form action="/barang/update/<?= $barang['id_barang']; ?>" method="POST">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= esc($barang['nama_barang'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" value="<?= esc($barang['kategori'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="merk">Merk</label>
                                <input type="text" class="form-control" id="merk" name="merk" value="<?= esc($barang['merk'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" id="stok" name="stok" value="<?= esc($barang['stok'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="harga_beli">Harga Beli</label>
                                <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="<?= esc($barang['harga_beli'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="<?= esc($barang['harga_jual'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control" id="satuan" name="satuan" value="<?= esc($barang['satuan'] ?? '') ?>">
                            </div>
                            <input type="hidden" name="id_barang" value="<?= esc($barang['id_barang'] ?? '') ?>">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection(); ?>
