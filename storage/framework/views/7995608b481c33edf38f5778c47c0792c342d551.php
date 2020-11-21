<div class="form-group<?php echo e($errors->has('css') ? ' has-error' : ''); ?>">
    <form action="<?php echo e(route('css.store')); ?>" method="POST">
      <?php echo e(csrf_field()); ?>

        <label for="css"><?php echo e(__('adminstaticword.CustomCSS')); ?>:</label>
        <small class="text-danger"><?php echo e($errors->first('css','CSS Cannot be blank !')); ?></small>
        <textarea placeholder="a {
          color:red;
        }" id="he" class="form-control" name="css" rows="10" cols="30"><?php echo e($css); ?></textarea>
    	<br>
        <button type="submit" class="btn btn-md btn-primary">
        	<i class="fa fa-save"></i> <?php echo e(__('adminstaticword.ADDCSS')); ?>

        </button>
    </form>
</div>
<br>
<div class="form-group<?php echo e($errors->has('js') ? ' has-error' : ''); ?>">
    <form action="<?php echo e(route('js.store')); ?>" method="POST">
      <?php echo e(csrf_field()); ?>

        <label for="js"><?php echo e(__('adminstaticword.CustomJS')); ?>:</label>
        <small class="text-danger"><?php echo e($errors->first('js','Javascript Cannot be blank !')); ?></small>
        <textarea placeholder="$(document).ready(function{
          //code
        });" class="form-control" name="js" rows="10" cols="30"><?php echo e($js); ?></textarea>
    	<br>
        <button type="submit" class="btn btn-md btn-primary">
        	<i class="fa fa-save"></i> <?php echo e(__('adminstaticword.ADDJS')); ?>

        </button>
    </form>
</div><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/setting/customstyle.blade.php ENDPATH**/ ?>