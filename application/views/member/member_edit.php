<div id="member_edit_page" class="tab-pane">
    <form class="form-horizontal" method="post" action="<?php echo $this->config->item('link_member_profile'); ?>" id="form-member-edit">
        <h4 class="mb-xlg">Ubah Foto</h4>
        <fieldset>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button> You have some form errors. Please check below.
            </div>
            <div class="alert alert-success display-hide">
                <button class="close" data-close="alert"></button> Your profile update is successful!
            </div>
            <div class="form-group" id="div_photo">
                <label class="col-md-3 control-label">Upload Foto Diri</label>
                <div class="col-md-8">
                    <span class="help-block marginbottom0">
                        * Max size 2MB
                    </span>
                    <input name="image" id="photo" class="file" type="file">
                </div>
            </div>
        </fieldset>
        <hr class="dotted tall">
        <h4 class="mb-xlg">Informasi Diri</h4>
        <fieldset>
            <div class="form-group">
                <label class="col-md-3 control-label">Email</label>
                <div class="col-md-8">
                    <input type="hidden" name="selfemail" id="selfemail" value="<?php echo $member->email; ?>">
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $member->email; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">No Telp</label>
                <div class="col-md-8">
                    <input type="hidden" name="selfphone_number" id="selfphone_number" value="<?php echo $member->phone_number; ?>">
                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $member->phone_number; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Alamat</label>
                <div class="col-md-8">
                    <textarea class="form-control" rows="3" name="idcard_address" id="idcard_address"><?php echo stripcslashes($member->idcard_address); ?></textarea>
                </div>
            </div>
        </fieldset>
        <hr class="dotted tall">
        <h4 class="mb-xlg">Ubah Password</h4>
        <fieldset class="mb-xl">
            <div class="form-group">
                <label class="col-md-3 control-label">Password baru</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Ulangi password baru</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                </div>
            </div>
        </fieldset>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>