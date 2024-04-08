<?php $this->extend('componen/app') ?>
 

<?php $this->section('content') ?>
    <div class="container mt-5">
        <!-- Form Tambah Data -->
        <div class="row justify-content-end">
            <div class="col-11">
                <div class="card">
                    <div class="card-header">
                        Form Tambah Data
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
                        <form action="/karyawan/tambah" method="POST">
                            <div class="form-group">
                                <label for="username">Nama Karyawan</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect">Pilih Bagian</label>
                                <select class="form-control select2" name="level" style="width: 100%;" id="exampleSelect">
                                    <option selected="selected">Pilih salah satu</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="admin">Admin</option>
                                    <option value="bendahara">Bendahara</option>
                                    <option value="pimpinan">Pimpinan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="noHp">Nomer Hp</label>
                                <input type="number" class="form-control" id="noHp" name="noHp">
                            </div>
                            <div class="form-group">
                                <label for="password">Passoword</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->endSection(); ?>