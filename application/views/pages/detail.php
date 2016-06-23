<div role="main" class="main">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $this->config->item('link_index'); ?>" class="a-default">Home</a></li>
                        <li><a href="<?php echo $this->config->item('link_pages').$this->uri->segment(2); ?>" class="a-default"><?php echo "Pages ".$post->type; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Detail Artikel</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-posts single-post">
                    <article class="post post-large blog-single-post">
                        <div class="post-image">
                            <img class="img-thumbnail" src="<?php echo $post->media; ?>" alt="<?php echo ucwords($post->title); ?>">
                        </div>
                        <div class="post-date">
                            <span class="day"><?php echo date('d', strtotime($post->created_date)); ?></span>
                            <span class="month"><?php echo date('M', strtotime($post->created_date)); ?></span>
                        </div>
                        <div class="post-content">
                            <h2><a class="a-default"><?php echo ucwords($post->title); ?></a></h2>
                            <?php echo $post->content; ?>
                            <div class="post-block post-share">
								<h3 class="heading-primary"><i class="fa fa-share"></i>Share this post</h3>
							</div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-md-3">
				<?php $this->load->view('pages/history'); ?>
            </div>
        </div>
    </div>
</div>