<table id="tray" class="table borderless table-responsive" style="font-size: 12px;">
    <thead>
        <tr>
	        <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
   		<?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
   		<tr id="order<?php echo e($cart->id); ?>">
   			<td id="order_id<?php echo e($cart->id); ?>"><?php echo e($cart->id); ?></td>
            <td id="order_name<?php echo e($cart->id); ?>"><?php echo e($cart->name); ?></td>
            <td>
            	<button type="button" class="btn btn-xs btn-primary plus" style="border-radius: 50%" id="<?php echo e($cart->id); ?>"><i class="fa fa-plus" aria-hidden="true"></i></button>
            	<input class="txt_quantity" type="number" min="1" value="<?php echo e($cart->quantity); ?>" id="count<?php echo e($cart->id); ?>" style="width:40px;">
              <button type="button" class="btn btn-xs btn-primary minus" style="border-radius: 50%;" id="<?php echo e($cart->id); ?>"><i class="fa fa-minus" aria-hidden="true"></i></button>
            </td>
            <td><label id="subtotal<?php echo e($cart->id); ?>"><?php echo e(number_format((float)$cart->price * $cart->quantity, 2, '.', '')); ?></label></td>
			<td align="center">
				<form>
					<input type="hidden" name="deleteid" value="<?php echo e($cart->id); ?>">
					<button type="button" class="btn btn-xs btn-danger removeToTray" style="border-radius: 50%;" id="<?php echo e($cart->id); ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
				</form>
			</td>
		</tr>
   		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
   		<?php endif; ?>
    </tbody>
</table>