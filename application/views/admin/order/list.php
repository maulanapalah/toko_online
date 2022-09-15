<table class="table table-bordered" id="example1">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Kode transaksi</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Tangal Transaksi</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach ($header_transaksi as $header_transaksi) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $header_transaksi->kode_transaksi ?></td>
			<td><?php echo $header_transaksi->nama_pelanggan ?></td>
			<td><?php echo number_format($header_transaksi->jumlah_transaksi,'0',',','.') ?></td>
			<td><?php echo $header_transaksi->tanggal_bayar ?></td>
			<td><?php echo $header_transaksi->status_bayar ?></td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>