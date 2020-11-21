<?php $__env->startSection('title', 'Dashboard - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<?php if(Auth::User()->role == "instructor"): ?>

<section class="content-header">
  <h1>
    <?php echo e(__('adminstaticword.Dashboard')); ?>

    <small><?php echo e(__('adminstaticword.Instructor')); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo e(__('adminstaticword.Home')); ?></a></li>
    <li class="active"><?php echo e(__('adminstaticword.Dashboard')); ?></li>
  </ol>
</section>
<section class="content">
	<!-- Main row -->
  <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>
            	<?php
            		$course = App\Course::where('user_id', Auth::User()->id)->get();
            		if(count($course)>0){

            			echo count($course);
            		}
            		else{

            			echo "0";
            		}
            	?>
            </h3>
            <p><?php echo e(__('adminstaticword.Course')); ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo e(url('course')); ?>" class="small-box-footer"> <?php echo e(__('adminstaticword.Moreinfo')); ?><i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->

        <div class="small-box bg-green">
          <div class="inner">
            <h3>
             
            	<?php
            		$cat = App\Order::where('instructor_id', Auth::User()->id)->get();
            		if(count($cat)>0){

            			echo count($cat);
            		}
            		else{

            			echo "0";
            		}
            	?>

            </h3>
            <p> <?php echo e(__('adminstaticword.User')); ?> <?php echo e(__('adminstaticword.Enrolled')); ?></p>
          </div>
          <div class="icon">
          	<i class="fa fa-th-large"></i>
          </div>
          <a href="<?php echo e(url('userenroll')); ?>" class="small-box-footer"> <?php echo e(__('adminstaticword.Moreinfo')); ?><i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>
            	<?php
            		$question = App\Question::where('instructor_id', Auth::User()->id)->get();
            		if(count($question)>0){

            			echo count($question);
            		}
            		else{

            			echo "0";
            		}
            	?>
            </h3>
            <p> <?php echo e(__('adminstaticword.Total')); ?> <?php echo e(__('adminstaticword.Question')); ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="<?php echo e(url('instructorquestion')); ?>" class="small-box-footer"> <?php echo e(__('adminstaticword.Moreinfo')); ?><i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
          <div class="inner">
            <h3>
            	<?php
            		$answer = App\Answer::all();
            		if(count($answer)>0){

            			echo count($answer);
            		}
            		else{

            			echo "0";
            		}
            	?>
            </h3>
            <p> <?php echo e(__('adminstaticword.Total')); ?> <?php echo e(__('adminstaticword.Answer')); ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="<?php echo e(url('instructoranswer')); ?>" class="small-box-footer"> <?php echo e(__('adminstaticword.Moreinfo')); ?><i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
  </div>
  <!-- /.row -->

	
</section>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/instructor/dashboard.blade.php ENDPATH**/ ?>