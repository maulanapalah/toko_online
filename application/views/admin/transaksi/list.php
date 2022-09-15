<div class="dt-responsive table-responsive">
	<table id="example1" class="table nowrap">
		<thead>
			<tr class="border-bottom-primary">
				<th class="text-center" width="10">No</th>
				<th>Kode Transaksi</th>
				<th>Nama Pelanggan</th>
				<th>Alamat Pengiriman</th>
				<th>Status Transaksi</th>
				<th>Bukti Transaksi</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach ($transaksi as $transaksi) { ?>
			<tr>
				<td class="text-center"><?php echo $no ?></td>
				<td><?php echo $transaksi->kode_transaksi ?></td>
				<td><?php echo $transaksi->nama_pelanggan ?></td>
				<td><?php echo $transaksi->alamat ?></td>
				<td><?php echo $transaksi->status_bayar ?></td>
				<td>
					<?php if ($transaksi->bukti_bayar !="") { ?>
		                <img style="max-height: 100px;" src="<?php echo base_url('assets/upload/image/'.$transaksi->bukti_bayar) ?>" class="img img-thumbnail">
		            <?php }else{echo 'Belum ada Bukti Pembayaran'; } ?>
					
				</td>
				<td>
					<div class="overlay-edit">			
						<a href="<?php echo base_url('admin/transaksi/detail/'.$transaksi->kode_transaksi) ?>" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
					</div>
				</td>
			</tr>
			<?php $no++; } ?>
		</tbody>
	</table>
</div>