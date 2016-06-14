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
								<!-- AddThis Button BEGIN -->
								<div class="addthis_toolbox addthis_default_style ">
									<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
									<a class="addthis_button_tweet"></a>
									<a class="addthis_button_pinterest_pinit"></a>
									<a class="addthis_counter addthis_pill_style"></a>
								</div>
								<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
								<!-- AddThis Button END -->
							</div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-md-3">
				<aside class="sidebar">
                    <h4 class="heading-primary">History</h4>
                    <ul class="nav nav-list mb-xlg">
                        <li><a href="#">Design (2)</a></li>
                        <li class="active">
                            <a href="#">Photos (4)</a>
                            <ul>
                                <li><a href="#">Animals</a></li>
                                <li class="active"><a href="#">Business</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">People</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Videos (3)</a></li>
                        <li><a href="#">Lifestyle (2)</a></li>
                        <li><a href="#">Technology (1)</a></li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</div>