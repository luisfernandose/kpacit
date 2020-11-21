<?php $__env->startSection('title', 'Add Subcategory - Admin'); ?>
<?php $__env->startSection('body'); ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>
<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <!-- left column -->
    <div class="col-xs-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.AddSubCategory')); ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="<?php echo e(url('subcategory/')); ?>" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              <?php echo e(csrf_field()); ?>


              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Category')); ?></label>
                  <select name="category_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <div class="col-md-5">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Category')); ?></label>
                  <br>
                  <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#myModal9" title="AddCategory"  class="btn btn-md btn-primary col-md-5"><?php echo e(__('adminstaticword.Add')); ?></button>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.SubCategory')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle" placeholder="Enter Your subcategory" value="">
                </div>
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Icon')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control icp-auto icp" name="icon" id="exampleInputTitle" placeholder="Enter Your icon" value="">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                  <li class="tg-list-item">              
                    <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" >
                    <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
              </div>
              <br>
         
              <div class="box-footer">
                <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
              </div>
       
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

<?php echo $__env->make('admin.category.subcategory.cat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/category/subcategory/insert.blade.php ENDPATH**/ ?>