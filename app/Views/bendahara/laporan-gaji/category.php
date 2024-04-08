<?php if($data): ?>
    <?php $i = 1?>
    <?php foreach($data as $item): ?>
        <tr>
            <td><?= $i ?></td>
            <td><?=$item['tanggal']?></td>
            <td><?=$item['username']?></td>
            <td>Rp.<?= number_format($item['gaji'],2)?>,-</td>
            <td>
                <button  class="btn btn-primary">Slip Gaji</button>
            </td>
        </tr>
        <?php $i++ ?>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-danger text-center">Data tidak di temukan</p>
<?php endif; ?>