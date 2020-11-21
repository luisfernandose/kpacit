<?php $__env->startSection('title', 'Edit Chapter - Admin'); ?>
<?php $__env->startSection('body'); ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-xs-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.EditCourseChapter')); ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post" action="<?php echo e(url('coursechapter/'.$cate->id)); ?>"data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>


              <label class="display-none" for="exampleInputSlug"><?php echo e(__('adminstaticword.SelectCourse')); ?></label>
              <select name="course_id" class="form-control col-md-7 col-xs-12 display-none">
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($cou->id); ?>" <?php echo e($cate->courses->id == $cou->id  ? 'selected' : ''); ?>><?php echo e($cou->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>


              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Name')); ?>:<span class="redstar">*</span></label>
                  <input type="" class="form-control" name="chapter_name" id="exampleInputTitle" value="<?php echo e($cate->chapter_name); ?>">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                   <li class="tg-list-item">              
                    <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> >
                    <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
              </div>
              <br>

              <div class="box-footer">
                <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/course/coursechapter/edit.blade.php ENDPATH**/ ?>