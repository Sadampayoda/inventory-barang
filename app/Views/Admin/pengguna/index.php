<?php $this->extend('componen/app') ?>
 

<?php $this->section('content') ?>
 <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Navbar -->
        </nav>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <!-- Content Header -->
            </div>
            <!-- Main content -->
            <section class="content">
                <!-- Data Barang -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Data Karyawan</h3>
                            </div>
                            <div class="col-md-6">
                                <div class="float-right">
                                    <!-- <a href="/karyawan/sorting" class="btn btn-primary"><i class="fas fa-list"></i> Sort data karyawan</a> -->
                                    <a href="/pengguna/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Insert Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(session()->has('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <p><?= session('success') ?></p>
                        </div>
                    <?php endif; ?>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col d-flex justify-content-end">
                                <!-- Input search -->
                                <h5 class="float-right">Search: </h5>
                                <input type="text" id="searchBar" class="float-right" placeholder="Search...">
                            </div>
                        </div>
                        <table id="barangTable" class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama </th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data-pengguna">
                                <?php $i=1 ?>
                                <?php foreach($data as $item): ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?=$item['nama']?></td>
                                        <td><?=$item['username']?></td>
                                        <td><?=$item['level']?></td>
                                        <td>
                                            <!-- <?php if ($item['photo']) : ?>
                                                <img src="<?= base_url('profil.jpg') ?>" alt="<?= $item['photo'] ?>" class="img-fluid" height="100" width="100">
                                            <?php else : ?>
                                                <p>Foto tidak tersedia</p>
                                            <?php endif; ?> -->
                                            <img src="<?= base_url('profil.jpg') ?>" alt="" class="img-fluid" height="100" width="100">

                                        </td>
                                        <td>
                                            <form action="/pengguna/hapus" method="post">
                                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                <button  class="btn btn-danger">Hapus</button>
                                            </form>
                                            <a href="/pengguna/edit/<?= $item['id'] ?>" class="btn btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        
    </div>

    <script>
        $(document).ready(function(){
            $('#searchBar').keyup(function(){
                var search = $(this).val()
                // console.log(search)
                $.ajax({
                    type:"GET",
                    url:"<?=base_url('/pengguna/search') ?>",
                    data: {search:search},
                    success:function(data){
                        $('#data-pengguna').html(data)
                    }

                    
                })
            })
            
        })
    </script>
<?php $this->endSection(); ?>
    