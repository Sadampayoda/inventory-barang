
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
                                <h3 class="card-title">Data Rekening</h3>
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
                                <!-- Input search -->
                                <a href="/rekening/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Insert Data</a>
                            </div>
                            <div class="col-md-6">
                                <!-- Input search -->
                                
                                <input type="text" id="searchBar" class="float-right" placeholder="Search...">
                                <h5 class="float-right">Search: </h5>
                            </div>
                        </div>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bank</th>
                                    <th>Pemilik Rekening</th>
                                    <th>Nomor Rekening</th>
                                    <th>Saldo</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody id="data-rekening">
                                <?php $i = 1?>
                                <?php foreach($data as $item): ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?=$item['nama_bank']?></td>
                                        <td><?=$item['username']?></td>
                                        <td><?=$item['nomer_rekening']?></td>
                                        <td>Rp.<?= number_format($item['saldo'],2)?>,-</td>
                                        <td>
                                            <form action="/rekening/hapus" method="post">
                                                <input type="hidden" name="id" value="<?= $item['id_rekening'] ?>">
                                                <button  class="btn btn-danger">Hapus</button>
                                            </form>
                                            <a href="/rekening/edit/<?= $item['id_rekening'] ?>" class="btn btn-warning">Edit</a>
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
                    url:"<?=base_url('/rekening/search') ?>",
                    data: {search:search},
                    success:function(data){
                        $('#data-rekening').html(data)
                    }

                    
                })
            })
            
        })
    </script>
<?php $this->endSection(); ?>
    