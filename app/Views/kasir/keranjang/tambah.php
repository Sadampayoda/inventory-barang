<?php if($data): ?>
    <?php foreach($data as $item):?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $item['id_barang'] ?></td>
                    <td><?= $item['nama_barang']?></td>
                    <td>
                        <form action="/keranjang/insert" method="get">
                            <button id="tambah" name="id" type="submit" value="<?= $item['id_barang'] ?>" class="btn btn-success">Tambah</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-danger text-center mt-4">Data tidak ditemukan</p>
<?php endif;?>





