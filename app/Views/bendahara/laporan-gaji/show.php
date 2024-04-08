
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
                <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <p><?= session('success') ?></p>
                    </div>
                <?php endif; ?>
                <!-- /.card-header -->
                <div class="card-body">
                    <table border="1" class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Karyawan</th>
                                <th>Gaji bersih</th>
                            </tr>
                        </thead>
                        <tbody id="data-gaji">

                            <tr>
                                <td>1</td>
                                <td><?= $data['tanggal'] ?></td>
                                <td><?= $data['username'] ?></td>
                                <td>Rp.<?= number_format($data['gaji'], 2) ?>,-</td>
                            </tr>

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


