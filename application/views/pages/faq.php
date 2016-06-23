<div role="main" class="main">
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
                    <h1>F.A.Q.</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<h2>Frequently Asked <strong>Questions</strong></h2>
		<div class="row">
			<div class="col-md-12">
				<div class="toggle toggle-primary" data-plugin-toggle>
					<?php foreach ($faq as $row) { ?>
					<section class="toggle">
						<label><?php echo $row->question; ?></label>
						<p><?php echo $row->answer; ?></p>
					</section>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>