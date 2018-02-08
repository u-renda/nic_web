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
					<?php if ($product->size != '') { ?>
                    <p class="taller">
						Ukuran yang dipilih: <input type="text" class="input-text" title="size" name="size" size="10" id="size" value="M">
					</p>
					<?php } else { ?>
					<input type="hidden" value="" id="size">
					<?php } ?>
                    <button href="#" class="btn btn-primary btn-read btn-icon" id="add_chart" data-id="<?php echo $product->id_product; ?>">Add to cart</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabs tabs-product">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#productInfo" data-toggle="tab" class="border-radius-top5">Aditional Information</a></li>
                    </ul>
                    <div class="tab-content">
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