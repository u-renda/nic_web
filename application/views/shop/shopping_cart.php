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
													<th class="product-price">Harga</th>
													<th class="product-quantity">Jumlah</th>
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
															<img width="100" height="100" alt="" class="img-responsive" src="<?php echo $row->product_image; ?>">
														</a>
													</td>
													<td class="product-name">
														<a href="<?php echo $this->config->item('link_shop_detail').'/'.$row->product_slug; ?>" class="a-default"><?php echo $row->product_name; ?></a>
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
												<!--<tr>
													<td class="actions" colspan="6">
														<div class="actions-continue">
															<input type="submit" value="Update Cart" name="update_cart" class="btn btn-default">
														</div>
													</td>
												</tr>-->
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
						<div class="col-sm-6">
							<div class="featured-box featured-box-primary align-left mt-xlg">
								<div class="box-content">
									<h4 class="heading-primary text-uppercase mb-md">Ongkos Kirim</h4>
									<form action="<?php echo $this->config->item('link_shipping_cart'); ?>" id="frmCalculateShipping" method="post">
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>Provinsi</label>
													<select class="form-control" title="Mohon pilih salah satu." name="id_provinsi" id="id_provinsi" required>
														<option value="">-- Provinsi --</option>
														<?php foreach ($provinsi_lists as $key => $val) { ?>
														<option value="<?php echo set_value('id_provinsi', $val->id_provinsi); ?>" id="<?php echo $val->id_provinsi; ?>"><?php echo ucwords($val->provinsi); ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<div id="area"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<input type="submit" value="Update Totals" class="btn btn-default pull-right mb-xl" data-loading-text="Loading...">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="featured-box featured-box-primary align-left mt-xlg">
								<div class="box-content">
									<h4 class="heading-primary text-uppercase mb-md">Cart Totals</h4>
									<table class="cart-totals">
										<tbody>
											<tr class="cart-subtotal">
												<th><strong>Cart Subtotal</strong></th>
												<td>
													<strong><span class="amount"><?php echo 'Rp '.number_format($cart_subtotal,0,',','.'); ?></span></strong>
												</td>
											</tr>
											<tr class="shipping">
												<th>Ongkos Kirim</th>
												<td>
													<?php echo 'Rp '.number_format($shipping,0,',','.'); ?>
													<!--<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">-->
												</td>
											</tr>
											<tr class="total">
												<th><strong>Order Total</strong></th>
												<td>
													<strong><span class="amount"><?php echo 'Rp '.number_format($total,0,',','.'); ?></span></strong>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="actions-continue">
							<button type="submit" class="btn pull-right btn-primary btn-lg btn-read">Proceed to Checkout <i class="fa fa-angle-right ml-xs"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>