<p>
	<a href="<?php echo base_url('admin/size/tambah') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>


<table class="table table-bordered" id="example1">
<?php 
// notifikasi
if ($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th class="col-lg-1">No</th>
			<th class="col-lg-2">Size</th>
			<th class="col-lg-2">Slug</th>
			<th class="col-lg-4">Kategori</th>
			<th class="col-lg-3">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($size as $size) { ?>
		<tr>
			<td><?php echo $size->urutan ?></td>
			<td><?php echo $size->nama_size ?></td>
			<td><?php echo $size->slug_size ?></td>
			<td><?php echo $size->nama_kategori ?></td>
			<td>
				<a href="<?php echo base_url('admin/size/edit/'.$size->id_size) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>
				<a href="<?php echo base_url('admin/size/delete/'.$size->id_size) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus data?')"><i class="fa fa-trash-o"></i>Delete</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>