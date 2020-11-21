<?php $__env->startSection('title', 'All Announcement - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo e(__('adminstaticword.Course')); ?> <?php echo e(__('adminstaticword.Announcement')); ?></h3>
        </div>
        <div class="box-header">
           <a class="btn btn-info btn-sm" href="<?php echo e(url('instructor/announcement/create')); ?>">+  <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Announcement')); ?></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">

              <thead>
                <br>
                <th>#</th>
                <th><?php echo e(__('adminstaticword.Announcement')); ?></th>
                <th><?php echo e(__('adminstaticword.Course')); ?></th>
                <th><?php echo e(__('adminstaticword.Status')); ?></th>
                <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                <th><?php echo e(__('adminstaticword.Delete')); ?></th>
              </tr>
              </thead>
              <tbody>
              <?php $i=0;?>
              <?php $__currentLoopData = $announs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <?php $i++;?>
                <td><?php echo $i;?></td>
                  <td><?php echo e($announ->announsment); ?></td>
                  <td><?php echo e($announ->courses->title); ?></td>
                <td>
                    <?php if($announ->status==1): ?>
                      <?php echo e(__('adminstaticword.Active')); ?>

                    <?php else: ?>
                     <?php echo e(__('adminstaticword.Deactive')); ?>

                    <?php endif; ?>                      
                </td>
                
                <td>
                  <a class="btn btn-primary btn-sm" href="<?php echo e(url('instructor/announcement/'.$announ->id)); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                </td>

                <td><form  method="post" action="<?php echo e(url('instructor/announcement/'.$announ->id)); ?>

                    "data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>

                      <button  type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/instructor/announcement/index.blade.php ENDPATH**/ ?>