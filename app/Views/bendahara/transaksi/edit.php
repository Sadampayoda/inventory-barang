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
                        <form action="/transaksi/update/<?= $data['id_transaksi'] ?>" method="POST">
                            <input type="hidden" name="id_transaksi" value="<?= $data['id_transaksi'] ?>">
                            
                            <div class="form-group">
                                <label for="exampleSelect">Keterangan</label>
                                <select class="form-control select2" name="keterangan" style="width: 100%;" id="exampleSelect">
                                    <option value="Penjualan" <?= ($data['keterangan'] == 'Penjualan') ? 'selected' : '' ?>>Penjualan</option>
                                    <option value="Pembelian" <?= ($data['keterangan'] == 'Pembelian') ? 'selected' : '' ?>>Pembelian</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="<?= $data['tanggal'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="id_barang">ID Barang</label>
                                <input type="text" class="form-control" disabled name="id_barang" value="<?= $data['id_barang'] ?>">
                                <input type="hidden" class="form-control"  name="id_barang" value="<?= $data['id_barang'] ?>">
                                <div class="text-muted">tidak dapat di ubah</div>
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" value="<?= $data['jumlah'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <input type="text" class="form-control" name="total_harga" value="<?= $data['total_harga'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select class="form-control select2" name="jenis" style="width: 100%;" id="exampleSelect">
                                    <option value="pemasukan" >pemasukan</option>
                                    <option value="pengeluaran">pengeluaran</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_kasir">ID Kasir</label>
                                <input type="text" disabled class="form-control" name="id_kasir" value="<?= $data['id_kasir'] ?>">
                                <input type="hidden"  class="form-control" name="id_kasir" value="<?= $data['id_kasir'] ?>">
                                <div class="text-muted">tidak dapat di ubah</div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection(); ?>
