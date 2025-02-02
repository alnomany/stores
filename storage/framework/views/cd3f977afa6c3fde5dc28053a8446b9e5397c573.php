<section class="newsletter my-5">

    <div class="container">

        <div class="row align-items-center justify-content-between bg-light p-3">

            <div class="col-lg-6 col-md-7 col-12">

                <h2 class="text-capitalize mt-4 mb-3 fw-bold"><?php echo e(trans('labels.subscribe_title')); ?></h2>

                <p><?php echo e(trans('labels.subscribe_sub_title')); ?></p>

                <form action="<?php echo e(URL::to($storeinfo->slug . '/subscribe')); ?>" method="POST">

                    <?php echo csrf_field(); ?>

                    

                    <div class="form-floating d-sm-flex pb-4">

                        <input type="email" class="w-100 p-3 border rounded-5 mb-3 mb-sm-0"

                            placeholder="<?php echo e(trans('labels.email')); ?>" name="email" required>

                        <button type="submit"

                            class="btn btn-store mx-md-2 mb-0 btn-100"><?php echo e(trans('labels.subscribe')); ?></button>

                    </div>

                </form>

            </div>

            <div class="newsletter-img col-4 d-md-block d-none">

                <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->subscribe_image)); ?>" class="w-100">

            </div>

        </div>

    </div>

</section>

<?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/front/newsletter.blade.php ENDPATH**/ ?>