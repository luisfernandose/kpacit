<?php $__env->startSection('title','Edit Country'); ?>
<?php $__env->startSection("body"); ?>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Country</h3>
        </div> 
        <div class="panel-heading">
          <a href=" <?php echo e(url('admin/country')); ?> " class="btn btn-success pull-right owtbtn">< Back</a> 
        </div>   
        <form id="demo-form2" method="post" enctype="multipart/form-data" action="<?php echo e(url('admin/country/'.$countries->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                Country Name <span class="redstar">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control js-example-basic-single" name="country">
                <option>Choose Country:</option>

                <?php $__currentLoopData = $allcountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($c->id); ?>" <?php echo e($countries->country_id == $c->id ? 'selected' : ''); ?>><?php echo e($c->nicename); ?>

                  </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
                
              </div>
            </div>
                 
          <div class="box-footer">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
  
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin/layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/country/edit.blade.php ENDPATH**/ ?>