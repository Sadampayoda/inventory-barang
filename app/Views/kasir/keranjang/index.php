<?php $this->extend('componen/app') ?>

<?php $this->section('content') ?>
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <?php if(session()->has('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <p><?= session('success') ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Input Card -->
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Input Data Barang</h3>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control" id="search" placeholder="Masukkan nama barang">
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->

                        <!-- Select Card -->
                        <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Hasil pencarian</h3>
                                </div>
                                <div class="card-body" id="pencarian">
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tanggal Sekarang</h3>
                                </div>
                                <div class="card-body">
                                    <div id="tanggalSekarang"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="jumlah">

                        </div>
                    </div>
                    <div class="row">
                        <table id="barangTable" class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>jumlah</th>
                                    <th>Total</th>
                                    <th>Kasir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data-barang">
                                <?php
                                $total = 0;
                                $i = 1; 
                                foreach($keranjang as $item): ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$item['nama_barang']?></td>
                                        <td><?=$item['jumlah']?></td>
                                        <td>Rp.<?= number_format($item['harga_jual']  * $item['jumlah'],2)?>,-</td>
                                        <td><?=$item['username']?></td>
                                        <?php $total = $total + $item['harga_jual'] * $item['jumlah'] ?>
                                        <td>
                                            <form action="/keranjang/hapus" method="post">
                                                <input type="hidden" name="id" value="<?= $item['id_keranjang'] ?>">
                                                <button  class="btn btn-danger">Hapus</button>
                                            </form>
                                            <button id="edit" type="submit" value="<?= $item['id_keranjang'] ?>"  class="btn btn-warning">Edit</button>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                                
                            </tbody>
                            
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <p class="page-link"><?= $pager->simpleLinks() ?></p>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Pembayaran</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="total">Total Semua</label>
                                                <input type="text" class="form-control" id="total" value="Rp.<?= number_format($total,2)?>,-" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="kembali">Kembali</label>
                                                <input type="text" class="form-control" id="kembali" disabled>
                                                <p class="text-danger" id="warning"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mt-2">
                                            <div class="form-group">

                                                <form action="/keranjang/bayar" method="post">
                                                    <?php foreach($keranjang as $item): ?>
                                                        <?php for ($i=0; $i < $item['jumlah']; $i++): ?>
                                                            <input type="hidden" name="barang[]" value="<?= $item['id_barang'] ?>">
                                                            <input type="hidden" name="harga[]" value="<?= $item['harga_jual'] ?>">
                                                        <?php endfor;?>
                                                        <input type="hidden" name="id[]" value="<?= $item['id_keranjang']?>">
                                                    <?php endforeach; ?>
                                                    <div class="input-group mt-4">
                                                        <input type="number" id="bayar" name="bayar" class="form-control" placeholder="Bayar" aria-label="Bayar" aria-describedby="basic-addon2" >
                                                        <div class="input-group-append">
                                                            <button  class="btn btn-success" id="buttonbayar" disabled type="submit">Bayar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>

<script>
    $(document).ready(function(){
        var date = new Date();
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var tanggalSekarang = date.toLocaleDateString('id-ID', options);

        
        $('#tanggalSekarang').html('<h3>' + tanggalSekarang + '</h3>');
        $('#search').keyup(function(){
            var search = $(this).val()
            // console.log(search)
            $.ajax({
                type:"GET",
                url:"<?=base_url('/keranjang/tambah') ?>",
                data: {search:search},
                success:function(data){
                    $('#pencarian').html(data)
                }

            })
        })
        $('#bayar').keyup(function(){
            let formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            
            var bayar = $(this).val();
            var total = <?= $total ?>;
            var totalkembalian = bayar - total

            $('#kembali').val(formatter.format(totalkembalian)+',-')
            if(totalkembalian < 0 ){
                $('#buttonbayar').prop('disabled', true);
                $('#warning').html('Uang masih belum cukup')
            }else{
                $('#warning').html('')
                $('#buttonbayar').prop('disabled', false);

            }
        })

        $('#edit').click(function(){
            var id = $(this).val()
            console.log(id)
            $.ajax({
                type:"GET",
                url : "<?= base_url('keranjang/edit') ?>",
                data:{id:id},
                success:function(data){
                    $('#jumlah').html(data);
                }
            })
        })
        
    })
</script>
 <?php $this->endSection() ?>
