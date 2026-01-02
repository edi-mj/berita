<form action="#" method="POST" class="form-artikel" enctype="multipart/form-data">

  <div class="form-group">
    <label for="judul">Judul Artikel</label>
    <input type="text" id="judul" name="judul" class="form-control" value="<?= isset($artikel) ? $artikel['judul'] : '' ?>">
  </div>

  <div class="form-group">
    <label for="isi">Konten</label>
    <textarea id="isi" name="isi" class="form-control" rows="10"><?= isset($artikel) ?  $artikel['isi'] : '' ?></textarea>
  </div>

  <div class="form-group">
    <label for="cover">Cover</label>
    <input type="file" name="cover" id="cover">
  </div>

  <div class="form-actions">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </div>

</form>