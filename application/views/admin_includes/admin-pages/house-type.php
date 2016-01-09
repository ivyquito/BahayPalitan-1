        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <a href="#addHouseType" class="btn btn-primary pull-right" data-toggle="modal">
                        <i class="fa fa-plus-square"></i>
                        ADD HOUSE TYPE
                    </a>
                    <h1 class="page-header">House Type</h1>
                    <?php echo $this->session->flashdata('success'); ?>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            House Type List
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            <?php $number = 1; ?>
                            <?php foreach($results as $row) { ?>
                                <tr class="tr<?php echo $row->HTypeID;?>">
                                    <td><?php echo $number; ?></td>
                                    <td><?php echo $row->description;?></td>
                                    <td>
                                       <button onclick="editHouseType('<?php echo base_url(); ?>', <?php echo $row->HTypeID;?>,'<?php echo $row->description;?>')" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="deleteHouseType('<?php echo base_url(); ?>', <?php echo $row->HTypeID;?>)" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php $number++; ?>
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