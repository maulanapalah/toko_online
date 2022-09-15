<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Cart item -->
		<div class="pos-relative">
			<div class="bgwhite">
				<h1><?php echo $title ?></h1>
				<hr>
				<div class="clearfix"></div>
				<br>
				<br>

				<?php if ($this->session->flashdata('sukses')) {
					echo '<div class="alert alert-dark">';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				} ?>

				<p class="alert alert-secondary">Don't have an account yet? Please <a href="<?php echo base_url('registrasi') ?>" class="btn btn-dark btn-sm">Registrasi</a></p>

				<div class="col-md-12">
					<?php 
					// Display eror
					echo validation_errors('<div class="alert alert-dark">', '</div>');
					// display notifikasi eror login
					if ($this->session->flashdata('warning')) {
						echo '<div class="alert alert-dark">';
						echo $this->session->flashdata('warning');
						echo '</div>';
					}
					// display notifikasi eror sukses logout
					// if ($this->session->flashdata('sukses')) {
					// 	echo '<div class="alert alert-success">';
					// 	echo $this->session->flashdata('sukses');
					// 	echo '</div>';
					// }
					// form open
					echo form_open(base_url('masuk'), 'class="leave-comment"'); ?>

					<table class="table">
						<tbody>
							<tr>
								<td width="20%">Email Address</td>
								<td><input type="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo set_value('email') ?>" required></td>
							</tr>
							<tr>
								<td width="20%">Password</td>
								<td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<button class="btn btn-dark" type="submit">
										<i class="fa fa-save"></i> Login
									</button>
									<button class="btn btn-secondary" type="reset">
										<i class="fa fa-times"></i> Reset
									</button>
								</td>
							</tr>
						</tbody>
					</table>


					<?php echo form_close(); ?>
				</div>

			</div>
		</div>

	</div>
</section>