<?php $__env->startSection('content'); ?>
<?php
    if (Auth::user()->type == 4) {
    $vendor_id = Auth::user()->vendor_id;
    } else {
    $vendor_id = Auth::user()->id;
    }
    ?>
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="text-uppercase"><?php echo e(trans('labels.subscribers')); ?></h5>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                            <thead>
                                <tr class="text-uppercase fw-500">
                                    <td><?php echo e(trans('labels.srno')); ?></td>
                                    <td><?php echo e(trans('labels.email')); ?></td>
                                    <td><?php echo e(trans('labels.created_date')); ?></td>
                                    <td><?php echo e(trans('labels.updated_date')); ?></td>
                                    <td><?php echo e(trans('labels.action')); ?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                <?php $__currentLoopData = $getsubscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="fs-7">
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo e($subscriber->email); ?></td>
                                        <td><?php echo e(helper::date_format($subscriber->created_at)); ?><br>
                                        <?php echo e(helper::time_format($subscriber->created_at,$vendor_id)); ?>

                                        </td>
                                        <td><?php echo e(helper::date_format($subscriber->updated_at)); ?><br>
                                        <?php echo e(helper::time_format($subscriber->updated_at,$vendor_id)); ?>

                                        </td>
                                        <td>
                                            <a tooltip="<?php echo e(trans('labels.delete')); ?>"
                                                <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="deletedata('<?php echo e(URL::to('admin/subscribers/delete-' . $subscriber->id)); ?>')" <?php endif; ?>
                                                class="btn btn-outline-danger btn-sm <?php echo e(Auth::user()->type == 4 ? (helper::check_access(trans('labels.subscribers'), Auth::user()->role_id, Auth::user()->vendor_id, 'delete') == 1 ? '' : 'd-none') : ''); ?>">
                                                <i class="fa-regular fa-trash"></i></a>
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

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/admin/subscriber/index.blade.php ENDPATH**/ ?>