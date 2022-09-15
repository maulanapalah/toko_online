<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Cart item -->
		<div class="container-table-cart pos-relative">
			<div class="wrap-table-shopping-cart bgwhite">
				<h1><?php echo $title ?></h1>
				<hr>
				<div class="clearfix"></div>
				<br>
				<br>

				<?php if ($this->session->flashdata('sukses')) {
					echo '<div class="alert alert-success">';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				} ?>

				<table class="table-shopping-cart">
					<tr class="table-head">
						<th class="column-1">Image</th>
						<th class="column-2">Product</th>
						<th class="column-3">Price</th>
						<th class="column-4 p-l-47">Item</th>
						<th class="column-5" width="15%">Subtotal</th>
						<th class="column-6" width="20%">Action</th>
					</tr>

					<?php 

					// Looping data keranjang belanja
					foreach ($keranjang as $keranjang) { 
						// ambil data produk
						$id_produk	= $keranjang['id'];
						$produk 	= $this->produk_model->detail($id_produk);
						
						// form update keranjang
						echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
					?>

					<tr class="table-row">
						<td class="column-1">
							<div class="cart-img-product b-rad-4 o-f-hidden">
								<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
							</div>
						</td>
						<td class="column-2"><?php echo $keranjang['name'] ?></td>
						<td class="column-3">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
						<td class="column-4">
							<div class="flex-w bo5 of-hidden w-size17">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>
						</td>
						<td class="column-5">Rp. 
							<?php
							$sub_total = $keranjang['price'] * $keranjang['qty'];
							echo number_format($sub_total,'0',',','.');
							?>
						</td>
						<td>
						    <button type="submit" name="update" class="btn btn-dark btn-sm">
						    	<i class="fa fa-edit"></i> Update
						    </button>
						    <a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" class="btn btn-secondary btn-sm">
						    	<i class="fa fa-trash-o"></i> Delete
						    </a>
						</td>	
					</tr>
					<?php 
					// echo form close
					echo form_close();
					// end looping keranjang belanja
					}
					?>
					<tr class="table-row bg-dark" style="font-weight: bold;">
						<td colspan="5" class="column-1 text-light">Total Price</td>
						<td colspan="2" class="column-2 text-light">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
					</tr>
				</table>

				<br>

				<p class="pull-right">
					<!-- Button -->
					<a href="<?php echo base_url('belanja/hapus') ?>" class="btn btn-dark">
						<i class="fa fa-trash-o"></i> <strong>Remove</strong>
					</a>
					<a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-secondary">
						<i class="fa fa-shopping-cart"></i> <strong>Checkout</strong>
					</a>
				</p>
			</div>
		</div>
		
	</div>
</section>