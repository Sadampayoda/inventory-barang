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
                        <form action="/rekening/tambah" method="POST">
                            <div class="form-group">
                                <label for="nama_bank">Nama Bank</label>
                                <input type="text" class="form-control" id="nama_bank" name="nama_bank">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleSelect">Pilih pemilik</label>
                                <select class="form-control select2" name="users_id" style="width: 100%;" id="exampleSelect">
                                    <option selected="selected">Pilih salah satu</option>
                                    <?php foreach($data as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['username'] ?></option>
                                    <?php endforeach; ?> 
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="nomer_rekening">nomer rekening</label>
                                <input type="number" class="form-control" id="nomer_rekening" name="nomer_rekening">
                            </div>
                            <div class="form-group">
                                <label for="saldo">Saldo</label>
                                <input type="number" class="form-control" id="saldo" name="saldo">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->endSection(); ?>