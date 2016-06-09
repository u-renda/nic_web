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
                            <img src="<?php echo $this->session->userdata('photo'); ?>" class="rounded img-responsive" alt="<?php echo ucwords($this->session->userdata('name')); ?>">
                        </div>
                        <hr class="dotted short">
                        <h6 class="text-muted align-center"><?php echo ucwords($this->session->userdata('name')); ?></h6>
                        <div class="clearfix"></div>
                    </div>
                </section>
            </div>
            <div class="col-md-8 col-lg-6">
                <div class="tabs">
                    <ul class="nav nav-tabs tabs-primary">
                        <li class="active">
                            <a href="#overview" data-toggle="tab">Overview</a>
                        </li>
                        <li>
                            <a href="#edit" data-toggle="tab">Edit</a>
                        </li>
                        <li>
                            <a href="#member_shop" data-toggle="tab">Shop</a>
                        </li>
                        <li>
                            <a href="#member_event" data-toggle="tab">Event</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane active">
							
                        </div>
                        <div id="edit" class="tab-pane">
                            <form class="form-horizontal" method="get">
                                <h4 class="mb-xlg">Personal Information</h4>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileFirstName">First Name</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileFirstName">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileLastName">Last Name</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileLastName">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileAddress">Address</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileAddress">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileCompany">Company</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileCompany">
                                        </div>
                                    </div>
                                </fieldset>
                                <hr class="dotted tall">
                                <h4 class="mb-xlg">About Yourself</h4>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileBio">Biographical Info</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="3" id="profileBio"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-3 control-label mt-xs pt-none">Public</label>
                                        <div class="col-md-8">
                                            <div class="checkbox-custom checkbox-default checkbox-inline mt-xs">
                                                <input type="checkbox" checked="" id="profilePublic">
                                                <label for="profilePublic"></label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <hr class="dotted tall">
                                <h4 class="mb-xlg">Change Password</h4>
                                <fieldset class="mb-xl">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileNewPassword">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New Password</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileNewPasswordRepeat">
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="member_shop" class="tab-pane">
                        
                        </div>
                        <div id="member_event" class="tab-pane">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>