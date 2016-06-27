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
	<body id="recovery-password-page">
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="<?php echo $this->config->item('link_index'); ?>" class="logo pull-left">
					<img src="<?php echo base_url('assets/images').'/logo.png'; ?>" height="54" alt="Porto Admin" />
				</a>
                <section class="panel panel-sign">
					<form action="<?php echo $this->config->item('link_recovery_password'); ?>" method="post" id="form-recovery-password">
						<div class="panel-title-sign mt-xl text-right">
							<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Recover Password</h2>
						</div>
						<div class="panel-body">
							<?php if ($success == FALSE) { ?>
							<div class="alert alert-info">
								<p class="m-none text-weight-semibold h6">Enter your e-mail below and we will send you reset instructions!</p>
							</div>
							<div class="form-group mb-none">
								<div class="input-group">
									<input name="email" type="email" placeholder="E-mail" class="form-control input-lg" />
									<span class="input-group-btn">
										<button class="btn btn-primary btn-lg" type="submit" name="submit" value="submit">Reset!</button>
									</span>
								</div>
							</div>
							<?php echo form_error('email', '<div class="text-danger">', '</div>');
							} else { ?>
							<div class="alert alert-success">
								<p class="m-none text-weight-semibold h6">Recovery password has already been send to your email.</p>
							</div>
							<?php } ?>
							<p class="text-center mt-lg">Remembered? <a href="<?php echo $this->config->item('link_login'); ?>">Login!</a>
						</div>
					</form>
				</section>
				<p class="text-center text-muted mt-md mb-md"><?php echo "&copy; Copyright ".date('Y').'. All Rights Reserved.'; ?></p>
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