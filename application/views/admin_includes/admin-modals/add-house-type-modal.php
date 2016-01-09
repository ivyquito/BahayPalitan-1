<div class="modal fade" id="addHouseType" role="dialog" tab-index ="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right" title="Close modal dialog" data-dismiss="modal">Close</i>
                <i class="fa fa-pencil"></i> ADD HOUSE TYPE
            </div>
            <?php echo form_open(base_url().'index.php/admin_page_housetype/addHouseTypeExec'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="houseTypeDescription">Description</label>
                    <input type="text" name="houseTypeDescription" id="houseTypeDescription" class="form-control" placeholder="Ex. Bungalo" required=""/>
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