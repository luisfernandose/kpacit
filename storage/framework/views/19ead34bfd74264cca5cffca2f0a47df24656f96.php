<?php $__env->startSection('title', 'Enroll a student - Admin'); ?>
<?php $__env->startSection('body'); ?>


<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> Enroll a user</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="<?php echo e(route('order.store')); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

                      
           
              <div class="row">
                <div class="col-md-6">
                  <label>User<span class="redstar">*</span></label>
                  <select name="user_id" id="user_id" class="form-control js-example-basic-single" required>
                    <option value=""><?php echo e(__('adminstaticword.SelectanOption')); ?></option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($user->id); ?>"><?php echo e($user->fname); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label>Course<span class="redstar">*</span></label>
                  <select name="course_id" id="course_id" class="form-control js-example-basic-single" required>
                    <option value=""><?php echo e(__('adminstaticword.SelectanOption')); ?></option>
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($course->id); ?>"><?php echo e($course->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              <br>

              
      
              <div class="box-footer">
                <button type="submit" value="Add Slider" class="btn btn-md col-md-2 btn-primary">Enrol User</button>
              </div>
         
            </form>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/order/create.blade.php ENDPATH**/ ?>