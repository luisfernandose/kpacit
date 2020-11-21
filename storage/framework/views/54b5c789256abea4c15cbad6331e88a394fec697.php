<?php $__env->startSection('title', 'View Childcategory - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.ChildCategory')); ?></h3>
        </div>
        <div class="box-header">
          <a href="<?php echo e(url('childcategory/create')); ?>" class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.AddChildCategory')); ?></a> 
          <br>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <tr>
                  
                  <th>#</th>
                  <th><?php echo e(__('adminstaticword.SubCategory')); ?></th>
                  <th><?php echo e(__('adminstaticword.ChildCategory')); ?></th>
                  <th><?php echo e(__('adminstaticword.Icon')); ?></th>
                  <th><?php echo e(__('adminstaticword.Status')); ?></th>
                  <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                  <th><?php echo e(__('adminstaticword.Delete')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                <?php $__currentLoopData = $childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo e($cat->subcategory->title); ?></td>
                  <td><?php echo e($cat->title); ?></td>
                  <td><i class="fa <?php echo e($cat->icon); ?>"></i></td>
                  <td>
                    <form action="<?php echo e(route('childcategory.quick',$cat->id)); ?>" method="POST">
                      <?php echo e(csrf_field()); ?>

                      <button type="Submit" class="btn btn-xs <?php echo e($cat->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                        <?php if($cat->status ==1): ?>
                        <?php echo e(__('adminstaticword.Active')); ?>

                        <?php else: ?>
                        <?php echo e(__('adminstaticword.Deactive')); ?>

                        <?php endif; ?>
                      </button>
                    </form>
                  </td>
                  <td>
                    <a class="btn btn-success btn-sm" href="<?php echo e(url('childcategory/'.$cat->id)); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                  </td>
                  <td>
                    <form  method="post" action="<?php echo e(url('childcategory/'.$cat->id)); ?>"data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>

                      <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i>
                      </button>
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/category/childcategory/index.blade.php ENDPATH**/ ?>