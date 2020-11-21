<?php $__env->startSection('title', 'Edit Course Language - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-xs-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Language')); ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
     
          <div class="box-body">
            <div class="form-group">
            <form id="demo-form" method="post" action="<?php echo e(url('courselang/'.$language->id)); ?>

                  "data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>


            <div class="row">
              <div class="col-md-9">
                <label for="exampleInputSlug"><?php echo e(__('adminstaticword.Name')); ?>: <sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="name" value="<?php echo e($language->name); ?>" id="exampleInputPassword1" placeholder="Please Enter Your  Language Name">
              </div>
           
              <div class="col-md-3">
                <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                <li class="tg-list-item">
                <input class="tgl tgl-skewed" id="xyz" type="checkbox" <?php echo e($language->status==1 ? 'checked' : ''); ?>>
                <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="xyz"></label>
                </li>
                <input type="hidden" name="status" value="<?php echo e($language->status); ?>" id="xyzz">
              </div>
            </div>
            <br>
            <div class="box-footer">
              <button type="submit" class="btn btn-md col-md-2 btn-primary"><?php echo e(__('adminstaticword.Submit')); ?></button>
            </div>
            </div>
          <!-- /.box-body -->
          
        </form>
      </div>
      <!-- /.box -->

      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/course_language/edit.blade.php ENDPATH**/ ?>