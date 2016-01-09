        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <a href="#addHouseAreaType" class="btn btn-primary pull-right" data-toggle="modal">
                        <i class="fa fa-plus-square"></i>
                        ADD HOUSE AREA
                    </a>
                    <h1 class="page-header">House Area</h1>
                    <?php echo $this->session->flashdata('success'); ?>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            House Area List
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>House Area Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            <?php foreach($results as $row) { ?>
                                <tr class="tr<?php echo $row->ATypeID;?>">
                                    <td><?php echo $row->description;?></td>
                                    <td>
                                        <button onclick="editHouseAreaType('<?php echo base_url();?>',<?php echo $row->ATypeID;?>,'<?php echo $row->description;?>')" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="deleteHouseAreaType('<?php echo base_url();?>',<?php echo $row->ATypeID;?>)" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
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