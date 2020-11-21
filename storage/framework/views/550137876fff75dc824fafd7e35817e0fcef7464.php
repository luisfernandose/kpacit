<?php $__env->startSection('title', 'Live Class'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(\Auth::check()): ?>
<style type="text/css">
    #footer{display: none;}
</style>
  <!-- main wrapper -->
  <section>
      <iframe id="myIframe" src="https://videocall.abserve.tech/<?php echo $class_id; ?>" style="height:684px;width: 100%;" allow="microphone; camera"></iframe>
  </section>
   <?php else: ?>

   <!-- main wrapper -->
  <section id="blog-home" class="blog-home-main-block">
    <div class="container-fluid">
        <h1 class="blog-home-heading text-white">Live class</h1>
    </div>
  </section>
  <section id="policy-block" class="privacy-policy-block">
    <div class="container-fluid">
      <div class="panel-setting-main-block">
        <div class="panel-setting">
          <div class="row">
            <div class="col-md-12"> 
             <b>Please check your authentication </b>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.liveclass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/edudstar/edu-pro-new/resources/views/front/liveclass.blade.php ENDPATH**/ ?>