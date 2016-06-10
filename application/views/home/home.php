<div role="main" class="main" id='page_home'>
	<div class="slider-container rev_slider_wrapper" style="height: 600px;">
		<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"delay": 9000, "gridwidth": 800, "gridheight": 600}'>
			<ul>
				<?php foreach ($slider as $row) { ?>
				<li data-transition="fade">
					<img src="<?php echo $row->media; ?>" alt="<?php echo ucwords($row->title); ?>" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
				</li>	
				<?php } ?>
			</ul>
		</div>
	</div>
	<section class="section section-no-background m-none">
		<div class="container">
			<div class="row">
				<div class="col-md-12 center">
					<h2>Our <strong> Latest </strong>Pages</h2>
				</div>
			</div>
			<div class="row mt-lg">
				<?php foreach ($latest as $row2) { ?>
				<div class="col-md-3">
					<a href="<?php echo $this->config->item('link_pages_detail').$row2->slug; ?>">
						<?php if ($row2->media == "") { ?>
						<div class="home-post-image post-no-image"><?php echo strtoupper($row2->title); ?></div>
						<?php } else { ?>
						<img class="img-responsive home-post-image" src="<?php echo $row2->media; ?>" alt="<?php echo ucwords($row2->title); ?>">
						<?php } ?>
					</a>
					<div class="recent-posts mt-md mb-lg">
						<article class="post">
							<div class="post-title marginbottom15">
								<h5>
									<a class="text-dark" href="<?php echo $this->config->item('link_pages_detail').$row2->slug; ?>">
										<?php echo strtoupper($row2->title); ?>
									</a>
								</h5>
							</div>
							<div class="post-content marginbottom15">
								<?php echo $row2->content; ?>
							</div>
							<div class="post-meta">
								<span><i class="fa fa-calendar"></i> <?php echo $row2->created_date; ?> </span>
							</div>
						</article>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
</div>