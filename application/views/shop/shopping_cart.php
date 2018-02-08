<div role="main" class="main shop" id="shopping_cart_page">
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
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="featured-boxes">
					<div class="row">
						<div class="col-md-12">
							<div class="featured-box featured-box-primary align-left mt-sm">
								<div class="box-content">
									<form method="post" action="<?php echo $this->config->item('link_update_cart'); ?>" id="the_form">
										<table class="shop_table cart">
											<thead>
												<tr>
													<th class="product-remove">&nbsp;</th>
													<th class="product-thumbnail">&nbsp;</th>
													<th class="product-name">Produk</th>
													<th class="product-price">Ukuran</th>
													<th class="product-price">Harga</th>
													<th class="product-quantity">Jumlah Barang</th>
													<th class="product-subtotal">Total</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($cart as $row) { ?>
												<tr class="cart_table_item">
													<td class="product-remove">
														<a title="Remove this item" class="remove a-default" href="#" id="<?php echo $row->id_cart; ?>">
															<i class="fa fa-times"></i>
														</a>
													</td>
													<td class="product-thumbnail">
														<a href="<?php echo $this->config->item('link_shop_detail').'/'.$row->product_slug; ?>">
															<img width="100" height="100" alt="<?php echo $row->product_name; ?>" class="img-responsive" src="<?php echo $row->product_image; ?>">
														</a>
													</td>
													<td class="product-name">
														<a href="<?php echo $this->config->item('link_shop_detail').'/'.$row->product_slug; ?>" class="a-default"><?php echo $row->product_name; ?></a>
													</td>
													<td class="product-price">
														<span class="amount"><?php echo strtoupper($row->size);?></span>
													</td>
													<td class="product-price">
														<span class="amount"><?php echo 'Rp '.number_format($row->product_price,0,',','.');?></span>
													</td>
													<td class="product-quantity">
														<div class="quantity">
															<input type="text" class="input-text qty text" title="Qty" value="<?php echo $row->quantity; ?>" name="quantity" disabled>
														</div>
													</td>
													<td class="product-subtotal">
														<span class="amount"><?php echo 'Rp '.number_format($row->subtotal,0,',','.'); ?></span>
													</td>
												</tr>
												<?php } ?>
												<tr>
													<td class="actions" colspan="6">
														<div class="actions-continue">
															<h4 class="fontblack">Subtotal</h4>
														</div>
													</td>
													<td>
														<h4><?php echo 'Rp '.number_format($cart_subtotal,0,',','.'); ?></h4>
													</td>
												</tr>
											</tbody>
										</table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="featured-boxes">
					<div class="row">
						<div class="col-sm-12">
							<div class="featured-box featured-box-primary align-left mt-xlg">
								<div class="box-content">
									<h4 class="heading-primary text-uppercase mb-md">Alamat & Ongkos Kirim</h4>
									<form action="<?php echo $this->config->item('link_shipping_cart'); ?>" id="frmCalculateShipping" method="post">
										<input type="hidden" name="cart_subtotal" value="<?php echo $cart_subtotal; ?>">
										<div class="row">
											<div class="form-group">
												<div class="col-md-6">
													<div class="form-group mb-lg">
														<label>Alamat Kirim</label>
														<?php if (empty($shipment) == FALSE) { ?>
														<textarea name="shipment_address" id="shipment_address" class="form-control" rows="3" required><?php echo set_value('shipment_address', $shipment->shipment_address); ?></textarea>
														<?php } else { ?>
														<textarea name="shipment_address" id="shipment_address" class="form-control" rows="3" required><?php echo set_value('shipment_address'); ?></textarea>
														<?php } ?>
													</div>
													<div class="form-group">
														<label>Kode Pos</label>
														<?php if (empty($shipment) == FALSE) { ?>
														<input type="text" name="postal_code" id="postal_code" class="form-control" value="<?php echo set_value('postal_code', $shipment->postal_code); ?>" required>
														<?php } else { ?>
														<input type="text" name="postal_code" id="postal_code" class="form-control" value="<?php echo set_value('postal_code'); ?>" required>
														<?php } ?>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group mb-lg">
														<label>Provinsi & Kota</label>
														<select class="form-control" title="Mohon pilih salah satu." name="id_provinsi" id="id_provinsi" required>
															<option value="">-- Provinsi --</option>
															<?php //if (empty($shipment) == FALSE) { echo "ada"; } else { echo "no"; } die(); ?>
															
															<?php if (empty($shipment) == FALSE) {
																foreach ($provinsi_lists as $key => $val) { ?>
																<option id="<?php echo $val->id_provinsi; ?>" value="<?php echo $val->id_provinsi; ?>" <?php if ($shipment->provinsi->id_provinsi == $val->id_provinsi) { echo 'selected="selected"'; } echo set_select('id_provinsi', $val->id_provinsi); ?>><?php echo ucwords($val->provinsi); ?></option>
															<?php } } else {
																foreach ($provinsi_lists as $key => $val) { ?>
																<option id="<?php echo $val->id_provinsi; ?>" value="<?php echo $val->id_provinsi; ?>" <?php echo set_select('id_provinsi', $val->id_provinsi); ?>><?php echo ucwords($val->provinsi); ?></option>
															<?php } } ?>
														</select>
													</div>
													<div class="form-group">
														<div id="area"></div>
														<?php if (empty($shipment) == FALSE) { ?>
														<select class="form-control" title="Mohon pilih salah satu." name="id_kota" id="id_kota2">
															<option value="">-- Kota --</option>
															<?php foreach ($kota_lists as $key => $val) { ?>
																<option id="<?php echo $val->id_kota; ?>" value="<?php echo $val->id_kota; ?>" <?php if ($shipment->kota->id_kota == $val->id_kota) { echo 'selected="selected"'; } echo set_select('id_kota', $val->id_kota); ?>><?php echo ucwords($val->kota); ?></option>
															<?php } ?>
														</select>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<input type="submit" value="Proses Checkout" class="btn pull-right btn-primary btn-lg btn-read" data-loading-text="Loading...">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>