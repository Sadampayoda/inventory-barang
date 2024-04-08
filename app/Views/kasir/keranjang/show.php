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
            $i = 1; 
            foreach($data as $item): ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$item['nama_barang']?></td>
                    <td><?=$item['kategori']?></td>
                    <td>Rp.<?= number_format($item['harga_beli'],2)?>,-</td>
                    <td><?=$item['stok']?></td>
                    
                    <td>
                        <form action="/barang/hapus" method="post">
                            <input type="hidden" name="id" value="<?= $item['id_barang'] ?>">
                            <button  class="btn btn-danger">Hapus</button>
                        </form>
                        <a  class="btn btn-warning">Edit</a>
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
                            <input type="text" class="form-control" id="total" placeholder="Total Semua" disabled>
                        </div>
                        <div class="form-group">
                            <label for="kembali">Kembali</label>
                            <input type="text" class="form-control" id="kembali" placeholder="Kembali"disabled>
                        </div>
                    </div>
                    <div class="col-md-5 mt-2">
                        <div class="input-group mt-4">
                            <input type="text" class="form-control" placeholder="Bayar" aria-label="Bayar" aria-describedby="basic-addon2" disabled>
                            <div class="input-group-append">
                                <button class="btn btn-success" type="button">Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
