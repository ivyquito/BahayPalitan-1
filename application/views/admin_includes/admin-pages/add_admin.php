        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Admin User</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb">
                        <div class="row">
                            <?php echo $this->session->flashdata('error'); ?>
                            <?php echo form_open(base_url().'index.php/admin_page_adminuser/add_exec'); ?>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="adminUsername">Username</label>
                                    <small class="text-red">
                                        <?php echo form_error('adminUsername'); ?>
                                    </small>
                                    <input type="text" name="adminUsername" id="adminUsername" class="form-control" value="<?php echo set_value('adminUsername');?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="adminPassword">Password</label>
                                    <small class="text-red">
                                        <?php echo form_error('adminPassword'); ?>
                                    </small>
                                    <input type="password" name="adminPassword" id="adminPassword" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="adminFirstname">First Name</label>
                                    <small class="text-red">
                                        <?php echo form_error('adminFirstname'); ?>
                                    </small>
                                    <input type="text" name="adminFirstname" id="adminFirstname" class="form-control" value="<?php echo set_value('adminFirstname');?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="adminLastname">Last Name</label>
                                    <small class="text-red">
                                        <?php echo form_error('adminLastname'); ?>
                                    </small>
                                    <input type="text" name="adminLastname" id="adminLastname" class="form-control" value="<?php echo set_value('adminLastname');?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="adminEmail">Email</label>
                                    <small class="text-red">
                                        <?php echo form_error('adminEmail'); ?>
                                    </small>
                                    <input type="text" name="adminEmail" id="adminEmail" class="form-control" value="<?php echo set_value('adminEmail');?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="adminBirthdate">Birthdate</label>
                                    <small class="text-red">
                                        <?php echo form_error('adminBirthdate'); ?>
                                    </small>
                                    <input type="text" name="adminBirthdate" id="adminBirthdate" class="form-control" value="<?php echo set_value('adminBirthdate');?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="adminGender">Gender</label>
                                    <small class="text-red">
                                        <?php echo form_error('adminGender'); ?>
                                    </small>
                                    <select name="adminGender" id="adminGender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Add</button>
                                    <input type="reset" class="btn btn-default" value="Clear"/>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
         </div>