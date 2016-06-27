<div id="member_overview_page" class="tab-pane active">
    <h4 class="mb-xlg">Profile</h4>
    <form class="form-horizontal">
        <div class="form-group marginbottom0">
            <label class="col-md-3 control-label fontbold">Nama</label>
            <div class="col-md-9">
                <p class="form-control-static"><?php echo ucwords($member->name); ?></p>
            </div>
        </div>
        <div class="form-group marginbottom0">
            <label class="col-md-3 control-label fontbold">Email</label>
            <div class="col-md-9">
                <p class="form-control-static"><?php echo $member->email; ?></p>
            </div>
        </div>
        <div class="form-group marginbottom0">
            <label class="col-md-3 control-label fontbold">Telp</label>
            <div class="col-md-9">
                <p class="form-control-static"><?php echo $member->phone_number; ?></p>
            </div>
        </div>
        <div class="form-group marginbottom0">
            <label class="col-md-3 control-label fontbold">Tempat, tanggal lahir</label>
            <div class="col-md-9">
                <p class="form-control-static"><?php echo ucwords($member->birth_place).', '.$member->birth_date; ?></p>
            </div>
        </div>
        <div class="form-group marginbottom0">
            <label class="col-md-3 control-label fontbold">Username</label>
            <div class="col-md-9">
                <p class="form-control-static"><?php echo $member->username; ?></p>
            </div>
        </div>
        <div class="form-group marginbottom0">
            <label class="col-md-3 control-label fontbold">Alamat</label>
            <div class="col-md-9">
                <p class="form-control-static"><?php echo ucwords($member->idcard_address); ?></p>
            </div>
        </div>
        <div class="form-group marginbottom0">
            <label class="col-md-3 control-label fontbold">Pekerjaan</label>
            <div class="col-md-9">
                <p class="form-control-static"><?php echo ucwords($member->occupation); ?></p>
            </div>
        </div>
        <div class="form-group marginbottom0">
            <label class="col-md-3 control-label fontbold">Agama</label>
            <div class="col-md-9">
                <p class="form-control-static"><?php echo ucwords($member->religion); ?></p>
            </div>
        </div>
    </form>
    <hr class="dotted tall">
    <h4 class="mb-xlg">NIC Membership</h4>
    <form class="form-horizontal">
        <div class="form-group marginbottom0">
            <label class="col-md-3 control-label fontbold">No ID NIC</label>
            <div class="col-md-9">
                <p class="form-control-static"><?php echo $member->member_card; ?></p>
            </div>
        </div>
        <div class="form-group marginbottom0">
            <label class="col-md-3 control-label fontbold">Poin</label>
            <div class="col-md-9">
                <p class="form-control-static"><?php echo $member->point; ?></p>
            </div>
        </div>
    </form>
</div>