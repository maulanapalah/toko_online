<p>
	<a href="<?php echo base_url('admin/kategori_berita/tambah') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<?php 
// notifikasi
if ($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>

<table class="table table-bordered" id="example1">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Slug</th>
			<th>Urutan</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach ($berita_kategori as $berita_kategori) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $berita_kategori->nama_kategori ?></td>
			<td><?php echo $berita_kategori->slug_kategori ?></td>
			<td><?php echo $berita_kategori->urutan ?></td>
			<td>
				<a href="<?php echo base_url('admin/kategori_berita/edit/'.$berita_kategori->id_kategori) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>
				<a href="<?php echo base_url('admin/kategori_berita/delete/'.$berita_kategori->id_kategori) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus data?')"><i class="fa fa-trash-o"></i>Delete</a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>