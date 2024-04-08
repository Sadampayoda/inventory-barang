
<?php if($data): ?>
    <?php $i = 1?>
    <?php foreach($data as $item): ?>
        <tr>
            <td><?= $i ?></td>
            <td><?=$item['kode']?></td>
            <td><?=$item['tanggal']?></td>
            <td><?=$item['keterangan']?></td>
            <td>Rp.<?= number_format($item['nominal'],2)?>,-</td>
            <td>
                <form action="/piutang/hapus" method="post">
                    <input type="hidden" name="id" value="<?= $item['kode'] ?>">
                    <button  class="btn btn-danger">Hapus</button>
                </form>
                <a href="/piutang/edit/<?= $item['kode'] ?>" class="btn btn-warning">Edit</a>
            </td>
        </tr>
        <?php $i++ ?>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-danger text-center mt-5"> Data rekening tidak ada</p>
<?php endif; ?>