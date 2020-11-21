<?php $__env->startSection('title','Add New Coupon'); ?>

<?php $__env->startSection('body'); ?>

<section class="content">
  <div class="row">
    <div class="col-md-8">
    <div class="box box-primary">
    
    <div class="box-header with-border">
      <div class="box-title">
            <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Coupon')); ?>

      </div>
    </div>
    <form action="<?php echo e(route('coupon.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
      <div class="box-body">
           
          <div class="form-group">
            <label><?php echo e(__('adminstaticword.CouponCode')); ?>: <span class="redstar">*</span></label>
            <input required="" type="text" class="form-control" name="code">
          </div>
          <div class="form-group">
            <label><?php echo e(__('adminstaticword.DiscountType')); ?>: <span class="redstar">*</span></label>
            
              <select required="" name="distype" id="distype" class="form-control">
                
                <option value="fix"><?php echo e(__('adminstaticword.FixAmount')); ?></option>
                <option value="per">% <?php echo e(__('adminstaticword.Percentage')); ?></option>
                
              </select>
            
          </div>
          <div class="form-group">
              <label><?php echo e(__('adminstaticword.Amount')); ?>: <span class="redstar">*</span></label>
              <input required="" type="text"  class="form-control" name="amount">
            
          </div>
          <div class="form-group">
            <label><?php echo e(__('adminstaticword.Linkedto')); ?>: <span class="redstar">*</span></label>
            
              <select required="" name="link_by" id="link_by" class="form-control js-example-basic-single">
                <option value="none" selected disabled hidden> 
                   <?php echo e(__('adminstaticword.SelectanOption')); ?>

                </option>
                <option value="course"><?php echo e(__('adminstaticword.LinktoCourse')); ?></option>
                <option value="cart"><?php echo e(__('adminstaticword.LinktoCart')); ?></option>
                <option value="category"><?php echo e(__('adminstaticword.LinktoCategory')); ?></option>
              </select>
            
          </div>

          
          <div id="probox" class="form-group display-none">
            <label><?php echo e(__('adminstaticword.SelectCourse')); ?>: <span class="redstar">*</span> </label>
            <br>
            <select style="width: 100%" id="pro_id" name="course_id" class="js-example-basic-single form-control">
                <option value="none" selected disabled hidden> 
                   <?php echo e(__('adminstaticword.SelectanOption')); ?>

                </option>
                <?php $__currentLoopData = App\Course::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($product->type == 1): ?>
                    <option value="<?php echo e($product->id); ?>"><?php echo e($product['title']); ?></option>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
       

          <div id="catbox" class="form-group display-none">
            <label><?php echo e(__('adminstaticword.SelectCategories')); ?>: <span class="required">*</span> </label>
            <br>
            <select style="width: 100%" id="cat_id" name="category_id" class="js-example-basic-single form-control">
                <option value="none" selected disabled hidden> 
                   <?php echo e(__('adminstaticword.SelectanOption')); ?>

                </option>
                <?php $__currentLoopData = App\Categories::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($category->id); ?>"><?php echo e($category['title']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo e(__('adminstaticword.MaxUsageLimit')); ?>: <span class="redstar">*</span></label>
            <input required="" type="number" min="1" class="form-control" name="maxusage">
          </div>
          <div id="minAmount" class="form-group">
            <label><?php echo e(__('adminstaticword.MinAmount')); ?>: </label>
            <div class="input-group">
              <?php 
                $currency = App\Currency::first();
              ?>
              <span class="input-group-addon"><i class="<?php echo e($currency->icon); ?>"></i></span>
              <input type="number" min="0.0" value="0.00" step="0.1" class="form-control" name="minamount">
            </div>
          </div>
           <div class="form-group">
            <label><?php echo e(__('adminstaticword.ExpiryDate')); ?>: </label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input required="" id="expirydate" type="text" class="form-control" name="expirydate">
            </div>
          </div>
      </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-md btn-primary">
        <i class="fa fa-plus-circle"></i> <?php echo e(__('adminstaticword.Save')); ?>

      </button>
    </form>
      <a href="<?php echo e(route('coupon.index')); ?>" title="Cancel and go back" class="btn btn-md btn-default btn-flat">
        <i class="fa fa-reply"></i> <?php echo e(__('adminstaticword.Back')); ?>

      </a>
    </div>
    </div>       
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  (function($) {
  "use strict";
    
      $('#link_by').on('change',function(){
        var opt = $(this).val();
       
        if(opt == 'course'){
          $('#minAmount').hide();
          $('#probox').show();
          $('#minAmount').hide();
          $('#pro_id').attr('required','required');
        }else{
          $('#minAmount').show();
          $('#probox').hide();
          $('#pro_id').removeAttr('required');
        }
    });

      $('#link_by').on('change',function(){
        var opt = $(this).val();
       
        if(opt == 'category'){
          $('#catbox').show();
          $('#pro_id').attr('required','required');
        }else{
          $('#catbox').hide();
          $('#pro_id').removeAttr('required');
        }
    });

      $( function() {
        $( "#expirydate" ).datepicker({
          dateFormat : 'yy-m-d'
        });
      });

  })(jQuery);
    
</script>
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin/layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/coupan/add.blade.php ENDPATH**/ ?>