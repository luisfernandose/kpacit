<?php $__env->startSection('title','Add Cities'); ?>
<?php $__env->startSection("body"); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.City')); ?></h3>
          <div class="panel-heading">
            <a href=" <?php echo e(url('admin/city')); ?> " class="btn btn-success pull-right owtbtn">< <?php echo e(__('adminstaticword.Back')); ?></a> 
          </div>   
               
          <form id="demo-form2" method="post" enctype="multipart/form-data" action="<?php echo e(url('admin/city')); ?>" data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
               <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.City')); ?><span class="redstar">*</span>
              </label>
              
              
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select required class="form-control js-example-basic-single" name="state_id">
                  <option><?php echo e(__('adminstaticword.ChooseState')); ?>:</option>

                  <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($state->state_id); ?>"><?php echo e($state->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
            <div class="box-footer">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin/layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/country/state/city/add.blade.php ENDPATH**/ ?>