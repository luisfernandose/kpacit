<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->

<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku'); //make a list of rtl languages
?>

<html lang="en" <?php if(in_array($language,$rtl)): ?> dir="rtl" <?php endif; ?>>
<!-- <![endif]-->
<!-- head -->
<?php echo $__env->make('theme.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end head -->
<!-- body start-->
<body>
<!-- preloader --> 
<?php if($gsetting->preloader_enable == 1): ?>
<div class="preloader">
    <div class="status">
        <div class="status-message">
        	<img src="<?php echo e(asset('images/favicon/'.$gsetting['favicon'])); ?>" alt="logo" class="img-fluid">
        </div>
    </div>
</div>
<?php endif; ?>

<?php
  if(isset(Auth::user()->orders)){
      //Run User Enroll expire background process
      App\Jobs\EnrollExpire::dispatchNow();
  }
?>
<!-- end preloader -->
<!-- top-nav bar start-->
<?php echo $__env->make('theme.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- top-nav bar end-->
<!-- home start -->
<?php echo $__env->yieldContent('content'); ?>
<!-- testimonial end -->
<!-- footer start -->
<?php echo $__env->make('theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- footer end -->
<!-- jquery -->
<?php echo $__env->make('theme.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end jquery -->
</body>
<!-- body end -->
</html> 
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/theme/master.blade.php ENDPATH**/ ?>