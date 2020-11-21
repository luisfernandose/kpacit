<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="box-body">
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
            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $i++;?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo e($report->user['fname']); ?></td>
                <td><?php echo e($report->courses['title']); ?></td>
                <td><?php echo e($report->title); ?></td>
                <td><?php echo e($report->email); ?></td>
                <td><?php echo e($report->detail); ?></td>
                <td>
                  <a class="btn btn-primary btn-sm" href="<?php echo e(url('reports/'.$report->id)); ?>">
                  <i class="glyphicon glyphicon-pencil"></i></a>
                </td>
                <td><form  method="post" action="<?php echo e(url('reports/'. $report->id)); ?>

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
        <br>
        <?php if(count($reports) == 0): ?>
      <div class="col-md-12 text-center">
      <?php echo e(__('adminstaticword.empty')); ?>

      </div>
      <?php endif; ?> 
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.row -->
</section>
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/course/reviewreport/index.blade.php ENDPATH**/ ?>