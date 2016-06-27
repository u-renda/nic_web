<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content="<?php echo $this->config->item('title'); ?>">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        
        <link rel="shortcut icon" href="<?php echo base_url('assets/images').'/icon.png'; ?>">
        <title><?php echo $this->config->item('title'); ?></title>
		<!-- Web Fonts  -->
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/bootstrap.min.css'; ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/font-awesome.min.css'; ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/datepicker.css'; ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/theme').'/bootstrap-fileupload.min.css'; ?>" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/login_style.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/register_style.css'; ?>">
	</head>
	<body id="register-upload-page">
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="<?php echo $this->config->item('link_index'); ?>" class="logo pull-left">
					<img src="<?php echo base_url('assets/images').'/logo.png'; ?>" height="54" alt="Porto Admin" />
				</a>
                <section class="panel panel-sign">
                    <form action="<?php echo $this->config->item('link_register_upload'); ?>" method="post" enctype="multipart/form-data" id="form-register-upload">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
						<div class="panel-title-sign mt-xl text-right">
                            <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> REGISTER</h2>
                        </div>
                        <div class="panel-body">
                            <div class="form-group mb-lg">
                                <label>Photo ID <span class="required"> *</span></label>
                                <div class="input-group input-group-icon">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fa fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="idcard_photo" id="idcard_photo" required />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
								<?php echo form_error('idcard_photo', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group mb-lg">
                                <label>Photo <span class="required"> *</span></label>
                                <div class="input-group input-group-icon">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fa fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="photo" id="photo" required />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
								<?php echo form_error('photo', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
						<div class="panel-footer">
							<button type="submit" class="btn btn-primary" name="submit_upload" value="submit_upload" id="button_register_upload" data-loading-text="Loading...">
                                <i class="fa fa-check"></i> Register
							</button>
						</div>
                    </form>
                </section>
            </div>
        </section>
        <!-- end: page -->

		<!-- Vendor -->
		<script src="<?php echo base_url('assets/js').'/jquery.js'; ?>"></script>
		<script src="<?php echo base_url('assets/js').'/bootstrap.min.js'; ?>"></script>
		<script src="<?php echo base_url('assets/js').'/bootstrap-datepicker.js'; ?>"></script>
		<script src="<?php echo base_url('assets/js/theme').'/autosize.js'; ?>"></script>
		<script src="<?php echo base_url('assets/js').'/jquery.validate.js'; ?>"></script>
		<script src="<?php echo base_url('assets/js/theme').'/jquery.bootstrap.wizard.js'; ?>"></script>
		<script src="<?php echo base_url('assets/js/theme').'/bootstrap-fileupload.min.js'; ?>"></script>
		<script src="<?php echo base_url('assets/js').'/login.js'; ?>"></script>
	</body>
</html>