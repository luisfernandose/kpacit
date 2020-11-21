<?php $__env->startSection('title', 'Edit Slider - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Slider')); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post"  action="<?php echo e(url('slider/'.$cate->id)); ?>

              "data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

           

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Heading')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="heading" id="exampleInputTitle" value="<?php echo e($cate->heading); ?>">
                </div>
          
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.SubHeading')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="sub_heading" id="exampleInputTitle" value="<?php echo e($cate->sub_heading); ?>">
                </div>
              </div>
              <br> 

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.SearchText')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="search_text" id="exampleInputTitle" value="<?php echo e($cate->search_text); ?>">
                </div>
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="detail" id="exampleInputTitle" value="<?php echo e($cate->detail); ?>">
                </div>
              </div>
              <br> 

              <div class="row">
                <div class="col-md-6">
                  <label><?php echo e(__('adminstaticword.Image')); ?></label>
                    <input type="file" name="image"  id="image"><img src="<?php echo e(url('/images/slider/'.$cate->image)); ?>"/>
                  </br>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                  <li class="tg-list-item">              
                    <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> >
                    <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
              </div>
              <br> 
           
              <div class="box-footer">
                <button type="submit" class="btn btn-lg col-md-2 btn-primary">+ <?php echo e(__('adminstaticword.Save')); ?></button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col -->
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/slider/update.blade.php ENDPATH**/ ?>