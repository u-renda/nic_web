<h2>FAQ - Pertanyaan yang Sering <strong>Diajukan</strong></h2>
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