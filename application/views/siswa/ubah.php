<div class="container">
  <?= form_open_multipart('siswa/ubah');?>
    <legend>Ubah Data Siswa</legend>
    <input type="hidden" name="id" value="<?= $siswa['id']; ?>"></input>
    <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>" style="width: 500px;">
        <div class="form-text text-danger"><?= form_error('nis'); ?></div>
    </div>
        <div class="row">
            <div class="col">
            <label for="formFile" class="form-label">Foto</label>
            </div>
        </div>
        <div class="row">
        <div class="col-sm-3">
    <div class="mb-3">
        <img src="<?= base_url('assets/foto/') . $siswa['foto']; ?>" id="formFile" class="img-thumbnail" width="225px" height="330px" alt="">
        <input type="file" class="form-control" id="formFile" name="image" style="width: 500px;" require>
        <div class="form-text text-danger"><?= form_error('image'); ?></div>
    </div>
    </div>
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama']; ?>" style="width: 500px;">
        <div class="form-text text-danger"><?= form_error('nama'); ?></div>
    </div>
    <div class="mb-3">
        <label for="angkatan" class="form-label">Angkatan</label>
        <input type="text" class="form-control" id="angkatan" name="angkatan" value="<?= $siswa['angkatan']; ?>" style="width: 500px;">
        <div class="form-text text-danger"><?= form_error('angkatan'); ?></div>
    </div>
    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <select class="form-select" id="jurusan" name="jurusan" style="width: 500px;" onChange="document.getElementById('form_id').submit();">
        <option selected value="<?= $siswa['id_jurusan']; ?>"><?= $siswa['jurusan']; ?></option>
        <?php foreach( $jurusan as $jur ) : ?>
            <option value="<?= $jur['id']; ?>"><?= $jur['jurusan']; ?></option>
        <?php endforeach; ?>
</select>
<div class="form-text text-danger"><?= form_error('jurusan'); ?></div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $siswa['email']; ?>" style="width: 500px;">
        <div class="form-text text-danger"><?= form_error('email'); ?></div>
    </div>
    <div class="mb-3">
        <label for="hp" class="form-label">No HP</label>
        <input type="text" class="form-control" id="hp" name="hp" value="<?= $siswa['hp']; ?>" style="width: 500px;">
        <div class="form-text text-danger"><?= form_error('hp'); ?></div>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" value="<?= $siswa['alamat']; ?>" style="width: 500px;"><?= $siswa['alamat']; ?></textarea>
        <div class="form-text text-danger"><?= form_error('alamat'); ?></div>
    </div>
    <input type="submit" value="Ubah" class="btn btn-primary"></input>
  </form>
</div>