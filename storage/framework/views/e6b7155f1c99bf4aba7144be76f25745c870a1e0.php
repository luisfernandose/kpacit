<?php $__env->startSection('title', 'All Pending Payouts - Instructor'); ?>
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
          <th><?php echo e(__('adminstaticword.User')); ?></th>
          <th><?php echo e(__('adminstaticword.Course')); ?></th>
          <th><?php echo e(__('adminstaticword.TransactionId')); ?></th>
          <th><?php echo e(__('adminstaticword.TotalAmount')); ?></th>
          <th><?php echo e(__('adminstaticword.Delete')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0;?>
        <?php $__currentLoopData = $payout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <?php $i++;?>
          <td><?php echo $i;?></td>
            <td><?php echo e($pay->user->fname); ?></td>
            <td><?php echo e($pay->courses->title); ?></td>
            <td><?php echo e($pay->order->order_id); ?></td>
            <td><i class="fa <?php echo e($pay->currency_icon); ?>"></i><?php echo e($pay->instructor_revenue); ?></td> 
          

          <td><form  method="post" action="<?php echo e(url('instructoranswer/'.$pay->id)); ?>

              "data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('DELETE')); ?>

                <button  type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
            </form>
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/instructor/revenue/pending.blade.php ENDPATH**/ ?>