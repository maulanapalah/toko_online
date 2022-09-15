<?php  
// eror upload
if (isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
// notifikasi eror
echo validation_errors('<div class=alert alert-warning>', '</div>');

// return open
echo form_open_multipart(base_url('admin/berita/tambah'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Nama Berita</label>
  <div class="col-md-5">
    <input type="text" name="nama_berita" class="form-control" placeholder="Nama Berita" value="<?php echo set_value('nama_berita') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Kode Berita</label>
  <div class="col-md-5">
    <input type="text" name="kode_berita" class="form-control" placeholder="Kode Berita" value="<?php echo set_value('kode_berita') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Kategori Berita</label>
  <div class="col-md-5">
    <select name="id_kategori" class="form-control">
      <?php foreach ($berita_kategori as $berita_kategori) { ?>
      <option value="<?php echo $berita_kategori->id_kategori ?>">
        <?php echo $berita_kategori->nama_kategori ?> 
      </option>
      <?php } ?>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Keterangan Berita</label>
  <div class="col-md-10">
    <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor">
      <?php echo set_value('keterangan') ?>
    </textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Keyword (Untuk CEO Google)</label>
  <div class="col-md-10">
    <textarea name="keywords" class="form-control" placeholder="Keyword (Untuk CEO Google)">
      <?php echo set_value('keywords') ?>
    </textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Upload Gambar Berita</label>
  <div class="col-md-10">
    <input type="file" name="gambar" class="form-control" required="required">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Status Berita</label>
  <div class="col-md-10">
    <select name="status_berita" class="form-control">
      <option value="Publish">Publikasikan</option>
      <option value="Draft">Simpan Sebagai Draft</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
  	<button class="btn btn-success btn-lg" name="submit" type="submit">
  		<i class="fa fa-save"></i> Simpan
  	</button>
  	<button class="btn btn-info btn-lg" name="reset" type="reset">
  		<i class="fa fa-times"></i> Reset
  	</button>
  </div>
</div>

<?php echo form_close(); ?>