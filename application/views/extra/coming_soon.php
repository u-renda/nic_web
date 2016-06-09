<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Maintenance Mode | <?php echo $this->config->item('title'); ?></title>	

		<meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url('assets/images').'/icon.png'; ?>" type="image/x-icon" />
		<link rel="apple-touch-icon" href="<?php echo base_url('assets/images').'/icon.png'; ?>">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/bootstrap.min.css'; ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/font-awesome.min.css'; ?>" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/theme').'/theme.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/theme').'/theme-elements.css'; ?>">

		<!-- Current Page CSS -->
		<link href="<?php echo base_url('assets/css/theme').'/settings.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css').'/style.css'; ?>" rel="stylesheet">
        
        <!-- jQuery -->
        <script src="<?php echo base_url('assets/js').'/jquery.min.js'; ?>"></script>

	</head>
	<body>

		<div class="body coming-soon">
			<header id="header" data-plugin-options='{"stickyEnabled": false}'>
				<div class="header-body paddingtop13">
					<div class="header-top">
						<div class="container">
							<p>
								Get in touch! <span class="ml-xs">Line <i class="fa fa-at"></i><?php echo strtolower($this->config->item('title')); ?></span><span class="hidden-xs"> | <a href="#" class="a-default"><?php echo strtolower($this->config->item('email_gmail')); ?></a></span>
							</p>
							<ul class="header-social-icons social-icons hidden-xs">
								<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</header>

			<div role="main" class="main">
				<div class="container">
					<div class="row">
						<div class="col-md-12 center">
							<div class="logo">
								<a href="index.html">
									<img width="144" height="54" src="<?php echo base_url('assets/images').'/logo.png'; ?>" alt="Porto">
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<hr class="tall">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 center">
							<h1 class="mb-sm small">OUR WEBSITE IS COMING SOON</h1>
							<p class="mb-none lead">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<hr class="tall">
						</div>
					</div>
				</div>
			</div>

			<?php $this->load->view('templates/footer'); ?>
