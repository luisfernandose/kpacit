<?php $__env->startSection('title', 'Login'); ?>
<?php echo $__env->make('theme.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- end head -->
<!-- body start-->
<body>
<!-- top-nav bar start-->
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
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary" title="instructor"><?php echo e(__('frontstaticword.Signup')); ?></a>
                </div> 
            </div>
        </div>
    </div>
    <hr>
</section>

<!-- top-nav bar end-->
<!-- Signup start-->
<section id="signup" class="signup-block-main-block">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="signup-heading">
                <?php echo e(__('frontstaticword.LogIntoYour')); ?> <?php echo e($project_title); ?> <?php echo e(__('frontstaticword.Account')); ?>!
            </div>

            <div class="signup-block">

                <div class="signin-link btm-10">
                    <?php if($gsetting->fb_login_enable == 1): ?>
                        <a href="<?php echo e(url('/auth/facebook')); ?>" target="_blank" title="facebook" class="btn btn-info btm-10" title="Facebook"><i class="fa fa-facebook"></i><?php echo e(__('frontstaticword.ContinuewithFacebook')); ?></a>
                    <?php endif; ?>
                    
                    <?php if($gsetting->google_login_enable == 1): ?>
                    <div class="google">
                        <a href="<?php echo e(url('/auth/google')); ?>" target="_blank" title="google" class="btn btn-white btm-10" title="google"><i class="fab fa-google-plus-g"></i><?php echo e(__('frontstaticword.ContinuewithGoogle')); ?></a>
                    </div>
                    <?php endif; ?>

                    <?php if($gsetting->gitlab_login_enable == 1): ?>
                        <a href="<?php echo e(url('/auth/gitlab')); ?>" target="_blank" title="gitlab" class="btn btn-white" title="gitlab"><i class="fab fa-gitlab"></i><?php echo e(__('frontstaticword.ContinuewithGitLab')); ?></a>
                    <?php endif; ?>
                </div>

                <form method="POST" class="signup-form" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                 
                    <div class="form-group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Enter Your E-Mail"   name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                        <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Enter Your Password" name="password" required>

                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                <label class="form-check-label" for="remember">
                                    <?php echo e(__('Remember Me')); ?>

                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"  class="btn btn-primary">
                            <?php echo e(__('frontstaticword.Login')); ?>

                        </button>
                        <br>
                        <br>

                        <div class="forgot-password text-center btm-20"><a href="<?php echo e('password/reset'); ?>" title="sign-up"><?php echo e(__('frontstaticword.ForgotPassword')); ?></a>
                        </div>

                    </div>


                    <div class="signin-link text-center btm-20">
                       <?php echo e(__('frontstaticword.Bysigningup')); ?> <a href="<?php echo e(url('terms_condition')); ?>" title="Policy"><?php echo e(__('frontstaticword.Terms&Condition')); ?> </a>, <a href="<?php echo e(url('privacy_policy')); ?>" title="Policy"><?php echo e(__('frontstaticword.PrivacyPolicy')); ?>.</a>
                    </div>
                    <hr>
                    <div class="sign-up text-center"><?php echo e(__('frontstaticword.Donothaveanaccount')); ?>?<a href="<?php echo e(route('register')); ?>" title="sign-up"> <?php echo e(__('frontstaticword.Signup')); ?></a>
                    </div>
                            
                </form>
            </div>
        </div>
    </div>

</section>
<!--  Signup end-->
<!-- jquery -->
<?php echo $__env->make('theme.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end jquery -->
</body>
<!-- body end -->
</html> 






<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/auth/login.blade.php ENDPATH**/ ?>