<?php if($data): ?>
    <?php foreach($data as $item): ?>
        <tr>
            <td><?= $i ?></td>
            <td><?=$item['nama']?></td>
            <td><?=$item['username']?></td>
            <td><?=$item['level']?></td>
            <td>
                <?php if ($item['photo']) : ?>
                    <img src="<?= base_url('/image/users/' . $item['photo']) ?>" alt="<?= $item['photo'] ?>" class="img-fluid" height="100" width="100">
                <?php else : ?>
                    <p>Foto tidak tersedia</p>
                <?php endif; ?>
            </td>
            <td>
                <form action="/pengguna/hapus" method="post">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <button  class="btn btn-danger">Hapus</button>
                </form>
                <a href="/pengguna/edit/<?= $item['id'] ?>" class="btn btn-warning">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-center mt-5">Data tidak ditemukan</p>
<?php endif; ?>