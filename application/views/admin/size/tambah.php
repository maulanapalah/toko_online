<?php  
// notifikasi eror
echo validation_errors('<div class=alert alert-warning>', '</div>');

// return open
echo form_open(base_url('admin/size/tambah'),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama size</label>
  <div class="col-md-5">
    <input type="text" name="nama_size" class="form-control" placeholder="Nama size" value="<?php echo set_value('nama_size') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Urutan</label>
  <div class="col-md-5">
    <input type="number" name="urutan" class="form-control" placeholder="Urutan Size" value="<?php echo set_value('urutan') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Kategori Produk</label>
  <div class="col-md-5">
    <select name="id_kategori" class="form-control">
      <option value="">
        - Option - 
      </option>
      <?php foreach ($kategori as $kategori) { ?>
      <option value="<?php echo $kategori->id_kategori ?>">
        <?php echo $kategori->nama_kategori ?> 
      </option>
      <?php } ?>
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