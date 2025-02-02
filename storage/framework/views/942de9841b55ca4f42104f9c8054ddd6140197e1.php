<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('installer_messages.environment.wizard.templateTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <i class="fa fa-magic fa-fw" aria-hidden="true"></i>
    <?php echo trans('installer_messages.environment.wizard.title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <div class="tabs tabs-full">

        <input id="tab1" type="radio" name="tabs" class="tab-input" checked />
        <label for="tab1" class="tab-label">
            <i class="fa fa-cog fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            <?php echo e(trans('installer_messages.environment.wizard.tabs.environment')); ?>

        </label>

        <input id="tab2" type="radio" name="tabs" class="tab-input" />
        <label for="tab2" class="tab-label">
            <i class="fa fa-database fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            <?php echo e(trans('installer_messages.environment.wizard.tabs.database')); ?>

        </label>

        <form method="post" action="<?php echo e(route('LaravelInstaller::environmentSaveWizard')); ?>" class="tabs-wrap">
            <div class="tab" id="tab1content">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                <div class="form-group <?php echo e($errors->has('app_name') ? ' has-error ' : ''); ?>">
                    <label for="app_name">
                        <?php echo e(trans('installer_messages.environment.wizard.form.app_name_label')); ?>

                    </label>
                    <input type="text" name="app_name" id="app_name" value="" placeholder="<?php echo e(trans('installer_messages.environment.wizard.form.app_name_placeholder')); ?>" />
                    <?php if($errors->has('app_name')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('app_name')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('app_url') ? ' has-error ' : ''); ?>">
                    <label for="app_url">
                        <?php echo e(trans('installer_messages.environment.wizard.form.app_url_label')); ?>

                    </label>
                    <input type="url" name="app_url" id="app_url" value="<?php echo e(url('/')); ?>" readonly placeholder="<?php echo e(trans('installer_messages.environment.wizard.form.app_url_placeholder')); ?>" />
                    <?php if($errors->has('app_url')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('app_url')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('website_host') ? ' has-error ' : ''); ?>">
                    <label for="website_host">
                        <?php echo e(trans('installer_messages.environment.wizard.form.website_host_label')); ?>

                    </label>
                    <input type="text" name="website_host" id="website_host" value="<?php echo e($_SERVER['HTTP_HOST']); ?>" readonly placeholder="<?php echo e(trans('installer_messages.environment.wizard.form.website_host_placeholder')); ?>" />
                    <?php if($errors->has('website_host')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('website_host')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="buttons">
                    <button class="button" onclick="showDatabaseSettings();return false">
                        <?php echo e(trans('installer_messages.environment.wizard.form.buttons.setup_database')); ?>

                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="tab" id="tab2content">

                <div class="form-group <?php echo e($errors->has('database_connection') ? ' has-error ' : ''); ?>">
                    <label for="database_connection">
                        <?php echo e(trans('installer_messages.environment.wizard.form.db_connection_label')); ?>

                    </label>
                    <select name="database_connection" id="database_connection">
                        <option value="mysql" selected><?php echo e(trans('installer_messages.environment.wizard.form.db_connection_label_mysql')); ?></option>
                        <option value="sqlite"><?php echo e(trans('installer_messages.environment.wizard.form.db_connection_label_sqlite')); ?></option>
                        <option value="pgsql"><?php echo e(trans('installer_messages.environment.wizard.form.db_connection_label_pgsql')); ?></option>
                        <option value="sqlsrv"><?php echo e(trans('installer_messages.environment.wizard.form.db_connection_label_sqlsrv')); ?></option>
                    </select>
                    <?php if($errors->has('database_connection')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('database_connection')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('database_hostname') ? ' has-error ' : ''); ?>">
                    <label for="database_hostname">
                        <?php echo e(trans('installer_messages.environment.wizard.form.db_host_label')); ?>

                    </label>
                    <input type="text" name="database_hostname" id="database_hostname" value="127.0.0.1" placeholder="<?php echo e(trans('installer_messages.environment.wizard.form.db_host_placeholder')); ?>" />
                    <?php if($errors->has('database_hostname')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('database_hostname')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('database_port') ? ' has-error ' : ''); ?>">
                    <label for="database_port">
                        <?php echo e(trans('installer_messages.environment.wizard.form.db_port_label')); ?>

                    </label>
                    <input type="number" name="database_port" id="database_port" value="3306" placeholder="<?php echo e(trans('installer_messages.environment.wizard.form.db_port_placeholder')); ?>" />
                    <?php if($errors->has('database_port')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('database_port')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('database_name') ? ' has-error ' : ''); ?>">
                    <label for="database_name">
                        <?php echo e(trans('installer_messages.environment.wizard.form.db_name_label')); ?>

                    </label>
                    <input type="text" name="database_name" id="database_name" value="" placeholder="<?php echo e(trans('installer_messages.environment.wizard.form.db_name_placeholder')); ?>" />
                    <?php if($errors->has('database_name')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('database_name')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('database_username') ? ' has-error ' : ''); ?>">
                    <label for="database_username">
                        <?php echo e(trans('installer_messages.environment.wizard.form.db_username_label')); ?>

                    </label>
                    <input type="text" name="database_username" id="database_username" value="" placeholder="<?php echo e(trans('installer_messages.environment.wizard.form.db_username_placeholder')); ?>" />
                    <?php if($errors->has('database_username')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('database_username')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('database_password') ? ' has-error ' : ''); ?>">
                    <label for="database_password">
                        <?php echo e(trans('installer_messages.environment.wizard.form.db_password_label')); ?>

                    </label>
                    <input type="password" name="database_password" id="database_password" value="" placeholder="<?php echo e(trans('installer_messages.environment.wizard.form.db_password_placeholder')); ?>" />
                    <?php if($errors->has('database_password')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('database_password')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="buttons">
                    <button class="button" type="submit">
                        <?php echo e(trans('installer_messages.environment.wizard.form.buttons.install')); ?>

                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        function checkEnvironment(val) {
            var element=document.getElementById('environment_text_input');
            if(val=='other') {
                element.style.display='block';
            } else {
                element.style.display='none';
            }
        }
        function showDatabaseSettings() {
            document.getElementById('tab2').checked = true;
        }
        function showApplicationSettings() {
            document.getElementById('tab3').checked = true;
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.installer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp81\htdocs\store-mart\resources\views/vendor/installer/environment-wizard.blade.php ENDPATH**/ ?>