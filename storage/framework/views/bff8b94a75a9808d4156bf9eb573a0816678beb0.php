<?php $__env->startSection('title', 'All Instructor - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">  <?php echo e(__('adminstaticword.PendingPayout')); ?></h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">

        <thead>
          <br>
          <br>
          <th>#</th>
          <th><?php echo e(__('adminstaticword.Instructor')); ?></th>
          <th><?php echo e(__('adminstaticword.View')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0;?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <?php $i++;?>
            <td><?php echo $i;?></td>
            <td><?php echo e($user->fname); ?></td>
             <td>
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('admin.pending', $user->id)); ?>">View Pending Payout</a>

                <a class="btn btn-success btn-sm" href="<?php echo e(route('admin.paid', $user->id)); ?>">View Paid Payout</a>
              </td>

            
          

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </tfoot>
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/revenue/index.blade.php ENDPATH**/ ?>