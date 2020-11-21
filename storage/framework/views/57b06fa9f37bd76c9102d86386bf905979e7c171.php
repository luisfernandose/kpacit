<?php $__env->startSection('title', 'All Message - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.AllMessage')); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            
            <thead>
              <br>
              <br>
              <tr>
                <th><?php echo e(__('adminstaticword.Name')); ?></th>
                <th><?php echo e(__('adminstaticword.Phone')); ?></th>
                <th><?php echo e(__('adminstaticword.Email')); ?></th>
                <th><?php echo e(__('adminstaticword.Message')); ?></th>
                <th><?php echo e(__('adminstaticword.View')); ?></th>
                <th><?php echo e(__('adminstaticword.Delete')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($item->fname); ?></td>
                <td><?php echo e($item->mobile); ?></td>
                <td><?php echo e($item->email); ?></td>
                <td><?php echo e(str_limit($item->message, $limit = 50, $end = '...')); ?></td>
                <td><a class="btn btn-primary btn-sm" href="<?php echo e(route('usermessage.edit',$item->id)); ?>"><?php echo e(__('adminstaticword.View')); ?></a></td>

                <td>
                  <form  method="post" action="<?php echo e(url('usermessage/'.$item->id)); ?>

                      "data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>

                       <button  type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                  </form>
                </td>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
              </tr>
            </tfoot>
          </table>
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
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/contact/index.blade.php ENDPATH**/ ?>