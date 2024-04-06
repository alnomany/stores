<?php $__env->startSection('content'); ?>
<?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }
?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="text-uppercase"><?php echo e(trans('labels.users')); ?></h5>
        <div class="d-inline-flex">
            <a href="<?php echo e(URL::to('admin/users/add')); ?>" class="btn btn-secondary px-2 d-flex">
                <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body">
                    <div class="table-responsive" id="table-display">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                            <thead>
                                <tr class="text-uppercase fw-500">
                                    <td><?php echo e(trans('labels.id')); ?></td>
                                    <td><?php echo e(trans('labels.image')); ?></td>
                                    <td><?php echo e(trans('labels.name')); ?></td>
                                    <td><?php echo e(trans('labels.email')); ?></td>
                                    <td><?php echo e(trans('labels.mobile')); ?></td>
                                    <td><?php echo e(trans('labels.login_type')); ?></td>
                                    <td><?php echo e(trans('labels.status')); ?></td>
                                    <td><?php echo e(trans('labels.created_date')); ?></td>
                                    <td><?php echo e(trans('labels.updated_date')); ?></td>
                                    <td><?php echo e(trans('labels.action')); ?></td>
                                   
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $getuserslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="fs-7">
                                        <td><?php echo e($user->id); ?></td>
                                        <td> <img src="<?php echo e(helper::image_path($user->image)); ?>"
                                                class="img-fluid rounded hw-50" alt="" srcset=""> </td>
                                        <td> <?php echo e($user->name); ?> </td>
                                        <td> <?php echo e($user->email); ?> </td>
                                        <td> <?php echo e($user->mobile); ?> </td>
                                        <td>
                                            <?php if($user->login_type == 'normal'): ?>
                                                <?php echo e(trans('labels.normal')); ?>

                                            <?php elseif($user->login_type == 'google'): ?>
                                                <?php echo e(trans('labels.google')); ?>

                                            <?php elseif($user->login_type == 'facebook'): ?>
                                                <?php echo e(trans('labels.facebook')); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($user->is_available == 1): ?>
                                                <a class="btn btn-sm btn-outline-success"
                                                    tooltip="<?php echo e(trans('labels.active')); ?>"
                                                    <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/users/status-' . $user->slug . '/2')); ?>')" <?php endif; ?>><i
                                                        class="fa-sharp fa-solid fa-check"></i></a>
                                            <?php else: ?>
                                                <a class="btn btn-sm btn-outline-danger"
                                                    tooltip="<?php echo e(trans('labels.inactive')); ?>"
                                                    <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/users/status-' . $user->slug . '/1')); ?>')" <?php endif; ?>><i
                                                        class="fa-sharp fa-solid fa-xmark mx-1"></i></a>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(helper::date_format($user->created_at)); ?><br>
                                        <?php echo e(helper::time_format($user->created_at,$vendor_id)); ?>

                                        </td>
                                        <td><?php echo e(helper::date_format($user->updated_at)); ?><br>
                                        <?php echo e(helper::time_format($user->updated_at,$vendor_id)); ?>

                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-info" tooltip="<?php echo e(trans('labels.edit')); ?>"
                                                href="<?php echo e(URL::to('admin/users/edit-' . $user->slug)); ?>"> <i
                                                    class="fa fa-pen-to-square"></i></a>
                                            <a class="btn btn-sm btn-outline-dark" tooltip="<?php echo e(trans('labels.login')); ?>"
                                                href="<?php echo e(URL::to('admin/users/login-' . $user->id)); ?>"> <i
                                                    class="fa-regular fa-arrow-right-to-bracket"></i> </a>
                                            <a class="btn btn-sm btn-outline-secondary"
                                                tooltip="<?php echo e(trans('labels.view')); ?>"
                                                href="<?php echo e(URL::to('/' . $user->slug)); ?>" target="_blank"><i
                                                    class="fa-regular fa-eye"></i></a>
                                            <button type="button" id="btn_password<?php echo e($user->id); ?>"
                                                tooltip="<?php echo e(trans('labels.reset_password')); ?>"
                                                onclick="myfunction(<?php echo e($user->id); ?>)"
                                                class="btn btn-sm btn-outline-success" data-vendor_id="<?php echo e($user->id); ?>"
                                                data-type="1"><i class="fa-light fa-key"></i></button>
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
    <!-- Modal -->
    <div class="modal fade" id="changepasswordModal" tabindex="-1" aria-labelledby="changepasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="<?php echo e(URL::to('/admin/settings/change-password')); ?>" method="post" class="w-100">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changepasswordModalLabel">
                            <?php echo e(trans('labels.change_password')); ?>

                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card p-1 border-0">
                            <input type="hidden" class="form-control" name="modal_vendor_id" id="modal_vendor_id"
                                value="">
                            <input type="hidden" class="form-control" name="type" id="type" value="1">
                            <div class="form-group">
                                <label for="new_password" class="form-label"><?php echo e(trans('labels.new_password')); ?></label>
                                <input type="password" class="form-control" name="new_password" required
                                    placeholder="<?php echo e(trans('labels.new_password')); ?>">

                            </div>
                            <div class="form-group">
                                <label for="confirm_password"
                                    class="form-label"><?php echo e(trans('labels.confirm_password')); ?></label>
                                <input type="password" class="form-control" name="confirm_password" required
                                    placeholder="<?php echo e(trans('labels.confirm_password')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary"><?php echo e(trans('labels.save')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        function myfunction(id) {
            $('#modal_vendor_id').val($('#btn_password' + id).attr("data-vendor_id"));
            $('#changepasswordModal').modal('show');

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/admin/user/index.blade.php ENDPATH**/ ?>