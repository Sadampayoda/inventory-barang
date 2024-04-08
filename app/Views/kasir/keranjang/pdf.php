
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h1>Keranjang</h1>
                    <p></p>
                    <div class="row">
                        <table border="1" id="barangTable" class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>jumlah</th>
                                    <th>Total</th>
                                    <th>Kasir</th>
                                </tr>
                            </thead>
                            <tbody id="data-barang">
                                <?php
                                $total = 0;
                                $i = 1; 
                                foreach($data as $item): ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$item['nama_barang']?></td>
                                        <td><?=$item['jumlah']?></td>
                                        <td>Rp.<?= number_format($item['harga_jual']  * $item['jumlah'],2)?>,-</td>
                                        <td><?=$item['username']?></td>
                                        <?php $total = $total + $item['harga_jual'] * $item['jumlah'] ?>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                                <tr>        
                                    <td colspan="4">Total Semua</td>
                                    <td>Rp.<?= number_format($total,2)?>,-</td>
                                </tr>
                                <tr>
                                    
                                    <td colspan="4">Bayar</td>
                                    <td>Rp.<?= number_format($bayar,2)?>,-</td>
                                </tr>
                                <tr>
                                   
                                    <td colspan="4">Kembalian</td>
                                    <td>Rp.<?= number_format($total - $bayar,2)?>,-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>

