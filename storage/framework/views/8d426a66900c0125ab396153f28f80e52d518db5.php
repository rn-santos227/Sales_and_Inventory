<?php $__env->startSection('page'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="fa fa-truck" aria-hidden="true"></i> System Settings</h4></div>
            <div class="panel-body">
                <form method="POST" action="systemsettings/<?php echo e($systemsetting->id); ?>" class="form-horizontal" onsubmit="return confirm('Are you sure want to update system settings?');">
                    <!-- Setting Method type to PUT needed for the Update Function -->
                    <?php echo e(method_field('PUT')); ?>


                    <!-- CSRF Tokens needed for Cross-Site Request Forgery(CSRF) Protection/Prevention -->
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group">
                        <label class="control-label col-sm-3" for="tax_rate">System Name:</label>
                        <div class="col-sm-4">
                            <input style="text-transform: uppercase;" type="text" class="form-control" name="system_name" id="system_name" value="<?php echo e($systemsetting->system_name); ?>">
                        </div>
                    </div>

                    <div class=" item_hide form-group<?php echo e($errors->has('cost_layering_method') ? ' has-error' : ''); ?>">
                        <label class="control-label col-sm-3" for="cost_layering_method">Cost Layering Method:</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="cost_layering_method" name="cost_layering_method" required>
                                <option value="<?php echo e($systemsetting->cost_layering_method); ?>"><?php echo e($systemsetting->cost_layering_method); ?></option>

                                <?php if($systemsetting->cost_layering_method == 'First In First Out'): ?>
                                <option value='Last In First Out'>Last In First Out</option>

                                <?php else: ?>
                                <option value='First In First Out'>First In First Out</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class=" form-group<?php echo e($errors->has('system_mode') ? ' has-error' : ''); ?>">
                        <label class="control-label col-sm-3" for="system_mode">Mode:</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="system_mode" name="system_mode" required>
                                <option value="<?php echo e($systemsetting->system_mode); ?>"><?php echo e($systemsetting->system_mode); ?></option>

                                <?php if($systemsetting->system_mode == 'Restaurant'): ?>
                                <option value='FastFood'>FastFood</option>
                                <option value='Retailer'>Retailer</option>

                                <?php elseif($systemsetting->system_mode == 'Retailer'): ?>
                                <option value='FastFood'>FastFood</option>
                                <option value='Restaurant'>Restaurant</option>

                                <?php else: ?>
                                <option value='Retailer'>Retailer</option>
                                <option value='Restaurant'>Restaurant</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group  item_hide ">
                        <input type="hidden" id="id" value="1">
                        <label class="control-label col-sm-3" for="tax_rate">Tax Rate:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="tax_rate" id="tax_rate" value="<?php echo e($systemsetting->tax_rate); ?>">
                        </div>
                    </div>

                    <div class="form-group  item_hide ">
                        <input type="hidden" id="id" value="1">
                        <label class="control-label col-sm-3" for="service_charge">Service Charge:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="service_charge" id="tax_rate" value="<?php echo e($systemsetting->service_charge); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="id" value="1">
                        <label class="control-label col-sm-3" for="tax_rate">Theme Color:</label>
                        <div class="col-sm-9">
                            <input value="&nbsp;&nbsp;&nbsp;" class="btn btnClick btn-xs picked" id="#24292e" type="button" style="border-radius: 50%; outline: none; background-color: #24292e;">
                            <input value="&nbsp;&nbsp;&nbsp;" class="btn btnClick btn-xs" id="#3b5998" type="button" style="border-radius: 50%; outline: none; background-color: #3b5998;">
                            <input value="&nbsp;&nbsp;&nbsp;" class="btn btnClick btn-xs" id="#4caf66" type="button" style="border-radius: 50%; outline: none; background-color: #4caf66;">
                            <input value="&nbsp;&nbsp;&nbsp;" class="btn btnClick btn-xs" id="#a79267" type="button" style="border-radius: 50%; outline: none; background-color: #a79267;">
                            <input value="&nbsp;&nbsp;&nbsp;" class="btn btnClick btn-xs" id="#99c2ac" type="button" style="border-radius: 50%; outline: none; background-color: #99c2ac;">
                            <input value="&nbsp;&nbsp;&nbsp;" class="btn btnClick btn-xs" id="#c8676e" type="button" style="border-radius: 50%; outline: none; background-color: #c8676e;">
                            <input type="hidden" name="theme_color" id="themeColorHidden" value="#24292e">
                        </div>
                    </div>

                    <div class="form-group item_hide ">
                        <label class="control-label col-sm-3" for="non_vat">Non-vat:</label>
                        <div class="checkbox col-sm-4">
                            <label class="switch">
                                <input style="margin-left: 0px;" name="non_vat" type="checkbox" ame="non_vat" id="non_vat" <?php echo e($systemsetting->non_vat == 1 ? 'checked' : ''); ?>>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-default pull-right">Save changes</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/systemsettings-script.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>