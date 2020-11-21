<?php $__env->startSection('title', 'Verify Email'); ?>
<?php echo $__env->make('theme.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('Verify Email', 'Sign Up'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- end head -->
<!-- body start-->
<body>

<section id="signup" class="signup-block-main-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Verify Your Email Address')); ?></div>
                    <div class="card-body">
                        <?php if(session('resent')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

                            </div>
                        <?php endif; ?>

                        <?php echo e(__('Before proceeding, please check your email for a verification link.')); ?>

                        <?php echo e(__('If you did not receive the email')); ?>, 
                        <a href="<?php echo e(route('verification.resend')); ?>"><?php echo e(__('click resend')); ?></a>.
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?php echo e(url('/')); ?>" class="card-link" style="margin-right:10px">Go to home</a>
                        <a href="<?php echo e(route('verification.resend')); ?>" class="btn btn-primary">Resend</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('theme.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end jquery -->
</body>
<!-- body end -->
</html> <?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/auth/verify.blade.php ENDPATH**/ ?>