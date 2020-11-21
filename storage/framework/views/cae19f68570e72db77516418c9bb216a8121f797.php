<?php $__env->startSection('title', 'Live Class'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(\Auth::check()): ?>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<style type="text/css">
    #footer{display: none;}
</style>
  <!-- main wrapper -->
  <section>
      <iframe id="myIframe" src="<?php echo $url; ?>/<?php echo $class_id; ?>" style="position: fixed;top: 0px;left: 0px;border: 0px;bottom: 0px;height: 100%;width: 100%;" allow="microphone; camera" onload="if(this.contentWindow.location == 'http://34.93.3.149'){ window.close();}"></iframe>
  </section>
  <script type="text/javascript">
      $(document).ready(function(){

    $("iframe").load(function(){

        $(this).contents().on("mousedown, mouseup, click", function(){

            alert("Click detected inside iframe.");

        });

    });

});
  </script>
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
<?php echo $__env->make('theme.liveclass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/front/liveclass.blade.php ENDPATH**/ ?>