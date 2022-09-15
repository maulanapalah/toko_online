<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Cart item -->
		<div class="pos-relative">
			<div class="bgwhite">
				<h1><?php echo $title ?></h1>
				<hr>
				<div class="clearfix"></div>

				<?php if ($this->session->flashdata('sukses')) {
					echo '<div class="alert alert-warning">';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				} ?>

				<div class="alert alert-secondary">
					<p>
						Thank you, please confirm payment and the items you ordered will be processed.
						<div style="text-align: right;">
							<a href="<?php echo base_url('dasbor') ?>" class="btn btn-dark btn-sm active" role="button" aria-pressed="true">Next  <i class="fa fa-arrow-right text-light" aria-hidden="true"></i></a>
						</div>
					</p>
				</div>

				<br>


			</div>
		</div>

	</div>
</section>