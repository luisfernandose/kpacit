<?php $__env->startSection('title', 'All Order - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo e(__('adminstaticword.Order')); ?></h3>
        </div>
        <div class="box-header with-border">

          <a class="btn btn-info btn-md" href="<?php echo e(route('order.create')); ?>">
          <i class="glyphicon glyphicon-th-l">+</i> Enroll&nbsp;User</a>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <br>
                <br>
                <tr>
                  <th>#</th>
                  <th><?php echo e(__('adminstaticword.User')); ?></th>
                  <th><?php echo e(__('adminstaticword.Course')); ?></th>
                  <th><?php echo e(__('adminstaticword.TransactionId')); ?></th>
                  <th><?php echo e(__('adminstaticword.PaymentMethod')); ?></th>
                  <th><?php echo e(__('adminstaticword.TotalAmount')); ?></th>
                  <th><?php echo e(__('adminstaticword.Status')); ?></th>
                  <th><?php echo e(__('adminstaticword.View')); ?></th>
                  <th><?php echo e(__('adminstaticword.Delete')); ?></th>
                </tr>
              </thead>
              <tbody>
              <?php $i=0;?>
              <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo e($order->user['fname'] ?? ' '); ?></td>                 
                  <td><?php echo e($order->courses['title'] ?? ' '); ?></td>
                  <td><?php echo e($order->transaction_id); ?></td>
                  <td><?php echo e($order->payment_method); ?></td>
                 

                  <?php if($order->coupon_discount == !NULL): ?>
                    <td><i class="<?php echo e($order->currency_icon); ?>"></i><?php echo e($order->total_amount - $order->coupon_discount); ?></td>
                  <?php else: ?>
                    <td><i class="fa <?php echo e($order->currency_icon); ?>"></i><?php echo e($order->total_amount); ?></td>
                  <?php endif; ?>

                  <td>
                    <form action="<?php echo e(route('order.quick',$order->id)); ?>" method="POST">
                      <?php echo e(csrf_field()); ?>

                      <button  type="Submit" class="btn btn-xs <?php echo e($order->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                        <?php if($order->status ==1): ?>
                          <?php echo e(__('adminstaticword.Active')); ?>

                        <?php else: ?>
                          <?php echo e(__('adminstaticword.Deactive')); ?>

                        <?php endif; ?>
                      </button>
                    </form>
                  </td>
                  <td><a class="btn btn-primary btn-sm" href="<?php echo e(route('view.order',$order->id)); ?>"><?php echo e(__('adminstaticword.View')); ?></a>
                  </td>
                  <td>
                    <form  method="post" action="<?php echo e(url('order/'.$order->id)); ?>"
                        data-parsley-validate class="form-horizontal form-label-left">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('DELETE')); ?>

                      <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-fw fa-trash-o"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/order/index.blade.php ENDPATH**/ ?>