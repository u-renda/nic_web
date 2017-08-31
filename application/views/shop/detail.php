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
						<?php if ($this->session->userdata('is_login') == FALSE) { ?>
                        <span class="amount"><?php echo 'Rp '.number_format($product->price_public,0,',','.'); ?></span>
						<?php } else { ?>
						<span class="amount"><?php echo 'Rp '.number_format($product->price_member,0,',','.'); ?></span>
						<?php } ?>
                    </p>
                    <p class="taller"><?php echo $product->description; ?></p>
                    <button href="#" class="btn btn-primary btn-read btn-icon" id="add_chart" data-id="<?php echo $product->id_product; ?>">Add to cart</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabs tabs-product">
                    <ul class="nav nav-tabs">
                        <!--<li class="active"><a href="#productDescription" data-toggle="tab" class="border-radius-top5">Description</a></li>-->
                        <li class="active"><a href="#productInfo" data-toggle="tab" class="border-radius-top5">Aditional Information</a></li>
                    </ul>
                    <div class="tab-content">
                        <!--<div class="tab-pane active" id="productDescription">
                            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis, massa fringilla consequat blandit, mauris ligula porta nisi, non tristique enim sapien vel nisl. Suspendisse vestibulum lobortis dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent nec tempus nibh. Donec mollis commodo metus et fringilla. Etiam venenatis, diam id adipiscing convallis, nisi eros lobortis tellus, feugiat adipiscing ante ante sit amet dolor. Vestibulum vehicula scelerisque facilisis. Sed faucibus placerat bibendum. Maecenas sollicitudin commodo justo, quis hendrerit leo consequat ac. Proin sit amet risus sapien, eget interdum dui. Proin justo sapien, varius sit amet hendrerit id, egestas quis mauris.</p>
                        </div>-->
                        <div class="tab-pane active" id="productInfo">
                            <table class="table table-striped mt-xl">
                                <tbody>
                                    <tr>
										<th width="1%">Ukuran:</th>
                                        <td><?php echo $product->size; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="1%">Warna:</th>
                                        <td><?php echo ucwords($product->colors); ?></td>
                                    </tr>
                                    <tr>
                                        <th width="1%">Material:</th>
                                        <td><?php echo ucwords($product->material); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>