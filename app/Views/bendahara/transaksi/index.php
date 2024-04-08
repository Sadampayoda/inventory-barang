
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
                
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Data Transaksi Pemasukan dan Pengeluaran</h3>
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
                        <div class="d-flex justify-content-end">
                            <div class="col">
                                <!-- Input search -->
                                <a href="/transaksi/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Insert Data</a>
                               
                            </div>
                            <div class="col">
                                <!-- Input search -->
                                <input type="text" id="searchBar" class="float-right" placeholder="Search...">
                                <h5 class="float-right">Search: </h5>
                            </div>
                        </div>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th  rowspan="2">tanggal</th>
                                    <th  rowspan="2">Kategori</th>
                                    <th  rowspan="2">Nama</th>
                                    <th  rowspan="2">Keterangan</th>
                                    <th colspan="2">Jenis</th>
                                    <th  rowspan="2">Opsi</th>
                                </tr>
                                <tr>
                                    <th>Pemasukan</th>
                                    <th>Pengeluaran</th>
                                </tr>
                            </thead>
                            <tbody id="data-transaksi">
                                <?php $i = 1?>
                                    <?php foreach($data as $item): ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?=$item['tanggal']?></td>
                                            <td><?=$item['kategori']?></td>
                                            <td><?=$item['nama_barang']?></td>
                                            <td>Penjualan <?= $item['nama_barang'] ?></td>
                                            <!-- <td><?=$item['keterangan']?></td> -->
                                            <?php if($item['jenis'] == 'pemasukan'): ?>
                                                <td>Rp.<?= number_format($item['total_harga'],2)?>,-</td>
                                                <td> - </td>
                                            <?php else : ?>
                                                <td> - </td>
                                                <td>Rp.<?= number_format($item['total_harga'],2)?>,-</td>
                                            <?php endif; ?>
                                            <td>
                                                <form action="/transaksi/hapus" method="post">
                                                    <input type="hidden" name="id" value="<?= $item['id_transaksi'] ?>">
                                                    <button  class="btn btn-danger">Hapus</button>
                                                </form>
                                                <a href="/transaksi/edit/<?= $item['id_transaksi'] ?>" class="btn btn-warning">Edit</a>
                                            </td>
                                        </tr>
                                    <?php $i++ ?>
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
                    url:"<?=base_url('/transaksi/search') ?>",
                    data: {search:search},
                    success:function(data){
                        $('#data-transaksi').html(data)
                    }

                    
                })
            })
            
        })
    </script>
<?php $this->endSection(); ?>
    