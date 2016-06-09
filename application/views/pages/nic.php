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
                    <h1><?php echo $this->config->item('title'); ?></h1>
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
                            <img class="img-thumbnail" src="<?php echo $row->media; ?>" alt="<?php echo ucwords($row->title); ?>">
                        </div>
						<?php } ?>
                        <div class="post-date">
                            <span class="day"><?php echo date('d', strtotime($row->created_date)); ?></span>
                            <span class="month"><?php echo date('M', strtotime($row->created_date)); ?></span>
                        </div>
                        <div class="post-content-detail">
                            <h2><a href="<?php echo $this->config->item('link_pages_detail').$row->slug; ?>" class="a-default"><?php echo ucwords($row->title); ?></a></h2>
                            <?php echo $row->content; ?>
                            <div class="post-meta">
                                <a href="<?php echo $this->config->item('link_pages_detail').$row->slug; ?>" class="btn btn-xs btn-primary pull-right btn-read">Read more...</a>
                            </div>
                        </div>
                    </article>
					<?php } ?>
                    <ul class="pagination pull-right">
                        <li><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
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