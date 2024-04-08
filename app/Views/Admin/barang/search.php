<?php if($data): ?>
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
                <a  class="btn btn-primary">Detail</a>
                <form action="" method="post">
                    <button  class="btn btn-danger">Hapus</button>
                </form>
                <a  class="btn btn-warning">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-center mt-5">Data tidak ditemukan</p>
<?php endif; ?>