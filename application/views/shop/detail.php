<div role="main" class="main shop" id="shop_detail_page">
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
                    <h1>Detail</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<div class="row">
            <div class="col-md-6">
                <div class="owl-carousel owl-theme" data-plugin-options='{"items": 1}'>
                    <?php foreach ($product->image as $row) { ?>
					<div>
                        <div class="thumbnail">
                            <img alt="<?php echo $product->name; ?>" class="img-responsive img-rounded" src="<?php echo $row; ?>">
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="summary entry-summary">
                    <h1 class="mb-none"><strong><?php echo $product->name; ?></strong></h1>
                    <p class="price">
                        <span class="amount"><?php echo 'Rp '.number_format($product->price,0,',','.'); ?></span>
                    </p>
                    <p><?php echo $product->description; ?></p>
					<form action="<?php echo $this->config->item('link_add_cart'); ?>" method="post" class="cart" id="cart">
						<?php if (isset($product->product_size) == TRUE) { ?>
							<p id="size-button">
							<?php foreach ($product->product_size as $row2) { ?>
								<button type="button" class="btn btn-borders btn-primary mr-xs mb-sm size" id="<?php echo $row2['size']; ?>"><?php echo $row2['size']; ?></button>
							<?php } ?>
							</p>
						<?php } ?>
						<div class="col-md-6 pl-none">
							<div data-plugin-spinner data-plugin-options='{ "value":0, "min":0 }' id="jumlah">
								<div class="input-group">
									<div class="spinner-buttons input-group-btn">
										<button type="button" class="btn btn-default spinner-up">
											<i class="fa fa-plus"></i>
										</button>
									</div>
									<input type="text" class="spinner-input form-control" maxlength="3" readonly>
									<div class="spinner-buttons input-group-btn">
										<button type="button" class="btn btn-default spinner-down">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
						<input type="submit" class="btn btn-primary btn-read btn-icon" data-id="<?php echo $product->id_product; ?>" value="Add to cart" name="submit">
					</form>
                </div>
            </div>
        </div>
	</div>
</div>