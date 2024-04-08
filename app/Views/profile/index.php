<?php $this->extend('componen/app') ?>
 

<?php $this->section('content') ?>
<div class="container mt-5">
    <div class="d-flex justify-content-end">
        <!-- Card Profil -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Profil
                </div>
                <div class="card-body">
                <img src="<?= base_url('profil.jpg') ?>" alt="<?= $data['photo'] ?>" class="img-fluid" height="300" width="300">
                </div>
            </div>
            <div class="mt-3">
                <button type="button" class="btn btn-info">Verifikasi Email</button>
            </div>
        </div>

        <!-- Card Ganti Password -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="from-group">
                        <button id="profil" class="btn btn-outline-dark">Profil</button>
                        <button id="sandi" class="btn btn-dark">Sandi</button>
                    </div>
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
                <div class="card-body" id="edit">
                    <form action="/profile/sandi" method="POST">
                        <div class="form-group">
                            <label for="passwordLama">Password Lama</label>
                            <input name="password" type="password" class="form-control" id="passwordLama">
                        </div>
                        <div class="form-group">
                            <label for="passwordBaru">Password Baru</label>
                            <input name="new_password" type="password" class="form-control" id="passwordBaru">
                        </div>
                        <div class="form-group">
                            <label for="konfirmasiPassword">Konfirmasi Password Baru</label>
                            <input name="confirm_password" type="password" class="form-control" id="konfirmasiPassword">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Password Baru</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#profil').on('click',function(){
            $.ajax({
                type:"GET",
                url :"<?= base_url('profile/profil') ?>",
                success:function(data){
                    $('#profil').removeClass('btn-outline-dark').addClass('btn-dark');
                    $('#sandi').removeClass('btn-dark').addClass('btn-outline-dark');
                    $('#edit').html(data)
                }
            })
        })
        $('#sandi').on('click',function(){
            $.ajax({
                type:"GET",
                url :"<?= base_url('profile/sandi') ?>",
                success:function(data){
                    $('#sandi').removeClass('btn-outline-dark').addClass('btn-dark');
                    $('#profil').removeClass('btn-dark').addClass('btn-outline-dark');
                    $('#edit').html(data)
                }
            })
        })
    })
</script>
<?php $this->endSection(); ?>