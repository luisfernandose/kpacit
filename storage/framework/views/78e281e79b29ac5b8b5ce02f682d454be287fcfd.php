<?php $__env->startSection('title', 'Add Page - Admin'); ?>
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
          <h3 class="box-title"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Pages')); ?></h3>
        </div>
        <br>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="<?php echo e(url('page/')); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

          
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Title')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text"  class="form-control" name="title" placeholder="Enter Your Title"  id="exampleInputTitle" value="">
                </div>
                <div class="col-md-6">                 
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                  <li class="tg-list-item">
                    <input class="tgl tgl-skewed" id="123"  type="checkbox"/>
                    <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="123"></label>
                  </li>
                  <input type="hidden" name="status" value="0" id="1234">
                </div>
                
              </div>
              <br>

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                  <textarea name="details" id="editor2" rows="5" class="form-control" placeholder="Enter Your Details"></textarea>
                  <br>
                </div>
                
              </div>
              <br>

              <div class="box-footer">
               <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('adminstaticword.Submit')); ?></button>
              </div>
              
            </form>
          </div>
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


<?php $__env->startSection('scripts'); ?>

<script>
    $(function () {
      CKEDITOR.replace('editor2');
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/pages/page_form.blade.php ENDPATH**/ ?>