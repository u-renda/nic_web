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
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="mb-none"><strong>Checkout</strong></h2>
				<p>Returning customer? <a href="shop-login.html" class="a-default">Click here to login.</a></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle a-default" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									Shipping Address
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="accordion-body collapse in">
							<div class="panel-body">
								<form action="/" id="frmBillingAddress" method="post">
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
												<label>First Name</label>
												<input type="text" value="" class="form-control">
											</div>
											<div class="col-md-6">
												<label>Last Name</label>
												<input type="text" value="" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Company Name</label>
												<input type="text" value="" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Address </label>
												<input type="text" value="" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>City </label>
												<input type="text" value="" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input type="submit" value="Continue" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle a-default" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
									Review & Payment
								</a>
							</h4>
						</div>
						<div id="collapseThree" class="accordion-body collapse">
							<div class="panel-body">
								<table class="shop_table cart">
									<thead>
										<tr>
											<th class="product-thumbnail">&nbsp;</th>
											<th class="product-name">Product</th>
											<th class="product-price">Price</th>
											<th class="product-quantity">Quantity</th>
											<th class="product-subtotal">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr class="cart_table_item">
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
												1
											</td>
											<td class="product-subtotal">
												<span class="amount">$299</span>
											</td>
										</tr>
										<tr class="cart_table_item">
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
												1
											</td>
											<td class="product-subtotal">
												<span class="amount">$72</span>
											</td>
										</tr>
										<tr class="cart_table_item">
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
												1
											</td>
											<td class="product-subtotal">
												<span class="amount">$60</span>
											</td>
										</tr>
									</tbody>
								</table>
								<hr class="tall">
								<h4 class="heading-primary">Cart Totals</h4>
								<table class="cart-totals">
									<tbody>
										<tr class="cart-subtotal">
											<th>
												<strong>Cart Subtotal</strong>
											</th>
											<td>
												<strong><span class="amount">$431</span></strong>
											</td>
										</tr>
										<tr class="shipping">
											<th>
												Shipping
											</th>
											<td>
												Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
											</td>
										</tr>
										<tr class="total">
											<th>
												<strong>Order Total</strong>
											</th>
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
				<div class="actions-continue">
					<input type="submit" value="Place Order" name="proceed" class="btn btn-lg btn-primary btn-read mt-xl">
				</div>
			</div>
		</div>
	</div>
</div>