<h1>Laporan Penjualan</h1>
<div class="row justify-content-end mt-3">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    <table border='1' class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Modal</th>
                                <th>Total</th>
                                <th>Kasir</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $item): ?>
                                <tr>
                                    <td><?= $item['id_barang'] ?></td>
                                    <td><?= $item['nama_barang'] ?></td>
                                    <td><?= $item['jumlah'] ?></td>
                                    <td><?= $item['harga_beli'] ?></td>
                                    <td><?= $item['total'] ?></td>
                                    <td><?= $item['username'] ?></td>
                                    <td><?= $item['tanggal'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>