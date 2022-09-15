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

				<p class="alert alert-secondary">Registration Successful. <a href="<?php echo base_url('masuk') ?>" class="btn btn-dark btn-sm">Login</a>.
					checkout Now. <a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-shopping-cart"></i> Check Out</a></p>



			</div>
		</div>
	</div>
</section>