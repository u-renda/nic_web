<div role="main" class="main" id="page_profile">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $this->config->item('link_index'); ?>" class="a-default">Home</a></li>
                        <li class="active">Member</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Profile</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<div class="row">
            <div class="col-md-4 col-lg-3">
                <section class="panel">
                    <div class="panel-body">
                        <div class="img-thumbnail mb-md">
							<?php if ($member->photo == '') { ?>
							<img src="<?php echo base_url('assets/images').'/user_default.png'; ?>" class="rounded img-responsive" alt="<?php echo ucwords($member->name); ?>">
							<?php } else { ?>
                            <img src="<?php echo $member->photo; ?>" class="rounded img-responsive" alt="<?php echo ucwords($member->name); ?>">
							<?php } ?>
                        </div>
                        <hr class="dotted short">
                        <h6 class="text-muted align-center"><?php echo '<i class="fa fa-user" title="Nama"></i> '.ucwords($member->name); ?></h6>
                        <h6 class="text-muted align-center"><?php echo $member->icon_gender.$member->gender; ?></h6>
                        <h6 class="text-muted align-center"><?php echo '<i class="fa fa-credit-card" title="ID NIC"></i> '.$member->member_card; ?></h6>
                        <div class="clearfix"></div>
                    </div>
                </section>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="tabs">
                    <ul class="nav nav-tabs tabs-primary">
                        <li class="active">
                            <a href="#member_overview_page" data-toggle="tab">Overview</a>
                        </li>
                        <li>
                            <a href="#member_edit_page" data-toggle="tab">Change Data</a>
                        </li>
                        <li>
                            <a href="#member_transfer_page" data-toggle="tab">Transaksi Lain</a>
                        </li>
                        <li>
                            <a href="#member_shop_page" data-toggle="tab">Pembelian Merchandise</a>
                        </li>
                        <!--<li>
                            <a href="#member_event_page" data-toggle="tab">Event</a>
                        </li>-->
                    </ul>
                    <div class="tab-content">
						<?php
						$this->load->view('member/member_overview');
						$this->load->view('member/member_edit');
						$this->load->view('member/member_transfer');
						$this->load->view('member/member_shop');
						//$this->load->view('member/member_event');
						?>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>