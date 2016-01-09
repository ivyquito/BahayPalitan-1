        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <a href="#addLocation" class="btn btn-primary pull-right" data-toggle="modal">
                        <i class="fa fa-plus-square"></i>
                        ADD LOCATION
                    </a>
                    <h1 class="page-header">Locations</h1>
                    <?php echo $this->session->flashdata('success'); ?>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>City Name</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                        <?php foreach($results  as $row) { ?>
                        <tr>
                            <td>
                                <?php echo $row->cityName; ?>
                            </td>
                            <td>
                                <?php echo $row->latitude; ?>
                            </td>
                            <td>
                                <?php echo $row->longitude; ?>
                            </td>
                            <td>
                                <?php echo $row->status; ?>
                            </td>
                            <td>
                                <?php if ($row->status == 'active') { ?>
                                <button class="btn btn-danger btn-sm" onclick="locationStatus('<?php echo base_url();?>', <?php echo $row->locID;?>, '<?php echo $row->status;?>')">Inactive</button>
                                <?php } else { ?>
                                <button class="btn btn-primary btn-sm" onclick="locationStatus('<?php echo base_url();?>', <?php echo $row->locID;?>, '<?php echo $row->status;?>')">Active</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
         </div>


<!--- location modal starts here ---->
<div class="modal fade" id="addLocation" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><i class="fa fa-pencil"></i> Add Location</div>
            <div class="modal-body">
                <?php echo form_open(base_url().'index.php/admin_page_locations/addExec'); ?>
                <div class="form-group">
                    <label for="cityName">City Name</label>
                    <input type="text" name="cityName" placeholder="Ex. Cebu City" id="cityName" class="form-control" required=""/>
                </div>
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input tpye="text" name="latitude" placeholder="Ex. 45.6666" id="latitude" class="form-control" required=""/>
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" name="longitude" placeholder="Ex. 20.353" id="longitude" class="form-control" required=""/>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add</button>
                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!--- location modal ends here --->