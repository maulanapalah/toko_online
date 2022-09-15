<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				
				<h4 class="m-text14 p-b-7 text-center">
					Our Blog
				</h4>

				<hr>

				<ul class="berita" style="height: 400px; overflow: auto;">
				<?php foreach ($berita_related as $berita_related) { ?>

					<?php  
						// element yang di bawa
						echo form_hidden('id', $berita_related->id_berita);
						echo form_hidden('name', $berita_related->nama_berita);
						// element redirect
						echo form_hidden('redirect_page', str_replace('index.php','',current_url()));
					?>

					<li class="p-t-4">
						<a href="<?php echo base_url('berita/detail/'.$berita_related->slug_berita) ?>" class="s-text13 active1">
							<div class="card mb-3" style="max-width: 540px; height: 79px;">
							  	<div class="row no-gutters">
								    <div class="col-md-4">
								      <img src="<?php echo base_url('assets/upload/images/'.$berita_related->gambar) ?>" alt="<?php echo $berita_related->nama_berita ?>" style="height: 77px; width: 77px;">
								    </div>
							    	<div class="col-md-8">
							      		<div class="card-body">
									        <p class="card-text text-dark" style="font-size: 12px;"><?php echo $berita_related->nama_berita ?></p>
							        		<p class="card-text" style="font-size: 10px;"><small class="text-muted"><?php echo date('d M Y   H:i', strtotime($berita_related->tanggal_post )); ?>
							        		</small></p>
							      		</div>
							    	</div>
							  	</div>
							</div>
						</a>
					</li>
					<?php 
						// clossing form
						echo form_close();
					?>

				<?php } ?>
				</ul>

			</div>
		</div>

		<div class="col-sm-6 col-md-8 col-lg-9">
			<!-- Product -->
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-12">
					<div class="card bg-dark text-white">
					  	<img src="<?php echo base_url('assets/upload/images/'.$berita->gambar) ?>" alt="<?php echo $berita->nama_berita ?>" class="card-img" style="height: 350px;">
					</div>
					<div class="text">
						<h2 class="p-t-25"><?php echo $title ?></h2>

						<?php 
							// element yang di bawa
							echo form_hidden('id', $berita->id_berita);
							echo form_hidden('name', $berita->nama_berita);
							// element redirect
							echo form_hidden('redirect_page', str_replace('index.php','',current_url()));
						?>

						<p style="font-size: 10px;">
							<?php echo date('d M Y   H:i', strtotime($berita->tanggal_post )); ?>
						</p>
					  	<p class="p-t-25"><?php echo $berita->keterangan ?></p>
					  	
					  	<?php 
							// clossing form
							echo form_close();
						?>
				  	</div>
				</div>
			</div>

		</div>
	</div>
</div>
</section>