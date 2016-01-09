
    <div style="padding-top:80px">
		 <div class="container-fluid">
				<div class="container-page">				
					<div class="col-md-offset-2 col-lg-8">
					<div class="login-panel panel panel-default">
                    <div class="panel-heading">
						<h3 class="dark-grey"><span class="fa fa-envelope"></span>&nbsp;Inbox</h3>
					</div>
						<div class="panel-body" style="min-height: 400px;">
						<div class="panel-group" id="accordion">
							<div class="form-group">
                                    <p class="err"><?php echo (isset($error) ? $error : '');?></p>
                            </div>
							<?php if($inbox != NULL) : $ctr=0;?>
							
							<?php foreach($inbox as $val): $ctr++?>
							<div class="alert <?php echo ($val->mstatus == 1 ? 'alert-success':'alert-info'); ?>" style="padding:3px 15px !important;margin-bottom:5px !important">
                                <b>From:</b> <?php echo $val->fname.' '.$val->lname?>
							<div style="float:right">
								<?php echo ' <b>Received:</b> '.$val->sendDate ?> | 
								<a href="<?php echo base_url() ?>user_page_inbox/view?view=<?php echo $val->msgId?>" class="alert-link" alt="View" title="View">
									<span class="fa fa-folder-open">&nbsp;</span>
								</a>|
								<a href="<?php echo base_url() ?>user_page_inbox/delete?view=<?php echo $val->msgId?>" class="alert-link" alt="Delete" title="Delete">
									<span class="fa fa-trash">&nbsp;</span>
								</a>&nbsp;
                            </div>
                            </div>
							<?php endforeach; ?>
							
							<?php else: ?>
							<div class="form-group col-lg-12">
								no data found
							</div>
							<?php endif; ?>
							
						</div>				
						</div>				
					</div>				
					</div>	
				</div>
		</div>
    </div>