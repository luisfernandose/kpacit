<?php $__env->startSection('title', 'Privacy Policy'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- main wrapper -->
  <section id="blog-home" class="blog-home-main-block">
    <div class="container-fluid">
        <h1 class="blog-home-heading text-white"><?php echo e(__('adminstaticword.PrivacyPolicy')); ?></h1>
    </div>
  </section>
  <section id="policy-block" class="privacy-policy-block">
    <div class="container-fluid">
      <div class="panel-setting-main-block">
        <div class="panel-setting">
          <div class="row">
            <div class="col-md-12"> 
              <?php
                $data = App\Terms::first();
              ?>             
              <?php if(isset($data)): ?>
                <div class="info"><?php echo $data->policy; ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/privacy_policy.blade.php ENDPATH**/ ?>