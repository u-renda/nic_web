
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

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/login.css'; ?>">
	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="<?php echo $this->config->item('link_index'); ?>" class="logo pull-left">
					<img src="<?php echo base_url('assets/images').'/logo.png'; ?>" height="54" alt="<?php echo $this->config->item('title'); ?>" />
				</a>
				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> LOGIN</h2>
					</div>
					<div class="panel-body">
						<form action="<?php echo $this->config->item('link_login'); ?>" method="post">
							<div class="text-danger"><?php echo validation_errors(); ?></div>
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input name="username" type="text" class="form-control input-lg" value="<?php echo set_value('username'); ?>" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
									<a href="<?php echo $this->config->item('link_recovery_password'); ?>" class="pull-right">Lupa Password?</a>
								</div>
								<div class="input-group input-group-icon">
									<input name="password" type="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="logged" type="checkbox"/>
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" name="submit" value="submit" class="btn btn-primary hidden-xs">Login</button>
									<button type="submit" name="submit" value="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Login</button>
								</div>
							</div>
							<p class="text-center margintop20">Don't have an account yet? <a href="<?php $this->config->item('link_register'); ?>">Register!</a>
						</form>
					</div>
				</div>
				<p class="text-center text-muted mt-md mb-md"><?php echo "&copy; Copyright ".date('Y').'. All Rights Reserved.'; ?></p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="<?php echo base_url('assets/js').'/jquery.min.js'; ?>"></script>
	</body>
</html>