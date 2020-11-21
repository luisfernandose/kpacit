<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>
<div class="modal fade" id="myModal9" z-index="1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo e(__('adminstaticword.AddCategory')); ?></h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('cat.store')); ?>" method="POST">
          <?php echo e(csrf_field()); ?>

          <label for="category"><?php echo e(__('adminstaticword.Name')); ?>:<sup class="redstar">*</sup></label>
          <input required placeholder="Enter Category name" type="text" class="form-control" name="category">
          <br>

          <div class="col-md-12 form-group">
                   
            <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
            <br>
            <li class="tg-list-item">
              <input class="tgl tgl-skewed" id="c1001"  type="checkbox"/>
              <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="c1001"></label>
            </li>
            <input type="hidden" name="status" value="0" id="t1001">
          </div>
          <input type="submit" value="Save" class="btn btn-md btn-primary">
        </form>
      </div>

    </div>
  </div>
</div><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/category/subcategory/cat.blade.php ENDPATH**/ ?>