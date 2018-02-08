<div role="main" class="main shop" id="checkout_page">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $this->config->item('link_index'); ?>" class="a-default">Home</a></li>
                        <li class="active">Shop</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle a-default" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
									Periksa Kembali Pesanan Anda
								</a>
							</h4>
						</div>
						<div id="collapseThree" class="accordion-body collapse in">
							<div class="panel-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th></th>
											<th>Produk</th>
											<th>Ukuran</th>
											<th>Harga</th>
											<th>Jumlah Barang</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($cart as $row) { ?>
										<tr>
											<td>
												<a href="<?php echo $this->config->item('link_shop_detail').'/'.$row->product_slug; ?>">
													<img width="100" height="100" alt="" class="img-responsive" src="<?php echo $row->product_image; ?>">
												</a>
											</td>
											<td>
												<a href="<?php echo $this->config->item('link_shop_detail').'/'.$row->product_slug; ?>" class="a-default"><?php echo $row->product_name; ?></a>
											</td>
											<td>
												<span class="amount"><?php echo $row->size; ?></span>
											</td>
											<td>
												<span class="amount"><?php echo 'Rp '.number_format($row->product_price,0,',','.');?></span>
											</td>
											<td>
												<?php echo $row->quantity; ?>
											</td>
											<td>
												<span class="amount"><?php echo 'Rp '.number_format($row->subtotal,0,',','.'); ?></span>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<hr class="tall">
								<h4 class="heading-primary">Data Pemesan</h4>
								<table class="cart-totals">
									<tbody>
										<tr class="cart-subtotal">
											<th><strong>Nama</strong></th>
											<td>
												<strong><span class="amount"><?php echo ucwords($this->session->userdata('name')); ?></span></strong>
											</td>
										</tr>
										<tr class="shipping">
											<th>No HP</th>
											<td><?php echo $this->session->userdata('phone_number'); ?></td>
										</tr>
										<tr class="total">
											<th><strong>Email</strong></th>
											<td><?php echo $this->session->userdata('email'); ?></td>
										</tr>
									</tbody>
								</table>
								<hr class="tall">
								<h4 class="heading-primary">Alamat Kirim</h4>
								<table class="cart-totals">
									<tbody>
										<tr class="cart-subtotal">
											<th><strong>Alamat</strong></th>
											<td><?php echo $cart_shipment->shipment_address; ?></td>
										</tr>
										<tr class="shipping">
											<th>Kode Pos</th>
											<td><?php echo $cart_shipment->postal_code; ?></td>
										</tr>
										<tr class="total">
											<th><strong>Provinsi & Kota</strong></th>
											<td><?php echo ucwords($cart_shipment->provinsi->provinsi.' - '.$cart_shipment->kota->kota); ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<h4 class="heading-primary">Detail Harga</h4>
				<table class="cart-totals">
					<tbody>
						<tr class="cart-subtotal">
							<th>
								<strong>Subtotal</strong>
							</th>
							<td>
								<strong><span class="amount"><?php echo 'Rp '.number_format($cart_subtotal,0,',','.'); ?></span></strong>
							</td>
						</tr>
						<tr class="shipping">
							<th>Ongkos Kirim</th>
							<td><?php echo 'Rp '.number_format($cart_shipment->total,0,',','.'); ?></td>
						</tr>
						<tr class="shipping">
							<th>Kode Unik</th>
							<td><?php echo 'Rp '.number_format($unique_trf,0,',','.'); ?></td>
						</tr>
						<tr class="total">
							<th>
								<strong>Total Pembayaran</strong>
							</th>
							<td>
								<strong><span class="amount"><?php echo 'Rp '.number_format($cart_total->total,0,',','.'); ?></span></strong>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="actions-continue">
					<a href="<?php echo $this->config->item('link_shopping_cart'); ?>" class="btn btn-lg btn-quaternary btn-read mt-xl mr-sm">Keranjang Belanja</button>
					<a href="<?php echo $this->config->item('link_order'); ?>" class="btn btn-lg btn-primary btn-read mt-xl">Proses Order</a>
				</div>
			</div>
		</div>
	</div>
</div>