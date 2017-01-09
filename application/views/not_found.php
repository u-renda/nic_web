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
		<link rel="stylesheet" href="<?php echo base_url('assets/css/theme').'/theme.css'; ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/theme').'/theme-elements.css'; ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/theme').'/default.css'; ?>" />
	</head>
	<body>
        <div class="container">
            <section class="page-not-found">
                <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                        <div class="page-not-found-main">
                            <h2>404 <i class="fa fa-file"></i></h2>
                            <p>We're sorry, but the page you were looking for doesn't exist.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4 class="heading-primary">Here are some useful links</h4>
                        <ul class="nav nav-list">
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo $this->config->item('link_team'); ?>">About Us</a></li>
                            <li><a href="<?php echo $this->config->item('link_help'); ?>">Help</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
