<div class="container">
  <form action="" method="post">
    <legend>Ubah Data Jurusan</legend>
    <div class="mb-3">
        <input type="hidden" name="id" value="<?= $Jurusan['id'];?>">
        <label for="jurusan" class="form-label">Nama Jurusan</label>
        <input type="text" class="form-control" id="jurusan" name="jurusan" style="width: 300px;" value = "<?= $Jurusan['jurusan'];?>">
        <div class="form-text text-danger"><?= form_error('jurusan'); ?></div>
    </div>
    <input type="submit" name="ubah" value="ubah" class="btn btn-primary"></input>
  </form>
</div>