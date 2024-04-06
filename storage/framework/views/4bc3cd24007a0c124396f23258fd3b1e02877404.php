<?php echo $__env->make('front.theme.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($sliders->count() > 0): ?>
    <div class="card border-0">
        <div class="furniture_home owl-carousel owl-theme">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item"><img class="banner-bg" src=" <?php echo e(helper::image_path($slider->banner_image)); ?> "
                        alt="">
                    <div class="card-img-overlay banner-content">
                        <div class="container d-flex align-items-center justify-content-center z-9">
                            <div class="col-md-10">
                                <h3 class="banner-text mb-4"><?php echo e($slider->title); ?></h3>
                                <p class="banner-subtext mb-5"><?php echo e($slider->description); ?></p>
                                <?php if($slider->product_id != 0 || $slider->category_id != 0): ?>
                                    <div class="d-flex justify-content-center">
                                        <?php if($slider->type == 1): ?>
                                            <a href="<?php echo e(URL::to($storeinfo->slug . '/search?category=' . $slider['category_info']->slug)); ?>"
                                                class="btn btn-store">
                                            <?php elseif($slider->type == 2): ?>
                                                <a onclick="GetProductOverview('<?php echo e($slider->product_id); ?>')"
                                                    class="btn btn-store">
                                                <?php else: ?>
                                                    <a href="javascript:void(0)" class="btn btn-store">
                                        <?php endif; ?>
                                        <?php echo e($slider->link_text); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php else: ?>
    <div class="furniture_home owl-carousel owl-theme">
        <div class="item"><img class="banner-bg"
                src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/images/about/defaultimages/banner-placeholder.png')); ?> "
                alt="">
        </div>
    </div>
<?php endif; ?>
<?php if($bannerimage->count() > 0): ?>
    <section class="feature-sec mt-4 my-lg-4">
        <div class="container">
            <div class="feature-carousel owl-carousel owl-theme m-0">
                <?php $__currentLoopData = $bannerimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($image->type == 1): ?>
                        <a href="<?php echo e(URL::to($storeinfo->slug . '/search?category=' . @$image['category_info']->slug)); ?>"
                            class="cursor-pointer">
                        <?php elseif($image->type == 2): ?>
                            <a onclick="GetProductOverview('<?php echo e($image->product_id); ?>')" class="cursor-pointer">
                            <?php else: ?>
                                <a href="javascript:void(0)" class="cursor-pointer">
                    <?php endif; ?>
                    <div class="item h-100">
                        <div class="feature-box h-100">
                            <img src='<?php echo e(helper::image_path($image->banner_image)); ?>' class="">
                        </div>
                    </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(helper::getcategory($storeinfo->id)->count() > 0): ?>
    <section class="product-prev-sec product-list-sec pt-0">
        <div class="container">
            <div class="product-rev-wrap row">
                <div class="card cat-aside cat-aside-theme1 col-xl-3 col-lg-3 d-none d-lg-block">
                    <div class="card-header cat-dispaly bg-transparent px-0">
                        <div class=" d-inline-block">
                            <h4 class="<?php echo e(session()->get('direction') == 2 ? 'text-right' : ''); ?> m-0 ">
                                <?php echo e(trans('labels.category')); ?></h4>
                        </div>
                    </div>
                    <div
                        class="cat-aside-wrap responsiv-cat-aside mt-2 <?php echo e(session()->get('direction') == 2 ? 'text-right' : ''); ?>">

                        <?php $__currentLoopData = helper::getcategory($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $check_cat_count = 0;
                            ?>

                            <?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($category->id, explode('|', $item->cat_id))): ?>
                                    <?php
                                        $check_cat_count++;
                                    ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($check_cat_count > 0): ?>
                                <div>
                                    <a href="#<?php echo e($category->slug); ?>"
                                        class="border-top-no cat-check rounded-5 catinfo <?php echo e(session()->get('direction') == 2 ? 'cat-right-margin' : 'cat-left-margin'); ?> <?php echo e($key == 0 ? 'active' : ''); ?>"
                                        data-tab="<?php echo e($category->slug); ?>">
                                        <p class="line-1"><?php echo e($category->name); ?></p>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div
                    class="cat-product col-xl-9 col-lg-9 custom-categories-main-sec">
                    <?php $__currentLoopData = helper::getcategory($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $check_cat_count = 0;
                        ?>

                        <?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array($category->id, explode('|', $item->cat_id))): ?>
                                <?php
                                    $check_cat_count++;
                                ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($check_cat_count > 0): ?>
                            <div class="card card-header responsive-padding bg-transparent px-0  custom-cat-name-sec mt-4 mb-2"
                                id="<?php echo e($category->slug); ?>">
                                <div class=" d-inline-block">
                                    <h4
                                        class="sec-title <?php echo e(session()->get('direction') == 2 ? 'text-right mt-2' : ''); ?>">
                                        <?php echo e($category->name); ?><span class="px-2">(<?php echo e($check_cat_count); ?>)</span>
                                    </h4>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row recipe-card custom-product-card g-2">
                            <?php if(!helper::getcategory($storeinfo->id)->isEmpty()): ?>
                                <?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php if(in_array($category->id, explode('|', $item->cat_id))): ?>
                                        <div class="col-xl-3 col-md-4 responsive-col custom-product-column"
                                            id="pro-box">
                                            <div class="card pro-box h-100">

                                                <div class="pro-img">
                                                    <?php if(@$item['product_image']->image == null): ?>
                                                        <img src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/images/about/defaultimages/item-placeholder.png')); ?>"
                                                            class="cursor-pointer"
                                                            onclick="GetProductOverview('<?php echo e($item->id); ?>')"
                                                            alt="product image">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(@helper::image_path($item['product_image']->image)); ?>"
                                                            class="cursor-pointer"
                                                            onclick="GetProductOverview('<?php echo e($item->id); ?>')"
                                                            alt="product image">
                                                    <?php endif; ?>

                                                    <div class="sale-heart">
                                                        <?php if($off > 0): ?>
                                                            <div class="sale-label-on">-<?php echo e($off); ?>%</div>
                                                        <?php endif; ?>
                                                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                                                App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
                                                            <?php if(helper::appdata($storeinfo->id)->checkout_login_required == 1): ?>
                                                                <a onclick="managefavorite('<?php echo e($item->id); ?>',<?php echo e($storeinfo->id); ?>,'<?php echo e(URL::to(@$storeinfo->slug . '/managefavorite')); ?>')"
                                                                    class="btn-sm btn-Wishlist cursor-pointer <?php echo e(session()->get('direction') == 2 ? 'me-auto' : 'ms-auto'); ?>">
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
                                                        <h4 id="itemname"
                                                            onclick="GetProductOverview('<?php echo e($item->id); ?>')"
                                                            class=" <?php echo e(session()->get('direction') == 2 ? 'text-right' : ''); ?>">
                                                            <?php echo e($item->item_name); ?></h4>
                                                    </div>
                                                    <div class="card-footer border-0 bg-transparent p-0">
                                                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                                                App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
                                                            <?php if(helper::appdata($storeinfo->id)->checkout_login_required == 1 &&
                                                                    helper::appdata($storeinfo->id)->product_ratting_switch == 1): ?>
                                                                <p class="m-0 rating-star d-inline cursor-pointer"
                                                                    data-bs-toggle="offcanvas"
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

                                                </div>
                                                <?php if($item->stock_management == 1): ?>
                                                    <?php if(helper::checklowqty($item->id, $storeinfo->id) == 2 && $item->has_variants != 1): ?>
                                                        <div class="item-stock text-center">
                                                            <div class="m-1">
                                                                <span
                                                                    class="bg-danger p-1 px-2 fs-8 rounded-1 text-white border border-white"><?php echo e(trans('labels.out_of_stock')); ?></span>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<!--------- storereview --------->
<?php echo $__env->make('front.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- blog -->
<?php if(helper::getblogs($storeinfo->id)->count() > 0): ?>
    <section class="blog-6-sec">
        <div class="container">
            <div class="sec-header py-2">
                <h4 class="sec-title"><?php echo e(trans('labels.our_latest_blogs')); ?></h4>
            </div>
            <?php
                $blog = helper::getblogs($storeinfo->id);
            ?>

            <!-- blogs -->
            <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
                    <?php
                        $checkplan = App\Models\Transaction::where('vendor_id', $storeinfo->id)
                            ->orderByDesc('id')
                            ->first();
                        if ($storeinfo->allow_without_subscription == 1) {
                            $blogs_allow = 1;
                        } else {
                            $blogs_allow = @$checkplan->blogs;
                        }
                    ?>

                    <?php if($blogs_allow == 1): ?>
                        <div class="blog-6 owl-carousel owl-theme th-2-p">
                             <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item h-100">
                                        <div class="card border-0 h-100 rounded-3 overflow-hidden p-2">
                                            <div class="blog-6-img rounded-3">
                                                <a
                                                    href="<?php echo e(URL::to($storeinfo->slug . '/blogs-' . $blog->slug)); ?>">
                                                    <img src="<?php echo e(helper::image_path($blog->image)); ?>"
                                                        height="300" alt="blog img"
                                                        class="w-100 object-fit-cover rounded-3">
                                                </a>
                                            </div>
                                            <div class="card-body px-0 py-3">
                                                <h4 class="title line-2">
                                                    <a
                                                        href="<?php echo e(URL::to($storeinfo->slug . '/blogs-' . $blog->slug)); ?>"><?php echo e($blog->title); ?></a>
                                                </h4>
                                                <span class="blog-created">
                                                    <i class="fa-regular fa-calendar-days"></i>
                                                    <span
                                                        class="date"><?php echo e(helper::date_format($blog->created_at)); ?></span>
                                                </span>
                                                <div class="description line-2"><?php echo Str::limit($blog->description, 200); ?></div>
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
                    <div class="blog-6 owl-carousel owl-theme th-2-p">
                        <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item h-100">
                                    <div class="card border-0 h-100 rounded-3 overflow-hidden p-2">
                                        <div class="blog-6-img rounded-3">
                                            <a href="<?php echo e(URL::to($storeinfo->slug . '/blogs-' . $blog->slug)); ?>">
                                                <img src="<?php echo e(helper::image_path($blog->image)); ?>" height="300"
                                                    alt="blog img" class="w-100 object-fit-cover rounded-3">
                                            </a>
                                        </div>
                                        <div class="card-body px-0 py-3">
                                            <h4 class="title line-2">
                                                <a
                                                    href="<?php echo e(URL::to($storeinfo->slug . '/blogs-' . $blog->slug)); ?>"><?php echo e($blog->title); ?></a>
                                            </h4>
                                            <span class="blog-created">
                                                <i class="fa-regular fa-calendar-days"></i>
                                                <span
                                                    class="date"><?php echo e(helper::date_format($blog->created_at)); ?></span>
                                            </span>
                                            <div class="description line-2"><?php echo Str::limit($blog->description, 200); ?></div>
                                        </div>
                                    </div>
                                </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>


<!--------- newsletter --------->
<?php echo $__env->make('front.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('front.theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/front/template-1/home.blade.php ENDPATH**/ ?>