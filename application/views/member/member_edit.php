<div id="member_edit_page" class="tab-pane">
    <form class="form-horizontal" method="post" action="<?php echo $this->config->item('link_member_edit'); ?>">
        <h4 class="mb-xlg">Informasi Diri</h4>
        <fieldset>
            <div class="form-group">
                <label class="col-md-3 control-label">Email</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $member->email; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">No Telp</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $member->phone_number; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Status Perkawinan</label>
                <div class="col-md-8">
                    <select class="form-control" name="marital_status" id="marital-status">
                        <?php
                        foreach ($code_member_marital_status as $key => $val)
                        {
                            echo '<option value="'.$key.'"';
                            if ($key == $member->marital_status) { echo 'selected'; }
                            echo '>'.$val.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Pekerjaan</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="occupation" id="occupation" value="<?php echo ucwords($member->occupation); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Alamat</label>
                <div class="col-md-8">
                    <textarea class="form-control" rows="3" name="idcard_address" id="idcard_address"><?php echo ucwords($member->idcard_address); ?></textarea>
                </div>
            </div>
        </fieldset>
        <hr class="dotted tall">
        <h4 class="mb-xlg">Ubah Password</h4>
        <fieldset class="mb-xl">
            <div class="form-group">
                <label class="col-md-3 control-label">Password baru</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="password" id="password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Ulangi password baru</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="confirm_password" id="confirm_password">
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