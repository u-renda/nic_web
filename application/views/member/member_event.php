<div id="member_event_page" class="tab-pane">
    <h4 class="mb-xlg">Daftar event yang diikuti</h4>
    <div class="panel-group panel-group-quaternary" id="accordionMemberEvent">
        <?php
        $i = 1;
        foreach ($member_event as $row) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2Quaternary" href="#collapse2Quaternary<?php echo $i; ?>">
                        <?php echo $row->title; ?>
                    </a>
                </h4>
            </div>
            <div id="collapse2Quaternary<?php echo $i; ?>" class="accordion-body collapse">
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group marginbottom0">
                            <label class="col-md-3 control-label fontbold">Tanggal</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $row->date; ?></p>
                            </div>
                        </div>
                        <div class="form-group marginbottom0">
                            <label class="col-md-3 control-label fontbold">Kehadiran</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo $row->status; ?></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        $i++;
        } ?>
    </div>
</div>