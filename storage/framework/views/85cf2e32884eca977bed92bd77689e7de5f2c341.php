<?php $__env->startSection('title', 'Instructor Request - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.InstructorRequest')); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              
              <thead>
                <br>
                <br>
                <tr>
                	<th><?php echo e(__('adminstaticword.Image')); ?></th>
                  <th><?php echo e(__('adminstaticword.Name')); ?></th>
                  <th><?php echo e(__('adminstaticword.Email')); ?></th>
                  <th><?php echo e(__('adminstaticword.Detail')); ?></th>
                  <th><?php echo e(__('adminstaticword.Status')); ?></th>
                  <th><?php echo e(__('adminstaticword.View')); ?></th>
                  <th><?php echo e(__('adminstaticword.Delete')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <?php if($item->status == 'pending'): ?>
                  	<td><img src="<?php echo e(asset('images/instructor/'.$item->image)); ?>"></td> 
                    <td><?php echo e($item->fname); ?></td>
                    <td><?php echo e($item->email); ?></td>
                    <td><?php echo e(str_limit($item->detail, $limit= 50, $end = '...')); ?></td>
                    <td>
                      <?php if($item->status==1): ?>
                        <?php echo e(__('adminstaticword.Approved')); ?>

                      <?php else: ?>
                        <?php echo e(__('adminstaticword.Pending')); ?>

                      <?php endif; ?>
                    </td>
                    <td><a class="btn btn-primary btn-sm" href="<?php echo e(route('requestinstructor.edit',$item->id)); ?>"><?php echo e(__('adminstaticword.View')); ?></a></td>

                    <td><form  method="post" action="<?php echo e(url('requestinstructor/'.$item->id)); ?>

                          "data-parsley-validate class="form-horizontal form-label-left">
                          <?php echo e(csrf_field()); ?>

                          <?php echo e(method_field('DELETE')); ?>

                           <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                        </form>
                    </td>
                  <?php endif; ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
                </tr>
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
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/instructor/instructor_request/index.blade.php ENDPATH**/ ?>