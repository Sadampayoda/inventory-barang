<form action="/keranjang/update/<?= $data['id_keranjang'] ?>" method="post">
    <div class="form-group">
        <input type="number" name="jumlah" class="form-control" value="<?= $data['jumlah'] ?>">
        <div class="input-group-append">
            <button  class="btn btn-success"  type="submit">Edit</button>
        </div>
    </div>
</form>