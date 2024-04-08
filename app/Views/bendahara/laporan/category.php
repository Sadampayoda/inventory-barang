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
                    <td> - </td>
                    <td>Rp.<?= number_format($item['total_harga'],2)?>,-</td>
                <?php endif; ?>
            </tr>
        <?php $i++ ?>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-danger text-center">Data tidak di temukan</p>
<?php endif; ?>