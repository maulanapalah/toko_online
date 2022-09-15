<table class="table table-bordered" id="example1">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telpon</th>
			<th>Alamat</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach ($pelanggan as $pelanggan) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $pelanggan->nama_pelanggan ?></td>
			<td><?php echo $pelanggan->email ?></td>
			<td><?php echo $pelanggan->telepon ?></td>
			<td><?php echo $pelanggan->alamat ?></td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>