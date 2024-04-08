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
                                    <a href="/karyawan/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Insert Data</a>
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
                            <div class="col-md-6">
                                <h5>Show:</h5>
                                <!-- Input select untuk menampilkan jumlah data -->
                                <select id="limit">
                                    <option value="semua">Limit</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <!-- Input search -->
                                <input type="text" id="searchBar" class="float-right" placeholder="Search...">
                                <h5 class="float-right">Search: </h5>
                            </div>
                        </div>
                        <table id="barangTable" class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Bagian</th>
                                    <th>no Hp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data-karyawan">
                                <?php $i=1 ?>
                                <?php foreach($data as $item): ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?=$item['username']?></td>
                                        <td><?=$item['level']?></td>
                                        <td><?=$item['noHp']?></td>
                                        <td>
                                            <a href="/karyawan/show/<?= $item['id'] ?>" class="btn btn-primary">Detail</a>
                                            <form action="/karyawan/hapus" method="post">
                                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                <button  class="btn btn-danger">Hapus</button>
                                            </form>
                                            <a href="/karyawan/edit/<?= $item['id'] ?>" class="btn btn-warning">Edit</a>
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
                    url:"<?=base_url('/karyawan/search') ?>",
                    data: {search:search},
                    success:function(data){
                        $('#data-karyawan').html(data)
                    }

                    
                })
            })
            $('#limit').on('change',function(){
                var limit = $(this).val()
                $.ajax({
                    type:"GET",
                    url:"<?= base_url('karyawan/limit'); ?>",
                    data:{limit:limit},
                    success:function(data){
                        console.log(data)
                        $('#data-karyawan').html(data)
                    }
                })
            })
        })
    </script>
<?php $this->endSection(); ?>
    