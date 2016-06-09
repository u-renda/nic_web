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
                    <h1>Detail</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<div class="row">
            <div class="col-md-6">
                <div class="owl-carousel owl-theme" data-plugin-options='{"items": 1}'>
                    <div>
                        <div class="thumbnail">
                            <img alt="" class="img-responsive img-rounded" src="../../upload_nic/anye1.jpg">
                        </div>
                    </div>
                    <div>
                        <div class="thumbnail">
                            <img alt="" class="img-responsive img-rounded" src="../../upload_nic/anye6.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="summary entry-summary">
                    <h1 class="mb-none"><strong>Blue Ladies Handbag</strong></h1>
                    <p class="price">
                        <span class="amount">$22</span>
                    </p>
                    <p class="taller">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus nibh sed elimttis adipiscing. Fusce in hendrerit purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus nibh sed elimttis adipiscing. Fusce in hendrerit purus. </p>
                    <form enctype="multipart/form-data" method="post" class="cart">
                        <div class="quantity">
                            <input type="button" class="minus" value="-">
                            <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                            <input type="button" class="plus" value="+">
                        </div>
                        <button href="#" class="btn btn-primary btn-read btn-icon">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabs tabs-product">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#productDescription" data-toggle="tab" class="border-radius-top5">Description</a></li>
                        <li><a href="#productInfo" data-toggle="tab" class="border-radius-top5">Aditional Information</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="productDescription">
                            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis, massa fringilla consequat blandit, mauris ligula porta nisi, non tristique enim sapien vel nisl. Suspendisse vestibulum lobortis dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent nec tempus nibh. Donec mollis commodo metus et fringilla. Etiam venenatis, diam id adipiscing convallis, nisi eros lobortis tellus, feugiat adipiscing ante ante sit amet dolor. Vestibulum vehicula scelerisque facilisis. Sed faucibus placerat bibendum. Maecenas sollicitudin commodo justo, quis hendrerit leo consequat ac. Proin sit amet risus sapien, eget interdum dui. Proin justo sapien, varius sit amet hendrerit id, egestas quis mauris.</p>
                        </div>
                        <div class="tab-pane" id="productInfo">
                            <table class="table table-striped mt-xl">
                                <tbody>
                                    <tr>
										<th>Size:</th>
                                        <td>Unique</td>
                                    </tr>
                                    <tr>
                                        <th>Colors</th>
                                        <td>Red, Blue</td>
                                    </tr>
                                    <tr>
                                        <th>Material</th>
                                        <td>100% Leather</td>
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