<div role="main" class="main" id="page_nic">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $this->config->item('link_index'); ?>" class="a-default">Home</a></li>
                        <li class="active">Pages</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>NEZindaCLUB</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-posts">
					<?php foreach ($post as $row) { ?>
					<article class="post post-large">
						<?php if ($row->media != "") { ?>
                        <div class="post-image single align-center">
							<a href="<?php echo $this->config->item('link_pages_nic').$row->slug; ?>">
								<img class="img-thumbnail" src="<?php echo $row->media; ?>" alt="<?php echo ucwords($row->title); ?>">
							</a>
                        </div>
						<?php } ?>
                        <div class="post-date">
                            <span class="day"><?php echo date('d', strtotime($row->created_date)); ?></span>
                            <span class="month"><?php echo date('M', strtotime($row->created_date)); ?></span>
                        </div>
                        <div class="post-content-short">
                            <h2><a href="<?php echo $this->config->item('link_pages_nic').$row->slug; ?>" class="a-default"><?php echo ucwords($row->title); ?></a></h2>
                            <?php echo $row->content; ?>
                            <div class="post-meta">
                                <a href="<?php echo $this->config->item('link_pages_nic').$row->slug; ?>" class="btn btn-xs btn-primary pull-right btn-read">Read more...</a>
                            </div>
                        </div>
                    </article>
					<?php }
					echo $pagination;
					?>
                </div>
            </div>
            <div class="col-md-3">
				<?php $this->load->view('pages/history'); ?>
            </div>
        </div>
    </div>
</div>