
<?php if($data): ?>
    <?php $i = 1?>
    <?php foreach($data as $item): ?>
        <tr>
            <td><?= $i ?></td>
            <td><?=$item['nama_bank']?></td>
            <td><?=$item['username']?></td>
            <td><?=$item['nomer_rekening']?></td>
            <td>Rp.<?= number_format($item['saldo'],2)?>,-</td>
            <td>
                <form action="/rekening/hapus" method="post">
                    <input type="hidden" name="id" value="<?= $item['id_rekening'] ?>">
                    <button  class="btn btn-danger">Hapus</button>
                </form>
                <a href="/rekening/edit/<?= $item['id_rekening'] ?>"  class="btn btn-warning">Edit</a>
            </td>
        </tr>
        <?php $i++ ?>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-danger text-center mt-5"> Data rekening tidak ada</p>
<?php endif; ?>