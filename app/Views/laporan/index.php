<?php $this->extend('componen/app'); ?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pencarian Berdasarkan Bulan</h3>
                </div>
                <div class="card-body">
                    <form action="/laporan" method="GET">
                        <div class="row">
                            <div class="col-10">

                                <div class="form-group">
                                    <label for="month">Bulan</label>
                                    <select class="form-control" id="month" name="month">
                                        <?php foreach($bulan as $item): ?>
                                            <option value="<?= $item['bulan'] ?>"><?= $item['bulan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2 mt-4">
                                <button type="submit" name="type" value="bulan" class="btn btn-primary mt-1">Cari</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end mt-3">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pencarian Berdasarkan Bulan dan Tahun</h3>
                </div>
                <div class="card-body">
                    <form action="/laporan" method="GET">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="month">Bulan</label>
                                    <!-- -->
                                    <select class="form-control" id="month" name="month">
                                        <?php foreach($bulan as $item): ?>
                                            <option value="<?= $item['bulan'] ?>"><?= $item['bulan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="year">Tahun</label>
                                    <select class="form-control" id="year" name="year">
                                        <?php foreach($tahun as $item): ?>
                                            <option value="<?= $item['tahun'] ?>"><?= $item['tahun'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2 mt-4">
                                <button type="submit" name="type" value="tahun" class="btn btn-primary mt-1">Cari</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col">
                            <a href="laporan/pdf" class="btn btn-success">Cetak Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end mt-3">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Modal</th>
                                <th>Total</th>
                                <th>Kasir</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $item): ?>
                                <tr>
                                    <td><?= $item['id_barang'] ?></td>
                                    <td><?= $item['nama_barang'] ?></td>
                                    <td><?= $item['jumlah'] ?></td>
                                    <td><?= $item['harga_beli'] ?></td>
                                    <td><?= $item['total'] ?></td>
                                    <td><?= $item['username'] ?></td>
                                    <td><?= $item['tanggal'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>