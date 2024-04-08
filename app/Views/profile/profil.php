<form action="/profil" method="POST">
    <div class="form-group">
        <label for="nama">nama</label>
        <input value="<?= $data['nama']?>" name="nama" type="text" class="form-control" id="nama">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input value="<?= $data['username']?>" name="username" type="text" class="form-control" id="username">
    </div>
    <div class="form-group">
        <label for="noHp">Nomer Hp</label>
        <input value="<?= $data['noHp']?>" name="noHp" type="text" class="form-control" id="noHp">
    </div>
    <button type="button" class="btn btn-primary">Simpan </button>
</form>