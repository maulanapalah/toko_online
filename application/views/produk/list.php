<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/shining_bright/header/6.jpg);">
	<h2 class="l-text2 t-center" style="font-family: 'Roboto';">
		<?php echo $title ?>
	</h2>
	<p class="m-text13 t-center" style="font-family: 'Roboto';">
		<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
	</p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">

				<!--  -->
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<h4 class="m-text14">
						Categories
					</h4>

					<hr>

					<ul class="p-b-15">
						<a href="<?php echo base_url('produk') ?>" class="s-text13 active1" style="font-size: 16px;">
							All
						</a>
						<?php foreach ($listing_kategori as $listing_kategori) { ?>
						<li class="p-t-4">
							<a href="<?php echo base_url('produk/kategori/'.$listing_kategori->slug_kategori) ?>" class="s-text13 active1" style="font-size: 16px;">
								<?php echo $listing_kategori->nama_kategori ?>
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>

				<!--  -->
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<h4 class="m-text14 p-b-15 p-t-20">
						Filters
					</h4>

					<div class="filter-price p-t-22 p-b-30 bo3">
						<div class="m-text15 p-b-17">
							Price
						</div>

						<div class="wra-filter-bar">
							<div id="filter-bar"></div>
						</div>

						<div class="flex-sb-m flex-w p-t-16">
							<div class="w-size11">
								<!-- Button -->
								<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
									Filter
								</button>
							</div>

							<div class="s-text3 p-t-10 p-b-10">
								Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
							</div>
						</div>
					</div>
				</div>

				<div class="filter-color p-t-22 p-b-50 bo3">
					<div class="m-text15 p-b-12">
						Color
					</div>

					<ul class="flex-w">
						<li class="m-r-10">
							<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
							<label class="color-filter color-filter1" for="color-filter1"></label>
						</li>

						<li class="m-r-10">
							<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
							<label class="color-filter color-filter2" for="color-filter2"></label>
						</li>

						<li class="m-r-10">
							<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
							<label class="color-filter color-filter3" for="color-filter3"></label>
						</li>

						<li class="m-r-10">
							<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
							<label class="color-filter color-filter4" for="color-filter4"></label>
						</li>

						<li class="m-r-10">
							<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
							<label class="color-filter color-filter5" for="color-filter5"></label>
						</li>

						<li class="m-r-10">
							<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
							<label class="color-filter color-filter6" for="color-filter6"></label>
						</li>

						<li class="m-r-10">
							<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
							<label class="color-filter color-filter7" for="color-filter7"></label>
						</li>
					</ul>
				</div>

			</div>

			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
				<!--  -->
				<div class="flex-sb-m flex-w p-b-35">
					<div class="flex-w">
						<div class="dropdown">
						  	<a class="btnproduk btn border-secondary dropdown-toggle btn-lg rounded-0" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    	Default Sorting
						  	</a>

						  <div class="menuproduk dropdown-menu" aria-labelledby="dropdownMenuLink">
						    <a class="dropdown-item" href="#">Action</a>
						  </div>
						</div>

						<div class="dropdown pl-3">
						  	<a class="btnproduk btn border-secondary dropdown-toggle btn-lg rounded-0" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    	Price Sorting
						  	</a>

						  <div class="menuproduk dropdown-menu" aria-labelledby="dropdownMenuLink">
						    <a class="dropdown-item" href="#">Action</a>
						  </div>
						</div>
					</div>

					<!--  -->

					<?php echo form_open('produk/search') ?>
						<div class="searchproduk search-product pos-relative bo4 of-hidden border-secondary">
							<input class="size6 p-l-23 p-r-50 p-b-10" type="text" name="keyword" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					<?php echo form_close(); ?>
				</div>

				<!-- Product -->
				<div class="row">
					<?php foreach ($produk as $produk) { ?>
					<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

						<?php 
						// untuk memperoses belanjaan
						echo form_open(base_url('belanja/add')); 
						// element yang di bawa
						echo form_hidden('id', $produk->id_produk);
						echo form_hidden('qty', 1);
						echo form_hidden('price', $produk->harga);
						echo form_hidden('name', $produk->nama_produk);
						// element redirect
						echo form_hidden('redirect_page', str_replace('index.php','',current_url()));
						?>

						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-label">
								<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>

									<div class="block2-btn-viewcart w-size1 trans-0-4">
										<a role="button" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>">
											View Produk
										</a>
									</div>

								</div>
							</div>

							<div class="block2-txt p-t-20">
								<p class="block2-name dis-block s-text3 p-b-5">
									<?php echo $produk->nama_produk ?>
								</p>

								<span class="block2-price m-text6 p-r-5">
									Rp. <?php echo number_format($produk->harga,'0',',','.') ?>
								</span>

							</div>
						</div>

						<?php 
						// clossing form
						echo form_close();
						?>

					</div>
					<?php } ?>

				</div>

				<!-- Pagination -->
				<div class="pagination flex-m flex-w p-t-26">
					<?php echo $pagin ?>
				</div>
			</div>
		</div>
	</div>
</section>
