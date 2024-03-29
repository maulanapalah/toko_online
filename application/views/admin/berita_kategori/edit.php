<?php  
// notifikasi eror
echo validation_errors('<div class=alert alert-warning>','</div>');

// return open
echo form_open(base_url('admin/kategori_berita/edit/'.$berita_kategori->id_kategori), ' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama kategori</label>
  <div class="col-md-5">
    <input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" value="<?php echo $berita_kategori->nama_kategori ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Urutan</label>
  <div class="col-md-5">
    <input type="number" name="urutan" class="form-control" placeholder="Urutan kategori" value="<?php echo $berita_kategori->urutan ?>" required>
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