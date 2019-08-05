<div class="modal fade modalMolder" id="view" role="dialog" >
    <div class="modal-dialog" style="background-color:#ffffff;">
        <form class="form-horizontal">
            <div class="modal-header headerMolder">
                <h4 class="modal-title"><p>Product Information Panel </p></h4>
            </div>
            <div class="modal-body">

                <div class="form-group" id="name">
                    <label class="control-label col-sm-4">Supplier Name:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-name" name="name" readonly>
                    </div>
                </div>

                <div class="form-group" id="ref_code">
                    <label class="control-label col-sm-4">Supplier Code:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-ref_code" name="ref_code" readonly>
                    </div>
                </div>

                <div class="form-group" id="email">
                    <label class="control-label col-sm-4">Supplier Email:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-email" name="email" readonly>
                    </div>
                </div>

                <div class="form-group" id="cotact">
                    <label class="control-label col-sm-4">Supplier Contact:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-contact" name="contact" readonly>
                    </div>
                </div>

                <div class="form-group" id="addres">
                    <label class="control-label col-sm-4">Supplier Address:</label>
                    <div class="col-sm-7">
                        <textarea style="background-color:#ffffff;" class="form-control" placeholder="No Available Address" rows="5" id="view-address"   name="address" readonly></textarea>
                    </div>
                </div>

                <div class="form-group" id="description">
                    <label class="control-label col-sm-4">Supplier Description:</label>
                    <div class="col-sm-7">
                        <textarea style="background-color:#ffffff;" class="form-control" placeholder="No Available Description" rows="5" id="view-description"   name="description" readonly></textarea>
                    </div>
                </div>

                <div class="form-group" id="active">
                    <label class="control-label col-sm-4">Product Status:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-active" name="active"  readonly>
                    </div>
                </div>

                <div class="form-group" id="created_at">
                    <label class="control-label col-sm-4">Created At:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-created_at" name="created_at" readonly>
                    </div>
                </div>
                
                <div class="form-group" id="updated_at">
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