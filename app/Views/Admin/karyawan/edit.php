<?php $this->extend('componen/app') ?>

<?php $this->section('content') ?>
    <div class="container mt-5">
        <!-- Form Edit Data -->
        <div class="row justify-content-end">
            <div class="col-11">
                <div class="card">
                    <div class="card-header">
                        Form Edit Data Karyawan
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
                        <form action="/karyawan/update/<?= esc($karyawan['id']) ?>" method="POST">
                            <div class="form-group">
                                <label for="username">Nama Karyawan</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= esc($karyawan['username']) ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect">Pilih Bagian</label>
                                <select class="form-control select2" name="level" style="width: 100%;" id="exampleSelect">
                                    <option value="kasir" <?= ($karyawan['level'] == 'kasir') ? 'selected' : '' ?>>Kasir</option>
                                    <option value="admin" <?= ($karyawan['level'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                                    <option value="bendahara" <?= ($karyawan['level'] == 'bendahara') ? 'selected' : '' ?>>Bendahara</option>
                                    <option value="pimpinan" <?= ($karyawan['level'] == 'pimpinan') ? 'selected' : '' ?>>Pimpinan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="noHp">Nomer Hp</label>
                                <input type="number" class="form-control" id="noHp" name="noHp" value="<?= esc($karyawan['noHp']) ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Passoword</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?= esc($karyawan['username']) ?>">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->endSection(); ?>
