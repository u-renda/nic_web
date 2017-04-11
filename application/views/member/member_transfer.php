<div id="member_transfer_page" class="tab-pane">
    <div class="alert alert-info">Daftar transaksi selain dari pembelian merchandise.</div>
    <div class="panel-group panel-group-sm" id="accordion3">
        <?php foreach ($member_transfer as $row) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse3<?php echo $row->no; ?>">
                        <?php echo '#'.$row->id_member_transfer.' - '.$row->type; ?>
                    </a>
                </h4>
            </div>
            <div id="collapse3<?php echo $row->no; ?>" class="accordion-body collapse">
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group marginbottom0">
                            <label class="col-md-3 control-label fontbold">Nama</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo ucwords($row->name); ?></p>
                            </div>
                        </div>
                        <div class="form-group marginbottom0">
                            <label class="col-md-3 control-label fontbold">Total</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $row->total; ?></p>
                            </div>
                        </div>
                        <div class="form-group marginbottom0">
                            <label class="col-md-3 control-label fontbold">Tanggal</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $row->date; ?></p>
                            </div>
                        </div>
                        <div class="form-group marginbottom0">
                            <label class="col-md-3 control-label fontbold">Resi</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $row->resi; ?></p>
                            </div>
                        </div>
                        <div class="form-group marginbottom0">
                            <label class="col-md-3 control-label fontbold">Status</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $row->status; ?></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>