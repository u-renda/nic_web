<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="author" content="<?php echo $this->config->item('title'); ?>">
        <link rel="shortcut icon" href="<?php echo base_url('assets/images').'/icon.png'; ?>">
        <title><?php echo $this->config->item('title'); ?></title>

		<!-- Font Awesome -->
        <link href="<?php echo base_url('assets/css').'/font-awesome.min.css'; ?>" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="<?php echo base_url('assets/css').'/bootstrap.min.css'; ?>" rel="stylesheet">
		<!-- Theme CSS -->
		<link href="<?php echo base_url('assets/css/theme').'/theme.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/theme').'/theme-elements.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/theme').'/default.css'; ?>" rel="stylesheet">
	</head>
	<body>
		<div class="body coming-soon">
			<header id="header" data-plugin-options='{"stickyEnabled": false}'>
				<div class="header-body">
					<div class="header-top">
						<div class="container">
							<ul class="header-social-icons social-icons hidden-xs">
								<li class="social-icons-facebook"><a href="<?php echo $this->config->item('facebook'); ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li class="social-icons-twitter"><a href="<?php echo $this->config->item('twitter'); ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li class="social-icons-linkedin"><a href="<?php echo $this->config->item('instagram'); ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
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
								<a href="<?php echo $this->config->item('link_index'); ?>">
									<img width="auto" height="54" src="<?php echo base_url('assets/images').'/logo.png'; ?>" alt="<?php echo $this->config->item('title'); ?>">
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
							<h1 class="mb-sm small">MAINTENANCE MODE</h1>
							<p class="lead">The website is undergoing some scheduled maintenance.<br>Please come back later.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<hr class="tall">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 center" style="color: #D4AF37;">
							Get in touch with us!
							<?php echo 'Line@ : @'.strtolower($this->config->item('title')).' | '; ?>
							<a style="color: #D4AF37;" href="<?php echo 'mailto:'.$this->config->item('email_gmail'); ?>"><?php echo strtolower($this->config->item('email_gmail')); ?></a>
						</div>
					</div>
				</div>
			</div>
			<footer class="short" id="footer">
                <div class="container">
                    <div class="row">
                        <!--<div class="col-md-3">
                            <h4>About Us</h4>
                            <p><?php echo $about_us.'... '; ?><a href="<?php echo $this->config->item('link_about_us'); ?>" class="btn-flat btn-xs">View More <i class="fa fa-arrow-right"></i></a></p>
                        </div>
                        <div class="col-md-3">
                            <h4>Latest Tweets</h4>
                            <div id="tweet" class="twitter" data-plugin-tweets data-plugin-options='{"username": "nicofficial", "count": 2}'>
                                <p>Coming soon.</p>
                            </div>
                        </div>-->
                        <div class="col-md-4">
                            <div class="contact-details">
                                <h4>Contact Us</h4>
                                <ul class="contact">
                                    <li><p><i class="fa fa-at"></i> <strong>Line@:</strong><span class="fontwhite"><?php echo ' @'.strtolower($this->config->item('title')); ?></span></p></li>
                                    <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="<?php echo 'mailto:'.$this->config->item('email_gmail'); ?>"><?php echo $this->config->item('email_gmail'); ?></a></p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h4>Follow Us</h4>
                            <ul class="social-icons">
                                <li class="social-icons-facebook"><a href="<?php echo $this->config->item('facebook'); ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-icons-twitter"><a href="<?php echo $this->config->item('twitter'); ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-icons-instagram"><a href="<?php echo $this->config->item('instagram'); ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                <li class="social-icons-youtube"><a href="<?php echo $this->config->item('youtube'); ?>" target="_blank" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <a href="<?php echo $this->config->item('link_index'); ?>" class="logo">
                                    <img alt="<?php echo $this->config->item('title'); ?>" class="img-responsive" src="<?php echo base_url('assets/images').'/logo_white_small.png'; ?>">
                                </a>
                            </div>
                            <div class="col-md-11">
                                <p><i class="fa fa-copyright"></i><?php echo ' Copyright '.date('Y').'. All Rights Reserved.' ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>