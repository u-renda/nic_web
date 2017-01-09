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
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/datepicker.css'; ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/theme').'/bootstrap-fileupload.min.css'; ?>" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/upload').'/fileinput.min.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/login_style.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/register_style.css'; ?>">
	</head>
	<body id="register-page">
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="<?php echo $this->config->item('link_index'); ?>" class="logo pull-left">
					<img src="<?php echo base_url('assets/images').'/logo.png'; ?>" height="54" alt="Porto Admin" />
				</a>
				<section class="panel panel-sign form-wizard" id="w1">
					<form action="<?php echo $this->config->item('link_register'); ?>" method="post" novalidate="novalidate" enctype="multipart/form-data" id="form-register">
						<div class="panel-title-sign mt-xl text-right">
							<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> REGISTER</h2>
						</div>
						<div class="panel-body">
							<p class="text-center pb-lg">Sudah punya akun? <a href="<?php echo $this->config->item('link_login'); ?>">Login</a>
							<div class="wizard-tabs">
								<ul class="wizard-steps">
									<li class="active">
										<a href="#w1-account" data-toggle="tab" class="text-center">
											<span class="badge hidden-xs">1</span>
											Account
										</a>
									</li>
									<li>
										<a href="#w1-profile" data-toggle="tab" class="text-center">
											<span class="badge hidden-xs">2</span>
											Profile
										</a>
									</li>
									<li>
										<a href="#w1-confirm" data-toggle="tab" class="text-center">
											<span class="badge hidden-xs">3</span>
											Confirm
										</a>
									</li>
								</ul>
							</div>
							<div class="tab-content">
								<div id="w1-account" class="tab-pane active">
									<div class="form-group mb-lg">
										<label>Tipe ID <span class="required">*</span></label>
										<select class="form-control" title="Mohon pilih salah satu." name="idcard_type" id="idcard-type" required>
											<option value="">-- Pilih --</option>
											<?php foreach ($code_member_idcard_type as $key => $val) { ?>
											<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group mb-lg">
										<label>No. ID <span class="required">*</span></label>
										<div class="input-group input-group-icon">
											<input name="idcard_number" type="text" class="form-control" id="idcard-number" title="Harus diisi." value="<?php echo set_value('idcard_number'); ?>" required>
											<span class="help-block marginbottom0">
												* KTP/SIM/Passport/Kartu Pelajar
											</span>
										</div>
									</div>
									<div class="form-group mb-lg" id="div_idcard">
										<label class="control-label">Upload ID Card Foto <span class="required">*</span>&nbsp&nbsp
											<a href="<?php echo $this->config->item('link_help').'/upload_photo'; ?>" data-plugin-tooltip data-original-title="Klik untuk melihat cara upload foto" target="_blank"><i class="fa fa-question-circle"></i></a>
										</label>
										<span class="help-block marginbottom0">
											* Max size 2MB
										</span>
										<input name="image" id="idcard_photo" class="file" type="file">
									</div>
								</div>
								<div id="w1-profile" class="tab-pane">
									<div class="form-group mb-lg">
										<label>Nama Lengkap <span class="required">*</span></label>
										<div class="input-group input-group-icon">
											<input name="name" type="text" class="form-control" id="name" title="Harus diisi." required>
										</div>
									</div>
									<div class="form-group mb-lg">
										<label class="col-md-12 paddingleft0">Jenis Kelamin <span class="required">*</span></label>
										<div class="col-md-12 paddingleft0">
											<div class="radio-custom">
												<input name="gender" id="laki-laki" value="0" type="radio" class="form-control" title="Mohon pilih salah satu." required>
												<label>Laki-laki</label>
											</div>
											<div class="radio-custom">
												<input name="gender" id="perempuan" value="1" type="radio" class="form-control">
												<label>Perempuan</label>
											</div>
											<label class="error" for="gender"></label>
										</div>
									</div>
									<div class="form-group mb-lg">
										<label class="col-md-12 paddingleft0">Tempat, Tanggal Lahir <span class="required">*</span></label>
										<div class="col-md-6 paddingleft0">
											<div class="input-group input-group-icon">
												<input name="birth_place" type="text" class="form-control" id="birth-place" title="Harus diisi." required>
											</div>
										</div>
										<div class="col-md-6 paddinglr0">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</span>
												<input name="birth_date" type="text" readonly="readonly" data-plugin-datepicker class="form-control" id="birth-date" title="Harus diisi." required>
											</div>
										</div>
									</div>
									<div class="form-group mb-lg">
										<label>No Handphone <span class="required">*</span></label>
										<div class="input-group input-group-icon">
											<input name="phone_number" type="text" class="form-control" id="phone-number" title="Harus diisi." required>
										</div>
									</div>
									<div class="form-group mb-lg">
										<label>Alamat Sesuai ID <span class="required">*</span></label>
										<textarea name="idcard_address" class="form-control" rows="3" id="textareaAutosize" data-plugin-textarea-autosize title="Harus diisi." required></textarea>
									</div>
									<div class="form-group mb-lg" id="div_photo">
										<label class="control-label">Upload Foto Diri <span class="required">*</span></label>
										<span class="help-block marginbottom0">
											* Max size 2MB
										</span>
										<input name="image" id="photo" class="file" type="file">
									</div>
								</div>
								<div id="w1-confirm" class="tab-pane">
									<div class="form-group mb-lg">
										<label>Email <span class="required">*</span></label>
										<div class="input-group input-group-icon">
											<input name="email" id="email" type="text" class="form-control" title="Harus diisi." required>
										</div>
									</div>
									<div class="form-group mb-lg">
										<label class="col-md-12 paddingleft0">Ukuran Baju <span class="required">*</span></label>
										<div class="col-sm-12 paddingleft0">
											<div class="radio-custom">
												<input name="shirt_size" value="0" type="radio" class="form-control" required>
												<label>M</label>
											</div>
											<div class="radio-custom">
												<input name="shirt_size" value="1" type="radio" class="form-control" />
												<label>XL</label>
											</div>
											<label class="error" for="shirt_size"></label>
										</div>
									</div>
									<div class="form-group mb-lg">
										<label>Alamat Pengiriman <span class="required">*</span></label>
										<textarea name="shipment_address" class="form-control" rows="3" id="textareaAutosize" data-plugin-textarea-autosize title="Harus diisi." required></textarea>
									</div>
									<div class="form-group mb-lg">
										<label class="col-md-12 paddingleft0">Provinsi & Kota <span class="required">*</span></label>
										<div class="col-md-12 paddinglr0">
											<select class="form-control" title="Mohon pilih salah satu." name="id_provinsi" id="id_provinsi" required>
											<option value="">-- Provinsi --</option>
											<?php foreach ($provinsi_lists as $key => $val) { ?>
											<option value="<?php echo $val->id_provinsi; ?>" id="<?php echo $val->id_provinsi; ?>"><?php echo ucwords($val->provinsi); ?></option>
											<?php } ?>
										</select>
										</div>
										<div class="col-md-12 paddinglr0 margintop10">
											<div id="area"></div>
										</div>
									</div>
									<div class="form-group mb-lg">
										<label>Kode Pos <span class="required">*</span></label>
										<div class="input-group input-group-icon">
											<input name="postal_code" type="text" class="form-control" title="Harus diisi." required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-2"></div>
										<div class="col-sm-10">
											<div class="checkbox-custom">
												<input type="checkbox" name="terms" id="w1-terms" required>
												<label for="w1-terms">I agree to the terms of service</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="alert alert-danger hidden" id="error_msg">
							</div>
						</div>
						<div class="panel-footer">
							<ul class="pager">
								<li class="previous disabled">
									<a><i class="fa fa-angle-left"></i> Previous</a>
								</li>
								<li class="finish hidden pull-right">
									<button type="submit" value="submit" name="submit" class="btn-finish" id="submit_register">Finish</button>
								</li>
								<li class="next">
									<a class="pointer">Next <i class="fa fa-angle-right"></i></a>
								</li>
							</ul>
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
		<script src="<?php echo base_url('assets/js/upload').'/fileinput.min.js'; ?>"></script>
		<script src="<?php echo base_url('assets/js').'/login.js'; ?>"></script>
	</body>
</html>