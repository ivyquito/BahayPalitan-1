
    <div style="padding-top:80px">
		 <div class="container-fluid">
				<div class="container-page">				
					<div class="col-md-offset-2 col-lg-8">
					<div class="login-panel panel panel-default">
                    <div class="panel-heading">
						<h3 class="dark-grey"><span class="fa fa-envelope"></span>&nbsp;Notification</h3>
					</div>
						<div class="panel-body" style="min-height: 400px;">
						<div class="panel-group" id="accordion">
							<div class="form-group">
                                    <p class="err"><?php echo (isset($error) ? $error : '');?></p>
                            </div>
							<?php if($view != NULL) : 
							$from = $view->from_user;
							if($from != '0'):
							$val = $this->common->getrow('subscribers', array('subID' =>$from));
							else:
								$name = 'Bahay Palitan (Update)';
							endif;
							$ctr=0;?>
							<div class="panel panel-primary">
								<div class="panel-heading">

									<b>FROM:</b>
									<?php if($view->from_user != '0'):?>
	                                <?php echo $val->fname.' '.$val->lname?>
	                            	<?php else: ?>
	                            		<?php echo $name;  ?>
	                            	<?php endif; ?>
									<div style="float:right">
										<?php echo ' <b>Received:</b> '.$view->date ?> | 
										<?php if(!empty($view->from_user)): ?>
										<a href="<?php echo base_url() ?>user_page_message?homeId=<?php echo $view->from_user?>&backlink=user_page_notification/view?view=<?php echo $view->notie_id ?>" class="white" alt="reply" title="Reply"><span class="fa fa-reply"></span></a> |
										<?php endif; ?>
										<a href="<?php echo base_url() ?>user_page_notification/delete?view=<?php echo $view->notie_id?>" class="white" alt="Delete" title="Delete"><span class="fa fa-trash"></span></a>&nbsp;
									</div>
								</div>
								<div class="panel-body">
									<p><?php echo $view->content; ?></p>
								</div>
								<div class="panel-footer">
								</div>
							</div>
							
							<?php endif; ?>
							
						</div>				
						</div>				
					</div>				
					</div>	
				</div>
		</div>
    </div>