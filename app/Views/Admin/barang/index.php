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
                                <h3 class="card-title">Data Barang</h3>
                            </div>
                            <div class="col-md-6">
                                <div class="float-right">
                                    <a href="/barang/sorting" class="btn btn-primary"><i class="fas fa-list"></i> Sort data Barang</a>
                                    <a href="/barang/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Insert Data</a>
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
                                    <th>Id Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Merk</th>
                                    <th>Stok</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data-barang">
                                <?php foreach($data as $item): ?>
                                    <tr>
                                        <td><?=$item['id_barang']?></td>
                                        <td><?=$item['nama_barang']?></td>
                                        <td><?=$item['kategori']?></td>
                                        <td><?=$item['merk']?></td>
                                        <td><?=$item['stok']?></td>
                                        <td>Rp.<?= number_format($item['harga_beli'],2)?>,-</td>
                                        <td>Rp.<?= number_format($item['harga_jual'],2)?>,-</td>
                                        <td><?=$item['satuan']?></td>
                                        <td>
                                            <a href="/barang/show/<?= $item['id_barang'] ?>" class="btn btn-primary">Detail</a>
                                            <form action="/barang/hapus" method="post">
                                                <input type="hidden" name="id" value="<?= $item['id_barang'] ?>">
                                                <button  class="btn btn-danger">Hapus</button>
                                            </form>
                                            <a href="/barang/edit/<?= $item['id_barang'] ?>" class="btn btn-warning">Edit</a>
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
                    url:"<?=base_url('/barang/search') ?>",
                    data: {search:search},
                    success:function(data){
                        $('#data-barang').html(data)
                    }

                    
                })
            })
            $('#limit').on('change',function(){
                var limit = $(this).val()
                $.ajax({
                    type:"GET",
                    url:"<?= base_url('barang/limit'); ?>",
                    data:{limit:limit},
                    success:function(data){
                        console.log(data)
                        $('#data-barang').html(data)
                    }
                })
            })
        })
    </script>
<?php $this->endSection(); ?>
    