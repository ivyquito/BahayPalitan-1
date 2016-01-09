        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <a href="#addPlan" class="btn btn-primary pull-right" data-toggle="modal">
                        <i class="fa fa-plus-square"></i>
                        ADD PLANS
                    </a>
                    <h1 class="page-header">Plan</h1>
                    <?php echo $this->session->flashdata('success'); ?>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Plan List
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Plan Name</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            <?php $number = 1; ?>
                            <?php foreach($results as $row) { ?>
                                <tr class="tr<?php echo $row->planID;?>">
                                    <td><?php echo $row->planName;?></td>
                                    <td><?php echo $row->planDesc;?></td>
                                    <td><?php echo $row->planAmount;?></td>
                                    <td>
                                       <button onclick="editPlan('<?php echo base_url();?>', <?php echo $row->planID;?>,'<?php echo $row->planName;?>','<?php echo $row->planDesc;?>',<?php echo $row->planAmount;?>)" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="deletePlan('<?php echo base_url();?>', <?php echo $row->planID;?>)" class="btn btn-sm btn-danger">
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