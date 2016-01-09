
    <div style="padding-top:80px">
		 <div class="container-fluid">
				<div class="container-page">				
					<div class="col-md-offset-2 col-lg-8">
					<div class="login-panel panel panel-default">
                    <div class="panel-heading">
						<h3 class="dark-grey">Notification</h3>
					</div>
						<div class="panel-body" style="min-height: 400px;">
							<div class="form-group">
                                    <p class="err"><?php echo (isset($error) ? $error : '');?></p>
                            </div>
							<?php if($note != NULL) : $ctr=0;?>
							
							<?php foreach($note as $val): 
							$from = $val->from_user;
							if($from != '0'):
							$val2 = $this->common->getrow('subscribers',array('subID' =>$from));
							else:
								$name = 'Bahay Palitan (Update)';
							endif;
							$ctr++?>
							<div class="alert <?php echo ($val->nstatus == 1 ? 'alert-success':'alert-info'); ?>" style="padding:3px 15px !important;margin-bottom:5px !important">
                                <b>From:</b> 
                                <?php if($from != '0'):?>
                                <?php echo $val2->fname.' '.$val2->lname?>
                            	<?php else: ?>
                            		<?php echo $name;  ?>
                            	<?php endif; ?>
							<div style="float:right">
								<?php echo ' <b>Received:</b> '.$val->date ?> | 
								<a href="<?php echo base_url() ?>user_page_notification/view?view=<?php echo $val->notie_id?>" class="alert-link" alt="View" title="View">
									<span class="fa fa-folder-open">&nbsp;</span>
								</a>|
								<a href="<?php echo base_url() ?>user_page_notification/delete?view=<?php echo $val->notie_id?>" class="alert-link" alt="Delete" title="Delete">
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