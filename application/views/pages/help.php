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
                    <h1>Bantuan</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<div class="row">
			<div class="col-md-3">
                <aside class="sidebar">
                    <h4 class="heading-primary">Kategori</h4>
                    <ul class="nav nav-list mb-xlg nav-grand-children">
                        <li class="nav-parent">
							<a href="<?php echo $this->config->item('link_help').'/upload_photo'; ?>">Upload Foto</a>
                        </li>
                        <li class="nav-parent">
                            <a href="<?php echo $this->config->item('link_help').'/change_email'; ?>">Ubah Email</a>
                        </li>
                    </ul>
                </aside>
			</div>
            <div class="col-md-9">
                <?php $this->load->view($section); ?>
            </div>
		</div>
	</div>
</div>