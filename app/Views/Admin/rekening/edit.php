<?= $this->extend('componen/app') ?>

<?= $this->section('content') ?>
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
                    <?php endif; ?>
                    <div class="card-body">
                        <form action="/rekening/update/<?= $rekening['id_rekening'] ?>" method="POST">
                            <div class="form-group">
                                <label for="nama_bank">Nama Bank</label>
                                <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="<?= $rekening['nama_bank'] ?>">
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="nomer_rekening">nomer rekening</label>
                                <input type="number" class="form-control" id="nomer_rekening" name="nomer_rekening" value="<?= $rekening['nomer_rekening'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="saldo">Saldo</label>
                                <input type="number" class="form-control" id="saldo" name="saldo" value="<?= $rekening['saldo'] ?>">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
