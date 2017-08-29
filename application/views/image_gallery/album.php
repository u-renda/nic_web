<div role="main" class="main">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $this->config->item('link_index'); ?>" class="a-default">Home</a></li>
                        <li class="active">Image Gallery</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Album</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<div class="row">
            <div class="col-md-12">
                <div class="row">
					<?php foreach ($result as $key => $val) { ?>
                    <div class="col-md-4 col-md-offset-1">
						<h4><?php echo $val['name']; ?></h4>
                        <div class="thumb-gallery">
                            <div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover thumbGalleryDetail" id="thumbGalleryDetail">
                                <?php foreach ($val['image'] as $value) { ?>
								<div>
                                    <span class="img-thumbnail">
                                        <img alt="<?php echo $val['name']; ?>" src="<?php echo $value['url']; ?>" class="img-responsive">
                                    </span>
                                </div>
								<?php } ?>
                            </div>
                        </div>
						<div class="row">
							<div class="col-md-12">
								<a href="<?php echo $this->config->item('link_image_gallery_detail').$val['slug']; ?>" class="mb-xs mt-xs mr-xs btn btn-primary btn-read pull-right">Lihat Semua</a>
							</div>
						</div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>
	</div>
</div>