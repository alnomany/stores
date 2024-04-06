<?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }
    if (request()->is('admin/sliders*')) {
        $section = 0;
        $title = trans('labels.sliders');
        $url = URL::to('admin/sliders');
    } elseif (request()->is('admin/banner*')) {
        $section = 1;
        $title = trans('labels.banner');
        $url = URL::to('admin/banner');
    }
?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="text-uppercase"><?php echo e(trans('labels.add_new')); ?></h5>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('admin/banner')); ?>"><?php echo e(trans('labels.banner')); ?></a>
                </li>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="<?php echo e(URL::to('admin/banner/store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <input type="hidden" name="section" value="<?php echo e($section); ?>">
                            <div class="col-sm-6 form-group">
                                <label class="form-label"><?php echo e(trans('labels.type')); ?></label>
                                <select class="form-select type" name="banner_info" required>
                                    <option value="0"><?php echo e(trans('labels.select')); ?> </option>
                                    <option value="1" <?php echo e(old('banner_info') == '1' ? 'selected' : ''); ?>>
                                        <?php echo e(trans('labels.category')); ?></option>
                                    <option value="2" <?php echo e(old('banner_info') == '2' ? 'selected' : ''); ?>>
                                        <?php echo e(trans('labels.product')); ?></option>
                                </select>
                                <?php $__errorArgs = ['banner_info'];
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

                            <div class="col-sm-3 form-group 1 gravity">
                                <label class="form-label"><?php echo e(trans('labels.category')); ?><span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="category" id="category" required>
                                    <option value="" selected><?php echo e(trans('labels.select')); ?> </option>
                                    <?php $__currentLoopData = $getcategorylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"
                                            <?php echo e(old('category') == $item->id ? 'selected' : ''); ?>>
                                            <?php echo e($item->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              
                            </div>

                            <div class="col-sm-3 form-group 2 gravity">
                                <label class="form-label"><?php echo e(trans('labels.product')); ?><span class="text-danger"> *
                                    </span></label>
                                <select class="form-select" name="product" id="product" required>
                                    <option value="" selected><?php echo e(trans('labels.select')); ?> </option>
                                    <?php $__currentLoopData = $getproductslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"
                                            <?php echo e(old('product') == $item->id ? 'selected' : ''); ?>>
                                            <?php echo e($item->item_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                
                            </div>
                            <?php if($section == 0): ?>
                                <div class="col-sm-3 form-group link_text">
                                    <label class="form-label"><?php echo e(trans('labels.link_text')); ?> <span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="link_text" id="link_text"
                                        placeholder="<?php echo e(trans('labels.link_text')); ?>">
                                    
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <?php if($section == 0): ?>
                                <div class="col-sm-6 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.title')); ?> <span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="title"
                                        placeholder="<?php echo e(trans('labels.title')); ?>" required>
                                 
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.image')); ?> <span class="text-danger"> *
                                        </span></label>
                                    <input type="file" class="form-control" name="image" required>
                                    
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.description')); ?> <span class="text-danger">
                                            *
                                        </span></label>
                                    <textarea name="description" class="form-control" rows="5" placeholder="<?php echo e(trans('labels.description')); ?>"></textarea>
                                   
                                </div>
                            <?php else: ?>
                                <div class="col-sm-6 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.image')); ?> <span class="text-danger"> *
                                        </span></label>
                                    <input type="file" class="form-control" name="image" required>
                                  
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="row">
                            <div class="form-group text-end">
                                <a href="<?php echo e(URL::to($url)); ?>"
                                    class="btn btn-outline-danger"><?php echo e(trans('labels.cancel')); ?></a>
                                <button
                                    class="btn btn-secondary <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_banner', Auth::user()->role_id, $vendor_id, 'add') == 1 ? '' : 'd-none') : ''); ?>"
                                    <?php if(env('Environment') == 'sendbox'): ?> type="button"
                                    onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('.type').on('change', function() {
            "use strict";
            var optionValue = $(this).find("option:selected").attr("value");

            if (optionValue) {
                $(".gravity").not("." + optionValue).hide();
                $(".gravity").not("." + optionValue).find('select').prop('required', false);
                $("." + optionValue).show();
                $("." + optionValue).find('select').prop('required', true);

            } else {
                $(".gravity").hide();
                $(".gravity").find('select').prop('required', false);
                $('#link_text').prop('required', false);
            }
            if (optionValue != 0) {
                $('#link_text').prop('required', true);
                $('.link_text').removeClass('d-none');

            } else {
                $('#link_text').prop('required', false);
                $('.link_text').addClass('d-none');
            }
        }).change();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/admin/banner/add.blade.php ENDPATH**/ ?>