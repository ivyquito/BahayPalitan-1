<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4" style="margin-top:100px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Admin Login
                </div>
                <div class="panel-body">
                    <?php echo $this->session->flashdata('error');?>
                    <?php echo form_open(base_url().'index.php/admin_login/login_exec');?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <small style="color:red"><?php echo form_error('username');?></small>
                        <input type="text" name="username" id="username" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <small style="color:red"><?php echo form_error('password');?></small>
                        <input type="password" name="password" id="password" class="form-control"/>
                    </div>
                    <button class="btn btn-primary" type="submit">Login</button>
                    <button class="btn btn-default" type="reset">Clear</button>
                    <?php echo form_close(); ?>
                </div>
                <div class="panel-footer">

                </div>
            </div>
        </div>
    </div>
</div>