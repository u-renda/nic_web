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

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/bootstrap.min.css'; ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/font-awesome.min.css'; ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/theme').'/theme-elements.css'; ?>" />

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
					<form action="<?php echo $this->config->item('link_reset_password').'?c='.$code; ?>" method="post" id="form-reset-password">
						<div class="panel-title-sign mt-xl text-right">
							<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Reset Password</h2>
						</div>
						<div class="panel-body">
							<?php if ($success == FALSE) { ?>
							<div class="alert alert-info">
								<p class="m-none text-weight-semibold h6">Masukkan password baru Anda.</p>
							</div>
							<?php echo validation_errors('<div class="alert alert-danger alert-sm">', '</div>'); ?>
							<div class="form-group mb-none">
								<span class="help-block marginbottom0">
									* Min 6 karakter
								</span>
								<input name="password" type="password" placeholder="Password" class="form-control input-lg" />
							</div>
							<div class="form-group mt-lg mb-lg">
								<div class="input-group">
									<input name="passconf" type="password" placeholder="Ulangi Password" class="form-control input-lg" />
									<span class="input-group-btn">
										<button class="btn btn-primary btn-lg" type="submit" name="submit" value="submit">Reset!</button>
									</span>
								</div>
							</div>
							<?php } else { ?>
							<div class="alert alert-success">
								<p class="m-none text-weight-semibold h6">Reset password berhasil. Silahkan login dengan password baru Anda.</p>
							</div>
							<div class="center">
								<a href="<?php echo $this->config->item('link_login'); ?>" class="btn btn-primary" type="submit">LOGIN</a>
							</div>
							<?php } ?>
						</div>
					</form>
				</section>
				<p class="text-center text-muted mt-md mb-md"><?php echo "&copy; Copyright ".date('Y').'. All Rights Reserved.'; ?></p>
			</div>
		</section>
        <!-- end: page -->
	</body>
</html>