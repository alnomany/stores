<!DOCTYPE html>
<html>
<head>
    <title><?php echo e($title); ?></title>
</head>
<body>
    <div>
        <div style="background:#ffffff;padding:15px">
            <p><?php echo e(trans('labels.dear')); ?> <b><?php echo e($vendor_name); ?></b>,</p>

            <p><?php echo e(trans('labels.subscription_message1')); ?></p>

            <p><?php echo e(trans('labels.subscription_message2')); ?></p>

            <p><?php echo e(trans('labels.subscription_message3')); ?></p>

            <?php echo e(trans('labels.pricing_plans')); ?>: <b><?php echo e($plan_name); ?></b><br>
            <?php echo e(trans('labels.subscription_duration')); ?>: <b><?php echo e($duration); ?></b><br>
            <?php echo e(trans('labels.subscription_cost')); ?>: <b><?php echo e($price); ?></b><br><br>

            <?php echo e(trans('labels.payment_options')); ?>: <b><?php echo e($payment_method); ?></b><br>
            <?php echo e(trans('labels.payment_id')); ?>: <b><?php echo e($transaction_id); ?></b><br>

            <p><?php echo e(trans('labels.subscription_message4')); ?></p>

            <p><?php echo e(trans('labels.subscription_message5')); ?></p>

            <p><?php echo e(trans('labels.subscription_message6')); ?></p>

            <p><?php echo e(trans('labels.sincerely')); ?>,</p>

            <?php echo e($admin_name); ?><br>
            <?php echo e($admin_email); ?>

        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/email/subscription.blade.php ENDPATH**/ ?>