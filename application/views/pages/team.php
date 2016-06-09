<div role="main" class="main" id="page_team">
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
                    <h1>Team</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<h2>Meet the <strong>Team</strong></h2>
		<ul class="nav nav-pills sort-source" data-sort-id="team" data-option-key="filter">
			<li data-option-value="*" class="active"><a href="#" class="a-blue">Show All</a></li>
			<li data-option-value=".leadership"><a href="#" class="a-blue">Leadership</a></li>
			<li data-option-value=".relation"><a href="#" class="a-blue">Relation & Media</a></li>
			<li data-option-value=".event"><a href="#" class="a-blue">Event</a></li>
		</ul>
		<hr>
		<div class="row">
			<ul class="team-list sort-destination" data-sort-id="team">
				<?php foreach ($admin as $row) { ?>
				<li class="col-md-3 col-sm-6 col-xs-12 isotope-item <?php echo $row->admin_group; ?>">
					<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
						<span class="thumb-info-wrapper">
							<a href="#">
								<img src="<?php echo $row->photo; ?>" class="img-responsive" alt="<?php echo ucwords($row->name); ?>">
								<span class="thumb-info-title">
									<span class="thumb-info-inner"><?php echo ucwords($row->name); ?></span>
									<span class="thumb-info-type"><?php echo ucwords($row->position); ?></span>
								</span>
							</a>
						</span>
						<span class="thumb-info-caption">
							<span class="thumb-info-social-icons">
								<a href="<?php echo 'https://twitter.com/'.$row->twitter; ?>" title="<?php echo '@'.$row->twitter; ?>"><i class="fa fa-twitter"></i><span>Twitter</span></a>
							</span>
						</span>
					</span>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>