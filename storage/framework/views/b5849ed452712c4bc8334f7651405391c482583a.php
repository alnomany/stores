<?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }
?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="text-uppercase"><?php echo e(trans('labels.add_new')); ?></h5>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('admin/products')); ?>"><?php echo e(trans('labels.products')); ?></a></li>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="<?php echo e(URL::to('admin/products/save')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.category')); ?> <span class="text-danger"> *
                                        </span></label>
                                    <select class="form-control selectpicker" name="category[]" multiple
                                        data-live-search="true" id="editcat_id" required>
                                        <?php if(!empty($getcategorylist)): ?>
                                            <?php $__currentLoopData = $getcategorylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($catdata->id); ?>" data-id="<?php echo e($catdata->id); ?>">
                                                    <?php echo e($catdata->name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </select>
                                    <?php $__errorArgs = ['category'];
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.name')); ?> <span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="product_name"
                                        value="<?php echo e(old('product_name')); ?>" placeholder="<?php echo e(trans('labels.name')); ?>"
                                        required>
                                    <?php $__errorArgs = ['product_name'];
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.sku')); ?></label>
                                    <input type="text" class="form-control" name="product_sku"
                                        value="<?php echo e(old('product_sku')); ?>" placeholder="<?php echo e(trans('labels.sku')); ?>"
                                        id="product_sku">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.image')); ?> <span class="text-danger"> *
                                        </span></label>
                                    <input type="file" class="form-control" name="product_image[]" multiple
                                        id="image" multiple="" required>
                                    <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span> <br>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="gallery"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.video_url')); ?> </label>
                                    <input class="form-control" type="text" name="video_url"
                                        placeholder="<?php echo e(trans('labels.video_url')); ?>" value="<?php echo e(old('video_url')); ?>">
                                    <?php $__errorArgs = ['video_url'];
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.tax')); ?> </label>
                                    <select name="tax[]" class="form-control selectpicker" multiple
                                        data-live-search="true">
                                        <?php if(!empty($gettaxlist)): ?>
                                            <?php $__currentLoopData = $gettaxlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tax->id); ?>"> <?php echo e($tax->name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php $__errorArgs = ['tax'];
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.attachment_name')); ?> </label>
                                    <input type="text" class="form-control" name="attachment_name" id="attachment_name"
                                        placeholder="<?php echo e(trans('labels.attachment_name')); ?>">
                                    <?php $__errorArgs = ['attachment_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span> <br>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.attachment_file')); ?></label>
                                    <input type="file" class="form-control" name="attachment_file" id="attachment_file">
                                    <?php $__errorArgs = ['attachment_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span> <br>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'digital_product')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'digital_product')->first()->activated == 1): ?>
                                <?php echo $__env->make('admin.product.digital_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>

                            <div class="col-md-12 form-group">
                                <label class="form-label"><?php echo e(trans('labels.description')); ?> </label>
                                <textarea class="form-control" id="ckeditor" name="description"><?php echo e(old('description')); ?></textarea>
                                <?php $__errorArgs = ['description'];
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

                            <div class="row">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <div class="form-group">
                                        <label for="has_extras"
                                            class="form-label"><?php echo e(trans('labels.product_has_extras')); ?></label>
                                        <div class="col-md-12">
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_extras" type="radio"
                                                    name="has_extras" id="extras_no" value="2" checked
                                                    <?php if(old('has_extras') == 2): ?> checked <?php endif; ?>>
                                                <label class="form-check-label"
                                                    for="extras_no"><?php echo e(trans('labels.no')); ?></label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_extras" type="radio"
                                                    name="has_extras" id="extras_yes" value="1"
                                                    <?php if(old('has_extras') == 1): ?> checked <?php endif; ?>>
                                                <label class="form-check-label"
                                                    for="extras_yes"><?php echo e(trans('labels.yes')); ?></label>
                                            </div>
                                            <?php $__errorArgs = ['has_extras'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <br><span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-info align-items-end btn-sm" type="button"
                                        id="globalextra" onclick="global_extras()"><i
                                            class="fa-sharp fa-solid fa-plus"></i>
                                        <?php echo e(trans('labels.add_global_extras')); ?></button>
                                </div>
                                <div id="extras">
                                    <div class="row m-0">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.name')); ?> <span
                                                        class="text-danger">
                                                        * </span></label>
                                                <input type="text" class="form-control" name="extras_name[]"
                                                    placeholder="<?php echo e(trans('labels.name')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.price')); ?> <span
                                                        class="text-danger">
                                                        * </span></label>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control numbers_only"
                                                        name="extras_price[]" placeholder="<?php echo e(trans('labels.price')); ?>">
                                                    <button class="btn btn-outline-info mx-2" type="button"
                                                        onclick="extras_fields('<?php echo e(trans('labels.name')); ?>','<?php echo e(trans('labels.price')); ?>')"><i
                                                            class="fa-sharp fa-solid fa-plus"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(!empty($globalextras) && $globalextras->count() > 0): ?>
                                        <div id="global-extras"></div>
                                    <?php endif; ?>
                                    <div id="more_extras_fields"></div>
                                </div>

                               
                            </div>

                            <div class="col-12 d-flex align-items-center justify-content-between">
                                <div class="form-group">
                                    <label for="has_variants"
                                        class="form-label"><?php echo e(trans('labels.product_has_variation')); ?></label>
                                    <div class="col-md-12">
                                        <div class="form-check-inline">
                                            <input class="form-check-input me-0 has_variants" type="radio"
                                                name="has_variants" id="no" value="2" checked
                                                <?php if(old('has_variants') == 2): ?> checked <?php endif; ?>>
                                            <label class="form-check-label"
                                                for="no"><?php echo e(trans('labels.no')); ?></label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input class="form-check-input me-0 has_variants" type="radio"
                                                name="has_variants" id="yes" value="1"
                                                <?php if(old('has_variants') == 1): ?> checked <?php endif; ?>>
                                            <label class="form-check-label"
                                                for="yes"><?php echo e(trans('labels.yes')); ?></label>
                                        </div>
                                        <?php $__errorArgs = ['has_variants'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <br><span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <button class="btn btn-outline-info btn-sm" type="button" id="btn_addvariants"
                                    onclick="commonModal()">
                                    <?php echo e(trans('labels.add_variants')); ?> <i class="fa-sharp fa-solid fa-plus"></i>
                                </button>
                            </div>

                            <div class="row dn <?php if($errors->has('variants_name.*') || $errors->has('variants_price.*')): ?> dn <?php endif; ?> <?php if(old('variants') == 2): ?> d-flex <?php endif; ?>"
                                id="price_row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(trans('labels.original_price')); ?> <span
                                                class="text-danger"> * </span>
                                        </label>
                                        <input type="text" class="form-control numbers_only" name="original_price"
                                            value="<?php echo e(old('original_price')); ?>"
                                            placeholder="<?php echo e(trans('labels.original_price')); ?>" id="original_price"
                                            required>
                                        <?php $__errorArgs = ['original_price'];
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(trans('labels.selling_price')); ?> <span
                                                class="text-danger"> * </span></label>
                                        <input type="text" class="form-control numbers_only" name="price"
                                            value="<?php echo e(old('price')); ?>"
                                            placeholder="<?php echo e(trans('labels.selling_price')); ?>" id="price" required>
                                        <?php $__errorArgs = ['price'];
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

                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <div class="form-group">
                                        <label for="has_stock"
                                            class="form-label"><?php echo e(trans('labels.stock_management')); ?></label>
                                        <div class="col-md-12">
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_stock" type="radio"
                                                    name="has_stock" id="stock_no" value="2" checked
                                                    <?php if(old('has_stock') == 2): ?> checked <?php endif; ?>>
                                                <label class="form-check-label"
                                                    for="stock_no"><?php echo e(trans('labels.no')); ?></label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_stock" type="radio"
                                                    name="has_stock" id="stock_yes" value="1"
                                                    <?php if(old('has_stock') == 1): ?> checked <?php endif; ?>>
                                                <label class="form-check-label"
                                                    for="stock_yes"><?php echo e(trans('labels.yes')); ?></label>
                                            </div>
                                            <?php $__errorArgs = ['has_stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <br><span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3" id="block_stock_qty">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(trans('labels.stock_qty')); ?> <span
                                                class="text-danger"> * </span></label>
                                        <input type="text" class="form-control numbers_only" name="qty"
                                            value="<?php echo e(old('qty')); ?>" placeholder="<?php echo e(trans('labels.stock_qty')); ?>"
                                            id="qty">
                                    </div>
                                </div>
                                <div class="col-md-3" id="block_min_order">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(trans('labels.min_order_qty')); ?> <span
                                                class="text-danger"> * </span>
                                        </label>
                                        <input type="text" class="form-control numbers_only" name="min_order"
                                            value="<?php echo e(old('min_order')); ?>"
                                            placeholder="<?php echo e(trans('labels.min_order_qty')); ?>" id="min_order">
                                        <?php $__errorArgs = ['min_order'];
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
                                <div class="col-md-3" id="block_max_order">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(trans('labels.max_order_qty')); ?> <span
                                                class="text-danger"> * </span>
                                        </label>
                                        <input type="text" class="form-control numbers_only" name="max_order"
                                            value="<?php echo e(old('max_order')); ?>"
                                            placeholder="<?php echo e(trans('labels.max_order_qty')); ?>" id="max_order">
                                        <?php $__errorArgs = ['max_order'];
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
                                <div class="col-md-3" id="block_product_low_qty_warning">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(trans('labels.product_low_qty_warning')); ?> <span
                                                class="text-danger"> * </span></label>
                                        <input type="text" class="form-control numbers_only variation_qty"
                                            name="low_qty" id="low_qty"
                                            placeholder="<?php echo e(trans('labels.product_low_qty_warning')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row  dn <?php if($errors->has('variation.*') || $errors->has('variation_price.*') || old('has_variants') == 1): ?> d-flex <?php endif; ?>" id="variations">
                                <div id="productVariant" class="col-md-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card my-3 d-none" id="variant_card">
                                                <div class="card-header">
                                                    <div class="row flex-grow-1">
                                                        <div class="col-md d-flex align-items-center">
                                                            <h5 class="card-header-title">
                                                                <?php echo e(trans('labels.product')); ?>

                                                                <?php echo e(trans('labels.variants')); ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <input type="hidden" id="hiddenVariantOptions"
                                                        name="hiddenVariantOptions" value="{}">
                                                    <div class="variant-table">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group text-end">
                                <a href="<?php echo e(URL::to('admin/products')); ?>"
                                    class="btn btn-outline-danger"><?php echo e(trans('labels.cancel')); ?></a>
                                <button
                                    class="btn btn-secondary <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_products', Auth::user()->role_id, $vendor_id, 'add') == 1 ? '' : 'd-none') : ''); ?>"
                                    <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade  modal-fade-transform" id="commonModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-inner lg-dialog" role="document">
            <div class="modal-content">
                <div class="popup-content">
                    <div class="modal-header  popup-header align-items-center">
                        <div class="modal-title">
                            <h6 class="mb-0" id="modelCommanModelLabel"><?php echo e(trans('labels.add_variants')); ?></h6>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo e(URL::to('admin/products/get-product-variants-possibilities')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="variant_name"><?php echo e(trans('labels.variant_name')); ?></label>
                                <input class="form-control" name="variant_name" type="text" id="variant_name"
                                    placeholder="<?php echo e('Variant Name, i.e Size, Color etc'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="variant_options"><?php echo e(trans('labels.variant_options')); ?></label>
                                <input class="form-control" name="variant_options" type="text" id="variant_options"
                                    placeholder="<?php echo e('Variant Options separated by|pipe symbol, i.e Black|Blue|Red'); ?>">
                            </div>
                            <div class="form-group col-12 d-flex justify-content-end form-label">
                                <input type="button" value="<?php echo e(trans('labels.cancel')); ?>"
                                    class="btn btn-danger btn-light" data-bs-dismiss="modal">
                                <input type="button" value="<?php echo e(trans('labels.add_variants')); ?>"
                                    class="btn btn-secondary add-variants ms-2">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        var extrasurl = "<?php echo e(URL::to('admin/getextras')); ?>";
        var vendor_id = "<?php echo e($vendor_id); ?>";
        var placehodername = "<?php echo e(trans('labels.name')); ?>";
        var placeholderprice = "<?php echo e(trans('labels.price')); ?>";
        var page = "add";
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    <script>
        $(document).on('click', '.add-variants', function(e) {
            e.preventDefault();
            var form = $(this).parents('form');
            var variantNameEle = $('#variant_name');
            var variantOptionsEle = $('#variant_options');
            var isValid = true;
            var hiddenVariantOptions = $('#hiddenVariantOptions').val();

            if (variantNameEle.val() == '') {
                variantNameEle.focus();
                isValid = false;
            } else if (variantOptionsEle.val() == '') {
                variantOptionsEle.focus();
                isValid = false;
            }

            if (isValid) {
                $.ajax({
                    url: form.attr('action'),
                    datType: 'json',
                    data: {
                        variant_name: variantNameEle.val(),
                        variant_options: variantOptionsEle.val(),
                        hiddenVariantOptions: hiddenVariantOptions
                    },
                    success: function(data) {
                        if (data.message != "" && data.message != null) {
                            toastr.error(data.message);
                        }
                        $('#hiddenVariantOptions').val(data.hiddenVariantOptions);
                        $('.variant-table').html(data.varitantHTML);
                        $('#variant_card').removeClass('d-none');
                        $("#commonModal").modal('hide');
                    }
                })
            }
        });
    </script>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/product.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/admin/product/add_product.blade.php ENDPATH**/ ?>