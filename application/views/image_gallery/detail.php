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
                    <h1>Photos</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<div class="row">
			<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<h2><?php echo $album->name; ?></h2>
					<div class="row">
						<?php foreach ($result as $row) { ?>
						<div class="col-md-3">
							<span class="img-thumbnail">
								<img class="img-responsive" src="<?php echo $row->url; ?>" alt="<?php echo $album->name; ?>">
							</span>
						</div>
						<?php } ?>
					</div>
					<div class="row">
						<div class="col-md-6 margintop20">
							<a href="<?php echo $this->config->item('link_image_gallery'); ?>" class="btn btn-quaternary">Back to album</a>
						</div>
						<div class="col-md-6">
							<?php echo $pagination; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>