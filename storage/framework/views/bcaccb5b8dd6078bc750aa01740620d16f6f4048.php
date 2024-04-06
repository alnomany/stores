<?php
      if(Auth::user()->type == 4)
        {
            $vendor_id = Auth::user()->vendor_id;
        }else{
            $vendor_id = Auth::user()->id;
        }
?>
<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
        <tr class="text-uppercase fw-500">
            <td></td>
            <td><?php echo e(trans('labels.srno')); ?></td>
            <td><?php echo e(trans('labels.area_name')); ?></td>
            <td><?php echo e(trans('labels.amount')); ?></td>
            <td><?php echo e(trans('labels.created_date')); ?></td>   
            <td><?php echo e(trans('labels.updated_date')); ?></td> 
            <td><?php echo e(trans('labels.action')); ?></td>
        </tr>
    </thead>
    <tbody id="tabledetails" data-url="<?php echo e(url('admin/shipping-area/reorder_shippingarea')); ?>">
        <?php $i=1; ?>
        <?php $__currentLoopData = $getshippingarealist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shippingarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="fs-7 row1" id="dataid<?php echo e($shippingarea->id); ?>" data-id="<?php echo e($shippingarea->id); ?>">
                <td><a tooltip="<?php echo e(trans('labels.move')); ?>"><i
                    class="fa-light fa-up-down-left-right mx-2"></i></a></td>
                <td><?php echo $i++ ?></td>
                <td><?php echo e($shippingarea->name); ?></td>
                <td><?php echo e(helper::currency_formate($shippingarea->price, $vendor_id)); ?></td>
                <td><?php echo e(helper::date_format($shippingarea->created_at)); ?><br>
                <?php echo e(helper::time_format($shippingarea->created_at,$vendor_id)); ?>

                   
                </td>
                <td><?php echo e(helper::date_format($shippingarea->updated_at)); ?><br>
                <?php echo e(helper::time_format($shippingarea->updated_at,$vendor_id)); ?>

                </td>
                <td>
                    <a href="<?php echo e(URL::to('admin/shipping-area/show-' . $shippingarea->id)); ?>" tooltip="<?php echo e(trans('labels.edit')); ?>"
                        class="btn btn-outline-info btn-sm <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_shipping_area', Auth::user()->role_id, $vendor_id, 'edit') == 1  ? '':'d-none'): ''); ?>"> <i class="fa-regular fa-pen-to-square"></i></a>
                    <a <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?>  onclick="deletedata('<?php echo e(URL::to('admin/shipping-area/delete-' . $shippingarea->id)); ?>')" <?php endif; ?> tooltip="<?php echo e(trans('labels.delete')); ?>"
                        class="btn btn-outline-danger btn-sm <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_shipping_area', Auth::user()->role_id, $vendor_id, 'delete') == 1  ? '':'d-none'): ''); ?>"> <i class="fa-regular fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/admin/shippingarea/table.blade.php ENDPATH**/ ?>