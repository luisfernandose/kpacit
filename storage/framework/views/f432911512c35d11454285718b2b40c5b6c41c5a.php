<?php $__env->startSection('title', 'All Questions - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Course Questions</h3>
        </div>
        <div class="box-header">
           <a class="btn btn-info btn-sm" href="<?php echo e(url('instructorquestion/create')); ?>">+ Add New Question</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Course</th>
            <th>Question</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $que): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($que->courses->title); ?></td>
              <td><?php echo e($que->question); ?></td> 
              <td>
                <form action="<?php echo e(route('ansr.quick',$que->id)); ?>" method="POST">
                  <?php echo e(csrf_field()); ?>

                  <button type="Submit" class="btn btn-xs <?php echo e($que->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                    <?php if($que->status ==1): ?>
                    Active
                    <?php else: ?>
                    Deactive
                    <?php endif; ?>
                  </button>
                </form>
              </td>
              <td>
                <a class="btn btn-success btn-sm" href="<?php echo e(url('instructorquestion/'.$que->id)); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
              </td>
              <td>
                <form  method="post" action="<?php echo e(url('instructorquestion/'.$que->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>


                  <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                </form>
              </td>
            </tr>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/instructor/question/index.blade.php ENDPATH**/ ?>