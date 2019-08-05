<style type="text/css">
	body{
        font-size: 11px;
        font-family: arial, sans-serif;
    }
	table {
    		    border-collapse: collapse;
    		    width: 100%;
    		}
    		td, th {
    		    border: 1px solid #dddddd;
    		    text-align: left;
    		}
    .box
    {
        width: 33.33%;
        float: left;
    }
</style>
	<div align="right"><?php echo e(Carbon\Carbon::now()->format('m/d/Y')); ?></div>
	<?php if(App\Company::all()->first()->logo != "/images/logos/"): ?>
    <img src='.<?php echo e(App\Company::all()->first()->logo); ?>' style=" width: 20%;">
	<?php endif; ?>
    <div align="left"><span style="font-size: 15px"><?php echo e($company->name); ?></span><br><div style="width: 25%"><?php echo e($company->address); ?></div>TIN:<?php echo e($company->TIN); ?><br><?php echo e($company->contact); ?>&nbsp;/&nbsp;<?php echo e($company->email); ?><br><br><center><span style="font-size: 13px;">Menu List</span></center>
<div class="container">
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>CODE</th>
			<th>CATEGORY</th>
			<th>DESCRIPTION</th>
			<th>PRICE</th>
		</tr>
		<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<!-- <td><?php echo e(++$key); ?></td> -->
			<td><?php echo e($menu->id); ?></td>
			<td><?php echo e($menu->name); ?></td>
			<td><?php echo e($menu->ref_code); ?></td>
			<td><?php echo e($menu->category_id); ?></td>
			<td><?php echo e($menu->description); ?></td>
			<td><?php echo e($menu->price); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
</div>