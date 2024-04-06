<!DOCTYPE html>
<html>
<head>
    <title><?php echo e($title); ?></title>
</head>
<body>
    <div>
        <div>
            <p><?php echo e(trans('labels.dear')); ?> <b><?php echo e($vendor_name); ?></b>,</p>

            <p><?php echo e(trans('labels.cod_message1')); ?></p>

            <p><?php echo e(trans('labels.cod_message2')); ?></p>

            <p><?php echo e(trans('labels.cod_message3')); ?></p>
            
            <p><?php echo e(trans('labels.cod_message4')); ?></p>
            
            <p><?php echo e(trans('labels.sincerely')); ?>,<br>
            <?php echo e($admin_name); ?><br>
            <?php echo e($admin_email); ?>

            </p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/email/codvendor.blade.php ENDPATH**/ ?>