<?php $__env->startSection('title', 'All Faq - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.FAQStudent')); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <a href="<?php echo e(url('faq/create')); ?>" class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.Add')); ?></a> 
              <br>
              <br>
              <tr>
                <th>#</th>
                <th><?php echo e(__('adminstaticword.Title')); ?></th>
                <th><?php echo e(__('adminstaticword.Detail')); ?></th>
                <th><?php echo e(__('adminstaticword.Status')); ?></th>
                <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                <th><?php echo e(__('adminstaticword.Delete')); ?></th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($p->title); ?></td>                 
                <td><?php echo e(str_limit(strip_tags($p->details), $limit = 50, $end = '...')); ?></td>
                <td>
                  <form action="<?php echo e(route('faq.quick',$p->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <button type="Submit" class="btn btn-xs <?php echo e($p->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                      <?php if($p->status ==1): ?>
                      <?php echo e(__('adminstaticword.Active')); ?>

                      <?php else: ?>
                      <?php echo e(__('adminstaticword.Deactive')); ?>

                      <?php endif; ?>
                    </button>
                  </form>
                </td>
                <td><a class="btn btn-success btn-sm" href="<?php echo e(url('faq/'.$p->id.'/edit')); ?>">
                    <i class="glyphicon glyphicon-pencil"></i></a>
                </td>
                <td>
                  <form  method="post" action="<?php echo e(url('faq/'.$p->id)); ?>"
                      data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>

                    <button type="submit" class="btn btn-danger">
                      <i class="fa fa-fw fa-trash-o"></i>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/faq/index.blade.php ENDPATH**/ ?>