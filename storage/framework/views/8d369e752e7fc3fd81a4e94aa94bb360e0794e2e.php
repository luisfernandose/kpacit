<?php $__env->startSection('title', 'Sign Up'); ?>
<?php echo $__env->make('theme.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- end head -->
<!-- body start-->
<body>
<section id="nav-bar" class="nav-bar-main-block nav-bar-main-block-one">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="nav-bar-btn btm-20">
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-secondary" title="Home"><i class="fa fa-chevron-left"></i><?php echo e(__('frontstaticword.Backtohome')); ?></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="logo text-center btm-10">
                    <?php
                        $logo = App\Setting::first();
                    ?>

                    <?php if($logo->logo_type == 'L'): ?>
                        <a href="<?php echo e(url('/')); ?>" title="logo"><img src="<?php echo e(asset('images/logo/'.$logo->logo)); ?>" class="img-fluid" alt="logo"></a>
                    <?php else: ?>
                        <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e($logo->project_title); ?></div></b></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="Login-btn txt-rgt">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-secondary" title="login"><?php echo e(__('frontstaticword.Login')); ?></a>
                </div> 
            </div>
        </div>
    </div>
    <hr>
</section>
<section id="signup" class="signup-block-main-block">
    <div class="container">
        <div class="col-lg-6 col-md-8 offset-md-3">
            <div class="signup-heading">
               <?php echo e(__('frontstaticword.StartLearning')); ?>!
            </div>

            <div class="signup-block">
                <?php if($gsetting->fb_login_enable == 1): ?>
                    <div class="signin-link">
                        <a href="<?php echo e(url('/auth/facebook')); ?>" target="_blank" title="facebook" class="btn btn-info btm-10" title="Facebook"><i class="fa fa-facebook"></i><?php echo e(__('frontstaticword.ContinuewithFacebook')); ?></a>
                    </div>
                <?php endif; ?>
                
                <?php if($gsetting->google_login_enable == 1): ?>
                    <div class="signin-link google">
                        <a href="<?php echo e(url('/auth/google')); ?>" target="_blank" title="google" class="btn btn-white btm-10" title="google"><i class="fab fa-google-plus-g"></i><?php echo e(__('frontstaticword.ContinuewithGoogle')); ?></a>
                    </div>
                <?php endif; ?>

                <?php if($gsetting->gitlab_login_enable == 1): ?>
                    <div class="signin-link btm-10">
                        <a href="<?php echo e(url('/auth/gitlab')); ?>" target="_blank" title="gitlab" class="btn btn-white" title="gitlab"><i class="fab fa-gitlab"></i><?php echo e(__('frontstaticword.ContinuewithGitLab')); ?></a>
                    </div>
                <?php endif; ?>
                
                <form class="signup-form" method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" class="form-control<?php echo e($errors->has('fname') ? ' is-invalid' : ''); ?>" name="fname" value="<?php echo e(old('fname')); ?>" id="fname" placeholder="First Name">
                        <?php if($errors->has('fname')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('fname')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" class="form-control<?php echo e($errors->has('lname') ? ' is-invalid' : ''); ?>" name="lname" value="<?php echo e(old('lname')); ?>" id="lname" placeholder="Last Name">
                        <?php if($errors->has('lname')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('lname')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" id="email" placeholder="Email">
                        <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" id="password" placeholder="Password">
                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <i class="fa fa-lock" aria-hidden="true"></i> 
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>

                    
                    <button type="submit" title="Sign Up" class="btn btn-primary btm-20"><?php echo e(__('frontstaticword.Signup')); ?></button> 

                    <div class="signin-link text-center btm-20">
                        <?php echo e(__('frontstaticword.Bysigningup')); ?> <a href="<?php echo e(url('terms_condition')); ?>" title="Policy"><?php echo e(__('frontstaticword.Terms&Condition')); ?> </a>, <a href="<?php echo e(url('privacy_policy')); ?>" title="Policy"><?php echo e(__('frontstaticword.PrivacyPolicy')); ?>.</a>
                    </div>
                    <hr>
                    <div class="sign-up text-center"><?php echo e(__('frontstaticword.Alreadyhaveanaccount')); ?>?<a href="<?php echo e(route('login')); ?>" title="sign-up"> <?php echo e(__('frontstaticword.Login')); ?></a>
                    </div>
                </form>



            </div>
        </div>
    </div>
</section>


<?php echo $__env->make('theme.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end jquery -->
</body>
<!-- body end -->
</html> 
<?php /**PATH /var/www/html/resources/views/auth/register.blade.php ENDPATH**/ ?>