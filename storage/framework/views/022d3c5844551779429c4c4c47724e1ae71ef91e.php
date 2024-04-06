<?php echo $__env->make('front.theme.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="breadcrumb-sec">

    <div class="container">

        <nav aria-label="breadcrumb">

            <h2 class="breadcrumb-title text-center mb-2"><?php echo e(trans('labels.search')); ?></h2>

            <ol class="breadcrumb justify-content-center">

                <li class="breadcrumb-item"><a class="text-dark"
                        href="<?php echo e(URL::to($storeinfo->slug . '/')); ?>"><?php echo e(trans('labels.home')); ?></a>
                </li>
                <li class="text-muted breadcrumb-item active" aria-current="page"><?php echo e(trans('labels.search')); ?></li>

            </ol>

        </nav>

    </div>

</section>

<section class="productsearch">

    <div class="container">

        <!-- product search -->
        <form action="<?php echo e(URL::to($storeinfo->slug . '/search')); ?>" method="GET">
            <div class="row align-items-center justify-content-center mb-5">
                <div class="col-lg-4 col-md-4 col-12 mb-3 mb-md-0">
                    <select class="form-select p-md-3 p-2 rounded-5" aria-label="Default select example" name="category"
                        onchange="location =  $('option:selected',this).data('value');">
                        <option selected value=""
                            data-value="<?php echo e(URL::to($storeinfo->slug . '/search?category=' . '&search_input=' . request()->get('search_input'))); ?>">
                            <?php echo e(trans('labels.select')); ?></option>
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->slug); ?>"
                                <?php echo e($item->slug == request()->get('category') ? 'selected' : ''); ?>

                                data-value="<?php echo e(URL::to($storeinfo->slug . '/search?category=' . $item->slug . '&search_input=' . request()->get('search_input'))); ?>">
                                <?php echo e($item->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>
                <div class="col-lg-5 col-md-5 col-12 mb-3 mb-md-0">
                    <input type="text" class="form-control p-md-3 p-2 rounded-5" id="searchproduct"
                        name="search_input" value="<?php echo e(isset($_GET['search_input']) ? $_GET['search_input'] : ''); ?>"
                        placeholder="Search here...">
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <button type="submit" class="btn btn-store py-md-3 py-2"><?php echo e(trans('labels.search')); ?></button>
                </div>
            </div>
        </form>

        <!-- search result -->
        <?php if($itemlist->count() > 0): ?>
            <div class="product-prev-sec searchresult mb-5">
                <div class="row recipe-card row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 g-2">
                    <?php $__currentLoopData = $itemlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col custom-product-column">
                            <div class="pro-box">
                                <div class="pro-img ">
                                    <?php if(@$item['product_image']->image == null): ?>
                                        <img src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/images/about/defaultimages/item-placeholder.png')); ?>"
                                            alt="product image">
                                    <?php else: ?>
                                        <img src="<?php echo e(@helper::image_path($item['product_image']->image)); ?>"
                                            alt="product image">
                                    <?php endif; ?>

                                    <div class="sale-heart">
                                        <?php
                                            if ($item['variation']->count() > 0) {
                                                $price = $item['variation'][0]->price;
                                                $original_price = $item['variation'][0]->original_price;
                                            } else {
                                                $price = $item->item_price;
                                                $original_price = $item->item_original_price;
                                            }
                                            $off = $original_price > 0 ? number_format(100 - ($price * 100) / $original_price, 1) : 0;
                                        ?>
                                        <?php if($off > 0): ?>
                                            <div class="sale-label-on">-<?php echo e($off); ?>%</div>
                                        <?php endif; ?>
                                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                                App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
                                            <?php if(helper::appdata($storeinfo->id)->checkout_login_required == 1): ?>
                                                <a onclick="managefavorite('<?php echo e($item->id); ?>',<?php echo e($storeinfo->id); ?>,'<?php echo e(URL::to(@$storeinfo->slug . '/managefavorite')); ?>')"
                                                    class="btn-sm btn-Wishlist cursor-pointer">
                                                    <?php if(Auth::user() && Auth::user()->type == 3): ?>
                                                        <?php

                                                            $favorite = helper::ceckfavorite($item->id, $storeinfo->id, Auth::user()->id);

                                                        ?>
                                                        <?php if(!empty($favorite) && $favorite->count() > 0): ?>
                                                            <i class="fa-solid fa-heart"></i>
                                                        <?php else: ?>
                                                            <i class="fa-regular fa-heart"></i>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <i class="fa-regular fa-heart"></i>
                                                    <?php endif; ?>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="product-details-wrap">
                                    <div class="product-details-inner  mb-2 line-2">
                                        <h4 id="itemname" onclick="GetProductOverview('<?php echo e($item->id); ?>')"
                                            class=" <?php echo e(session()->get('direction') == 2 ? 'text-right' : ''); ?>">
                                            <?php echo e($item->item_name); ?></h4>
                                    </div>
                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
                                        <?php if(helper::appdata($storeinfo->id)->checkout_login_required == 1 &&
                                                helper::appdata($storeinfo->id)->product_ratting_switch == 1): ?>
                                            <p class="m-0 rating-star d-inline" data-bs-toggle="offcanvas"
                                                data-bs-target="#ratingsidebar"
                                                onclick="rattingmodal('<?php echo e($item->id); ?>','<?php echo e($storeinfo->id); ?>','<?php echo e($item->item_name); ?>')"
                                                aria-controls="offcanvasRight"><i
                                                    class="fa-solid fa-star text-warning"></i><span
                                                    class="px-1"><?php echo e(number_format($item->ratings_average, 1)); ?></span>
                                            </p>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="d-flex align-items-baseline">
                                        <p class="pro-pricing line-1">
                                            <?php if($item['variation']->count() > 0): ?>
                                                <?php echo e(helper::currency_formate($item['variation'][0]->price, $storeinfo->id)); ?>

                                            <?php else: ?>
                                                <?php echo e(helper::currency_formate($item->item_price, $storeinfo->id)); ?>

                                            <?php endif; ?>

                                        </p>
                                        <p class="pro-pricing pro-org-value line-1">
                                            <?php if($item['variation']->count() > 0): ?>
                                                <?php echo e($item['variation'][0]->original_price ? helper::currency_formate($item['variation'][0]->original_price, $storeinfo->id) : ''); ?>

                                            <?php else: ?>
                                                <?php echo e($item->item_original_price > 0 ? helper::currency_formate($item->item_original_price, $storeinfo->id) : ''); ?>

                                            <?php endif; ?>

                                        </p>
                                    </div>

                                    <button class="btn btn-sm m-0 py-1 w-100 btn-content rounded-5"
                                        onclick="GetProductOverview('<?php echo e($item->id); ?>')"><?php echo e(helper::appdata($storeinfo->id)->online_order == 1 ? trans('labels.add_to_cart') : trans('labels.view')); ?></button>
                                </div>
                                <?php if(helper::checklowqty($item->id, $storeinfo->id) == 2 && $item->has_variants != 1): ?>
                                    <div class="item-stock text-center"><span
                                            class="bg-danger p-1 px-2 fs-8 rounded-1 text-white border border-white"><?php echo e(trans('labels.out_of_stock')); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <?php echo $itemlist->withQueryString()->links(); ?>


                </div>
            </div>
        <?php else: ?>
            <?php echo $__env->make('front.no_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    </div>
</section>

<!-- newsletter -->
<?php echo $__env->make('front.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- newsletter -->

<?php echo $__env->make('front.theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/front/search.blade.php ENDPATH**/ ?>