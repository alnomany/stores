<!DOCTYPE html>
<html lang="en" dir="<?php echo e(session()->get('direction') == 2 ? 'rtl' : 'ltr'); ?>">

<head>
    <title><?php echo e(helper::appdata($storeinfo->id)->website_title); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" id="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta property="og:title" content="<?php echo e(helper::appdata($storeinfo->id)->meta_title); ?>" />
    <meta property="og:description" content="<?php echo e(helper::appdata($storeinfo->id)->meta_description); ?>" />
    <meta property="og:image" content='<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->og_image)); ?>' />
    <link rel="icon" href='<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->favicon)); ?>' type="image/x-icon">
    <!-- favicon-icon  -->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url(env('ASSETPATHURL') . 'front/css/all.min.css')); ?>">
    <!-- font-awsome css  -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url(env('ASSETPATHURL') . 'front/css/bootstrap.min.css')); ?>">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url(env('ASSETPATHURL') . 'front/css/owl.carousel.min.css')); ?>">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url(env('ASSETPATHURL') . 'front/css/style.css')); ?>">
    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url(env('ASSETPATHURL') . 'front/css/slick.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url(env('ASSETPATHURL') . 'front/css/slick-theme.css')); ?>">
    <!-- style css  -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url(env('ASSETPATHURL') . 'front/css/fonts.css')); ?>">
    <!-- Fonts css  -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url(env('ASSETPATHURL') . 'front/css/responsive.css')); ?>">
    <!-- responsive css  -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/css/sweetalert/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/css/toastr/toastr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL') . 'front/css/dataTables.bootstrap4.min.css')); ?>">

    <!-- PWA  -->
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
    <?php
    $checkplan = App\Models\Transaction::where('vendor_id', $storeinfo->id)
    ->orderByDesc('id')
    ->first();
    $user = App\Models\User::where('id', $storeinfo->id)->first();
    if ($user->allow_without_subscription == 1) {
    $pwa = 1;
    } else {
    $pwa = @$checkplan->pwa;
    }
    ?>

    <?php if($pwa == 1): ?>
    <?php if(helper::appdata($storeinfo->id)->pwa == 1): ?>
    <?php echo $__env->make('front.pwa.pwa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>
    <?php else: ?>
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
    <?php if(helper::appdata($storeinfo->id)->pwa == 1): ?>
    <?php echo $__env->make('front.pwa.pwa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>
    <!-- PWA  -->

    <!-- IF VERSION 2  -->
    <?php if(helper::appdata('')->recaptcha_version == 'v2'): ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php endif; ?>
    <!-- IF VERSION 3  -->
    <?php if(helper::appdata('')->recaptcha_version == 'v3'): ?>
    <?php echo RecaptchaV3::initJs(); ?>

    <?php endif; ?>
    <style>
        #splash {
            background-color: #000;
        }
    </style>
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'pixel')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'pixel')->first()->activated == 1): ?>
    <?php
    $checkplan = App\Models\Transaction::where('vendor_id', $storeinfo->id)
    ->orderByDesc('id')
    ->first();
    $user = App\Models\User::where('id', $storeinfo->id)->first();
    if ($user->allow_without_subscription == 1) {
    $pixel = 1;
    } else {
    $pixel = @$checkplan->pixel;
    }

    ?>
    <?php if($pixel == 1): ?>
    <?php echo $__env->make('front.pixel.pixel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>
    <?php else: ?>
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'pixel')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'pixel')->first()->activated == 1): ?>
    <?php echo $__env->make('front.pixel.pixel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>
</head>

<body>
    <div id="splash"></div>
    <!--******************* Preloader start ********************-->
    

    <!--******************* Preloader end ********************-->
    <!-- navbar -->
    <!-- navbar -->
    <?php if(helper::appdata($storeinfo->id)->template != 10): ?>
    <div class="d-none d-lg-block">
        <nav class="top-header">
            <div class="container">
                <div class="d-flex align-items-center mobile-header">
                    <div class="col-md-6 p-0 ">
                        <div class="header-contact">
                            <a href="tel:<?php echo e(helper::appdata($storeinfo->id)->contact); ?>" target="_blank"><i class="fa-light fa-phone-flip"></i><span class="mx-2"><?php echo e(helper::appdata($storeinfo->id)->contact); ?></span></a>

                            <a href="mailto:<?php echo e(helper::appdata($storeinfo->id)->email); ?>" target="_blank"><i class="fa-light fa-envelope"></i><span class="mx-2"><?php echo e(helper::appdata($storeinfo->id)->email); ?></span></a>
                        </div>
                    </div>
                    <div class="col-md-6 p-0 ">
                        <div class="header-social">
                            <div class="social-media d-none d-lg-block">
                                <ul class="d-flex gap-2 m-0 p-0">
                                    <?php $__currentLoopData = @helper::getsociallinks($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e($links->link); ?>" target="_blank" class="social-rounded fb p-0"><?php echo $links->icon; ?></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <?php endif; ?>

    <!-- navbar -->

    <?php
    $current_url = Request()->url();
    $home_url = url('/' . $storeinfo->slug);
    ?>
    <!-- mine header -->
 
    <div class="navbar main-header main-sticky-top <?php echo e($current_url != $home_url ? 'header-bg-white' : ''); ?> p-0 <?php echo e(helper::appdata($storeinfo->id)->template == 10 ? 'header-10-bg top-0' : ''); ?>">
        <div class="container">

            <div class="col-xl-5 col-lg-5 d-none d-xl-block main-menu">
                <ul class="d-flex gap-4 p-0 m-0">
                    <li>
                        <a class="<?php echo e(request()->is($storeinfo->slug) ? 'menu-active' : ''); ?>" href="<?php echo e(URL::to($storeinfo->slug)); ?>"><?php echo e(trans('labels.home')); ?></a>
                    </li>
                    <?php if(helper::appdata($storeinfo->id)->online_order == 1): ?>
                    <li><a class="<?php echo e(request()->is($storeinfo->slug . '/find-order') ? 'menu-active' : ''); ?>" href="<?php echo e(URL::to($storeinfo->slug . '/find-order')); ?>"><?php echo e(trans('labels.track_order')); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(helper::getblogs($storeinfo->id)->count() > 0): ?>
                    <li><a class="<?php echo e(request()->is($storeinfo->slug . '/blogs') ? 'menu-active' : ''); ?>" href="<?php echo e(URL::to($storeinfo->slug . '/blogs')); ?>"><?php echo e(trans('labels.blogs')); ?> </a>
                    </li>
                    <?php endif; ?>

                    <li><a class="<?php echo e(request()->is($storeinfo->slug . '/contact') ? 'menu-active' : ''); ?>" href="<?php echo e(URL::to($storeinfo->slug . '/contact')); ?>"><?php echo e(trans('labels.contact_us')); ?></a>
                    </li>
                    <?php if(helper::getfaqs($storeinfo->id)->count() > 0): ?>
                    <li><a class="<?php echo e(request()->is($storeinfo->slug . '/faqs') ? 'menu-active' : ''); ?>" href="<?php echo e(URL::to($storeinfo->slug . '/faqs')); ?>"><?php echo e(trans('labels.faqs')); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="col-auto">
                <a href="<?php echo e(URL::to($storeinfo->slug)); ?>">
                    <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->logo)); ?>" alt="logo" class="object-fit-cover my-2 logo-h-55-px ">
                </a>
            </div>

            <!-- mobile lag button -->
            <div class="col-xl-5">

                <!-- right side option -->
                <?php
                $languages = explode('|',helper::appdata($storeinfo->id)->languages)
                ?>
                <ul class="d-flex align-items-center justify-content-end gap-lg-4 gap-3 m-0 p-0">
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'language')->first() != null &&
                    App\Models\SystemAddons::where('unique_identifier', 'language')->first()->activated == 1): ?>
                    <?php if(count($languages) > 1): ?>
                    <li>
                        <div class="dropdown language-dropdown">
                            <a class="dropdown-toggle open-btn bg-transparent p-0 border-0 m-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-light fa-globe fs-5"></i>
                            </a>
                            <ul class="dropdown-menu mt-2 <?php echo e(session()->get('direction') == 2 ? 'dropdown-menu-right rtl' : 'dropdown-menu'); ?>">
                                <?php $__currentLoopData = helper::available_language($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languagelist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($languagelist->code, explode('|', helper::appdata($storeinfo->id)->languages))): ?>
                                <li>
                                    <a class="dropdown-item text-dark d-flex align-items-center px-3 py-2" href="<?php echo e(URL::to('/lang/change?lang=' . $languagelist->code)); ?>">
                                        <img src="<?php echo e(helper::image_path($languagelist->image)); ?>" alt="" class="img-fluid lag-img">
                                        <span class="px-2 fw-normal text-dark"><?php echo e($languagelist->name); ?></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>

                    <li class="d-none d-lg-block"><a href="<?php echo e(URL::to($storeinfo->slug . '/search')); ?>"><i class="fa-light fa-magnifying-glass fs-5"></i></a></li>

                    <?php if(helper::appdata($storeinfo->id)->online_order == 1): ?>
                    <li class="shopping-cart d-none d-lg-block">

                        <a href="<?php echo e(URL::to($storeinfo->slug . '/cart/')); ?>"><i class="fa-light fa-bag-shopping fs-5"></i></a>
                        <?php if(session()->get('cart') > 0): ?>
                        <div class="cart-count <?php echo e(session()->get('direction') == 2 ? 'left_10px' : ''); ?>" id="cartcnt"><?php echo e(session()->get('cart')); ?></div>
                        <?php endif; ?>


                    </li>
                    <?php endif; ?>


                    <!-- loginpage trigar -->
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                    App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
                    <?php if(helper::appdata($storeinfo->id)->checkout_login_required == 1): ?>
                    <li class="d-lg-block d-none">
                        <?php if(Auth::user() && Auth::user()->type == 3): ?>
                        <a href="<?php echo e(URL::to($storeinfo->slug . '/profile')); ?>"><i class="fa-light fa-user fs-5"></i></a>
                        <?php else: ?>
                        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#loginpage" id="btnlogin" aria-controls="loginpage"><i class="fa-light fa-user fs-5"></i></a>
                        <?php endif; ?>
                    </li>
                    <!-- loginpage trigar -->
                    <?php endif; ?>
                    <?php endif; ?>

                    <!-- mobile sidebar trigger -->
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                    App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
                    <li class="d-block d-xl-none">
                        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#mobile-sidebar" aria-controls="offcanvasExample"><i class="fa-light fa-bars-staggered text-white fs-5"></i></a>
                    </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
    <span class="d-block <?php echo e(helper::appdata($storeinfo->id)->template == 10 ? 'mb-40px' : ''); ?>"></span>
    <!-- mine header -->

    <!----------------------- mobile menu footer ----------------------->
    <div class="mobile-menu-footer d-none">
        <ul class="p-0 m-0">
            <li class="<?php echo e(request()->is($storeinfo->slug) ? 'mobile-active' : ''); ?>">
                <a href="<?php echo e(URL::to($storeinfo->slug)); ?>">
                    <i class="fa-light fa-house"></i>
                    <span><?php echo e(trans('labels.home')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(request()->is($storeinfo->slug . '/search') ? 'mobile-active' : ''); ?>">
                <a href="<?php echo e(URL::to($storeinfo->slug . '/search')); ?>">
                    <i class="fa-light fa-magnifying-glass"></i>
                    <span><?php echo e(trans('labels.search')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(request()->is($storeinfo->slug . '/category') ? 'mobile-active' : ''); ?>">
                <a href="javascript:void(0)#" data-bs-toggle="modal" data-bs-target="#catModal">
                    <i class="fa-light fa-box-archive"></i>
                    <span><?php echo e(trans('labels.category')); ?></span>
                </a>
            </li>
            <?php if(helper::appdata($storeinfo->id)->online_order == 1): ?>
            <li class="<?php echo e(request()->is($storeinfo->slug . '/cart') ? 'mobile-active' : ''); ?>">
                <a href="<?php echo e(URL::to($storeinfo->slug . '/cart/')); ?>">

                    <i class="fa-light fa-bag-shopping position-relative">
                        <?php if(session()->get('cart') > 0): ?>
                        <div class="mobile-cart-count" id="cartcnt"><?php echo e(session()->get('cart')); ?></div>
                        <?php endif; ?>
                    </i>
                    <span><?php echo e(trans('labels.cart')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
            <?php if(helper::appdata($storeinfo->id)->checkout_login_required == 1): ?>
            <li class="<?php echo e(request()->is($storeinfo->slug . '/profile') ? 'mobile-active' : ''); ?>">
                <?php if(Auth::user() && Auth::user()->type == 3): ?>
                <a href="<?php echo e(URL::to($storeinfo->slug . '/profile')); ?>"> <i class="fa-light fa-user"></i>
                    <span><?php echo e(trans('labels.account')); ?></span></a>
                <?php else: ?>
                <a data-bs-toggle="offcanvas" data-bs-target="#loginpage">
                    <i class="fa-light fa-user"></i>
                    <span><?php echo e(trans('labels.account')); ?></span>
                </a>
                <?php endif; ?>

            </li>
            <?php endif; ?>
            <?php else: ?>
            <li class="<?php echo e(request()->is($storeinfo->slug . '/profile') ? 'mobile-active' : ''); ?>">
                <a data-bs-toggle="offcanvas" data-bs-target="#mobile-sidebar" aria-controls="offcanvasExample">
                    <i class="fa-light fa-ellipsis-vertical"></i>
                    <span><?php echo e(trans('labels.more')); ?></span>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </div>

    <!---------------- mobile sider bar ---------------->
    <div class="offcanvas mobile-sidebar <?php echo e(session()->get('direction') == 2 ? 'offcanvas-end' : 'offcanvas-start'); ?>" tabindex="-1" id="mobile-sidebar" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <a href="<?php echo e(URL::to($storeinfo->slug)); ?>">
                <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->logo)); ?>" alt="logo" class="object-fit-cover logo-h-55-px">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body py-0">
            <div>
                <ul class="p-0 m-0">
                    <?php if(helper::getblogs($storeinfo->id)->count() > 0): ?>
                    <li class="border-bottom"><a href="<?php echo e(URL::to($storeinfo->slug . '/blogs')); ?>"><i class="fa-light fa-list"></i><span class="mx-2"><?php echo e(trans('labels.blogs')); ?></span></a></li>
                    <?php endif; ?>

                    <li class="border-bottom"><a href="<?php echo e(URL::to($storeinfo->slug . '/contact')); ?>"><i class="fa-light fa-phone-flip"></i><span class="mx-2"><?php echo e(trans('labels.contact_us')); ?></span></a></li>
                    <?php if(helper::getfaqs($storeinfo->id)->count() > 0): ?>
                    <li class="border-bottom"><a href="<?php echo e(URL::to($storeinfo->slug . '/faqs')); ?>"><i class="fa-light fa-shield"></i><span class="mx-2"><?php echo e(trans('labels.faqs')); ?></span></a></li>
                    <?php endif; ?>

                    <li class="border-bottom"><a href="<?php echo e(URL::to($storeinfo->slug . '/privacypolicy')); ?>"><i class="fa-light fa-user-shield"></i><span class="mx-2"><?php echo e(trans('labels.privacy_policy')); ?></span></a>
                    </li>

                    <li class="border-bottom"><a href="<?php echo e(URL::to($storeinfo->slug . '/aboutus')); ?>"><i class="fa-light fa-users"></i><span class="mx-2"><?php echo e(trans('labels.about_us')); ?></span></a></li>

                    <li class="border-bottom"><a href="<?php echo e(URL::to($storeinfo->slug . '/terms_condition')); ?>"><i class="fa-light fa-clipboard-list"></i><span class="mx-2"><?php echo e(trans('labels.terms_condition')); ?></span></a></li>

                    <li class="border-bottom"><a href="<?php echo e(URL::to($storeinfo->slug . '/refund_policy')); ?>"><i class="fa-light fa-hand-holding-dollar"></i><span class="mx-2"><?php echo e(trans('labels.refund_policy')); ?></span></a></li>
                    <?php if(helper::appdata($storeinfo->id)->online_order == 1): ?>
                    <li class="border-bottom"><a href="<?php echo e(URL::to($storeinfo->slug . '/find-order')); ?>"><i class="fa-light fa-truck-fast"></i><span class="mx-2"><?php echo e(trans('labels.track_order')); ?></span></a></li>
                    <?php endif; ?>
                    <li class="border-bottom"><a data-bs-toggle="modal" data-bs-target="#infomodal"><i class="fa-light fa-circle-info"></i><span class="mx-2"><?php echo e(trans('labels.store_information')); ?></span></a>
                    </li>

                </ul>


            </div>
        </div>

        <!-- app install btn -->
        <div class="justify-content-center d-flex gap-2 my-3">
            <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
            <?php if(App\Models\SystemAddons::where('unique_identifier', 'user_app')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'user_app')->first()->activated == 1): ?>
            <?php
            $checkplan = App\Models\Transaction::where('vendor_id', $storeinfo->id)
            ->orderByDesc('id')
            ->first();

            if (@$user->allow_without_subscription == 1) {
            $user_app = 1;
            } else {
            $user_app = @$checkplan->customer_app;
            }
            ?>
            <?php if($user_app == 1): ?>
            <!-- Google play store button -->
            <?php if(
            @helper::getappsetting($storeinfo->id)->android_link != null &&
            @helper::getappsetting($storeinfo->id)->android_link != ''): ?>
            <a href="<?php echo e(@helper::getappsetting($storeinfo->id)->android_link); ?>"> <img src="<?php echo e(url(env('ASSETPATHURL') . 'front/images/google-play.svg')); ?>" class="app-btn" alt=""> </a>
            <?php endif; ?>
            <?php if(@helper::getappsetting($storeinfo->id)->ios_link != null && @helper::getappsetting($storeinfo->id)->ios_link != ''): ?>
            <!-- App store button -->
            <a href="<?php echo e(@helper::getappsetting($storeinfo->id)->ios_link); ?>"> <img src="<?php echo e(url(env('ASSETPATHURL') . 'front/images/app-store.svg')); ?>" class="app-btn" alt=""> </a>
            <?php endif; ?>
            <?php endif; ?>


            <?php endif; ?>
            <?php else: ?>
            <?php if(App\Models\SystemAddons::where('unique_identifier', 'user_app')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'user_app')->first()->activated == 1): ?>
            <!-- Google play store button -->
            <?php if(
            @helper::getappsetting($storeinfo->id)->android_link != null &&
            @helper::getappsetting($storeinfo->id)->android_link != ''): ?>
            <a href="<?php echo e(@helper::getappsetting($storeinfo->id)->android_link); ?>"> <img src="<?php echo e(url(env('ASSETPATHURL') . 'front/images/google-play.svg')); ?>" class="app-btn" alt=""> </a>
            <?php endif; ?>
            <?php if(@helper::getappsetting($storeinfo->id)->ios_link != null && @helper::getappsetting($storeinfo->id)->ios_link != ''): ?>
            <!-- App store button -->
            <a href="<?php echo e(@helper::getappsetting($storeinfo->id)->ios_link); ?>"> <img src="<?php echo e(url(env('ASSETPATHURL') . 'front/images/app-store.svg')); ?>" class="app-btn" alt=""> </a>
            <?php endif; ?>
            <?php endif; ?>
            <?php endif; ?>

        </div>

        <div class="text-center border-top p-2 fs-8"><?php echo e(@helper::appdata($storeinfo->id)->copyright); ?></div>
    </div>


    <!--------------------- login sidebar --------------------->
    <div class="offcanvas login-w <?php echo e(session()->get('direction') == 2 ? 'offcanvas-start' : 'offcanvas-end'); ?>" tabindex="-1" id="loginpage" aria-labelledby="loginpageLabel">
        <div class="offcanvas-header py-4 border-bottom">
            <h5 class="offcanvas-title" id="auth_form_title"><?php echo e(trans('labels.login')); ?></h5>
            <button type="button" class="btn-close rounded-2 shadow-lg border" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-------------------------- login -------------------------->
            <div class="login input-14" id="login_form">
                <form method="POST" action="<?php echo e(URL::to($storeinfo->slug . '/checklogin-normal')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="emailid" class="form-label fw-semibold"><?php echo e(trans('labels.email')); ?></label>
                        <input type="email" class="form-control rounded-5 p-3" name="email" id="emailid" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label fw-semibold"><?php echo e(trans('labels.password')); ?></label>
                        <input type="password" class="form-control rounded-5 p-3" name="password" id="Password" placeholder="Password" required>
                    </div>
                    <a class="forgot_password_btn fw-bolder pb-3 d-flex fs-7 <?php echo e(session()->get('direction') == 2 ? ' justify-content-start' : ' justify-content-end '); ?>" href="javascript:void(0)"><?php echo e(trans('labels.forgot_password')); ?>?</a>
                    <button type="submit" class="btn btn-store d-block w-100 mb-3"><?php echo e(trans('labels.login')); ?></button>
                </form>
                <p class="text-center mb-3"><?php echo e(trans('labels.dont_have_account')); ?> <a class="signup-filter-btn fw-bolder create_account_btn fw-semibold" href="javascript:void(0)"><?php echo e(trans('labels.create_account')); ?></a></p>
                <div class="or_section">
                    <div class="line"></div>
                    <p class="mb-0 fw-medium"><?php echo e(trans('labels.or')); ?></p>
                    <div class="line"></div>
                </div>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'sociallogin')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'sociallogin')->first()->activated == 1): ?>
                <?php
                $checkplan = App\Models\Transaction::where('vendor_id', $storeinfo->id)
                ->orderByDesc('id')
                ->first();
                $user = App\Models\User::where('id', $storeinfo->id)->first();
                if (@$user->allow_without_subscription == 1) {
                $social_logins = 1;
                } else {
                $social_logins = @$checkplan->social_login;
                }

                ?>
                <?php if($social_logins == 1): ?>
                <div class="d-sm-flex justify-content-between my-3">
                    <a <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> href="<?php echo e(URL::to($storeinfo->slug . '/login/google-user')); ?>" <?php endif; ?> class="btn btn-store-outline border-dark d-block m-0 w-100 mb-3 mb-sm-0 <?php echo e(session()->get('direction') == 2 ? 'ms-2' : 'me-2'); ?>">
                        <img src="<?php echo e(url(env('ASSETPATHURL') . 'front/images/google.svg')); ?>" alt="goole" class="social-login"><span class="text-dark px-1"><?php echo e(trans('labels.sign_in')); ?></span></a>
                    <a <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> href="<?php echo e(URL::to($storeinfo->slug . '/login/facebook-user')); ?>" <?php endif; ?> class="btn btn-store-outline border-dark d-block m-0 w-100"> <img src="<?php echo e(url(env('ASSETPATHURL') . 'front/images/facebook.svg')); ?>" alt="goole" class="social-login"><span class="text-dark px-1"><?php echo e(trans('labels.sign_in')); ?></span></a>
                </div>
                <?php endif; ?>
                <?php endif; ?>
                <?php else: ?>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'sociallogin')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'sociallogin')->first()->activated == 1): ?>
                <div class="d-sm-flex justify-content-between my-3">
                    <a <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> href="<?php echo e(URL::to($storeinfo->slug . '/login/google-user')); ?>" <?php endif; ?> class="btn btn-store-outline border-dark d-block m-0 w-100 mb-3 mb-sm-0 <?php echo e(session()->get('direction') == 2 ? 'ms-2' : 'me-2'); ?>">
                        <img src="<?php echo e(url(env('ASSETPATHURL') . 'front/images/google.svg')); ?>" alt="goole" class="social-login"><span class="text-dark px-1"><?php echo e(trans('labels.sign_in')); ?></span></a>
                    <a <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> href="<?php echo e(URL::to($storeinfo->slug . '/login/facebook-user')); ?>" <?php endif; ?> class="btn btn-store-outline border-dark d-block m-0 w-100"> <img src="<?php echo e(url(env('ASSETPATHURL') . 'front/images/facebook.svg')); ?>" alt="goole" class="social-login"><span class="text-dark px-1"><?php echo e(trans('labels.sign_in')); ?></span></a>
                </div>
                <?php endif; ?>
                <?php endif; ?>

            </div>

            <!-------------------------- register -------------------------->
            <div class="register input-14 d-none" id="register_form">
                <form action="<?php echo e(URL::to($storeinfo->slug . '/register_customer')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold"><?php echo e(trans('labels.name')); ?></label>
                        <input type="text" class="form-control rounded-5 p-3" id="name" name="name" placeholder="<?php echo e(trans('labels.name')); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailid" class="form-label fw-semibold"><?php echo e(trans('labels.email')); ?></label>
                        <input type="email" class="form-control rounded-5 p-3" id="emailid" name="email" placeholder="<?php echo e(trans('labels.email')); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label fw-semibold"><?php echo e(trans('labels.mobile')); ?></label>
                        <input type="number" class="form-control rounded-5 p-3" id="mobile" name="mobile" placeholder="<?php echo e(trans('labels.mobile')); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold"><?php echo e(trans('labels.password')); ?></label>
                        <input type="password" class="form-control rounded-5 p-3" id="password" name="password" placeholder="<?php echo e(trans('labels.password')); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmpassword" class="form-label fw-semibold"><?php echo e(trans('labels.confirm_password')); ?></label>
                        <input type="password" class="form-control rounded-5 p-3" id="confirmpassword" name="confirmpassword" placeholder="<?php echo e(trans('labels.confirm_password')); ?>" required>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <input type="checkbox" class="form-check-input p-0" id="exampleCheck2" required checked>
                        <label class="form-check-label fw-normal mx-2" for="exampleCheck2"><?php echo e(trans('labels.i_accept_the')); ?> <a href="<?php echo e(URL::to($storeinfo->slug . '/terms_condition')); ?>" class="fw-semibold"><?php echo e(trans('labels.terms_condition')); ?></a></label>
                    </div>
                    <button type="submit" class="btn btn-store d-block w-100 p-3"><?php echo e(trans('labels.signup')); ?></button>
                    <p class="text-center mb25 mt10"><?php echo e(trans('labels.already_account')); ?> <a href="javascript:void(0)" class="fw-semibold login_btn"><?php echo e(trans('labels.sign_in')); ?></a></p>
                </form>
            </div>

            <!-------------------------- forgot password -------------------------->
            <div class="forgotpassword input-14 d-none" id="forgot_password_form">
                <form action="<?php echo e(URL::to($storeinfo->slug . '/send_password')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="forgetemailid" class="form-label fw-semibold"><?php echo e(trans('labels.email')); ?></label>
                        <input type="email" class="form-control rounded-5 p-3" id="forgetemailid" name="email" placeholder="<?php echo e(trans('labels.email')); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-store d-block w-100 p-3"><?php echo e(trans('labels.submit')); ?></button>
                    <p class="text-center mb25 mt10"><?php echo e(trans('labels.dont_have_account')); ?> <a href="javascript:void(0)" class="fw-semibold create_account_btn"><?php echo e(trans('labels.signup')); ?></a></p>
                </form>
            </div>

        </div>
    </div>

    <!-- offers-label -->
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1): ?>
    <?php
    $checkplan = App\Models\Transaction::where('vendor_id', $storeinfo->id)
    ->orderByDesc('id')
    ->first();
    $user = App\Models\User::where('id', $storeinfo->id)->first();
    if ($user->allow_without_subscription == 1) {
    $coupon = 1;
    } else {
    $coupon = @$checkplan->coupons;
    }
    ?>
    <?php if($coupon == 1): ?>
    <div data-bs-toggle="offcanvas" data-bs-target="#offerslabel" aria-controls="offcanvasExample">
        <div class="offers-label <?php echo e(session()->get('direction') == 2 ? 'offers-label-rtl rtl' : 'offers-label-ltr'); ?>">
            <i class="fa-light fa-badge-percent text-white"></i>
            <div class="offers-label-name"><?php echo e(trans('labels.offers')); ?></div>
        </div>
    </div>
    <?php endif; ?>
    <?php endif; ?>
    <?php else: ?>
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1): ?>
    <div data-bs-toggle="offcanvas" data-bs-target="#offerslabel" aria-controls="offcanvasExample">
        <div class="offers-label <?php echo e(session()->get('direction') == 2 ? 'offers-label-rtl' : 'offers-label-ltr'); ?>">
            <i class="fa-light fa-badge-percent text-white"></i>
            <div class="offers-label-name"><?php echo e(trans('labels.offers')); ?></div>
        </div>
    </div>
    <?php endif; ?>
    <?php endif; ?>


    <!-- offers-label sidebar -->
    <div class="offcanvas <?php echo e(session()->get('direction') == 2 ? 'offcanvas-start' : 'offcanvas-end'); ?> offers-w w-75" tabindex="-1" id="offerslabel" aria-labelledby="offerslabelLabel">
        <div class="offcanvas-header border-bottom bg-light">
            <h5 class="offcanvas-title offers-title" id="offerslabelLabel"><i class="fa-light fa-badge-percent"></i>
                <?php echo e(trans('labels.coupons_offers')); ?>

            </h5>
            <button type="button" class="btn-close rounded-2 shadow-lg border" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row g-3">
                <?php if(count(helper::getcoupons($storeinfo->id)) > 0): ?>
                <?php $__currentLoopData = helper::getcoupons($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card border p-0 h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="coupons_card" id="span<?php echo e($key); ?>"><?php echo e($coupon->offer_code); ?></span>
                            <?php if(str_contains(Request()->url(), 'checkout')): ?>
                            <p class="cp copy-code" id="<?php echo e($coupon->offer_code); ?>" onclick="copyToClipboard(this.id)">
                                <?php echo e(trans('labels.copy_code')); ?>

                            </p>
                            <?php endif; ?>
                        </div>

                        <h5 class="m-0 coupon-label line-2"><?php echo e($coupon->offer_name); ?></h5>
                        <p class="text-muted fw-400 fs-7 pt-2 line-3">
                            <?php echo e($coupon->description); ?>

                        </p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <h5 class="pt-3 m-0 coupon-label line-2"><?php echo e(trans('labels.no_offer_found')); ?></h5>
                <?php endif; ?>


            </div>
        </div>
    </div>


    <!-- mobile category Modal -->
    <div class="modal fade" id="catModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable mobile-category">
            <div class="modal-content vh-50 mt-6 cat-over">
                <div class="modal-header py-2">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo e(trans('labels.category')); ?></h1>
                    <button type="button" class="btn-close rounded-2 shadow-lg border" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="card card-header cat-dispaly bg-transparent px-0">
                            <div class=" d-inline-block">
                                <h4 class="theme-4-title  <?php echo e(session()->get('direction') == 2 ? 'text-right' : ''); ?> m-0">
                                    <?php echo e(trans('labels.category')); ?>

                                </h4>
                            </div>
                        </div>
                        <div>
                            <?php $__currentLoopData = helper::getcategory($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $check_cat_count = 0;
                            ?>
                            <?php $__currentLoopData = helper::getitems($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($category->id == $item->cat_id): ?>
                            <?php
                            $check_cat_count++;
                            ?>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($check_cat_count > 0): ?>
                            <div data-bs-dismiss="modal">
                                <a class="nav-link mx-0 mt-0 border-0 py-2 fw-normal d-flex align-items-center justify-content-between <?php echo e(session()->get('direction') == 2 ? 'rtl-side-cat-check' : 'side-cat-check'); ?> btn-sm <?php echo e($key == 0 ? 'active' : ''); ?> <?php echo e($category->slug); ?>" href="<?php echo e(URL::to($storeinfo->slug . '/search?category=' . $category->slug)); ?>"><?php echo e($category->name); ?>

                                    <div class="fw-semibold"><?php echo e($check_cat_count); ?></div>
                                </a>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="catbox-arow"></div>
                </div>
            </div>
        </div>
    </div>


    <!--------------- rating sidebar --------------->

    <div class="offcanvas offcanvas-end offers-w w-75" tabindex="-1" id="ratingsidebar" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title offers-title line-1" id="offcanvasRightLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0">
            <!-- rating select -->
            <div class="reviews-card border bg-light p-md-3 p-2 mb-4 car-rating">

                <!-- Rating info -->
                <div class="text-center mb-2">
                    <!-- Info -->
                    <h4 class="mb-0 fw-bold text-dark"><i class="fa-solid fa-star text-warning"></i><span class="px-2" id="avgreview"></span>
                    </h4>
                    <p class="mb-1 text-muted"><?php echo e(trans('labels.based_on')); ?> <span id="totalreview"></span>
                        <?php echo e(trans('labels.reviews')); ?>

                    </p>
                </div>

                <!-- Progress-bar START -->
                <div class="reviews-body p-0">
                    <div class="row gx-3 g-2 align-items-center">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-star text-warning"></i>
                                <span class="px-1 cp">5</span>
                            </div>
                            <!-- Progress bar and Rating -->
                            <div class="mt-xs-0 mx-3 w-100">
                                <!-- Progress item -->
                                <div class="progress progress-sm bg-warning bg-opacity-15">
                                    <div class="progress-bar bg-warning" id="avgfive" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <!-- Percentage -->
                            <div class="text-end mt-xs-0">
                                <span class="percentage" id="perfive"></span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-star text-warning"></i>
                                <span class="px-1 cp">4</span>
                            </div>
                            <!-- Progress bar and Rating -->
                            <div class="mt-xs-0 mx-3 w-100">
                                <!-- Progress item -->
                                <div class="progress progress-sm bg-warning bg-opacity-15">
                                    <div class="progress-bar bg-warning" role="progressbar" id="avgfour" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <!-- Percentage -->
                            <div class="text-end mt-xs-0">
                                <span class="percentage" id="perfour"></span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-star text-warning"></i>
                                <span class="px-1 cp">3</span>
                            </div>
                            <!-- Progress bar and Rating -->
                            <div class="mt-xs-0 mx-3 w-100">
                                <!-- Progress item -->
                                <div class="progress progress-sm bg-warning bg-opacity-15">
                                    <div class="progress-bar bg-warning" role="progressbar" id="avgthree" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <!-- Percentage -->
                            <div class="text-end mt-xs-0">
                                <span class="percentage" id="perthree"></span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-star text-warning"></i>
                                <span class="px-1 cp">2</span>
                            </div>
                            <!-- Progress bar and Rating -->
                            <div class="mt-xs-0 mx-3 w-100">
                                <!-- Progress item -->
                                <div class="progress progress-sm bg-warning bg-opacity-15">
                                    <div class="progress-bar bg-warning" role="progressbar" id="avgtwo" aria-valuemin="0" aria-valuemax="200">
                                    </div>
                                </div>
                            </div>
                            <!-- Percentage -->
                            <div class="text-end mt-xs-0">
                                <span class="percentage" id="pertwo"></span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-star text-warning"></i>
                                <span class="px-1 cp">1</span>
                            </div>
                            <!-- Progress bar and Rating -->
                            <div class="mt-xs-0 mx-3 w-100">
                                <!-- Progress item -->
                                <div class="progress progress-sm bg-warning bg-opacity-15">
                                    <div class="progress-bar bg-warning" role="progressbar" id="avgone" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <!-- Percentage -->
                            <div class="text-end mt-xs-0">
                                <span class="percentage" id="perone"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="reviews-content px-md-3 px-2">
                <div id="userreviews">
                </div>
            </div>
        </div>
        <?php if(Auth::user() && Auth::user()->type == 3): ?>
        <div class="p-2" data-bs-dismiss="offcanvas">
            <a href="javascript:void(0)#" class="btn btn-store rounded-0" data-bs-toggle="modal" data-itemid="" id="rattingmodal_item_id" onclick="addratting($(this).attr('data-itemid'))"><?php echo e(trans('labels.add_ratting')); ?></a>
        </div>
        <?php endif; ?>
    </div>


    <!-- Ratings add Modal -->
    <div class="modal fade" id="ratingsadd" tabindex="-1" aria-labelledby="ratingsaddLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pro-title">
                    <h4 class="modal-title line-2" id="ratingsaddLabel"></h4>
                    <button type="button" class="btn-close rounded-2 shadow-lg border" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(URL::to($storeinfo->slug . '/postreview')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <!-- star -->
                    <div class="modal-body">
                        <input type="hidden" name="item_id" id="item_id" value="">
                        <div class="rating mb-3">
                            <input type="hidden" name="service_id" id="service_id" value="12">
                            <select class="form-select border bg-lights py-2 px-3" name="ratting" aria-label="Default select example">
                                <option value="5" selected="">★★★★★ (5/5)</option>
                                <option value="4">★★★★☆ (4/5)</option>
                                <option value="3">★★★☆☆ (3/5)</option>
                                <option value="2">★★☆☆☆ (2/5)</option>
                                <option value="1">★☆☆☆☆ (1/5)</option>
                            </select>
                        </div>
                        <textarea class="border w-100 p-2" name="review" id="rating" cols="30" rows="10" placeholder="Your review"></textarea>

                    </div>

                    <div class="modal-footer">
                        <div class="d-sm-flex justify-content-between w-100">
                            <a class="btn btn-store bg-danger btn-delete col-sm-6 col-12 my-0" data-bs-dismiss="modal"><?php echo e(trans('labels.cancel')); ?></a>
                            <button type="submit" class="btn btn-store col-sm-6 col-12 my-0 mx-sm-1 mt-md-0 mt-3"><?php echo e(trans('labels.submit')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="success-msg" class="alert alert-dismissible mt-3" style="display: none;">
        <span id="msg"></span>
    </div>
    <div id="error-msg" class="alert alert-dismissible mt-3" style="display: none;">
        <span id="ermsg"></span>
    </div>
    <style>
        :root {
            --primary-font: 'Open Sans', sans-serif;
            --font-family: var(--font-family);
            /* Color */
            --primary-color: #000;
            --primary-bg-color: #f4f4f8;
            /* --body-color: #f7f7f7; */
            --active-tab: #3ba2a484;

            /* Hover Color */
            --bs-primary: <?php echo e(helper::appdata($storeinfo->id)->primary_color); ?>;
            --primary-bg-color-hover: #000;
            --bs-secondary:<?php echo e(helper::appdata($storeinfo->id)->secondary_color); ?>;

            --active-menu: <?php echo e(helper::appdata($storeinfo->id)->primary_color); ?>30;
            --in-stock: #28a745;
            --out-stock: #D41A1A;
            --bs-primary-srg: color-mix(in srgb, var(--bs-primary), transparent 90%);
            --bs-secondary-srg: color-mix(in srgb, var(--bs-secondary), transparent 90%);
        }
    </style>
    <?php echo $__env->make('cookie-consent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/front/theme/header.blade.php ENDPATH**/ ?>