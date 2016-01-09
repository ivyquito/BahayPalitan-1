<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <!-- Page Content -->
   <div class="container">
        <!-- Portfolio Item Heading -->
        <div class="row">
			<div class="col-lg-12">
			&nbsp;<br/>
			</div>
            <div class="col-lg-12">
                <div class="page-header">&nbsp;<br/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h4><span class="fa fa-envelope"></span>&nbsp;Send Message</h4>
                    </div>
                    <div class="panel-body">
                        <?php 
                            $link = isset($_GET['no']) ? '&no='.$_GET['no']: '';
                            $link = isset($_GET['backlink']) ? '&backlink='.$_GET['backlink']: ''; 
                        ?>
                        <?php echo form_open(base_url().'index.php/user_page_message?homeId='.$owner_info->subID.$link,'class="form-signin"','role="form"'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <p class="err"><?php echo $this->session->flashdata('error');?></p>
                                    <p class="succ"><?php echo $this->session->flashdata('success');?></p>
                                </div>
                                <div class="form-group">
									<label>Send to:</label>
                                    <div class="form-control"><span class="fa fa-user"></span>&nbsp;<?php echo $owner_info->lname.', '.$owner_info->fname ?></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message Body" name="msg" style="height:200px"></textarea>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="sendbtn">Send</button>
								<?php 
								if(isset($_GET['backlink'])): ?>
									<a href="<?php echo base_url().$_GET['backlink']; ?>" class="btn btn-lg btn-info btn-block" type="submit">Back</a>
								<?php  else: ?>
									<a href="<?php echo base_url(); ?>index.php/user_page_viewhome?homeId=<?php echo $owner_info->subID ?>&no=<?php //echo $_GET['no']; ?>" class="btn btn-lg btn-info btn-block" type="submit">Back</a>
								<?php endif; ?>
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
		<hr/>
    </div>
    <!-- /.container -->
	