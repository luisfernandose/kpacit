<?php $__env->startSection('title', 'Edit Course - Admin'); ?>
<?php $__env->startSection('body'); ?>

<div class="box">
  <div class="box-header">
    <h3 ><?php echo e($cor->title); ?></h3>
  </div>
  <div class="box-body">
  <?php if($errors->any()): ?>
    <div class="alert alert-danger">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  <?php endif; ?>
  </div>    
</div>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="content-header">
        </div>
        <div class="box-body">
          <div class="nav-tabs-custom">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="nav-tab" role="tablist">
              <li role="presentation" class="active"><a href="#a" aria-controls="home" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.Course')); ?></a></li>
              <li class=""  role="presentation"><a href="#b" aria-controls="profile" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.CourseInclude')); ?></a></li>
              <li  class=""  role="presentation"><a href="#c" aria-controls="messages" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.WhatLearns')); ?></a></li>
              <li  class=""  role="presentation"><a href="#d" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.CourseChapter')); ?></a></li>
              <li  class=""  role="presentation"><a href="#e" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.CourseClass')); ?></a></li>
              <li  class=""  role="presentation"><a href="#market" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.RelatedCourse')); ?></a></li>
              <li  class=""  role="presentation"><a href="#copy" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.Question')); ?></a></li>
              <li  class=""  role="presentation"><a href="#ans" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.Answer')); ?></a></li>
              <li  class=""  role="presentation"><a href="#jj" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.ReviewRating')); ?></a></li>
              <li  class=""  role="presentation"><a href="#an" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.Announcement')); ?></a></li>
              <li  class=""  role="presentation"><a href="#report" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.ReviewReport')); ?></a></li>
              <li  class=""  role="presentation"><a href="#topic" aria-controls="topic" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.QuizTopic')); ?></a></li>
           
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="a">
                <?php echo $__env->make('admin.course.editcor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="b">
                <?php echo $__env->make('admin.course.courseinclude.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="c">
                <?php echo $__env->make('admin.course.whatlearns.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="d">
                <?php echo $__env->make('admin.course.coursechapter.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="e">
                <?php echo $__env->make('admin.course.courseclass.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="market">
                <?php echo $__env->make('admin.course.relatedcourse.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="copy">
                <?php echo $__env->make('admin.course.questionanswer.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="ans">
                <?php echo $__env->make('admin.course.answer.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="jj">
                <?php echo $__env->make('admin.course.reviewrating.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="an">
                <?php echo $__env->make('admin.course.announsment.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="report">
                <?php echo $__env->make('admin.course.reviewreport.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="topic">
                <?php echo $__env->make('admin.course.quiztopic.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
             
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<script>
(function($) {
"use strict";
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#nav-tab a[href="' + activeTab + '"]').tab('show');
    }
  });
})(jQuery);
</script>

<?php $__env->stopSection(); ?>
  
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/course/show.blade.php ENDPATH**/ ?>