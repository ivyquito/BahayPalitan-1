        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <a href="#addCountry" class="btn btn-primary pull-right" data-toggle="modal">
                        <i class="fa fa-plus-square"></i>
                        ADD COUNTRY
                    </a>
                    <h1 class="page-header">Country</h1>
                    <?php echo $this->session->flashdata('success'); ?>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Country Name</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                        <?php foreach($results  as $row) { ?>
                        <tr>
                            <td><?php echo $row->countryName;?></td>
                            <td><?php echo $row->status; ?></td>
                            <td>
                            <?php
                            if($row->status == 'ACTIVE') { ?>
                                <button class="btn btn-danger btn-sm" onclick="status('<?php echo base_url();?>', <?php echo $row->countryID;?>, '<?php echo $row->status;?>')">INACTIVE</button>
                            <?php } else { ?>
                                <button class="btn btn-primary btn-sm" onclick="status('<?php echo base_url();?>', <?php echo $row->countryID;?>, '<?php echo $row->status;?>')">ACTIVE</button>
                            <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    <?php echo $links; ?>
                </div>
            </div>
         </div>

<!---- modal for country starts here --->
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