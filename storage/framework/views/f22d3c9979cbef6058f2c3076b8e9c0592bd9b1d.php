<?php $__env->startSection('title', 'Language - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Front Static Word Translation of  <?php echo e($findlang->name); ?> (<?php echo e($findlang->local); ?>)</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        
          <form action="<?php echo e(route('static.trans.update',$findlang->local)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <textarea name="transfile" class="form-control" name="" id="" cols="100" rows="20"><?php echo e($file); ?></textarea>
          

     
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-md btn-flat">
                <i class="fa fa-save"></i> Save Changes
              </button>

              <a href="<?php echo e(route('show.lang')); ?>" title="Cancel and go back" class="btn btn-md btn-default btn-flat">
                <i class="fa fa-reply"></i> <?php echo e(__('adminstaticword.Back')); ?>

              </a>
            </div>
            
          </form>
         
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
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/language/frontstatic/frontstatic.blade.php ENDPATH**/ ?>