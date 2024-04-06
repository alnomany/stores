<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="text-uppercase"><?php echo e(trans('labels.cities')); ?></h5>
        <a href="<?php echo e(URL::to('admin/countries/add')); ?>" class="btn btn-secondary px-2 d-flex">
            <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?>

        </a>
    </div>
    <div class="row">
    <?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }
?>
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                            <thead>
                                <tr class="text-uppercase fw-500">
                                    <td></td>
                                    <td><?php echo e(trans('labels.srno')); ?></td>
                                    <td><?php echo e(trans('labels.city')); ?></td>
                                    <td><?php echo e(trans('labels.status')); ?></td>
                                    <td><?php echo e(trans('labels.created_date')); ?></td>   
                                    <td><?php echo e(trans('labels.updated_date')); ?></td>   
                                    <td><?php echo e(trans('labels.action')); ?></td>
                                   
                                </tr>
                            </thead>
                            <tbody id="tabledetails" data-url="<?php echo e(url('admin/countries/reorder_city')); ?>">
                                <?php
                                    $i = 1;
                                ?>
                                <?php $__currentLoopData = $allcontries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="fs-7 row1" id="dataid<?php echo e($country->id); ?>" data-id="<?php echo e($country->id); ?>">
                                        <td><a tooltip="<?php echo e(trans('labels.move')); ?>"><i
                                                    class="fa-light fa-up-down-left-right mx-2"></i></a></td>
                                        <td>
                                            <?php
                                                echo $i++;
                                            ?></td>
                                        <td><?php echo e($country->name); ?></td>
                                        <td>
                                            <?php if($country->is_available == '1'): ?>
                                                <a <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/countries/change_status-' . $country->id . '/2')); ?>')" <?php endif; ?>
                                                    class="btn btn-sm btn-outline-success"
                                                    tooltip="<?php echo e(trans('labels.active')); ?>"><i class="fas fa-check"></i></a>
                                            <?php else: ?>
                                                <a <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/countries/change_status-' . $country->id . '/1')); ?>')" <?php endif; ?>
                                                    class="btn btn-sm btn-outline-danger"
                                                    tooltip="<?php echo e(trans('labels.inactive')); ?>"><i
                                                        class="fas fa-close"></i></a>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(helper::date_format($country->created_at)); ?><br>
                                        <?php echo e(helper::time_format($country->created_at,$vendor_id)); ?>

                                        </td>
                                        <td><?php echo e(helper::date_format($country->updated_at)); ?><br>
                                        <?php echo e(helper::time_format($country->updated_at,$vendor_id)); ?>

                                        </td>
                                        <td>
                                            <a href="<?php echo e(URL::to('admin/countries/edit-' . $country->id)); ?>"
                                                class="btn btn-outline-info btn-sm" tooltip="<?php echo e(trans('labels.edit')); ?>">
                                                <i class="fa-regular fa-pen-to-square"></i></a>
                                            <a <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/countries/delete-' . $country->id)); ?>')" <?php endif; ?>
                                                class="btn btn-outline-danger btn-sm"
                                                tooltip="<?php echo e(trans('labels.delete')); ?>"> <i
                                                    class="fa-regular fa-trash"></i></a>
                                        </td>
                                       
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/admin/country/index.blade.php ENDPATH**/ ?>