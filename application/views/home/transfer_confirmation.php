<div role="main" class="main" id="transfer_confirmation_page">
    <div class="container margintop15">
		<h2>Konfirmasi <strong>Pembayaran</strong></h2>
		<div class="row">
			<div class="col-md-12">
				<p class="lead">
					<h4>Konfirmasikan pembayaran Anda disini agar dapat segera kami proses.</h4>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<form id="the_form" action="<?php echo $this->config->item('link_transfer_confirmation').'?c='.$short_code; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_member_transfer" value="<?php echo $result->id_member_transfer; ?>">
					<input type="hidden" name="selftotal" id="selftotal" value="<?php echo $result->total; ?>">
					<div class="form-group">
						<label class="col-sm-4 control-label fontblack">Total transfer <span class="required">*</span></label>
						<div class="col-sm-8">
							<input type="text" name="total" id="total" class="form-control" placeholder="150000" value="<?php echo set_value('total'); ?>" />
							<span class="help-block">* Masukkan hanya angka tanpa titik/koma, sesuai dengan di email.</span>
							<div class="fontred" id="errorbox_total"></div>
							<?php echo form_error('total', '<div class="fontred">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label fontblack">Tanggal transfer <span class="required">*</span></label>
						<div class="col-sm-8">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</span>
								<input name="date" type="text" readonly="readonly" data-plugin-datepicker class="form-control" id="date" value="<?php echo set_value('date'); ?>">
							</div>
							<div class="fontred" id="errorbox_date"></div>
							<?php echo form_error('date', '<div class="fontred">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label fontblack">Rekening atas nama <span class="required">*</span></label>
						<div class="col-sm-8">
							<input type="text" name="account_name" id="account_name" class="form-control" value="<?php echo set_value('account_name'); ?>" />
							<span class="help-block">* Transfer dari rekening a.n siapa</span>
							<div class="fontred" id="errorbox_account_name"></div>
							<?php echo form_error('account_name', '<div class="fontred">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group" id="div_photo">
						<label class="col-md-4 control-label fontblack">Bukti transfer <span class="required">*</span></label>
						<div class="col-md-8">
							<span class="help-block marginbottom0">
								* Max size 2MB
							</span>
							<input name="image" id="photo" class="file" type="file">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label fontblack">Informasi lainnya</label>
						<div class="col-md-8">
							<textarea class="form-control" rows="7" name="other_information" id="other_information" value="<?php echo set_value('other_information'); ?>">Untuk pembayaran a.n: </textarea>
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