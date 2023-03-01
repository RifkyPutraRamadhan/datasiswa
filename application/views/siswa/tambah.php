<div class="container">
  <?= form_open_multipart('siswa/tambah');?>
    <legend>Tambah Data Siswa</legend>
    <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="text" class="form-control" id="nis" name="nis" style="width: 500px;">
        <div class="form-text text-danger"><?= form_error('nis'); ?></div>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Foto</label>
        <input type="file" class="form-control" id="formFile" name="image" style="width: 500px;" required>
        <div class="form-text text-danger"><?= form_error('image'); ?></div>
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" style="width: 500px;">
        <div class="form-text text-danger"><?= form_error('nama'); ?></div>
    </div>
    <div class="mb-3">
        <label for="angkatan" class="form-label">Angkatan</label>
        <input type="text" class="form-control" id="angkatan" name="angkatan" style="width: 500px;">
        <div class="form-text text-danger"><?= form_error('angkatan'); ?></div>
    </div>
    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <select class="form-select" id="jurusan" name="jurusan" style="width: 500px;" onChange="document.getElementById('form_id').submit();">
        <option selected>Pilih Jurusan</option>
        <?php foreach( $jurusan as $jur ) : ?>
            <option value="<?= $jur['id']; ?>"><?= $jur['jurusan']; ?></option>
        <?php endforeach; ?>
        </select>
        <div class="form-text text-danger"><?= form_error('jurusan'); ?></div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" style="width: 500px;">
        <div class="form-text text-danger"><?= form_error('email'); ?></div>
    </div>
    <div class="mb-3">
        <label for="hp" class="form-label">No HP</label>
        <input type="text" class="form-control" id="hp" name="hp" style="width: 500px;">
        <div class="form-text text-danger"><?= form_error('hp'); ?></div>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" style="width: 500px;"></textarea>
        <div class="form-text text-danger"><?= form_error('alamat'); ?></div>
    </div>
    <input type="submit" value="Tambah" class="btn btn-primary"></input>
  </form>
</div>