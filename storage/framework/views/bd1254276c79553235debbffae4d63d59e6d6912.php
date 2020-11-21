<?php $__env->startSection('title', 'All Blog - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.Blog')); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            
            <thead>
              <a class="btn btn-info btn-sm" href="<?php echo e(url('blog/create')); ?>">
              <i class="glyphicon glyphicon-th-l">+<?php echo e(__('adminstaticword.Add')); ?></i></a>
              <br>
              <br>
              <p>You can enable blog in front by front setting >> widget settings</p>
              <br>
              <tr>
                <th>#</th>
                <th><?php echo e(__('adminstaticword.Image')); ?></th>
                <th><?php echo e(__('adminstaticword.User')); ?></th>
                <th><?php echo e(__('adminstaticword.Heading')); ?></th>
                <th><?php echo e(__('adminstaticword.Detail')); ?></th>
                <th><?php echo e(__('adminstaticword.Text')); ?></th>
                <th><?php echo e(__('adminstaticword.Approved')); ?></th>
                <th><?php echo e(__('adminstaticword.Status')); ?></th>
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
                <td>
                  <img src="images/blog/<?php echo e($item->image); ?>" class="img-responsive" >
                </td>
                
                <td><?php echo e($item->user->fname); ?></td>
                <td><?php echo e($item->heading); ?></td>
                <td><?php echo e(strip_tags(str_limit($item->detail, $limit = 200, $end = '...'))); ?></td>
                <td><?php echo e($item->text); ?></td>
                <td>
                  <form action="<?php echo e(route('blog.approved.quick',$item->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <button type="Submit" class="btn btn-xs <?php echo e($item->approved ==1 ? 'btn-success' : 'btn-danger'); ?>">
                      <?php if($item->approved ==1): ?>
                      <?php echo e(__('adminstaticword.Approved')); ?>

                      <?php else: ?>
                      <?php echo e(__('adminstaticword.Pending')); ?>

                      <?php endif; ?>
                    </button>
                  </form>
                <td>
                  <form action="<?php echo e(route('blog.status.quick',$item->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <button type="Submit" class="btn btn-xs <?php echo e($item->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                      <?php if($item->status ==1): ?>
                      <?php echo e(__('adminstaticword.Active')); ?>

                      <?php else: ?>
                      <?php echo e(__('adminstaticword.Deactive')); ?>

                      <?php endif; ?>
                    </button>
                  </form>
                </td>
                </td>
                <td><a class="btn btn-primary btn-sm" href="<?php echo e(route('blog.edit',$item->id)); ?>">
                  <i class="glyphicon glyphicon-pencil"></i></a>
                </td>
                <td>
                    <form  method="post" action="<?php echo e(url('blog/'.$item->id)); ?>

                      "data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>

                       <button  type="submit" class="btn btn-danger "><i class="fa fa-fw fa-trash-o"></i></button>
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
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/blog/index.blade.php ENDPATH**/ ?>