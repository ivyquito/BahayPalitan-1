        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Subscribers</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Subscribers List
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Payment Method</th>
                                    <th>Contact Number</th>
                                    <th>Status</th>
                                    <th>Delete</th>
                                </tr>
                                <?php foreach($results as $row) { ?>
                                <tr class="tr<?php echo $row->subID; ?>">
                                    <td><?php echo $row->fname; ?></td>
                                    <td><?php echo $row->lname; ?></td>
                                    <td><?php echo $row->username; ?></td>
                                    <td><?php echo $row->emailAdd; ?></td>
                                    <td><?php echo $row->card.' - '.$row->card_number; ?></td>
                                    <td><?php echo $row->contactno; ?></td>
                                    <td><?php echo $row->status; ?></td>
                                    <td>
                                        <button onclick="deleteSubscriber('<?php echo base_url();?>',<?php echo $row->subID;?>)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                            <?php echo $links; ?>
                        </div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
         </div>