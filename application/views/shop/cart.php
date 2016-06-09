<div role="main" class="main shop">
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
									<form method="post" action="">
										<table class="shop_table cart">
											<thead>
												<tr>
													<th class="product-remove">&nbsp;</th>
													<th class="product-thumbnail">&nbsp;</th>
													<th class="product-name">Product</th>
													<th class="product-price">Price</th>
													<th class="product-quantity">Quantity</th>
													<th class="product-subtotal">Total</th>
												</tr>
											</thead>
											<tbody>
												<tr class="cart_table_item">
													<td class="product-remove">
														<a title="Remove this item" class="remove a-default" href="#">
															<i class="fa fa-times"></i>
														</a>
													</td>
													<td class="product-thumbnail">
														<a href="shop-product-sidebar.html">
															<img width="100" height="100" alt="" class="img-responsive" src="../../upload_nic/anye1.jpg">
														</a>
													</td>
													<td class="product-name">
														<a href="shop-product-sidebar.html" class="a-default">Photo Camera</a>
													</td>
													<td class="product-price">
														<span class="amount">$299</span>
													</td>
													<td class="product-quantity">
														<form enctype="multipart/form-data" method="post" class="cart">
															<div class="quantity">
																<input type="button" class="minus" value="-">
																<input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
																<input type="button" class="plus" value="+">
															</div>
														</form>
													</td>
													<td class="product-subtotal">
														<span class="amount">$299</span>
													</td>
												</tr>
												<tr class="cart_table_item">
													<td class="product-remove">
														<a title="Remove this item" class="remove a-default" href="#">
															<i class="fa fa-times"></i>
														</a>
													</td>
													<td class="product-thumbnail">
														<a href="shop-product-sidebar.html">
															<img width="100" height="100" alt="" class="img-responsive" src="../../upload_nic/anye2.jpg">
														</a>
													</td>
													<td class="product-name">
														<a href="shop-product-sidebar.html" class="a-default">Golf Bag</a>
													</td>
													<td class="product-price">
														<span class="amount">$72</span>
													</td>
													<td class="product-quantity">
														<form enctype="multipart/form-data" method="post" class="cart">
															<div class="quantity">
																<input type="button" class="minus" value="-">
																<input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
																<input type="button" class="plus" value="+">
															</div>
														</form>
													</td>
													<td class="product-subtotal">
														<span class="amount">$72</span>
													</td>
												</tr>
												<tr class="cart_table_item">
													<td class="product-remove">
														<a title="Remove this item" class="remove a-default" href="#">
															<i class="fa fa-times"></i>
														</a>
													</td>
													<td class="product-thumbnail">
														<a href="shop-product-sidebar.html">
															<img width="100" height="100" alt="" class="img-responsive" src="../../upload_nic/anye3.jpg">
														</a>
													</td>
													<td class="product-name">
														<a href="shop-product-sidebar.html" class="a-default">Workout</a>
													</td>
													<td class="product-price">
														<span class="amount">$60</span>
													</td>
													<td class="product-quantity">
														<form enctype="multipart/form-data" method="post" class="cart">
															<div class="quantity">
																<input type="button" class="minus" value="-">
																<input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
																<input type="button" class="plus" value="+">
															</div>
														</form>
													</td>
													<td class="product-subtotal">
														<span class="amount">$60</span>
													</td>
												</tr>
												<tr>
													<td class="actions" colspan="6">
														<div class="actions-continue">
															<input type="submit" value="Update Cart" name="update_cart" class="btn btn-default">
														</div>
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
						<div class="col-sm-6">
							<div class="featured-box featured-box-primary align-left mt-xlg">
								<div class="box-content">
									<h4 class="heading-primary text-uppercase mb-md">Calculate Shipping</h4>
									<form action="/" id="frmCalculateShipping" method="post">
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>Country</label>
													<select class="form-control">
														<option value="">Select a country</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-md-6">
													<label>State</label>
													<input type="text" value="" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Zip Code</label>
													<input type="text" value="" class="form-control">
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
													<strong><span class="amount">$431</span></strong>
												</td>
											</tr>
											<tr class="shipping">
												<th>Shipping</th>
												<td>
													Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
												</td>
											</tr>
											<tr class="total">
												<th><strong>Order Total</strong></th>
												<td>
													<strong><span class="amount">$431</span></strong>
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