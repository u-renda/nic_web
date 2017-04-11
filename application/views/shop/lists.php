<div role="main" class="main shop">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $this->config->item('link_index'); ?>" class="a-default">Home</a></li>
                        <li class="active">Merchandise</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Lists Merchandise</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<div class="row">
            <div class="col-md-6">
                <p><?php echo 'Showing 1–'.$count.' of '.$total.' results.'; ?></p>
            </div>
        </div>
        <div class="row">
            <ul class="products product-thumb-info-list" data-plugin-masonry>
				<?php foreach ($product as $row) { ?>
                <li class="col-md-3 col-sm-6 col-xs-12 product">
                    <a href="<?php echo $this->config->item('link_shop_detail').'/'.$row->slug; ?>">
                        <?php if ($row->status != 0) { ?>
						<span class="onsale"><?php echo $row->status; ?></span>
						<?php } ?>
                    </a>
                    <span class="product-thumb-info">
                        <a href="<?php echo $this->config->item('link_shopping_cart'); ?>" class="add-to-cart-product">
                            <span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
                        </a>
                        <a href="<?php echo $this->config->item('link_shop_detail').'/'.$row->slug; ?>">
                            <span class="product-thumb-info-image">
                                <span class="product-thumb-info-act">
                                    <span class="product-thumb-info-act-left"><em>View</em></span>
                                    <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
                                </span>
                                <img alt="<?php echo ucwords($row->name); ?>" class="img-responsive" src="<?php echo $row->image; ?>">
                            </span>
                        </a>
                        <span class="product-thumb-info-content">
                            <a href="<?php echo $this->config->item('link_shop_detail').'/'.$row->slug; ?>">
                                <h4><?php echo ucwords($row->name); ?></h4>
                                <span class="price">
									<?php if ($this->session->userdata('is_login') == TRUE) { ?>
                                    <del><span class="amount"><?php echo 'Rp '.$row->price_public; ?></span></del>
                                    <ins><span class="amount"><?php echo 'Rp '.$row->price_member; ?></span></ins>
									<?php } else { ?>
									<span class="amount"><?php echo 'Rp '.$row->price_public; ?></span>
									<?php } ?>
                                </span>
                            </a>
                        </span>
                    </span>
                </li>
				<?php } ?>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="pagination pull-right">
					<?php echo $pagination; ?>
                    <!--<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>-->
                </ul>
            </div>
        </div>
	</div>
</div>