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
                <p><?php echo 'Showing '.$showing_from.'–'.$showing_to.' of '.$total.' results.'; ?></p>
            </div>
        </div>
        <div class="row">
            <ul class="products product-thumb-info-list" data-plugin-masonry>
				<?php foreach ($product as $row) { ?>
				<li class="col-md-3 col-sm-6 col-xs-12 product">
					<a href="<?php echo $this->config->item('link_shop_detail').'/'.$row->slug; ?>">
						<?php if ($row->status != 0) { ?>
						<span class="onsale"><?php echo $code_product_status[$row->status]; ?></span>
						<?php } ?>
					</a>
					<span class="product-thumb-info">
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
									<ins><span class="amount"><?php echo 'Rp '.$row->price; ?></span></ins>
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
                </ul>
            </div>
        </div>
	</div>
</div>