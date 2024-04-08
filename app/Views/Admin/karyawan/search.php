<?php if($data): ?>
    <?php foreach($data as $item): ?>
        <tr>
            <td><?= $i ?></td>
            <td><?=$item['username']?></td>
            <td><?=$item['bagian']?></td>
            <td><?=$item['noHp']?></td>
            <td>
                <a  class="btn btn-primary">Detail</a>
                <form action="/karyawan/hapus" method="post">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <button  class="btn btn-danger">Hapus</button>
                </form>
                <a href="/karyawan/edit/<?= $item['id'] ?>" class="btn btn-warning">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-center mt-5">Data tidak ditemukan</p>
<?php endif; ?>