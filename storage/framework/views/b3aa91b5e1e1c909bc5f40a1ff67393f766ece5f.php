<?php $__env->startSection('title', 'View Course - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">

	<?php echo $__env->make('admin.course.partial.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      	
</section>

<?php $__env->stopSection(); ?>
  
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/course/index.blade.php ENDPATH**/ ?>