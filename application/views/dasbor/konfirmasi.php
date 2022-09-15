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
							<th>: <?php echo $header_transaksi->kode_transaksi ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Date</td>
							<td>: <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
						</tr>
						<tr>
							<td>Total</td>
							<td>: <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
						</tr>
						<tr>
							<td>Status</td>
							<td>: <?php echo $header_transaksi->status_bayar ?></td>
						</tr>
						<tr>
							<td>Proof Of Payment</td>
							<td>: <?php if ($header_transaksi->bukti_bayar !="") { ?>
								<img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar) ?>" class="img img-thumbnail"> 
							<?php }else{echo 'There Is No Proof Of Payment'; } ?>
							</td>
						</tr>
					</tbody>
				</table>

				<?php 
				// Error upload
				if (isset($error)) {
					echo '<p class="alert alert-warning">'.$error.'</p>';
				}

				// notifikasi
				echo validation_errors('<p class="alert alert-warning">','</p>');

				// form open
				echo form_open_multipart(base_url('dasbor/konfirmasi/'.$header_transaksi->kode_transaksi));
				?>

				<table class="table">
					<tbody>
						<tr>
							<td width="30%">Payment To Account</td>
							<td>
								<select name="id_rekening" class="form-control">
									<?php foreach ($rekening as $rekening) { ?>
									<option value="<?php echo $rekening->id_rekening ?>" <?php if ($header_transaksi->id_rekening==$rekening->id_rekening) { echo"selected"; } ?>>
										<?php echo $rekening->nama_bank ?> (NO. Rekening: <?php echo $rekening->nomer_rekening ?> a.n <?php echo $rekening->nama_pemilik ?>)
									</option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Date</td>
							<td><input type="text" name="tanggal_bayar" class="form-control-lg" placeholder="dd-mm-yyyy" value="<?php if(isset($_POST['tanggal_bayar'])) { echo set_value('tanggal_bayar'); }elseif($header_transaksi->tanggal_bayar!=""){ echo $header_transaksi->tanggal_bayar; }else{ echo date('d-m-Y'); } ?>">
							</td>
						</tr>
						<tr>
							<td>Payment</td>
							<td><input type="number" name="jumlah_bayar" class="form-control-lg" placeholder="Jumlah pembayaran" value="<?php if(isset($_POST['jumlah_bayar'])) { echo set_value('jumlah_bayar'); }elseif($header_transaksi->jumlah_bayar!=""){ echo $header_transaksi->jumlah_bayar; }else{ echo $header_transaksi->jumlah_transaksi; } ?>">
							</td>
						</tr>
						<tr>
							<td>From Of Bank</td>
							<td>
								<input type="text" name="nama_bank" class="form-control" value="<?php echo $header_transaksi->nama_bank ?>" placeholder="Bank Name">
								<small>Example: Bank BCA</small>
							</td>
						</tr>
						<tr>
							<td>From The Account Number</td>
							<td>
								<input type="text" name="rekening_pembayaran" class="form-control" value="<?php echo $header_transaksi->rekening_pembayaran ?>" placeholder="Account Number">
								<small>Example: 13619638</small>
							</td>
						</tr>
						<tr>
							<td>From The Account Owner</td>
							<td>
								<input type="text" name="rekening_pelanggan" class="form-control" value="<?php echo $header_transaksi->rekening_pelanggan ?>" placeholder="Name Of The Owner">
								<small>Example: Raihan Palah Maulana</small>
							</td>
						</tr>
						<tr>
							<td>Upload Proof Of Payment</td>
							<td>
								<input type="file" name="bukti_bayar" class="form-control" placeholder="Upload Proof Of Payment">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<div class="btn-group">
									<button class="btn btn-dark" type="submit" name="submit"><i class="fa fa-upload"></i> <strong>Submit</strong></button>
									<button class="btn btn-secondary" type="reset" name="reset"><i class="fa fa-times"></i> <strong>Reset</strong></button>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

				<?php 
				// form close
				echo form_close();

				// jika tidak ada munculkan notifikasi
				}else{ ?>

					<p class="alert alert-success">
						<i class="fa fa-warning"></i> Belum ada data transaksi
					</p>

				<?php } ?>
		</div>
	</div>
</div>
</section>
