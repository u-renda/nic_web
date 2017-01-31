<header id="header" class="header-no-border-bottom" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 95, "stickySetTop": "-95px", "stickyChangeLogo": false}'>
	<div class="header-body">
		<div class="header-container container">
			<div class="header-row">
				<div class="header-column">
					<div class="header-logo">
						<a href="<?php echo $this->config->item('link_index'); ?>">
							<img alt="<?php echo $this->config->item('title'); ?>" width="auto" height="54" data-sticky-width="82" data-sticky-height="40" data-sticky-top="33" src="<?php echo base_url('assets/images').'/logo.png'; ?>">
						</a>
					</div>
				</div>
				<div class="header-column">
					<ul class="header-extra-info hidden-xs">
						<li>
							<div class="feature-box feature-box-style-3">
								<div class="feature-box-icon border-color-limegreen">
									<i class="fa fa-at fontlimegreen"></i>
								</div>
								<div class="feature-box-info">
									<h4 class="mb-none"><?php echo '@'.strtolower($this->config->item('title')); ?></h4>
									<p><small>Hubungi line@ kami.</small></p>
								</div>
							</div>
						</li>
						<li>
							<div class="feature-box feature-box-style-3">
								<div class="feature-box-icon">
									<i class="fa fa-envelope"></i>
								</div>
								<div class="feature-box-info">
									<h4 class="mb-none"><?php echo strtolower($this->config->item('email_gmail')); ?></h4>
									<p><small>Kirim email kepada kami.</small></p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="header-container header-nav header-nav-bar header-nav-bar-primary">
			<div class="container">
				<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
					<i class="fa fa-bars"></i>
				</button>
				<div class="header-nav-main header-nav-main-light header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
					<nav>
						<ul class="nav nav-pills" id="mainNav">
							<li class="dropdown no-dropdown list-item">
								<a class="" href="<?php echo $this->config->item('link_index'); ?>">Home</a>
							</li>
							<li class="dropdown list-item">
								<a class="dropdown-toggle" href="#pages">Pages</a>
								<ul class="dropdown-menu">
									<li class="dropdown-submenu"><a href="#">Post</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo $this->config->item('link_pages_agnezmo'); ?>">Agnez Mo</a></li>
											<li><a href="<?php echo $this->config->item('link_pages_nic'); ?>">NEZindaCLUB</a></li>
										</ul>
									</li>
									<li><a href="<?php echo $this->config->item('link_team'); ?>">Crew</a></li>
									<li><a href="<?php echo $this->config->item('link_help'); ?>">Help</a></li>
								</ul>
							</li>
							<?php if ($this->config->item('image_gallery_mode') == TRUE) { ?>
							<li class="dropdown no-dropdown list-item">
								<a class="" href="<?php echo $this->config->item('link_image_gallery'); ?>">Image Gallery</a>
							</li>
							<?php }
							if ($this->config->item('shop_mode') == TRUE) {
							?>
							<li class="dropdown no-dropdown list-item">
								<a class="" href="<?php echo $this->config->item('link_shop'); ?>">Merchandise</a>
							</li>
							<?php }
							if ($this->session->userdata('is_login') == FALSE) {
								if ($this->config->item('login_mode') == TRUE) { ?>
							<li class="dropdown no-dropdown list-item">
								<a class="" href="<?php echo $this->config->item('link_login'); ?>">Login</a>
							</li>
							<?php }
							if ($this->config->item('register_mode') == TRUE) {
							?>
							<li class="dropdown no-dropdown list-item">
								<a class="" href="<?php echo $this->config->item('link_register'); ?>">Register</a>
							</li>
							<?php } } else { ?>
							<li class="dropdown list-item">
								<a class="dropdown-toggle" href="#member">
									<i class="fa fa-user marginright5"></i> <?php echo ucwords($this->session->userdata('name')); ?>
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo $this->config->item('link_member_profile'); ?>">My Profile</a></li>
									<li><a href="<?php echo $this->config->item('link_logout'); ?>">Logout</a></li>
								</ul>
							</li>
							<?php } ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>