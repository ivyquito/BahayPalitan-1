        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin List</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Admin List
                        </div>
                        <div class="panel-body">
                            <?php echo $this->session->flashdata('success'); ?>
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Birth Date</th>
                                    <th>Gender</th>
                                </tr>
                                <?php foreach($results as $row) { ?>
                                <tr>
                                    <td><?php echo $row->admin_firstname;?></td>
                                    <td><?php echo $row->admin_lastname;?></td>
                                    <td><?php echo $row->admin_email;?></td>
                                    <td><?php echo $row->admin_birthdate; ?></td>
                                    <td><?php echo ($row->admin_gender ==1 ? 'Male' : 'Female'); ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                            <?php echo $links; ?>
                        </div>
                    </div>
                </div>
            </div>
         </div>