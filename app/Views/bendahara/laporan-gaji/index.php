
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
                                <h3 class="card-title">Laporan Gaji Karyawan</h3>
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
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="fromDate">From Date</label>
                                    <input type="date" class="form-control" id="fromDate">
                                </div>
                                <div class="form-group">
                                    <label for="toDate">To Date</label>
                                    <input type="date" class="form-control" id="toDate">
                                </div>
                                <div class="form-group">
                                    <label for="selectCategory">Kategori</label>
                                    <select class="form-control" id="selectCategory">
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach($categori as $item): ?>
                                            <option value="<?= $item['username'] ?>"><?= $item['username'] ?></option>
                                        <?php endforeach; ?>
                                        
                                    </select>
                                </div>
                                <div class="from-group">
                                    <div class="col">
                                        <a href="/laporan-gaji/pdf" class="btn btn-success">Cetak PDF</a>
                                        <!-- <a href="/laporan-gaji/pdf" class="btn btn-primary">Print</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Karyawan</th>
                                    <th>Gaji bersih</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody id="data-gaji">
                                <?php $i = 1?>
                                <?php foreach($data as $item): ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?=$item['tanggal']?></td>
                                        <td><?=$item['username']?></td>
                                        <td>Rp.<?= number_format($item['gaji'],2)?>,-</td>
                                        <td>
                                            <a href="/laporan-gaji/pdf/<?= $item['id'] ?>" class="btn btn-primary">Slip Gaji</a>
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
            
            $('#fromDate').change(function(){
                var fromDate = $(this).val(); 

               
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('/laporan-gaji/date') ?>", 
                    data: {fromDate: fromDate}, 
                    success: function(data){
                        
                        $('#data-gaji').html(data);
                    }
                });
            });

            
            $('#toDate').change(function(){
                var toDate = $(this).val(); 

               
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('/laporan-gaji/date') ?>", 
                    data: {toDate: toDate}, 
                    success: function(data){
                        
                        $('#data-gaji').html(data);
                    }
                });
            });

            
            $('#selectCategory').change(function(){
                var category = $(this).val(); 

                
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('/laporan-gaji/category') ?>",
                    data: {category: category}, 
                    success: function(data){
                        
                        $('#data-gaji').html(data);
                    }
                });
            });
        });
    </script>
    
<?php $this->endSection(); ?>
    