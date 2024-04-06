<div id="email_settings">
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="text-uppercase"><?php echo e(trans('labels.email_settings')); ?></h5>
                    </div>
                    <form action="<?php echo e(URL::to('/admin/emailsettings')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo e(trans('labels.mail_driver')); ?><span class="text-danger"> *
                                    </span></label>
                                <input  type="text" class="form-control" name="mail_driver"
                                <?php if(env('Environment') == 'sendbox'): ?> value="*********" <?php else: ?> value="<?php echo e(@$settingdata->mail_driver); ?>" <?php endif; ?>
                                    placeholder="<?php echo e(trans('labels.mail_driver')); ?>" required>
                                <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo e(trans('labels.mail_host')); ?><span class="text-danger"> *
                                    </span></label>
                                <input  type="text" class="form-control" name="mail_host"
                                <?php if(env('Environment') == 'sendbox'): ?> value="*********" <?php else: ?> value="<?php echo e(@$settingdata->mail_host); ?>" <?php endif; ?> placeholder="<?php echo e(trans('labels.mail_host')); ?>"
                                    required>
                                <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo e(trans('labels.mail_port')); ?><span class="text-danger"> *
                                    </span></label>
                                <input  type="text" class="form-control" name="mail_port"
                                <?php if(env('Environment') == 'sendbox'): ?> value="*********" <?php else: ?> value="<?php echo e(@$settingdata->mail_port); ?>" <?php endif; ?>
                                    placeholder="<?php echo e(trans('labels.mail_port')); ?>" required>
                                <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo e(trans('labels.mail_username')); ?><span class="text-danger">
                                        *
                                    </span></label>
                                <input  type="text" class="form-control" name="mail_username"
                                <?php if(env('Environment') == 'sendbox'): ?> value="*********" <?php else: ?> value="<?php echo e(@$settingdata->mail_username); ?>" <?php endif; ?>
                                    placeholder="<?php echo e(trans('labels.mail_username')); ?>" required>
                                <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo e(trans('labels.mail_password')); ?><span class="text-danger">
                                        *
                                    </span></label>
                                <input  type="text" class="form-control" name="mail_password"
                                <?php if(env('Environment') == 'sendbox'): ?> value="*********" <?php else: ?> value="<?php echo e(@$settingdata->mail_password); ?>" <?php endif; ?>
                                    placeholder="<?php echo e(trans('labels.mail_password')); ?>" required>
                                <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo e(trans('labels.mail_encryption')); ?><span
                                        class="text-danger"> *
                                    </span></label>
                                <input  type="text" class="form-control" name="mail_encryption"
                                <?php if(env('Environment') == 'sendbox'): ?> value="*********" <?php else: ?>  value="<?php echo e(@$settingdata->mail_encryption); ?>" <?php endif; ?>
                                    placeholder="<?php echo e(trans('labels.mail_encryption')); ?>" required>
                                <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo e(trans('labels.mail_fromaddress')); ?><span
                                        class="text-danger">
                                        * </span></label>
                                <input  type="text" class="form-control" name="mail_fromaddress"
                                <?php if(env('Environment') == 'sendbox'): ?> value="*********" <?php else: ?>  value="<?php echo e(@$settingdata->mail_fromaddress); ?>" <?php endif; ?>
                                    placeholder="<?php echo e(trans('labels.mail_fromaddress')); ?>" required>
                                <?php $__errorArgs = ['mail_fromaddress'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo e(trans('labels.mail_fromname')); ?><span class="text-danger">
                                        *
                                    </span></label>
                                <input  type="text" class="form-control" name="mail_fromname"
                                <?php if(env('Environment') == 'sendbox'): ?> value="*********" <?php else: ?> value="<?php echo e(@$settingdata->mail_fromname); ?>" <?php endif; ?>
                                    placeholder="<?php echo e(trans('labels.mail_fromname')); ?>" required>
                                <?php $__errorArgs = ['mail_fromname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#testmailmodal" class="btn btn-secondary  <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_settings', Auth::user()->role_id, Auth::user()->vendor_id, 'add') == 1 || helper::check_access('role_settings', Auth::user()->role_id, Auth::user()->vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"><?php echo e(trans('labels.send_test_mail')); ?></button>
                            <button type="submit"   class="btn btn-secondary  <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_settings', Auth::user()->role_id, Auth::user()->vendor_id, 'add') == 1 || helper::check_access('role_settings', Auth::user()->role_id, Auth::user()->vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"><?php echo e(trans('labels.save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="testmailmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="testmailmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?php echo e(URL::to('/admin/testmail')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="testmailmodalLabel"><?php echo e(trans('labels.send_test_mail')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label"><?php echo e(trans('labels.email')); ?><span class="text-danger"> *
                            </span></label>
                        <input type="text" class="form-control" name="email_address"
                            value="<?php echo e(@$settingdata->email_address); ?>"
                            placeholder="<?php echo e(trans('labels.email')); ?>" required>
                    </div>
                    <div class="modal-footer">
                        <button <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?> class="btn btn-secondary"><?php echo e(trans('labels.send_test_mail')); ?></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/admin/emailsettings/email_setting.blade.php ENDPATH**/ ?>