<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!--  -->
				<?php include('menu.php') ?>
			</div>
		</div>

		<div class="col-sm-6 col-md-9 col-lg-9 p-b-50">
			<!-- Product -->				
				<h1><?php echo $title ?></h1>
				<hr>	
				<p>Here is your shopping history.</p>

				<?php 
				// jika terdapat transaksi makam muncul tabelnya 
				if ($header_transaksi) { 
				?>
				<table class="table table-bordered" width="100%">
					<thead>
						<tr>
							<th width="20%">Transaction Code</th>
							<th> <?php echo $header_transaksi->kode_transaksi ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Date</td>
							<td> <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
						</tr>
						<tr>
							<td>Total</td>
							<td>Rp. <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
						</tr>
						<tr>
							<td>Status</td>
							<td> <?php echo $header_transaksi->status_bayar ?></td>
						</tr>
					</tbody>
				</table>

				<table class="table table-bordered" width="100%">	
					<thead>
						<tr class="bg-dark">
							<th class="text-light text-center">No</th>
							<th class="text-light text-center">Product Code</th>
							<th class="text-light text-center">Product Name</th>
							<th class="text-light text-center">Total</th>
							<th class="text-light text-center">Price</th>
							<th class="text-light text-center">Total Price</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($transaksi as $transaksi) { ?>
						<tr>
							<td class="text-center"><?php echo $i ?></td>
							<td><?php echo $transaksi->kode_produk ?></td>
							<td><?php echo $transaksi->nama_produk ?></td>
							<td class="text-center"><?php echo number_format($transaksi->jumlah) ?></td>
							<td>Rp. <?php echo number_format($transaksi->harga) ?></td>
							<td>Rp. <?php echo number_format($transaksi->total_harga) ?></td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>

				<?php 
				// jika tidak ada munculkan notifikasi
				}else{ ?>

					<p class="alert alert-success">
						<i class="fa fa-warning"></i> No Transaction Data
					</p>

				<?php } ?>
		</div>
	</div>
</div>
</section>
