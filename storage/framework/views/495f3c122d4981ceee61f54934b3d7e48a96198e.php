<?php $__env->startSection('body'); ?>
<?php $__env->startSection("title","Edit Language"); ?>

<section class="content">
   <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  	<div class="row">
	    <div class="col-md-12">
	      <div class="box box-primary">

	        <div class="box-header with-border">
	          <h3 class="box-title"> <?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Language')); ?></h3>
	        </div>
	        <div class="panel-body">


	            <form id="demo-form2" method="post" action="<?php echo e(url('languages')); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
	                <?php echo e(csrf_field()); ?>

	            
	              <div class="row">
	                <div class="col-md-5">
	                  <label for="local"><?php echo e(__('adminstaticword.Local')); ?>:<sup class="redstar">*</sup></label>
	                  <input class="form-control" type="text" name="local" value="<?php echo e($language->local); ?>" placeholder="Please enter language local name" required>
	                </div>
	                <div class="col-md-5">
	                  <label for="name"><?php echo e(__('adminstaticword.Name')); ?>:<sup class="redstar">*</sup></label>
	                  <input type="text" class="form-control" name="name" value="<?php echo e($language->name); ?>" id="sub_heading" placeholder="Please enter language name eg:English" required>
	                </div>
	                <div class="col-md-2">
	                  	<label for=""><?php echo e(__('adminstaticword.SetDefault')); ?></label>
		              	<br>
		              	<label class="switch">
		                     <input name="def" <?php echo e($language->def==1 ? "checked" : ""); ?> type="checkbox" class="checkbox-switch" id="logo_chk">
		                    <span class="slider round"></span>
		                </label>
	                </div>
	            </div>
	              <br>

	              
	              <div class="box-footer">
	                <button type="submit" class="btn btn-md btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
	              </div>
	              
	         
	            </form>
	        </div>
	        <!-- /.panel body -->
	      </div>
	      <!-- /.box -->
	    </div>
	    <!--/.col (right) -->
  	</div>
  	<!-- /.row -->
</section> 

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/language/edit.blade.php ENDPATH**/ ?>