<form class="form-horizontal">

	<div class="form-group<?php echo e($errors->has('count') ? ' has-error' : ''); ?>">
        <label for="count" class="col-md-3 control-label">Reference Code: </label>
        <div class="col-md-8">
            <input id="promo-ref_code" type="text" class="form-control" placeholder="Enter Reference Code" name="ref_code" required style="background-color:#ffffff;">
            <strong id="promo-ref_code_message" style="color:#FF0000;"></strong>
        </div>
    </div>

    <div class="form-group">
        <label for="count" class="col-md-3 control-label">Promo Type: </label>
        <div class="col-md-8">
            <input id="promo-type" type="text" class="form-control" placeholder="No Results" readonly style="background-color:#ffffff;">
        </div>
    </div>

    <div class="form-group">
        <label for="count" class="col-md-3 control-label">Promo Value: </label>
        <div class="col-md-8">
            <input id="promo-value" type="text" class="form-control" placeholder="No Results" readonly style="background-color:#ffffff;">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3">Description:</label>
        <div class="col-sm-8">
            <textarea style="background-color:#ffffff;" class="form-control" placeholder="No Results" rows="5" id="promo-description" name="description" readonly></textarea>
        </div>
    </div>

</form>
