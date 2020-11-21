<?php $__env->startSection('title', 'All Report - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.ReportCourse')); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <br>
                <tr>
                  <th>#</th>
                  <th><?php echo e(__('adminstaticword.User')); ?></th>
                  <th><?php echo e(__('adminstaticword.Course')); ?></th>
                  <th><?php echo e(__('adminstaticword.Title')); ?></th>
                  <th><?php echo e(__('adminstaticword.Email')); ?></th>
                  <th><?php echo e(__('adminstaticword.Detail')); ?></th>
                  <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                  <th><?php echo e(__('adminstaticword.Delete')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $i++;?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo e($item->user['fname']); ?></td>
                    <td><?php echo e($item->courses['title']); ?></td>
                    <td><?php echo e($item->title); ?></td>
                    <td><?php echo e($item->email); ?></td>
                    <td><?php echo e(str_limit($item->detail, $limit=50, $end="...")); ?></td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="<?php echo e(url('user/course/report/'.$item->id)); ?>">
                      <i class="glyphicon glyphicon-pencil"></i></a>
                    </td>
                    <td>
                      <form  method="post" action="<?php echo e(url('user/course/report'. $item->id)); ?>

                        "data-parsley-validate class="form-horizontal form-label-left">
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/report_course/index.blade.php ENDPATH**/ ?>