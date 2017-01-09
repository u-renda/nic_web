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
					<form action="<?php echo $this->config->item('link_recovery_password'); ?>" method="post" id="form-recovery-password">
						<div class="panel-title-sign mt-xl text-right">
							<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Recover Password</h2>
						</div>
						<div class="panel-body">
							<?php if ($success == FALSE) { ?>
							<div class="alert alert-info">
								<p class="m-none text-weight-semibold h6">Masukkan email dan no member. Kami akan mengirimkan instruksinya!</p>
							</div>
							<?php echo validation_errors('<div class="alert alert-danger alert-sm">', '</div>'); ?>
							<div class="form-group mb-none">
								<span class="help-block marginbottom0">
									<span class="required">*</span> Masukkan no member tanpa spasi
								</span>
								<input name="member_card" type="text" placeholder="No Member" class="form-control input-lg" value="<?php echo set_value('member_card'); ?>" />
							</div>
							<div class="form-group mt-lg">
								<span class="help-block marginbottom0">
									<span class="required">*</span> Email harus sama dengan email yang terdaftar di kami
								</span>
								<div class="input-group">
									<input name="email" type="email" placeholder="E-mail" class="form-control input-lg" value="<?php echo set_value('email'); ?>" />
									<span class="input-group-btn">
										<button class="btn btn-primary btn-lg" type="submit" name="submit" value="submit">Send!</button>
									</span>
								</div>
							</div>
							<?php } else { ?>
							<div class="alert alert-success">
								<p class="m-none text-weight-semibold h6">Instruksi perbaikan password sudah dikirimkan ke email Anda.</p>
							</div>
							<?php } ?>
							<p class="text-center mt-lg">Ingat password? <a href="<?php echo $this->config->item('link_login'); ?>">Login</a>
						</div>
					</form>
				</section>
				<p class="text-center text-muted mt-md mb-md"><?php echo "&copy; Copyright ".date('Y').'. All Rights Reserved.'; ?></p>
			</div>
		</section>
        <!-- end: page -->
	</body>
</html>