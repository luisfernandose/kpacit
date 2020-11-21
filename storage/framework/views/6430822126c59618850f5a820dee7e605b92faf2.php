<?php $__env->startSection('title', 'Edit User - Admin'); ?>
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
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Quiz')); ?></h3>
          
        </div>
        <br>
        <div class="panel-body">

           <form id="demo-form2" method="POST" action="<?php echo e(route('quiztopic.update', $topic->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('PUT')); ?>

                     
                     

                      <div class="row">
                        <div class="col-md-12">
                          <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.QuizTopic')); ?>:<span class="redstar">*</span> </label>
                          <input type="text" placeholder="Enter Quiz Topic" class="form-control " name="title" id="exampleInputTitle" value="<?php echo e($topic->title); ?>">
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-md-12">
                          <label for="exampleInputDetails"><?php echo e(__('adminstaticword.QuizDescription')); ?>:<sup class="redstar">*</sup></label>
                          <textarea name="description" rows="3" class="form-control" placeholder="Enter Description"><?php echo e($topic->description); ?></textarea>
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-md-12">
                          <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.PerQuestionMarks')); ?>:<span class="redstar">*</span> </label>
                          <input type="number" placeholder="Enter Per Question Mark" class="form-control " name="per_q_mark" id="exampleInputTitle" value="<?php echo e($topic->per_q_mark); ?>">
                        </div>
                      </div>
                      <br>


                      <div class="row display-none">
                        <div class="col-md-12">
                          <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.QuizTimer')); ?>:<span class="redstar">*</span> </label>
                          <input type="text" placeholder="Enter Quiz Time" class="form-control" name="timer" id="exampleInputTitle" value="<?php echo e($topic->timer); ?>">
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-md-12">
                          <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Days')); ?>:</label>
                          <small>(Days after quiz will start when user enroll in course)</small>
                          <input type="text" placeholder="Enter Due Days" class="form-control" name="due_days" id="exampleInputTitle" value="<?php echo e($topic->due_days); ?>">
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-md-4">
                          <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                            <li class="tg-list-item">              
                              <input class="tgl tgl-skewed" id="111" type="checkbox" name="status" <?php echo e($topic->status == '1' ? 'checked' : ''); ?> >
                              <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="111"></label>
                            </li>
                            <input type="hidden" name="free" value="0" for="status" id="122">
                        </div>

                        <div class="col-md-4">
                          <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.QuizReattempt')); ?>:</label>
                            <li class="tg-list-item">              
                              <input class="tgl tgl-skewed" id="112" type="checkbox" name="quiz_again" <?php echo e($topic->quiz_again == '1' ? 'checked' : ''); ?> >
                              <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="112"></label>
                            </li>
                            <input type="hidden" name="free" value="0" for="quiz_again" id="123">
                        </div>
                      </div>
                      <br>
              
                      <div class="box-footer">
                        <button type="submit" value="Add Answer" class="btn btn-md col-md-3 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
                      </div>

                    </form>
          
        </div>
        <!-- /.panel body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/course/quiztopic/edit.blade.php ENDPATH**/ ?>