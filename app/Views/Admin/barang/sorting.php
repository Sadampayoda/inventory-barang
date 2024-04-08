<?php $this->extend('componen/app') ?>
 

<?php $this->section('content') ?>
    <div class="container mt-5">
        <!-- Content -->
        <div class="row justify-content-end">
            <div class="col-11">
                <!-- Buttons -->
                <div class="col mb-3">
                    <a href="/barang/tambah" class="btn btn-primary">Tambah Barang</a>
                    <a href="" class="btn btn-success">Export Data</a>
                </div>
                <!-- Alert -->
                <?php if($stok): ?>
                    <div class="alert alert-danger" role="alert">
                        <p>Perhatikan : </p>
                        <ul>
                            <?php foreach($stok as $item): ?>
                                <li>Stok <?= $item['nama_barang'] ?> telah habis</li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <p><?= session('success') ?></p>
                    </div>
                <?php endif; ?>
                <!-- Table -->
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Barang</th>
                                    <th>Deskripsi</th>
                                    <th>Stock</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data as $item): ?>
                                    <tr>
                                        <td><?=$item['id_barang']?></td>
                                        <td><?=$item['nama_barang']?></td>
                                        <td><?=$item['kategori']?></td>
                                        <td><?=$item['stok']?></td>
                                        <td>
                                            <a  class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="/barang/hapus" method="post">
                                                <input type="hidden" name="id" value="<?= $item['id_barang'] ?>">
                                                <button  class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
<?php $this->endSection('content') ?>