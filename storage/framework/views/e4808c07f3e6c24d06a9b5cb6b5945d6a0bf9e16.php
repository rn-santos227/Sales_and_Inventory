<div class="modal fade modalMolder" id="view" role="dialog" >
    <div class="modal-dialog" style="background-color:#ffffff;">
        <form class="form-horizontal">
            <div class="modal-header headerMolder">
                <h4 class="modal-title"><p>Product Information Panel </p></h4>
            </div>
            <div class="modal-body">

                <div class="form-group" id="div-name">
                    <label class="control-label col-sm-4">Product Name:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-name" name="name" readonly>
                    </div>
                </div>

                <div class="form-group" id="div-ref_code">
                    <label class="control-label col-sm-4">Product Code:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-ref_code" name="ref_code" readonly>
                    </div>
                </div>

                <div class="form-group" id="div-item_category">
                    <label class="control-label col-sm-4">Product Category:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-category" name="category" readonly>
                    </div>
                </div>

                <div class="form-group" id="idiv-tem_supplier">
                    <label class="control-label col-sm-4">Product Supplier:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-supplier" name="supplier" readonly>
                    </div>
                </div>

                <div class="form-group" id="div-reorder_point">
                    <label class="control-label col-sm-4">Reorder Point:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-reorder_point" name="reorder_point" readonly>
                    </div>
                </div>                

                <div class="form-group" id="div-description">
                    <label class="control-label col-sm-4">Product Description:</label>
                    <div class="col-sm-7">
                        <textarea style="background-color:#ffffff;" class="form-control" placeholder="No Available Description" rows="5" id="view-description" name="description" readonly></textarea>
                    </div>
                </div>

                <div class="form-group" id="div-active">
                    <label class="control-label col-sm-4">Product Status:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-active" name="active"  readonly>
                    </div>
                </div>

                <div class="form-group" id="div-created_at">
                    <label class="control-label col-sm-4">Created At:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-created_at" name="created_at" readonly>
                    </div>
                </div>
                
                <div class="form-group" id="div-updated_at">
                    <label class="control-label col-sm-4">Last Updated:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-updated_at" name="updated_at" readonly>
                    </div>
                </div>
            </div>
            <div class="panel-footer clearfix">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss</button>
            </div>
        </form>
    </div>
</div>