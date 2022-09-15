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
				<h1 class="p-b-20"><?php echo $title ?></h1>	
				<?php 
					// notifikasi
					if ($this->session->flashdata('sukses')) {
						echo '<div class="alert alert-success">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
					}
					
					// Display eror
					echo validation_errors('<div class="alert alert-warning">', '</div>');
					// form open
					echo form_open(base_url('dasbor/profil'), 'class="leave-comment"'); ?>

					<table class="table">
						<thead>
							<tr>
								<th width="25%">Name *</th>
								<th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Name" value="<?php echo $pelanggan->nama_pelanggan ?>" required></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Email Address *</td>
								<td><input type="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo $pelanggan->email ?>" readonly></td>
							</tr>
							<tr>
								<td>Password Change *</td>
								<td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
									<span class="text-danger">Please enter at least 6 characters to change the new password or leave it blank.</span>
								</td>
							</tr>
							<tr>
								<td>Telephone *</td>
								<td><input type="text" name="telepon" class="form-control" placeholder="Telephone" value="<?php echo $pelanggan->telepon ?>" required>
								</td>
							</tr>
							<tr>
								<td>Address *</td>
								<td><textarea name="alamat" class="form-control" placeholder="Address"><?php echo $pelanggan->alamat ?></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<button class="btn btn-dark" type="submit">
										<i class="fa fa-save"></i> <strong>Update Profil</strong>
									</button>
									<button class="btn btn-secondary" type="reset">
										<i class="fa fa-times"></i> <strong>Reset</strong>
									</button>
								</td>
							</tr>
						</tbody>
					</table>


					<?php echo form_close(); ?>
				
		</div>
	</div>
</div>
</section>
