<?php echo $__env->make('front.theme.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!------ breadcrumb ------>
<section class="breadcrumb-sec">

    <div class="container">

        <nav aria-label="breadcrumb">

            <h2 class="breadcrumb-title mb-2">
                <?php echo e(trans('labels.my_cart')); ?>

            </h2>

            <ol class="breadcrumb justify-content-center">

                <li class="breadcrumb-item"><a class="text-dark"
                        href="<?php echo e(URL::to($storeinfo->slug . '/')); ?>"><?php echo e(trans('labels.home')); ?></a>
                </li>

                <li class="text-muted breadcrumb-item active" aria-current="page"><?php echo e(trans('labels.cart')); ?></li>

            </ol>

        </nav>

    </div>

</section>


<div class="cart-sec">
    <div class="container">
        <?php if(count($cartdata) == 0): ?>
            <?php echo $__env->make('front.no_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="yourcart-sec">

                        <?php if(count($cartdata) == 0): ?>
                            <p class="text-center"><?php echo e(trans('labels.data_not_found')); ?></p>
                        <?php else: ?>
                            

                            <!-- new product cart list -->
                            <table class="table cart-table m-md-0">
                                <thead>
                                    <tr>
                                        <th class="d-none d-sm-table-cell bg-light"><?php echo e(trans('labels.product')); ?></th>
                                        <th class="d-none d-lg-table-cell bg-light"><?php echo e(trans('labels.price')); ?></th>
                                        <th class="d-none d-md-table-cell bg-light"><?php echo e(trans('labels.quantity')); ?></th>
                                        <th class="d-none d-sm-table-cell bg-light"><?php echo e(trans('labels.total')); ?></th>
                                        <th class="d-none d-sm-table-cell bg-light"><?php echo e(trans('labels.remove')); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                        $subtotal = 0;

                                    ?>

                                    <?php $__currentLoopData = $cartdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $subtotal += $cart->item_price * $cart->qty;
                                        ?>
                                        <tr>
                                            <td class="px-0 px-sm-2">
                                                <div class="product-detail">
                                                    <div class="pr-img">
                                                        <img src="<?php echo e(asset('storage/app/public/item/' . $cart->item_image)); ?>"
                                                            alt="" class="img-fluid h-100 w-100">
                                                    </div>
                                                    <div class="details">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2 mb-sm-0">
                                                            <a class="cart_title" href="#">
                                                                <h5 class="cart-card-title card-font mb-1 line-2">
                                                                    <?php echo e($cart->item_name); ?>

                                                                </h5>
                                                                <?php if($cart->variants_id != '' || $cart->extras_id != ''): ?>
                                                                    <li class="mb-2">
                                                                        <P><span type="button" class="text-muted fs-7"
                                                                                onclick='showaddons("<?php echo e($cart->id); ?>","<?php echo e($cart->item_name); ?>","<?php echo e($cart->attribute); ?>","<?php echo e($cart->extras_name); ?>","<?php echo e($cart->extras_price); ?>","<?php echo e($cart->variants_name); ?>","<?php echo e($cart->variants_price); ?>")'>
                                                                                <?php echo e(trans('labels.customize')); ?> </span>
                                                                        </P>
                                                                    </li>
                                                                <?php endif; ?>

                                                            </a>
                                                            <a onclick="RemoveCart('<?php echo e($cart->id); ?>','<?php echo e($storeinfo->id); ?>')"
                                                                class="item-delete d-block d-sm-none btn btn-store py-1 px-3">
                                                                <i class="fa-light fa-trash"></i>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between">

                                                            <p class="cart-total-price m-0 text-left d-md-none">

                                                                <?php echo e(helper::currency_formate($cart->item_price, $storeinfo->id)); ?>


                                                            </p>

                                                            <div class="item-quantity d-md-none">
                                                                <div
                                                                    class="input-group qty-input2 qtu-width d-flex justify-content-between rounded-5 input-postion">
                                                                    <a class="btn btn-sm py-0 change-qty cart-padding"
                                                                        data-type="minus" value="minus value"
                                                                        onclick="qtyupdate('<?php echo e($cart->id); ?>','<?php echo e($cart->item_id); ?>','<?php echo e($cart->variants_id); ?>','<?php echo e($cart->variants_price); ?>','decreaseValue')">
                                                                        <i class="fa fa-minus"></i>
                                                                    </a>
                                                                    <input type="number"
                                                                        class="border text-center bg-transparent"
                                                                        id="number_<?php echo e($cart->id); ?>" name="number"
                                                                        value="<?php echo e($cart->qty); ?>" min="1"
                                                                        max="10" readonly>
                                                                    <a class="btn btn-sm py-0 change-qty cart-padding"
                                                                        data-type="plus" id="cart-plus"
                                                                        onclick="qtyupdate('<?php echo e($cart->id); ?>','<?php echo e($cart->item_id); ?>','<?php echo e($cart->variants_id); ?>','<?php echo e($cart->variants_price); ?>','increase')"
                                                                        value="plus value"><i class="fa fa-plus"></i>
                                                                    </a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="price d-none d-lg-table-cell">
                                                <p class="cart-total-price m-0 text-left">
                                                    <?php echo e(helper::currency_formate($cart->item_price, $storeinfo->id)); ?>

                                                </p>
                                            </td>

                                            <td class="d-none d-md-table-cell">
                                                <div
                                                    class="input-group qty-input2 qtu-width d-flex justify-content-between rounded-5 input-postion m-auto">
                                                    <a class="btn btn-sm py-0 change-qty cart-padding" data-type="minus"
                                                        value="minus value"
                                                        onclick="qtyupdate('<?php echo e($cart->id); ?>','<?php echo e($cart->item_id); ?>','<?php echo e($cart->variants_id); ?>','<?php echo e($cart->item_price); ?>','decreaseValue')">
                                                        <i class="fa fa-minus"></i>
                                                    </a>
                                                    <input type="number" class="border text-center bg-transparent"
                                                        id="number_<?php echo e($cart->id); ?>" name="number"
                                                        value="<?php echo e($cart->qty); ?>" min="1" max="10"
                                                        readonly>
                                                    <a class="btn btn-sm py-0 change-qty cart-padding" data-type="plus"
                                                        id="cart-plus"
                                                        onclick="qtyupdate('<?php echo e($cart->id); ?>','<?php echo e($cart->item_id); ?>','<?php echo e($cart->variants_id); ?>','<?php echo e($cart->item_price); ?>','increase')"
                                                        value="plus value"><i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </td>

                                            <td class="total d-none d-sm-table-cell">
                                                <p class="cart-total-price m-0 text-left" id="total_price">
                                                    <?php echo e(helper::currency_formate($cart->price, $storeinfo->id)); ?>

                                                </p>
                                            </td>

                                            <td class="total d-none d-sm-table-cell">
                                                <a onclick="RemoveCart('<?php echo e($cart->id); ?>','<?php echo e($storeinfo->id); ?>')"
                                                    class="item-delete btn btn-store py-1 px-2 col-xl-5 col-lg-8 col-9 mx-auto">
                                                    <i class="fa-light fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                            <!-- new product cart list -->


                            <div class="promo-code d-sm-flex justify-content-between align-items-center my-3">
                                <div class="cuppon-text text-end">
                                    <span class="m-0 card-sub-total-text"><?php echo e(trans('labels.sub_total')); ?> :
                                        <?php echo e(helper::currency_formate($subtotal, $storeinfo->id)); ?></span>
                                </div>
                                <div class="d-flex align-items-center mt-2 mt-sm-0">

                                    <!-- Continue Shopping btn -->
                                    <a href="<?php echo e(URL::to($storeinfo->slug)); ?>"
                                        class="btn btn-store-outline mx-3"><?php echo e(trans('labels.continue_shoping')); ?></a>
                                    <!-- Continue Shopping btn -->

                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
                                        <?php if(Auth::user() && Auth::user()->type == 3): ?>
                                            <a class="btn btn-store mx-3"
                                                onclick="checkminorderamount('<?php echo e($subtotal); ?>','<?php echo e(URL::to(@$storeinfo->slug . '/checkout')); ?>')"><span><?php echo e(trans('labels.checkout')); ?></span></a>
                                        <?php else: ?>
                                            <?php if(helper::appdata($storeinfo->id)->checkout_login_required == 1): ?>
                                                <button type="button" class="btn btn-store m-0"
                                                    data-bs-toggle="modal"
                                                    onclick="checkminorderamount('<?php echo e($subtotal); ?>','')">
                                                    <?php echo e(trans('labels.checkout')); ?>

                                                </button>
                                            <?php else: ?>
                                                <a class="btn btn-store m-0"
                                                    onclick="checkminorderamount('<?php echo e($subtotal); ?>','<?php echo e(URL::to(@$storeinfo->slug . '/checkout')); ?>')"><span><?php echo e(trans('labels.checkout')); ?></span></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a class="btn btn-store m-0"
                                            onclick="checkminorderamount('<?php echo e($subtotal); ?>','<?php echo e(URL::to(@$storeinfo->slug . '/checkout')); ?>')"><span><?php echo e(trans('labels.checkout')); ?></span></a>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>


<!-- newsletter -->
<?php echo $__env->make('front.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- newsletter -->

<!-- Login Model Start -->
<div class="modal fade" id="loginmodel" tabindex="-1" aria-labelledby="loginmodelLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content p-2">
            <div class="modal-body">
                <div class="row justify-content-between">
                    <div class="col-md-12 col-lg-7">
                        <h3 class="promocodemodellable-titel m-0 text-start" id="promocodemodellable">
                            <?php echo e(trans('labels.proceed_as_guest_or_login')); ?></h3>
                        <p class="mb-3 promocodemodellable-subtitel"><?php echo e(trans('labels.dont_have_account_guest')); ?></p>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-3">
                        <a onclick="login()"
                            class="btn btn-store-outline mb-3"><?php echo e(trans('labels.login_with_your_account')); ?></a>

                        <a href="<?php echo e(URL::to(@$storeinfo->slug . '/checkout')); ?>"
                            class="btn btn-store"><?php echo e(trans('labels.continue_as_guest')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Model End -->

<?php echo $__env->make('front.theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    var minorderamount = "<?php echo e(helper::appdata($storeinfo->id)->min_order_amount); ?>";
    var qtycheckurl = "<?php echo e(URL::to($storeinfo->slug.'/qtycheckurl')); ?>";
    function checkminorderamount(subtotal, checkouturl) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            url: qtycheckurl,
            method: "post",
            data: {
                vendor_id: "<?php echo e($storeinfo->id); ?>"
            },
            success: function(data) {
                if (data.status == 1) {
                    if (parseInt(minorderamount) <= parseInt(subtotal)) {
                        if (checkouturl != null && checkouturl != "") {
                            location.href = checkouturl;
                        } else {
                            $('#loginmodel').modal('show');
                        }
                    } else {
                        toastr.error('<?php echo e(trans('messages.min_order_amount_required')); ?>' + minorderamount);
                    }
                }else{
                    toastr.error(data.message);
                }
            },
            error: function(data) {
                toastr.error(wrong);
                return false;
            }
        });

    }

    function login() {
        $('#loginmodel').modal('hide');
        var offcanvasElement = document.getElementById("loginpage");
        var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
        offcanvas.toggle();
    }
</script>
<?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/front/cart.blade.php ENDPATH**/ ?>