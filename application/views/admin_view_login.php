
    <div id="login_box">
    <div class="container">
        <div class="row">
        &nbsp;<br/>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <img src="<?php echo base_url();?>assets/img/weblogo.png" alt="" class="imglogo" />
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('user_login/check_login','class="form-signin"','role="form"'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <p class="err"><?php echo $this->session->flashdata('error');?></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="inputUser" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="inputPassword" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>