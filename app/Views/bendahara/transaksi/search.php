
<?php if($data): ?>
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
                    <td> - </td>
                <?php else : ?>
                    <td>Rp.<?= number_format($item['total_harga'],2)?>,-</td>
                    <td> - </td>
                <?php endif; ?>
                <td>
                    <form action="/rekening/hapus" method="post">
                        <input type="hidden" name="id" value="<?= $item['id_transaksi'] ?>">
                        <button  class="btn btn-danger">Hapus</button>
                    </form>
                    <a href="/rekening/edit/<?= $item['id_transaksi'] ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        <?php $i++ ?>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-danger text-center mt-5"> Data transaksi tidak ada</p>
<?php endif; ?>