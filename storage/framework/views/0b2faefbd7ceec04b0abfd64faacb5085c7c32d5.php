<?php echo $__env->make('front.theme.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="breadcrumb-sec">

    <div class="container">

        <nav aria-label="breadcrumb">

            <h2 class="breadcrumb-title mb-2"><?php echo e(trans('labels.checkout')); ?></h2>

            <ol class="breadcrumb justify-content-center">

                <li class="breadcrumb-item"><a class="text-dark"
                        href="<?php echo e(URL::to($storeinfo->slug . '/')); ?>"><?php echo e(trans('labels.home')); ?></a>
                </li>

                <li class="text-muted breadcrumb-item active" aria-current="page"><?php echo e(trans('labels.checkout')); ?></li>

            </ol>

        </nav>

    </div>

</section>

<div class="cart-sec">

    <div class="container">
        <?php if(count($cartdata) == 0): ?>
            <div class="mb-5">
                <?php echo $__env->make('front.no_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="yourcart-sec">
                        
                        <?php $__currentLoopData = $cartdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $data[] = [
                                'total_price' => $cart->item_price * $cart->qty,
                            ];
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $delivery_type = explode('|', @helper::appdata($storeinfo->id)->delivery_type);
                        ?>
                        <?php if(@helper::appdata($storeinfo->id)->product_type == 1): ?>
                            <div class="mb-4">
                                <div class="d-md-flex justify-content-between gap-4" id="order_type">
                                    <div class="w-100 <?php echo e(count($delivery_type) >= 2 ? 'd-block' : 'd-none'); ?>">
                                        <div class="card h-100 bg-light mb-3 mb-md-0">
                                            <div class="card-body">
                                                <div class="delivery-title">
                                                    <div class="mb-2">
                                                        <h5 class="border-bottom pb-2 mb-4"><i
                                                                class="fa-light fa-location-dot"></i><span
                                                                class="px-2 checkoutform-title"><?php echo e(trans('labels.delivery_option')); ?></span>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <?php if(count($delivery_type) == 1): ?>
                                                        <?php if(in_array('delivery', $delivery_type)): ?>
                                                            <label for="cart-delivery">
                                                                <input type="radio" name="cart-delivery"
                                                                    id="cart-delivery" checked value="1">
                                                            </label>
                                                        <?php endif; ?>
                                                        <?php if(in_array('pickup', $delivery_type)): ?>
                                                            <label for="cart-pickup">
                                                                <input type="radio" name="cart-delivery"
                                                                    id="cart-pickup" checked value="2">
                                                            </label>
                                                        <?php endif; ?>
                                                        <?php if(in_array('table', $delivery_type)): ?>
                                                            <label for="cart-table">
                                                                <input type="radio" name="cart-delivery"
                                                                    id="cart-table" checked value="3">
                                                            </label>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if(in_array('delivery', $delivery_type)): ?>
                                                        <div class="mb-3 payment-check justify-content-between cp">

                                                            <label for="cart-delivery"
                                                                class="px-2 option-label cp text-start w-100 d-flex align-items-center">
                                                                <img src="<?php echo e(url(env('ASSETPATHURL') . 'front/images/order_delivery.png')); ?>"
                                                                    alt="delivery" width="25">
                                                                <span
                                                                    class="px-2"><?php echo e(trans('labels.delivery')); ?></span></label>

                                                            <input type="radio" name="cart-delivery"
                                                                id="cart-delivery"
                                                                class="form-check-input payment-input p-2 opacity-100 position-static"
                                                                value="1" checked>

                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if(in_array('pickup', $delivery_type)): ?>
                                                        <div class="mb-3 payment-check justify-content-between cp">

                                                            <label for="cart-pickup"
                                                                class="px-2 option-label cp text-start w-100 d-flex align-items-center">
                                                                <img src="<?php echo e(url(env('ASSETPATHURL') . 'front/images/pickup.png')); ?>"
                                                                    alt="delivery" width="25">
                                                                <span class="px-2"><?php echo e(trans('labels.pickup')); ?></span>
                                                            </label>

                                                            <input type="radio" name="cart-delivery" id="cart-pickup"
                                                                class="form-check-input payment-input p-2 opacity-100 position-static label14"
                                                                value="2">

                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if(in_array('table', $delivery_type)): ?>
                                                        <div class="mb-3 payment-check justify-content-between cp">

                                                            <label for="cart-table"
                                                                class="px-2 option-label cp text-start w-100 d-flex align-items-center">
                                                                <img src="<?php echo e(url(env('ASSETPATHURL') . 'front/images/dining_table.png')); ?>"
                                                                    alt="delivery" width="25">
                                                                <span
                                                                    class="px-2"><?php echo e(trans('labels.table')); ?></span></label>

                                                            <input type="radio" name="cart-delivery" id="cart-table"
                                                                class="form-check-input payment-input p-2 opacity-100 position-static label14"
                                                                value="3">

                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(helper::appdata($storeinfo->id)->ordertype_date_time == 1 &&
                                            (in_array('delivery', $delivery_type) || in_array('pickup', $delivery_type))): ?>
                                        <div class="w-100">
                                            <div class="card h-100 bg-light" id="date_time">
                                                <div class="card-body">
                                                    <div class="mb-2">
                                                        <h5
                                                            class="customer-title border-bottom pb-2 mb-4 <?php echo e(session()->get('direction') == 2 ? 'text-right' : ''); ?>">
                                                            <i class="fa-light fa-calendar-days"></i><span
                                                                class="px-2 checkoutform-title"><?php echo e(trans('labels.date_time')); ?></span>
                                                        </h5>
                                                    </div>

                                                    <div class="row">
                                                        <div
                                                            class="delivery-date <?php echo e(session()->get('direction') == '2' ? 'text-right' : ''); ?>">
                                                            <div class="mb-3">
                                                                <label id="delivery_date"
                                                                    class="form-label justify-content-start label14"><?php echo e(trans('labels.delivery_date')); ?></label>
                                                                <label id="pickup_date" class="form-label label14"
                                                                    style="display: none;">
                                                                    <?php echo e(trans('labels.pickup_date')); ?></label>
                                                                <input type="date" class="form-control rounded-5 p-3"
                                                                    name="delivery_date"
                                                                    value="<?php echo e(old('delivery_date')); ?>"
                                                                    id="delivery_dt">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="delivery-time <?php echo e(session()->get('direction') == '2' ? 'text-right' : ''); ?>">
                                                            <div class="mb-3">
                                                                <label id="delivery"
                                                                    class="form-label justify-content-start label14"><?php echo e(trans('labels.delivery_time')); ?></label>
                                                                <label id="pickup"
                                                                    class="form-label justify-content-start label14"
                                                                    style="display: none;"><?php echo e(trans('labels.pickup_time')); ?></label>
                                                                <label id="store_close"
                                                                    class="d-none form-label text-danger label14"><?php echo e(trans('labels.today_store_closed')); ?></label>
                                                                <select name="delivery_time" id="delivery_time"
                                                                    class="form-select rounded-5 p-3">
                                                                    <option value="<?php echo e(old('delivery_time')); ?>">
                                                                        <?php echo e(trans('labels.select')); ?>

                                                                    </option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>


                            <div class="card mb-4 card-shadow bg-light" id="open">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <h5
                                            class="customer-title border-bottom pb-2 mb-4  <?php echo e(session()->get('direction') == 2 ? 'text-right' : ''); ?>">
                                            <i class="fa-light fa-truck-fast"></i><span
                                                class="px-2 checkoutform-title"><?php echo e(trans('labels.delivery_info')); ?></span>
                                        </h5>
                                    </div>
                                    <div
                                        class="row delivery-sec <?php echo e(session()->get('direction') == 2 ? 'text-right' : ''); ?>">
                                        <?php if($deliveryarea->count() > 0): ?>
                                            <div class="col-12">
                                                <div>
                                                    <label for="delivery_area"
                                                        class="form-label d-flex justify-content-start label14"><?php echo e(trans('labels.delivery_area')); ?></label>
                                                    <select name="delivery_area" id="delivery_area"
                                                        class="form-control rounded-5 p-3">
                                                        <option value=""price="<?php echo e(0); ?>">
                                                            <?php echo e(trans('labels.select')); ?></option>
                                                        <?php $__currentLoopData = $deliveryarea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($area->name); ?>"
                                                                price="<?php echo e($area->price); ?>">
                                                                <?php echo e($area->name); ?> -
                                                                <?php echo e(helper::currency_formate($area->price, $storeinfo->id)); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="mt-3 col-md-6">
                                            <div class="mb-3">
                                                <label for="address"
                                                    class="form-label d-flex justify-content-start label14"><?php echo e(trans('labels.address')); ?></label>
                                                <input type="text" class="form-control rounded-5 p-3"
                                                    placeholder="<?php echo e(trans('labels.address')); ?>"
                                                    <?php if(env('Environment') == 'sendbox'): ?> value="1112 4th Ave" <?php else: ?> value="<?php echo e(old('address')); ?>" <?php endif; ?>
                                                    name="address" id="address" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="building"
                                                    class="form-label d-flex justify-content-start label14"><?php echo e(trans('labels.building')); ?></label>
                                                <input type="text" class="form-control rounded-5 p-3"
                                                    placeholder="<?php echo e(trans('labels.building')); ?>" name="building"
                                                    <?php if(env('Environment') == 'sendbox'): ?> value="Seattle" <?php else: ?> value="<?php echo e(old('building')); ?>" <?php endif; ?>
                                                    id="building" required="">
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md-6">
                                            <div class="mb-3">
                                                <label for="landmark"
                                                    class="form-label d-flex justify-content-start label14"><?php echo e(trans('labels.landmark')); ?></label>
                                                <input type="text" class="form-control rounded-5 p-3"
                                                    placeholder="<?php echo e(trans('labels.landmark')); ?>" name="landmark"
                                                    <?php if(env('Environment') == 'sendbox'): ?> value="Washington" <?php else: ?> value="<?php echo e(old('landmark')); ?>" <?php endif; ?>
                                                    id="landmark" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="postal_code"
                                                    class="form-label d-flex justify-content-start label14"><?php echo e(trans('labels.pincode')); ?></label>
                                                <input type="text" class="form-control rounded-5 p-3"
                                                    placeholder="<?php echo e(trans('labels.pincode')); ?>" id="postal_code"
                                                    <?php if(env('Environment') == 'sendbox'): ?> value="98101" <?php else: ?> 
                                        value="<?php echo e(old('pincode')); ?>" <?php endif; ?>
                                                    name="postal_code" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4 card-shadow bg-light" id="tableinfo">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <h5
                                            class="customer-title border-bottom pb-2 mb-4  <?php echo e(session()->get('direction') == 2 ? 'text-right' : ''); ?>">
                                            <i class="fa-light fa-user"></i><span
                                                class="px-2 checkoutform-title"><?php echo e(trans('labels.table')); ?></span>
                                        </h5>
                                    </div>
                                    <label for="table"
                                        class="form-label label14"><?php echo e(trans('labels.tables')); ?></label>
                                    <select name="table" id="table" class="form-select rounded-5 p-3">
                                        <option value=""><?php echo e(trans('labels.select')); ?></option>
                                        <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($table->id); ?>"><?php echo e($table->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card mb-4 card-shadow bg-light">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5
                                        class="customer-title border-bottom pb-2 mb-4  <?php echo e(session()->get('direction') == 2 ? 'text-right' : ''); ?>">
                                        <i class="fa-light fa-user"></i><span
                                            class="px-2 checkoutform-title"><?php echo e(trans('labels.customer')); ?></span>
                                    </h5>
                                </div>
                                <form>
                                    <div class="row <?php echo e(session()->get('direction') == 2 ? 'text-right' : ''); ?>">
                                        <div class="mb-3 col-md-6">
                                            <div class="mb-3">
                                                <label for="customer_name"
                                                    class="form-label d-flex justify-content-start label14"><?php echo e(trans('labels.name')); ?></label>
                                                <input type="text" placeholder="<?php echo e(trans('labels.name')); ?>"
                                                    class="form-control rounded-5 p-3" name="customer_name"
                                                    <?php if(env('Environment') == 'sendbox'): ?> value="Etha Jaskolski"
                                         <?php else: ?> 
                                         value ="<?php echo e(@Auth::user() && @Auth::user()->type == 3 ? @Auth::user()->name : ''); ?>" <?php endif; ?>
                                                    id="customer_name">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="mb-3">
                                                <label for="customer_mobile"
                                                    class="form-label d-flex justify-content-start label14"><?php echo e(trans('labels.mobile')); ?></label>
                                                <input type="text" class="form-control rounded-5 p-3"
                                                    placeholder="<?php echo e(trans('labels.mobile')); ?>" name="customer_mobile"
                                                    <?php if(env('Environment') == 'sendbox'): ?> value="937-267-4384" <?php else: ?>
                                            value="<?php echo e(@Auth::user() && @Auth::user()->type == 3 ? @Auth::user()->mobile : ''); ?>" <?php endif; ?>
                                                    id="customer_mobile" onkeypress="return isNumber(event)">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="mb-3">
                                                <label for="customer_email"
                                                    class="form-label d-flex justify-content-start label14"><?php echo e(trans('labels.email')); ?></label>
                                                <input type="email" class="form-control rounded-5 p-3"
                                                    placeholder="<?php echo e(trans('labels.email')); ?>" name="customer_email"
                                                    <?php if(env('Environment') == 'sendbox'): ?> value="etha@gmail.com" <?php else: ?> 
                                            value="<?php echo e(@Auth::user() && @Auth::user()->type == 3 ? @Auth::user()->email : ''); ?>" <?php endif; ?>
                                                    id="customer_email">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="vendor" name="vendor"
                                        value="<?php echo e(helper::storeinfo($storeinfo->slug)->id); ?>" />
                                </form>
                            </div>
                        </div>

                        <div class="customer-info mt-3 bg-light">
                            <div class="mb-2">
                                <h3
                                    class="select-payment <?php echo e(session()->get('direction') == '2' ? 'text-right' : ''); ?>">
                                    <i class="fa-regular fa-credit-card"></i><span
                                        class="px-2 checkoutform-title"><?php echo e(trans('labels.payment_option')); ?></span>
                                </h3>
                            </div>
                            <div class="row justify-content-center g-3">
                                <?php $__currentLoopData = helper::getallpayment($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="form-check-label col-md-6 label14 cp"
                                        for="<?php echo e($payment->payment_type); ?>">
                                        <div>
                                            <div class="payment-check">
                                                <img src="<?php echo e(helper::image_path($payment->image)); ?>"
                                                    class="img-fluid" alt="" width="40px" />
                                                <?php if(strtolower($payment->payment_type) == '2'): ?>
                                                    <input type="hidden" name="razorpay" id="razorpay"
                                                        value="<?php echo e($payment->public_key); ?>">
                                                <?php endif; ?>
                                                <?php if(strtolower($payment->payment_type) == '3'): ?>
                                                    <input type="hidden" name="stripe" id="stripe"
                                                        value="<?php echo e($payment->public_key); ?>">
                                                <?php endif; ?>
                                                <?php if(strtolower($payment->payment_type) == '4'): ?>
                                                    <input type="hidden" name="flutterwavekey" id="flutterwavekey"
                                                        value="<?php echo e($payment->public_key); ?>">
                                                <?php endif; ?>
                                                <?php if(strtolower($payment->payment_type) == '5'): ?>
                                                    <input type="hidden" name="paystackkey" id="paystackkey"
                                                        value="<?php echo e($payment->public_key); ?>">
                                                <?php endif; ?>

                                                <p class="m-0"><?php echo e($payment->payment_name); ?></p>

                                                <input
                                                    class="form-check-input payment-input <?php echo e(session()->get('direction') == '2' ? 'me-auto' : 'ms-auto'); ?>"
                                                    type="radio" name="payment" id="<?php echo e($payment->payment_type); ?>"
                                                    data-payment_type="<?php echo e(strtolower($payment->payment_type)); ?>"
                                                    <?php if(!$key): ?> <?php echo 'checked'; ?> <?php endif; ?>>

                                                <?php if(strtolower($payment->payment_type) == '6'): ?>
                                                    <input type="hidden" value="<?php echo e($payment->payment_description); ?>"
                                                        id="bank_payment">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="d-sm-flex justify-content-between mt-3">
                            <a href="<?php echo e(URL::to($storeinfo->slug . '/')); ?>"
                                class="btn btn-store-outline mb-3 mb-sm-0"><?php echo e(trans('labels.continue_shoping')); ?></a>
                            <?php if($paymentlist->count() > 0): ?>
                                <a onclick="Order()" class="btn btn-store"><?php echo e(trans('labels.proceed_to_pay')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="payment-side-position">
                        <?php
                        $sub_total = array_sum(array_column(@$data, 'total_price'));
                        $total = array_sum(array_column(@$data, 'total_price'));
                        ?>

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
                                    <div class="payment-sec my-3 bg-light border-0">
                                        <div class="mb-2">
                                            <h3
                                                class="payment-title <?php echo e(session()->get('direction') == '2' ? 'text-right' : ''); ?>">
                                                <i class="fa-light fa-badge-percent"></i><span
                                                    class="px-2 checkoutform-title"><?php echo e(trans('labels.apply_offer')); ?></span>
                                            </h3>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <input type="text" class="form-control rounded-5 p-3"
                                                value="<?php echo e(Session::has('offer_code') ? Session::get('offer_code') : ''); ?>"
                                                name="promocode" id="couponcode"
                                                placeholder="<?php echo e(trans('labels.coupon_code')); ?>" readonly>

                                            <button class="btn btn-md mx-2 mb-0 btn-store d-none" id="btnremove"
                                                onclick="RemoveCopon()"><?php echo e(trans('labels.remove')); ?></button>

                                            <button class="btn btn-md mx-2 mb-0 btn-store d-block" id="btnapply"
                                                onclick="ApplyCopon()"><?php echo e(trans('labels.apply')); ?></button>


                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1): ?>
                                <div class="payment-sec my-3 bg-light border-0">
                                    <div class="mb-2">
                                        <h3
                                            class="payment-title <?php echo e(session()->get('direction') == '2' ? 'text-right' : ''); ?>">
                                            <i class="fa-light fa-badge-percent"></i><span
                                                class="px-2 checkoutform-title"><?php echo e(trans('labels.apply_offer')); ?></span>
                                        </h3>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <input type="text" class="form-control rounded-5 p-3"
                                            value="<?php echo e(Session::has('offer_code') ? Session::get('offer_code') : ''); ?>"
                                            name="promocode" id="couponcode"
                                            placeholder="<?php echo e(trans('labels.coupon_code')); ?>" readonly>

                                        <button class="btn btn-md btnapply mx-2 mb-0 btn-store d-none"
                                            onclick="RemoveCopon()"><?php echo e(trans('labels.remove')); ?></button>

                                        <button class="btn btn-md btnapply mx-2 mb-0 btn-store d-block"
                                            onclick="ApplyCopon()"><?php echo e(trans('labels.apply')); ?></button>


                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="payment-sec my-3 bg-light border-0">
                            <div class="mb-2">
                                <h3
                                    class="payment-title <?php echo e(session()->get('direction') == '2' ? 'text-right' : ''); ?>">
                                    <i class="fa-light fa-file-invoice"></i><span
                                        class="px-2 checkoutform-title"><?php echo e(trans('labels.payment_summary')); ?></span>
                                </h3>
                            </div>
                            <div class="form form-a active">
                                <div class="total-sec">
                                    <div class="sub-total d-flex justify-content-between" id="subtotal">
                                        <h6 class="m-0"><?php echo e(trans('labels.sub_total')); ?></h6>
                                        <span><?php echo e(helper::currency_formate($sub_total, $storeinfo->id)); ?></span>
                                    </div>
                                    <div class="sub-total d-flex justify-content-between">
                                        <h6 class="m-0"><?php echo e(trans('labels.discount')); ?></h6>
                                        <?php if(Session::get('offer_type') == 1): ?>
                                            <?php
                                                $discount = Session::get('offer_amount');
                                            ?>
                                        <?php else: ?>
                                            <?php
                                                $discount = ($sub_total * Session::get('offer_amount')) / 100;
                                            ?>
                                        <?php endif; ?>
                                        <span
                                            id="offer_amount">-<?php echo e(helper::currency_formate($discount, $storeinfo->id)); ?></span>
                                    </div>
                                    <?php
                                        $totalcarttax = 0;
                                    ?>
                                    <?php $__currentLoopData = $taxArr['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $rate = $taxArr['rate'][$k];
                                            $totalcarttax += (float) $taxArr['rate'][$k];
                                        ?>

                                        <div class="sub-total d-flex justify-content-between">

                                            <h6 class="m-0"><?php echo e($tax); ?></h6>
                                            <span>
                                                <?php echo e(helper::currency_formate($rate, $storeinfo->id)); ?>

                                            </span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <?php
                                    $tax = $totalcarttax;
                                ?>
                                <?php if(helper::appdata($storeinfo->id)->product_type == 1): ?>
                                    <div class="sub-total d-flex justify-content-between" id="delivery_charge_hide">
                                        <h6 class="m-0"><?php echo e(trans('labels.delivery_charge')); ?></h6>
                                        <span
                                            id="shipping_charge"><?php echo e(helper::currency_formate('0.0', $storeinfo->id)); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if(Session::has('offer_amount')): ?>
                                    <?php
                                        $grandtotal = $total + $tax - $discount;
                                    ?>
                                    <p class="cart-total"><?php echo e(trans('labels.total_amount')); ?> <span
                                            id="total_amount">
                                            <?php echo e(helper::currency_formate($grandtotal, $storeinfo->id)); ?>

                                        </span></p>
                                <?php else: ?>
                                    <?php
                                        $grandtotal = $total + $tax;
                                    ?>
                                    <p class="cart-total"><?php echo e(trans('labels.total_amount')); ?> <span
                                            id="total_amount"><?php echo e(helper::currency_formate($grandtotal, $storeinfo->id)); ?></span>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form form-b">
                            <div class="total-sec">
                                <div class="sub-total">
                                    <h6><?php echo e(trans('labels.sub_total')); ?></h6>
                                    <span><?php echo e(helper::currency_formate($sub_total, $storeinfo->id)); ?></span>
                                </div>
                            </div>
                            <?php if(Session::has('offer_amount')): ?>
                                <p class="pro-total offer_amount"><?php echo e(trans('labels.discount')); ?>

                                    (<?php echo e(Session::get('offer_code')); ?>)</span>
                                    <span id="offer_amount">
                                        -
                                        <?php echo e(helper::currency_formate($discount, $storeinfo->id)); ?>

                                    </span>
                                </p>
                            <?php endif; ?>
                            <?php if(Session::has('offer_amount')): ?>
                                <p class="cart-total"><?php echo e(trans('labels.total_amount')); ?> <span id="total_amount">
                                        <?php echo e(helper::currency_formate($total + $tax - $discount, $storeinfo->id)); ?>

                                    </span></p>
                            <?php else: ?>
                                <p class="cart-total"><?php echo e(trans('labels.total_amount')); ?> <span
                                        id="total_amount"><?php echo e(helper::currency_formate($total + $tax, $storeinfo->id)); ?></span>
                                </p>
                            <?php endif; ?>
                        </div>
                        <input type="hidden" name="sub_total" id="sub_total" value="<?php echo e($sub_total); ?>">
                        <input type="hidden" name="tax" id="tax"
                            value="<?php echo e(implode('|', $taxArr['rate'])); ?>">
                        <input type="hidden" name="tax_name" id="tax_name"
                            value="<?php echo e(implode('|', $taxArr['tax'])); ?>">
                        <input type="hidden" name="delivery_charge" id="delivery_charge" value="0">
                        <?php if(Session::has('offer_amount')): ?>
                            <input type="hidden" name="grand_total" id="grand_total"
                                value="<?php echo e(number_format($total - $discount, 2)); ?>">
                            <?php
                                $hidepayment = $total - $discount;
                            ?>
                        <?php else: ?>
                            <input type="hidden" name="grand_total" id="grand_total"
                                value="<?php echo e(number_format($total, 2)); ?>">
                            <?php
                                $hidepayment = $total;
                            ?>
                        <?php endif; ?>
                    </div>

                    <div class="card mb-4 card-shadow bg-light">
                        <div class="card-body">
                            <h5 class="customer-title border-bottom pb-2 mb-4"><i
                                    class="fa-light fa-comment-dots"></i><span
                                    class="px-2 checkoutform-title"><?php echo e(trans('labels.product_notes')); ?></span>
                            </h5>
                            <div class="mb-3">
                                <label for="notes"
                                    class="form-label d-flex justify-content-start"><?php echo e(trans('labels.note')); ?></label>
                                <textarea id="notes" name="notes" placeholder="<?php echo e(trans('labels.enter_order_note')); ?>"
                                    class="form-control rounded-4 p-3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

    </div>
    <?php endif; ?>
</div>
</div>
<input type="hidden" id="delivery_time_required" value="<?php echo e(trans('messages.delivery_time_required')); ?>">
<input type="hidden" id="delivery_date_required" value="<?php echo e(trans('messages.delivery_date_required')); ?>">
<input type="hidden" id="address_required" value="<?php echo e(trans('messages.address_required')); ?>">
<input type="hidden" id="no_required" value="<?php echo e(trans('messages.no_required')); ?>">
<input type="hidden" id="landmark_required" value="<?php echo e(trans('messages.landmark_required')); ?>">
<input type="hidden" id="pincode_required" value="<?php echo e(trans('messages.pincode_required')); ?>">
<input type="hidden" id="delivery_area_required" value="<?php echo e(trans('messages.delivery_area')); ?>">
<input type="hidden" id="pickup_date_required" value="<?php echo e(trans('messages.pickup_date_required')); ?>">
<input type="hidden" id="pickup_time_required" value="<?php echo e(trans('messages.pickup_time_required')); ?>">
<input type="hidden" id="customer_mobile_required" value="<?php echo e(trans('messages.customer_mobile_required')); ?>">
<input type="hidden" id="customer_email_required" value="<?php echo e(trans('messages.customer_email_required')); ?>">
<input type="hidden" id="customer_name_required" value="<?php echo e(trans('messages.customer_name_required')); ?>">
<input type="hidden" id="currency" value="<?php echo e(helper::appdata($storeinfo->id)->currency); ?>">

<form action="<?php echo e(url('/orders/paypalrequest')); ?>" method="post" class="d-none">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="return" value="2">
    <input type="submit" class="callpaypal" name="submit">
</form>
<input type="hidden" name="sloturl" id="sloturl" value="<?php echo e(URL::to($storeinfo->slug . '/timeslot')); ?>">
<input type="hidden" name="store_id" id="store_id" value="<?php echo e($storeinfo->id); ?>">
<input type="hidden" name="copycodeurl" id="copycodeurl" value="<?php echo e(URL::to($storeinfo->slug . '/copycode')); ?>">
<input type="hidden" name="discount_amount" id="discount_amount" value="<?php echo e($discount); ?>">
<input type="hidden" name="couponcode" id="couponcode" value="<?php echo e(Session::get('offer_code')); ?>">


</div>
<!-- Modal -->
<div class="modal fade" id="modalbankdetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalbankdetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalbankdetailsLabel"><?php echo e(trans('labels.banktransfer')); ?></h5>
                <button type="button" class="btn-close bg-white border-0" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" action="<?php echo e(URL::to('/orders/paymentmethod')); ?>" method="POST">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="payment_type" id="payment_type" class="form-control"
                        value="">
                    <input type="hidden" name="modal_customer_name" id="modal_customer_name" class="form-control"
                        value="">
                    <input type="hidden" name="modal_customer_email" id="modal_customer_email" class="form-control"
                        value="">
                    <input type="hidden" name="modal_customer_mobile" id="modal_customer_mobile"
                        class="form-control" value="">
                    <input type="hidden" name="modal_delivery_date" id="modal_delivery_date" class="form-control"
                        value="">
                    <input type="hidden" name="modal_delivery_time" id="modal_delivery_time" class="form-control"
                        value="">
                    <input type="hidden" name="modal_delivery_area" id="modal_delivery_area" class="form-control"
                        value="">
                    <input type="hidden" name="modal_delivery_charge" id="modal_delivery_charge"
                        class="form-control" value="">
                    <input type="hidden" name="modal_address" id="modal_address" class="form-control"
                        value="">
                    <input type="hidden" name="modal_landmark" id="modal_landmark" class="form-control"
                        value="">
                    <input type="hidden" name="modal_postal_code" id="modal_postal_code" class="form-control"
                        value="">
                    <input type="hidden" name="modal_building" id="modal_building" class="form-control"
                        value="">
                    <input type="hidden" name="modal_message" id="modal_message" class="form-control"
                        value="">
                    <input type="hidden" name="modal_subtotal" id="modal_subtotal" class="form-control"
                        value="">
                    <input type="hidden" name="modal_discount_amount" id="modal_discount_amount"
                        class="form-control" value="">
                    <input type="hidden" name="modal_couponcode" id="modal_couponcode" class="form-control"
                        value="">
                    <input type="hidden" name="modal_ordertype" id="modal_ordertype" class="form-control"
                        value="">
                    <input type="hidden" name="modal_vendor_id" id="modal_vendor_id" class="form-control"
                        value="">
                    <input type="hidden" name="modal_grand_total" id="modal_grand_total" class="form-control"
                        value="">
                    <input type="hidden" name="modal_tax" id="modal_tax" class="form-control" value="">
                    <input type="hidden" name="modal_tax_name" id="modal_tax_name" class="form-control"
                        value="">
                    <input type="hidden" name="modal_order_type" id="modal_order_type" class="form-control"
                        value="">
                    <input type="hidden" name="modal_table" id="modal_table" class="form-control" value="">
                    <input type="hidden" name="modal_tablename" id="modal_tablename" class="form-control"
                        value="">
                    <p><?php echo e(trans('labels.payment_description')); ?></p>
                    <hr>
                    <p class="payment_description" id="payment_description"></p>
                    <hr>
                    <div class="form-group col-md-12">
                        <label for="screenshot"> <?php echo e(trans('labels.screenshot')); ?> </label>
                        <div class="controls">
                            <input type="file" name="screenshot" id="screenshot"
                                class="form-control  <?php $__errorArgs = ['screenshot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <?php $__errorArgs = ['screenshot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"> <?php echo e($message); ?> </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger"
                        data-bs-dismiss="modal"><?php echo e(trans('labels.close')); ?></button>
                    <button type="submit" class="btn btn-primary"> <?php echo e(trans('labels.save')); ?> </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- newsletter -->
<?php echo $__env->make('front.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- newsletter -->

<?php echo $__env->make('front.theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://checkout.stripe.com/v2/checkout.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    var formate = "<?php echo e(helper::appdata($storeinfo->id)->currency_formate); ?>";
</script>

<script>
  
    var showbutton = "<?php echo e(Session::has('offer_code')); ?>";
    var delivery_type = "<?php echo e(helper::appdata($storeinfo->id)->delivery_type); ?>";
    var dtype = delivery_type.split('|');
    $(document).ready(function() {
        if (showbutton == true) {
            $('#btnremove').removeClass('d-none');
            $('#btnapply').addClass('d-none');
        } else {
            $('#btnremove').addClass('d-none');
            $('#btnapply').removeClass('d-none');
        }
        $("input[name$='cart-delivery']").click(function() {
            var test = $(this).val();
            if (test == 1) {
                $("#open").show();
                $('#order_type').addClass('d-md-flex');
                $("#date_time").show();
                $("#delivery_charge_hide").removeClass('d-none');
                $("#delivery").show();
                $("#pickup").hide();
                $("#delivery_date").show();
                $("#pickup_date").hide();
                $('#tableinfo').hide();
                var sub_total = parseFloat($('#sub_total').val());

                $("#delivery_charge option:first").attr('selected', 'selected');
                var delivery_charge = parseFloat($('#delivery_charge').val());
                var tax = "<?php echo e($totalcarttax); ?>";

                var discount_amount = parseFloat($('#discount_amount').val());

                if (isNaN(discount_amount) || discount_amount == 0) {
                    $('#total_amount').text(currency_formate(parseFloat(sub_total) + parseFloat(tax) +
                        parseFloat(delivery_charge)));
                    $('#grand_total').val((parseFloat(sub_total) + parseFloat(tax) + parseFloat(
                        delivery_charge)).toFixed(formate));
                } else {

                    $('#total_amount').text(currency_formate(parseFloat(sub_total) + parseFloat(tax) +
                        parseFloat(delivery_charge) - parseFloat(discount_amount)));
                    $('#grand_total').val((parseFloat(sub_total) + parseFloat(tax) + parseFloat(
                        delivery_charge) - parseFloat(discount_amount)).toFixed(
                        2));
                }
            } else if (test == 2) {
                $('#delivery_charge').val();
                $("#open").hide();
                $('#order_type').addClass('d-md-flex');
                $("#date_time").show();
                $("#delivery_charge_hide").addClass('d-none');
                $("#delivery").hide();
                $("#pickup").show();
                $("#delivery_date").hide();
                $("#pickup_date").show();
                $('#tableinfo').hide();
                var sub_total = parseFloat($('#sub_total').val());
                var delivery_charge = parseFloat($('#delivery_charge').val());
                var tax = "<?php echo e($totalcarttax); ?>";
                var discount_amount = parseFloat($('#discount_amount').val());
                if (isNaN(discount_amount)) {
                    $('#total_amount').text(currency_formate(parseFloat(sub_total) + parseFloat(tax)));
                    $('#grand_total').val((parseFloat(sub_total) + parseFloat(tax)).toFixed(formate));
                } else {
                    $('#total_amount').text(currency_formate(parseFloat(sub_total) + parseFloat(tax) -
                        parseFloat(discount_amount)));
                    $('#grand_total').val((parseFloat(sub_total) + parseFloat(tax) - parseFloat(
                        discount_amount)).toFixed(formate));
                }
            } else if (test == 3) {
                $('#delivery_charge').val();
                $('#order_type').removeClass('d-md-flex');
                $("#open").hide();
                $('#tableinfo').show();
                $("#delivery_charge_hide").addClass('d-none');
                $("#delivery").hide();
                $("#pickup").show();
                $("#delivery_date").hide();
                $("#pickup_date").show();
                $("#date_time").hide();
                var sub_total = parseFloat($('#sub_total').val());
                var delivery_charge = parseFloat($('#delivery_charge').val());
                var tax = "<?php echo e($totalcarttax); ?>";
                var discount_amount = parseFloat($('#discount_amount').val());
                if (isNaN(discount_amount)) {
                    $('#total_amount').text(currency_formate(parseFloat(sub_total) + parseFloat(tax)));
                    $('#grand_total').val((parseFloat(sub_total) + parseFloat(tax)).toFixed(formate));
                } else {
                    $('#total_amount').text(currency_formate(parseFloat(sub_total) + parseFloat(tax) -
                        parseFloat(discount_amount)));
                    $('#grand_total').val((parseFloat(sub_total) + parseFloat(tax) - parseFloat(
                        discount_amount)).toFixed(formate));
                }
            }
        });

        $(function() {
            for (var i = 0; i < dtype.length; i++) {
                if (i == 0) {
                    $("input[id$='cart-" + dtype[i] + "']").click();
                }
            }
        });
    });
    $("#delivery_area").change(function() {
        var currency = parseFloat($('#currency').val());
        var deliverycharge = parseFloat($('option:selected', this).attr('price'));
        $('#shipping_charge').text(currency_formate(deliverycharge));
        $('#delivery_charge').val(deliverycharge);
        var sub_total = parseFloat($('#sub_total').val());
        var delivery_charge = parseFloat($('#delivery_charge').val());
        var tax = "<?php echo e($totalcarttax); ?>";
        var discount_amount = parseFloat($('#discount_amount').val());
        if (isNaN(discount_amount)) {
            $('#total_amount').text(currency_formate(parseFloat(sub_total) + parseFloat(delivery_charge) +
                parseFloat(tax)));
            $('#grand_total').val(((parseFloat(sub_total) + parseFloat(delivery_charge) + parseFloat(tax)))
                .toFixed(formate));
        } else {
            $('#total_amount').text(currency_formate(parseFloat(sub_total) + parseFloat(delivery_charge) +
                parseFloat(tax) -
                parseFloat(discount_amount)));
            $('#grand_total').val(((parseFloat(sub_total) + parseFloat(delivery_charge) + parseFloat(tax) -
                parseFloat(discount_amount))).toFixed(formate));
        }
    });

    function Order() {
        var sub_total = parseFloat($('#sub_total').val());
        var tax = $('#tax').val();
        var tax_name = $('#tax_name').val();
        var grand_total = parseFloat($('#grand_total').val());
        var delivery_time = $('#delivery_time').val();
        var delivery_date = $('#delivery_dt').val();
        var delivery_area = $('#delivery_area').val();
        var delivery_charge = parseFloat($('#delivery_charge').val());
        var discount_amount = parseFloat($('#discount_amount').val());
        var couponcode = $('#couponcode').val();
        var vendor = $('#vendor').val();
        var order_type;
        if ("<?php echo e(helper::appdata($storeinfo->id)->product_type == 1); ?>") {
            order_type = $("input:radio[name=cart-delivery]:checked").val();
        } else {
            order_type = 5;
        }
        var address = $('#address').val();
        var postal_code = $('#postal_code').val();
        var building = $('#building').val();
        var landmark = $('#landmark').val();
        var notes = $('#notes').val();
        var customer_name = $('#customer_name').val();
        var customer_email = $('#customer_email').val();
        var customer_mobile = $('#customer_mobile').val();

        var payment_type = $('input[name="payment"]:checked').attr("data-payment_type");
        var flutterwavekey = $('#flutterwavekey').val();
        var paystackkey = $('#paystackkey').val();
        var mailformat = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
        var table = $('#table').val();
        var tablename = $("#table option:selected").text();
        var areacount = "<?php echo e($deliveryarea->count()); ?>";
        if (order_type == "1") {
            if ("<?php echo e(helper::appdata($storeinfo->id)->ordertype_date_time == 1); ?>") {
                if (delivery_date == "") {
                    toastr.error($('#delivery_date_required').val());
                    return false;
                } else if (delivery_time == "") {
                    toastr.error($('#delivery_time_required').val());
                    return false;
                }
            }
            if (areacount > 0 && delivery_area == "") {
                toastr.error($('#delivery_area_required').val());
                return false;
            } else if (address == "") {
                toastr.error($('#address_required').val());
                return false;
            } else if (landmark == "") {
                toastr.error($('#landmark_required').val());
                return false;
            } else if (building == "") {
                toastr.error($('#no_required').val());
                return false;
            } else if (postal_code == "") {
                toastr.error($('#pincode_required').val());
                return false;
            } else if (customer_name == "") {
                toastr.error($('#customer_name_required').val());
                return false;
            } else if (customer_mobile == "") {
                toastr.error($('#customer_mobile_required').val());
                return false;
            } else if (customer_email == "") {
                toastr.error($('#customer_mobile_required').val());
                return false;
            } else if (!validateEmail(customer_email)) {
                toastr.error($('#customer_email_required').val());
                return false;
            }
        } else if (order_type == "2") {
            if ("<?php echo e(helper::appdata($storeinfo->id)->ordertype_date_time == 1); ?>") {
                if (delivery_date == "") {
                    toastr.error($('#pickup_date_required').val());
                    return false;
                } else if (delivery_time == "") {
                    toastr.error($('#pickup_time_required').val());
                    return false;
                }
            }
            if (customer_name == "") {
                toastr.error($('#customer_name_required').val());
                return false;
            } else if (customer_mobile == "") {
                toastr.error($('#customer_mobile_required').val());
                return false;
            } else if (customer_email == "") {
                toastr.error($('#customer_email_required').val());
                return false;
            }
        } else if (order_type == "2") {
            if (customer_name == "") {
                toastr.error($('#customer_name_required').val());
                return false;
            } else if (customer_mobile == "") {
                toastr.error($('#customer_mobile_required').val());
                return false;
            } else if (customer_email == "") {
                toastr.error($('#customer_email_required').val());
                return false;
            }
        }
        $('#preloader').show();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "<?php echo e(URL::to('/orders/checkplan')); ?>",
            data: {
                vendor_id: vendor,
            },
            method: 'POST',
            success: function(response) {
                if (response.status == 1) {
                    //COD
                    if (payment_type == "1") {

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "<?php echo e(URL::to('/orders/paymentmethod')); ?>",
                            data: {
                                sub_total: sub_total,
                                tax: tax,
                                tax_name: tax_name,
                                grand_total: grand_total,
                                delivery_time: delivery_time,
                                delivery_date: delivery_date,
                                delivery_area: delivery_area,
                                delivery_charge: delivery_charge,
                                discount_amount: discount_amount,
                                couponcode: couponcode,
                                order_type: order_type,
                                address: address,
                                postal_code: postal_code,
                                building: building,
                                landmark: landmark,
                                notes: notes,
                                customer_name: customer_name,
                                customer_email: customer_email,
                                customer_mobile: customer_mobile,
                                vendor_id: vendor,
                                payment_type: payment_type,
                                table: table,
                                tablename: tablename,
                            },
                            method: 'POST',
                            success: function(response) {
                                $('#preloader').hide();
                                if (response.status == 1) {
                                    window.location.href =
                                        "<?php echo e(URL::to($storeinfo->slug)); ?>/success/" +
                                        response.order_number;
                                } else {
                                    toastr.error(response.message);
                                }
                            },
                            error: function(error) {
                                $('#preloader').hide();
                            }
                        });
                    }
                    //Razorpay
                    if (payment_type == "2") {
                        $('#preloader').show();
                        var options = {
                            "key": $('#razorpay').val(),
                            "amount": (parseInt(grand_total * 100)), // 2000 paise = INR 20
                            "name": "<?php echo e(helper::appdata($storeinfo->id)->website_title); ?>",
                            "description": "Order payment",
                            "image": "<?php echo e(helper::appdata(@$storeinfo->id)->image); ?>",
                            "handler": function(response) {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                            'content')
                                    },
                                    url: "<?php echo e(URL::to('/orders/paymentmethod')); ?>",
                                    type: 'post',
                                    dataType: 'json',
                                    data: {
                                        payment_id: response.razorpay_payment_id,
                                        sub_total: sub_total,
                                        tax: tax,
                                        tax_name: tax_name,
                                        grand_total: grand_total,
                                        delivery_time: delivery_time,
                                        delivery_date: delivery_date,
                                        delivery_area: delivery_area,
                                        delivery_charge: delivery_charge,
                                        discount_amount: discount_amount,
                                        couponcode: couponcode,
                                        order_type: order_type,
                                        address: address,
                                        postal_code: postal_code,
                                        building: building,
                                        landmark: landmark,
                                        notes: notes,
                                        customer_name: customer_name,
                                        customer_email: customer_email,
                                        customer_mobile: customer_mobile,
                                        vendor_id: vendor,
                                        payment_type: payment_type,
                                        table: table,
                                        tablename: tablename,
                                    },
                                    success: function(response) {
                                        $('#preloader').hide();
                                        if (response.status == 1) {
                                            window.location.href =
                                                "<?php echo e(URL::to($storeinfo->slug)); ?>/success/" +
                                                response.order_number;
                                        } else {
                                            toastr.error(response.message);
                                        }
                                    },
                                    error: function(error) {
                                        $('#preloader').hide();
                                    }
                                });
                            },
                            "prefill": {
                                "contact": customer_mobile,
                                "email": customer_email,
                                "name": customer_name,
                            },
                            "theme": {
                                "color": "#366ed4"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                        e.preventDefault();
                    }
                    //Stripe
                    if (payment_type == "3") {
                        var handler = StripeCheckout.configure({
                            key: $('#stripe').val(),
                            image: "<?php echo e(helper::appdata(@$storeinfo->id)->image); ?>",
                            locale: 'auto',
                            token: function(token) {
                                // You can access the token ID with `token.id`.
                                // Get the token ID to your server-side code for use.
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                            .attr('content')
                                    },
                                    url: "<?php echo e(URL::to('/orders/paymentmethod')); ?>",
                                    data: {
                                        stripeToken: token.id,
                                        sub_total: sub_total,
                                        tax: tax,
                                        tax_name: tax_name,
                                        grand_total: grand_total,
                                        delivery_time: delivery_time,
                                        delivery_date: delivery_date,
                                        delivery_area: delivery_area,
                                        delivery_charge: delivery_charge,
                                        discount_amount: discount_amount,
                                        couponcode: couponcode,
                                        order_type: order_type,
                                        address: address,
                                        postal_code: postal_code,
                                        building: building,
                                        landmark: landmark,
                                        notes: notes,
                                        customer_name: customer_name,
                                        customer_email: customer_email,
                                        customer_mobile: customer_mobile,
                                        vendor_id: vendor,
                                        payment_type: payment_type,
                                        table: table,
                                        tablename: tablename,
                                    },
                                    method: 'POST',
                                    success: function(response) {
                                        $('#preloader').hide();
                                        if (response.status == 1) {
                                            window.location.href =
                                                "<?php echo e(URL::to($storeinfo->slug)); ?>/success/" +
                                                response.order_number;
                                        } else {
                                            toastr.error(response.message);
                                        }
                                    },
                                    error: function(error) {
                                        $('#preloader').hide();
                                    }
                                });
                            },
                            opened: function() {
                                $('#preloader').hide();
                            },
                            closed: function() {
                                $('#preloader').hide();
                            }
                        });
                        //Stripe Popup
                        handler.open({
                            name: "<?php echo e(helper::appdata($storeinfo->id)->website_title); ?>",
                            description: 'Order payment',
                            amount: grand_total * 100,
                            currency: "USD",
                            email: customer_email
                        });
                        e.preventDefault();
                        // Close Checkout on page navigation:
                        $(window).on('popstate', function() {
                            handler.close();
                        });
                    }
                    //Flutterwave
                    if (payment_type == "4") {
                        FlutterwaveCheckout({
                            public_key: flutterwavekey,
                            tx_ref: customer_name,
                            amount: grand_total,
                            currency: "NGN",
                            payment_options: " ",
                            customer: {
                                email: customer_email,
                                phone_number: customer_mobile,
                                name: customer_name,
                            },
                            callback: function(data) {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                            .attr('content')
                                    },
                                    url: "<?php echo e(URL::to('/orders/paymentmethod')); ?>",
                                    method: 'POST',
                                    dataType: 'json',
                                    data: {
                                        payment_id: data.flw_ref,
                                        sub_total: sub_total,
                                        tax: tax,
                                        tax_name: tax_name,
                                        grand_total: grand_total,
                                        delivery_time: delivery_time,
                                        delivery_date: delivery_date,
                                        delivery_area: delivery_area,
                                        delivery_charge: delivery_charge,
                                        discount_amount: discount_amount,
                                        couponcode: couponcode,
                                        order_type: order_type,
                                        address: address,
                                        postal_code: postal_code,
                                        building: building,
                                        landmark: landmark,
                                        notes: notes,
                                        customer_name: customer_name,
                                        customer_email: customer_email,
                                        customer_mobile: customer_mobile,
                                        vendor_id: vendor,
                                        payment_type: payment_type,
                                        table: table,
                                        tablename: tablename,
                                    },
                                    success: function(response) {
                                        $('#preloader').hide();
                                        if (response.status == 1) {
                                            window.location.href =
                                                "<?php echo e(URL::to($storeinfo->slug)); ?>/success/" +
                                                response.order_number;
                                        } else {
                                            toastr.error(response.message);
                                        }
                                    },
                                    error: function(error) {
                                        $('#preloader').hide();
                                    }
                                });
                            },
                            onclose: function() {
                                $('#preloader').hide();
                            },
                            customizations: {
                                title: "<?php echo e(helper::appdata($storeinfo->id)->website_title); ?>",
                                description: "Order payment",
                                logo: "<?php echo e(helper::appdata(@$storeinfo->id)->image); ?>",
                            },
                        });
                    }
                    //Paystack
                    if (payment_type == "5") {
                        let handler = PaystackPop.setup({
                            key: paystackkey,
                            email: customer_email,
                            amount: grand_total * 100,
                            currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
                            ref: 'trx_' + Math.floor((Math.random() * 1000000000) + 1),
                            label: "Order payment",
                            onClose: function() {
                                $('#preloader').hide();
                            },
                            callback: function(response) {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                            .attr('content')
                                    },
                                    url: "<?php echo e(URL::to('/orders/paymentmethod')); ?>",
                                    data: {
                                        payment_id: response.trxref,
                                        sub_total: sub_total,
                                        tax: tax,
                                        tax_name: tax_name,
                                        grand_total: grand_total,
                                        delivery_time: delivery_time,
                                        delivery_date: delivery_date,
                                        delivery_area: delivery_area,
                                        delivery_charge: delivery_charge,
                                        discount_amount: discount_amount,
                                        couponcode: couponcode,
                                        order_type: order_type,
                                        address: address,
                                        postal_code: postal_code,
                                        building: building,
                                        landmark: landmark,
                                        notes: notes,
                                        customer_name: customer_name,
                                        customer_email: customer_email,
                                        customer_mobile: customer_mobile,
                                        vendor_id: vendor,
                                        payment_type: payment_type,
                                        table: table,
                                        tablename: tablename,
                                    },
                                    method: 'POST',
                                    success: function(response) {
                                        $('#preloader').hide();
                                        if (response.status == 1) {
                                            window.location.href =
                                                "<?php echo e(URL::to($storeinfo->slug)); ?>/success/" +
                                                response.order_number;
                                        } else {
                                            toastr.error(response.message);
                                        }
                                    },
                                    error: function(error) {
                                        $('#preloader').hide();
                                    }
                                });
                            }
                        });
                        handler.openIframe();
                    }
                    //mercado pago
                    if (payment_type == "7") {
                        $('#preloader').show();
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "<?php echo e(URL::to('/orders/mercadoorderrequest')); ?>",
                            data: {
                                sub_total: sub_total,
                                tax: tax,
                                tax_name: tax_name,
                                grand_total: grand_total,
                                delivery_time: delivery_time,
                                delivery_date: delivery_date,
                                delivery_area: delivery_area,
                                delivery_charge: delivery_charge,
                                discount_amount: discount_amount,
                                couponcode: couponcode,
                                order_type: order_type,
                                address: address,
                                postal_code: postal_code,
                                building: building,
                                landmark: landmark,
                                notes: notes,
                                customer_name: customer_name,
                                customer_email: customer_email,
                                customer_mobile: customer_mobile,
                                vendor_id: vendor,
                                payment_type: payment_type,
                                slug: "<?php echo e($storeinfo->slug); ?>",
                                url: "<?php echo e(URL::to($storeinfo->slug)); ?>/payment/",
                                failure: "<?php echo e(url()->current()); ?>",
                                table: table,
                                tablename: tablename,
                            },
                            method: 'POST',
                            success: function(response) {
                                $('#preloader').hide();
                                if (response.status == 1) {
                                    window.location.href = response.url;
                                } else {
                                    $('#preloader').hide();
                                    toastr.error(response.message);
                                    return false;
                                }
                            },
                            error: function(error) {
                                $('#preloader').hide();
                            }
                        });
                    }

                    //PayPal
                    if (payment_type == "8") {
                        $('#preloader').show();
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "<?php echo e(URL::to('/orders/paypalrequest')); ?>",
                            data: {
                                sub_total: sub_total,
                                tax: tax,
                                tax_name: tax_name,
                                grand_total: grand_total,
                                delivery_time: delivery_time,
                                delivery_date: delivery_date,
                                delivery_area: delivery_area,
                                delivery_charge: delivery_charge,
                                discount_amount: discount_amount,
                                couponcode: couponcode,
                                order_type: order_type,
                                address: address,
                                postal_code: postal_code,
                                building: building,
                                landmark: landmark,
                                notes: notes,
                                customer_name: customer_name,
                                customer_email: customer_email,
                                customer_mobile: customer_mobile,
                                vendor_id: vendor,
                                payment_type: payment_type,
                                return: '1',
                                slug: "<?php echo e($storeinfo->slug); ?>",
                                url: "<?php echo e(URL::to($storeinfo->slug)); ?>/payment/",
                                failure: "<?php echo e(url()->current()); ?>",
                                table: table,
                                tablename: tablename,
                            },
                            method: 'POST',
                            success: function(response) {
                                $('#preloader').hide();
                                if (response.status == 1) {
                                    $(".callpaypal").trigger("click")
                                } else {
                                    $('#preloader').hide();
                                    toastr.error(response.message);
                                    return false;
                                }
                            },
                            error: function(error) {
                                $('#preloader').hide();
                            }
                        });
                    }

                    // myfatoorah
                    if (payment_type == '9') {
                        $('#preloader').show();
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "<?php echo e(URL::to('/orders/myfatoorahrequest')); ?>",
                            data: {
                                sub_total: sub_total,
                                tax: tax,
                                tax_name: tax_name,
                                grand_total: grand_total,
                                delivery_time: delivery_time,
                                delivery_date: delivery_date,
                                delivery_area: delivery_area,
                                delivery_charge: delivery_charge,
                                discount_amount: discount_amount,
                                couponcode: couponcode,
                                order_type: order_type,
                                address: address,
                                postal_code: postal_code,
                                building: building,
                                landmark: landmark,
                                notes: notes,
                                customer_name: customer_name,
                                customer_email: customer_email,
                                customer_mobile: customer_mobile,
                                vendor_id: vendor,
                                payment_type: payment_type,
                                return: '1',
                                slug: "<?php echo e($storeinfo->slug); ?>",
                                url: "<?php echo e(URL::to($storeinfo->slug)); ?>/payment/",
                                failure: "<?php echo e(url()->current()); ?>",
                                table: table,
                                tablename: tablename,
                            },
                            method: 'POST',
                            success: function(response) {
                                $('#preloader').hide();
                                if (response.status == 1) {
                                    window.location.href = response.url;
                                } else {
                                    $('#preloader').hide();
                                    toastr.error(response.message);
                                    return false;
                                }
                            },
                            error: function(error) {
                                $('#preloader').hide();
                                toastr.error(wrong);
                                return false;
                            }
                        });
                    }

                    //toyyibpay
                    if (payment_type == '10') {
                        $('#preloader').show();
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "<?php echo e(URL::to('/orders/toyyibpayrequest')); ?>",
                            data: {
                                sub_total: sub_total,
                                tax: tax,
                                tax_name: tax_name,
                                grand_total: grand_total,
                                delivery_time: delivery_time,
                                delivery_date: delivery_date,
                                delivery_area: delivery_area,
                                delivery_charge: delivery_charge,
                                discount_amount: discount_amount,
                                couponcode: couponcode,
                                order_type: order_type,
                                address: address,
                                postal_code: postal_code,
                                building: building,
                                landmark: landmark,
                                notes: notes,
                                customer_name: customer_name,
                                customer_email: customer_email,
                                customer_mobile: customer_mobile,
                                vendor_id: vendor,
                                payment_type: payment_type,
                                return: '1',
                                slug: "<?php echo e($storeinfo->slug); ?>",
                                url: "<?php echo e(URL::to($storeinfo->slug)); ?>/payment/",
                                failure: "<?php echo e(url()->current()); ?>",
                                table: table,
                                tablename: tablename,
                            },
                            method: 'POST',
                            success: function(response) {
                                $('#preloader').hide();
                                if (response.status == 1) {
                                    window.location.href = response.url;
                                } else {
                                    $('#preloader').hide();
                                    toastr.error(response.message);
                                    return false;
                                }
                            },
                            error: function(error) {
                                $('#preloader').hide();
                                toastr.error(wrong);
                                return false;
                            }
                        });
                    }
                    // Banktransfer
                    if (payment_type == '6') {
                        $('#preloader').hide();
                        $('#modalbankdetails').modal('show');

                        $('#payment_type').val(payment_type);
                        $('#modal_customer_name').val($('#customer_name').val());
                        $('#modal_customer_email').val($('#customer_name').val());
                        $('#modal_customer_mobile').val($('#customer_mobile').val());
                        $('#modal_address').val(address);
                        $('#modal_delivery_date').val(delivery_date);
                        $('#modal_delivery_time').val(delivery_time);
                        $('#modal_delivery_area').val(delivery_area);
                        $('#modal_delivery_charge').val(delivery_charge);
                        $('#modal_discount_amount').val(discount_amount);
                        $('#modal_couponcode').val(couponcode);
                        $('#modal_ordertype').val(order_type);
                        $('#modal_building').val(building);
                        $('#modal_landmark').val(landmark);
                        $('#modal_postal_code').val(postal_code);
                        $('#modal_message').val(notes);
                        $('#modal_vendor_id').val(vendor);
                        $('#modal_subtotal').val(sub_total);
                        $('#modal_grand_total').val(grand_total);
                        $('#modal_tax').val(tax);
                        $('#modal_tax_name').val(tax_name);
                        $('#modal_order_type').val(order_type);
                        $('#modal_table').val(table);
                        $('#modal_tablename').val(tablename);
                        $('#payment_description').html($('#bank_payment').val());

                    }
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(error) {
                $('#preloader').hide();
            }
        });
    }

    function ApplyCopon() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "<?php echo e(URL::to('/cart/applypromocode')); ?>",
            method: 'post',
            data: {
                promocode: $('#couponcode').val(),
                sub_total: $('#sub_total').val(),
                vendor_id: "<?php echo e($storeinfo->id); ?>",
            },
            success: function(response) {
                // $('#preloader').hide();
                if (response.status == 1) {
                    var total = parseFloat($('#sub_total').val());
                    var tax = "<?php echo e($totalcarttax); ?>";
                    var discount = "";
                    if (response.data.offer_type == 1) {
                        discount = response.data.offer_amount;
                    }
                    if (response.data.offer_type == 2) {
                        discount = total * parseFloat(response.data.offer_amount) / 100;
                    }
                    var delivery_charge = parseFloat($('#delivery_charge').val());
                    var grandtotal = parseFloat(total) + parseFloat(tax) + parseFloat(delivery_charge) -
                        parseFloat(discount);
                    $('#offer_amount').text('-' + currency_formate(parseFloat(discount)));
                    $('#total_amount').text(currency_formate(parseFloat(grandtotal)));
                    $('#grand_total').val(grandtotal);
                    $('#discount_amount').val(discount);
                    $('#couponcode').val(response.data.offer_code);
                    $('#btnremove').removeClass('d-none');
                    $('#btnapply').addClass('d-none');
                } else {
                    toastr.error(response.message);

                }
            }
        });
    }

    function RemoveCopon() {
        // $('#preloader').show();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "<?php echo e(URL::to('/cart/removepromocode')); ?>",
            method: 'post',
            data: {
                promocode: $('#couponcode').val()
            },
            success: function(response) {
                // $('#preloader').hide();
                if (response.status == 1) {
                    var total = $('#sub_total').val();
                    var tax = "<?php echo e($totalcarttax); ?>";
                    var delivery_charge = $('#delivery_charge').val();
                    var discount = 0;
                    var grandtotal = parseFloat(total) + parseFloat(tax) + parseFloat(delivery_charge) -
                        parseFloat(discount);
                    $('#offer_amount').text('-' + currency_formate(parseFloat(0)));
                    $('#total_amount').text(currency_formate(parseFloat(grandtotal)));
                    $('#couponcode').val('');
                    $('#grand_total').val(grandtotal);
                    $('#discount_amount').val(discount);
                    $('#couponcode').val('');
                    $('#btnremove').addClass('d-none');
                    $('#btnapply').removeClass('d-none');
                } else {
                    toastr.error(response.message);
                }
            }
        });
    }
    // Disable previous date
    $(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $('#delivery_dt').attr('min', maxDate);
    });

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }
</script>
<script>
    var select = "<?php echo e(trans('labels.select')); ?>";
</script>
<script src="<?php echo e(url(env('ASSETPATHURL') . 'front/js/checkout.js')); ?>"></script><?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/front/checkout.blade.php ENDPATH**/ ?>