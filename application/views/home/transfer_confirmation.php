<div role="main" class="main" id="page_team">
    <div class="container margintop15">
		<h2>Konfirmasi <strong>Pembayaran</strong></h2>
		<div class="row">
			<div class="col-md-12">
				<p class="lead">
					<h4>Konfirmasikan pembayaran Anda disini agar dapat kami proses segera.</h4>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<form id="form_transfer_confirmation" action="<?php echo $this->config->item('link_transfer_confirmation'); ?>" class="form-horizontal" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<label class="col-sm-4 control-label fontblack">Total transfer <span class="required">*</span></label>
						<div class="col-sm-8">
							<input type="text" name="total" class="form-control" placeholder="150000"/>
							<span class="help-block">* Masukkan angka tanpa titik/koma</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label fontblack">Tanggal transfer <span class="required">*</span></label>
						<div class="col-sm-8">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</span>
								<input name="date" type="text" data-plugin-datepicker class="form-control" id="transfer-date" title="Harus diisi.">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label fontblack">Rekening atas nama <span class="required">*</span></label>
						<div class="col-sm-8">
							<input type="text" name="account_name" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label fontblack">Bukti transfer <span class="required">*</span></label>
						<div class="col-md-8">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input">
										<i class="fa fa-file fileupload-exists"></i>
										<span class="fileupload-preview"></span>
									</div>
									<span class="btn btn-default btn-file fontblack">
										<span class="fileupload-exists">Change</span>
										<span class="fileupload-new">Select file</span>
										<input type="file" name="photo" id="photo" required />
									</span>
									<a href="#" class="btn btn-default fileupload-exists fontblack" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label fontblack">Informasi lainnya</label>
						<div class="col-md-8">
							<textarea class="form-control" rows="3" name="other_information">Untuk pembayaran a.n </textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 col-md-offset-4">
							<button type="submit" value="submit" name="submit" class="btn btn-primary">Konfirmasi</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>