<?php $__env->startSection('title', 'Facts Slider - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.FactsSlider')); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            
            <thead>
              <a class="btn btn-info btn-sm" href="<?php echo e(url('facts/create')); ?>">
              <i class="glyphicon glyphicon-th-l">+ <?php echo e(__('adminstaticword.Add')); ?></i></a>
              <br>
              <br>
              <tr>
                <th>#</th>
                <th><?php echo e(__('adminstaticword.Icon')); ?></th>
                <th><?php echo e(__('adminstaticword.Heading')); ?></th>
                <th><?php echo e(__('adminstaticword.SubHeading')); ?></th>
                <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                <th><?php echo e(__('adminstaticword.Delete')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=0;?>
              <?php $__currentLoopData = $facts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $i++;?>
              <tr>
                <td><?php echo $i;?></td>
                <td><i class="fa <?php echo e($fact->icon); ?>"></i></td>
                <td><?php echo e($fact->heading); ?></td>
                <td><?php echo e($fact->sub_heading); ?></td>
              
                <td>
                  <a class="btn btn-primary btn-sm" href="<?php echo e(route('facts.edit',$fact->id)); ?>">
                  <i class="glyphicon glyphicon-pencil"></i></a>
                </td>

                <td><form  method="post" action="<?php echo e(url('facts/'.$fact->id)); ?>

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
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/slider_facts/index.blade.php ENDPATH**/ ?>