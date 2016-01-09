        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Report Abuse Homes</h1>
                    <?php echo $this->session->flashdata('success'); ?>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Number</th>
                            <th>Report By</th>
                            <th>Date Reported</th>
                            <th>Home</th>
                        </tr>
                        <?php  $ctr=1;
                        foreach($results  as $row) { ?>
                        <tr>
                            <td><?php echo $ctr++;?></td>
                            <td><?php echo $row->fname.' '.$row->lname; ?></td>
                            <td><?php echo $row->date_reported; ?></td>
                            <td><a href="<?php echo base_url().'admin_page_report/view/'.$row->homeID; ?>">View Home</td>
                        </tr>
                        <?php } ?>
                    </table>
                    <?php echo $links; ?>
                </div>
            </div>
         </div>

<!-- modal for country starts here -->
<div class="modal fade" id="addCountry" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><i class="fa fa-pencil"></i> Add Country</div>
            <div class="modal-body">
                <?php echo form_open(base_url().'index.php/admin_page_country/addExec'); ?>
                <div class="form-group">
                    <label for="countryName">Country Name</label>
                    <input type="text" name="countryName" id="countryName" class="form-control" required=""/>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add</button>
                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!---- modal for country ends here -->