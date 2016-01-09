        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Account Settings</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <?php echo form_open(base_url().'index.php/admin_page_adminuser/settingExec'); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Account
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="breadcrumb">
                                        <?php echo $this->session->flashdata('success'); ?>
                                        <?php echo $this->session->flashdata('error'); ?>
                                        <?php echo form_open(base_url().'index.php/admin_page_adminuser/settingExec');?>
                                        <div class="form-group">
                                            <label for="adminFirstname">First Name</label>
                                            <small class="text-red">
                                                <?php echo form_error('adminFirstname'); ?>
                                            </small>
                                            <input type="text" name="adminFirstname" id="adminFirstname" class="form-control" value="<?php echo $firstname;?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="adminLastname">Last Name</label>
                                            <small class="text-red">
                                                <?php echo form_error('adminLastname'); ?>
                                            </small>
                                            <input type="text" name="adminLastname" id="adminLastname" class="form-control" value="<?php echo $lastname;?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="adminEmail">Email</label>
                                            <small class="text-red">
                                                <?php echo form_error('adminEmail'); ?>
                                            </small>
                                            <input type="text" name="adminEmail" id="adminEmail" class="form-control" value="<?php echo $email;?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="adminBirthdate">Birth Date</label>
                                            <small class="text-red">
                                                <?php echo form_error('adminBirthdate'); ?>
                                            </small>
                                            <input type="text" name="adminBirthdate" id="adminBirthdate" class="form-control" value="<?php echo $birthdate;?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="adminGender">Gender</label>
                                            <small class="text-red">
                                                <?php echo form_error('adminGender'); ?>
                                            </small>
                                            <select name="adminGender" id="adminGender" class="form-control">
                                                <?php if($gender==1){ ?>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <?php } else { ?>
                                                <option value="2">Female</option>
                                                <option value="1">Male</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Update"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>
         </div>