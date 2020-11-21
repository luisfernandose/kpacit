<?php $__env->startSection('title', 'Privacy Policy - Admin'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-md-12">
    	<div class="box box-primary">
         	<div class="box-header with-border">
          	<h3 class="box-title"><?php echo e(__('adminstaticword.PrivacyPolicy')); ?></h3>
       		</div>
        	<div class="panel-body">
        		<form action="<?php echo e(action('TermsController@update')); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

              
              <div class="row">
                <div class="col-md-12">
                  <label for="policy"><?php echo e(__('adminstaticword.PrivacyPolicy')); ?>:<sup class="redstar">*</sup></label>
                  <textarea id="editor2" name="policy" rows="10" cols="80">
                  <?php echo e($items['policy']); ?>

                </textarea>
                </div>
              </div>
              <br>
              
              <div class="box-footer">
                <button value="" type="submit"  class="btn btn-md col-md-2 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
              </div>

            </form>
          </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>
    $(function () {
      CKEDITOR.replace('editor2');
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/terms/policy.blade.php ENDPATH**/ ?>