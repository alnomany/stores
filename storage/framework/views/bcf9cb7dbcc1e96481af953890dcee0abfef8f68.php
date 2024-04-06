<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="text-uppercase"><?php echo e(trans('labels.share')); ?></h5>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <div class="card-block text-center">
                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo e(URL::to('/')); ?>/<?php echo e(Auth::user()->slug); ?>&choe=UTF-8"
                            title="Link to Google.com" />
                        <div class="card-block">
                            <button class="btn btn-secondary mb-4" onclick="myFunction()"><?php echo e(trans('labels.share')); ?> <i
                                    class="fa-sharp fa-solid fa-share-nodes ms-2"></i></button>
                            <a href="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo e(URL::to('/')); ?>/<?php echo e(Auth::user()->slug); ?>&choe=UTF-8"
                                target="_blank" class="btn btn-secondary mb-4"><?php echo e(trans('labels.download')); ?> <i
                                    class="fa-solid fa-arrow-down-to-line ms-2"></i></a>
                            <div id="share-icons" class="d-none">
                                <?php echo $shareComponent; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        function myFunction() {
            $('#share-icons').removeClass('d-none');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/admin/otherpages/share.blade.php ENDPATH**/ ?>