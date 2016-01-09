<div class="modal fade" id="addPlan" role="dialog" tab-index ="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right" title="Close modal dialog" data-dismiss="modal">Close</i>
                <i class="fa fa-pencil"></i> ADD PLAN
            </div>
            <?php echo form_open(base_url().'index.php/admin_page_plans/addPlanExec'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="planName">Plan Name</label>
                    <input type="text" name="planName" id="planName" class="form-control" placeholder="Ex. Platinum" required=""/>
                </div>
                <div class="form-group">
                    <label for="planDescription">Plan Description</label>
                    <input type="text" name="planDescription" id="planDescription" class="form-control" placeholder="EX. 1 month" required=""/>
                </div>
                <div class="form-group">
                    <label for="planAmount">Plan Amount</label>
                    <input type="text" name="planAmount" id="planAmount" class="form-control" placeholder="Ex. 100.00" required=""/>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Add</button>
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>