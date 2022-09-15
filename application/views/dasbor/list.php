<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!--  -->
				<?php include('menu.php') ?>
			</div>
		</div>

		<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
			<!-- Product -->

				<div class="alert alert-dark" style="width: 910px;">
					<h1>Welcome <i><strong><?php echo $this->session->userdata('nama_pelanggan'); ?></strong></i></h1>
				</div>

				<?php 
				// jika terdapat transaksi makam muncul tabelnya 
				if ($header_transaksi) { 
				?>
				<table class="table table-bordered" width="100%">	
					<thead>
						<tr class="bg-dark text-light">
							<th class="text-center">No</th>
							<th class="text-center">Transaction Code</th>
							<th class="text-center">Date</th>
							<th class="text-center">Price</th>
							<th class="text-center">Item</th>
							<th class="text-center">Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($header_transaksi as $header_transaksi) { ?>
						<tr>
							<td class="text-center"><?php echo $i ?></td>
							<td><?php echo $header_transaksi->kode_transaksi ?></td>
							<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
							<td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
							<td class="text-center"><?php echo $header_transaksi->total_item ?></td>
							<td><?php echo $header_transaksi->status_bayar ?></td>
							<td>
								<div class="btn-group">
									<a href="<?php echo base_url('dasbor/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-dark btn-sm"><i class="fa fa-eye"></i> <strong>Detail</strong></a>
									<a href="<?php echo base_url('dasbor/konfirmasi/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-secondary btn-sm"><i class="fa fa-upload"></i> <strong>Confirmation</strong></a>
								</div>
							</td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>

				<?php 
				// jika tidak ada munculkan notifikasi
				}else{ ?>

					<p class="alert alert-success">
						<i class="fa fa-warning"></i> There Is No Transaction Data
					</p>

				<?php } ?>
		</div>
	</div>
</div>
</section>
