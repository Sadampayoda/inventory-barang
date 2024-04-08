<!-- app/Views/pdf_content.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi Pemasukan dan Pengeluaran</title>
</head>
<body>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Navbar content -->
        </nav>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <!-- Content Header content -->
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Laporan Transaksi Pemasukan dan Pengeluaran</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <table border="1" class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th  rowspan="2">tanggal</th>
                                    <th  rowspan="2">Kategori</th>
                                    <th  rowspan="2">Nama</th>
                                    <th  rowspan="2">Keterangan</th>
                                    <th colspan="2">Jenis</th>
                                </tr>
                                <tr>
                                    <th>Pemasukan</th>
                                    <th>Pengeluaran</th>
                                </tr>
                            </thead>
                            <tbody id="data-laporan">
                                <?php $i = 1?>
                                    <?php foreach($data as $item): ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?=$item['tanggal']?></td>
                                            <td><?=$item['kategori']?></td>
                                            <td><?=$item['nama_barang']?></td>
                                            <td><?=$item['keterangan']?></td>
                                            <?php if($item['jenis'] == 'pemasukan'): ?>
                                                <td>Rp.<?= number_format($item['total_harga'],2)?>,-</td>
                                                <td class="text-center"> - </td>
                                            <?php else : ?>
                                                <td class="text-center"> - </td>
                                                <td>Rp.<?= number_format($item['total_harga'],2)?>,-</td>
                                            <?php endif; ?>
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

   
</body>
</html>
