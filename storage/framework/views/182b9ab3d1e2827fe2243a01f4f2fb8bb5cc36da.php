<div class="row my-3">

    <div class="col-lg-3 col-md-4 col-sm-6 my-1">
        <div class="card box-shadow h-100 <?php echo e(request()->get('status') == '' ? 'border border-primary' : 'border-0'); ?>">
            <?php if(request()->is('admin/report')): ?>
                <a
                    href="<?php echo e(URL::to(request()->url() . '?status=&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>">
                <?php elseif(request()->is('admin/orders')): ?>
                    <a href="<?php echo e(URL::to('admin/orders?status=')); ?>">
                    <?php elseif(request()->is('admin/customers/orders*')): ?>
                        <a href="<?php echo e(URL::to('admin/customers/orders-' . @$userinfo->id . '?status=')); ?>">
            <?php endif; ?>
            <div class="card-body">
                <div class="dashboard-card">
                    <span class="card-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </span>
                    <span class="<?php echo e(session()->get('direction') == 2 ? 'text-start' : 'text-end'); ?>">
                        <p class="text-muted fw-medium mb-1"><?php echo e(trans('labels.total_orders')); ?></p>
                        <h4><?php echo e($totalorders); ?></h4>
                    </span>
                </div>
            </div>
            </a>
        </div>
    </div>
    <?php if(helper::appdata($vendor_id)->product_type == 1): ?>
        <?php if(request()->is('admin/orders') || request()->is('admin/customers/orders*')): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 my-1">
                <div
                    class="card box-shadow h-100 <?php echo e(request()->get('status') == 'processing' ? 'border border-primary' : 'border-0'); ?>">
                    <?php if(request()->is('admin/report')): ?>
                        <a
                            href="<?php echo e(URL::to(request()->url() . '?status=processing&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>">
                        <?php elseif(request()->is('admin/orders')): ?>
                            <a href="<?php echo e(URL::to('admin/orders?status=processing')); ?>">
                            <?php elseif(request()->is('admin/customers/orders*')): ?>
                                <a
                                    href="<?php echo e(URL::to('admin/customers/orders-' . @$userinfo->id . '?status=processing')); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="card-icon">
                                <i class="fa fa-hourglass"></i>
                            </span>
                            <span class="<?php echo e(session()->get('direction') == 2 ? 'text-start' : 'text-end'); ?>">
                                <p class="text-muted fw-medium mb-1"><?php echo e(trans('labels.processing')); ?></p>
                                <h4><?php echo e($totalprocessing); ?></h4>
                            </span>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-lg-3 col-md-4 col-sm-6 my-1">
            <div
                class="card box-shadow h-100 <?php echo e(request()->get('status') == 'delivered' ? 'border border-primary' : 'border-0'); ?>">
                <?php if(request()->is('admin/report')): ?>
                    <a
                        href="<?php echo e(URL::to(request()->url() . '?status=delivered&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>">
                    <?php elseif(request()->is('admin/orders')): ?>
                        <a href="<?php echo e(URL::to('admin/orders?status=delivered')); ?>">
                        <?php elseif(request()->is('admin/customers/orders*')): ?>
                            <a href="<?php echo e(URL::to('admin/customers/orders-' . @$userinfo->id . '?status=delivered')); ?>">
                <?php endif; ?>
                <div class="card-body">
                    <div class="dashboard-card">
                        <span class="card-icon">
                            <i class="fa fa-check"></i>
                        </span>
                        <span class="<?php echo e(session()->get('direction') == 2 ? 'text-start' : 'text-end'); ?>">
                            <p class="text-muted fw-medium mb-1"><?php echo e(trans('labels.delivered')); ?></p>
                            <h4><?php echo e($totalcompleted); ?></h4>
                        </span>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 my-1">
            <div
                class="card box-shadow h-100 <?php echo e(request()->get('status') == 'cancelled' ? 'border border-primary' : 'border-0'); ?>">
                <?php if(request()->is('admin/report')): ?>
                    <a
                        href="<?php echo e(URL::to(request()->url() . '?status=cancelled&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>">
                    <?php elseif(request()->is('admin/orders')): ?>
                        <a href="<?php echo e(URL::to('admin/orders?status=cancelled')); ?>">
                        <?php elseif(request()->is('admin/customers/orders*')): ?>
                            <a href="<?php echo e(URL::to('admin/customers/orders-' . @$userinfo->id . '?status=cancelled')); ?>">
                <?php endif; ?>
                <div class="card-body">
                    <div class="dashboard-card">
                        <span class="card-icon">
                            <i class="fa fa-close"></i>
                        </span>
                        <span class="<?php echo e(session()->get('direction') == 2 ? 'text-start' : 'text-end'); ?>">
                            <p class="text-muted fw-medium mb-1"><?php echo e(trans('labels.cancelled')); ?></p>
                            <h4><?php echo e($totalcancelled); ?></h4>
                        </span>
                    </div>
                </div>
                </a>
            </div>
        </div>
    <?php endif; ?>

    <?php if(request()->is('admin/report*')): ?>
        <div class="col-lg-3 col-md-4 col-sm-6 my-1">
            <div class="card box-shadow h-100">
                <div class="card-body">
                    <div class="dashboard-card">
                        <span class="card-icon">
                            <i class="fa-regular fa-money-bill-1-wave"></i>
                        </span>
                        <span class="<?php echo e(session()->get('direction') == 2 ? 'text-start' : 'text-end'); ?>">
                            <p class="text-muted fw-medium mb-1"><?php echo e(trans('labels.revenue')); ?></p>
                            <h4><?php echo e(helper::currency_formate($totalrevenue, $vendor_id)); ?></h4>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/admin/orders/statistics.blade.php ENDPATH**/ ?>