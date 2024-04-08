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
                        <form action="/pengguna/update/<?= $data['id'] ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama Karyawan</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect">Pilih Bagian</label>
                                <select class="form-control select2" name="level" style="width: 100%;" id="exampleSelect">
                                    <option value="kasir" <?= ($data['level'] == 'kasir') ? 'selected' : '' ?>>Kasir</option>
                                    <option value="admin" <?= ($data['level'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                                    <option value="bendahara" <?= ($data['level'] == 'bendahara') ? 'selected' : '' ?>>Bendahara</option>
                                    <option value="pimpinan" <?= ($data['level'] == 'pimpinan') ? 'selected' : '' ?>>Pimpinan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="photo">Foto Karyawan</label>
                                <input type="file" class="form-control-file" id="photo" name="photo">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->endSection(); ?>
