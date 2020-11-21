<?php $__env->startSection('title','Edit Coupon '); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="box-title">
              <?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Coupon')); ?>: <?php echo e($coupan->code); ?>

          </div>
        </div>
        <form action="<?php echo e(route('coupon.update',$coupan->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo e(method_field("PUT")); ?>


          <div class="box-body">
               
              <div class="form-group">
                <label><?php echo e(__('adminstaticword.CouponCode')); ?>: <span class="redstar">*</span></label>
                <input value="<?php echo e($coupan->code); ?>" type="text" class="form-control" name="code">
              </div>
              <div class="form-group">
                <label><?php echo e(__('adminstaticword.DiscountType')); ?>: <span class="redstar">*</span></label>
                
                  <select required="" name="distype" id="distype" class="form-control">
                    
                    <option <?php echo e($coupan->distype == 'fix' ? "selected" : ""); ?> value="fix"><?php echo e(__('adminstaticword.FixAmount')); ?></option>
                    <option <?php echo e($coupan->distype == 'per' ? "selected" : ""); ?> value="per">% <?php echo e(__('adminstaticword.Percentage')); ?></option>
                    
                  </select>
                
              </div>
              <div class="form-group">
                  <label><?php echo e(__('adminstaticword.Amount')); ?>: <span class="redstar">*</span></label>
                  <input type="text" value="<?php echo e($coupan->amount); ?>"  class="form-control" name="amount">
                
              </div>
              <div class="form-group">
                <label><?php echo e(__('adminstaticword.Linkedto')); ?>: <span class="redstar">*</span></label>
                
                  <select required="" name="link_by" id="link_by" class="form-control js-example-basic-single">
                    <option <?php echo e($coupan->link_by == 'course' ? "selected" : ""); ?> value="course"><?php echo e(__('adminstaticword.LinktoCourse')); ?></option>
                    <option <?php echo e($coupan->link_by == 'cart' ? "selected" : ""); ?> value="cart"><?php echo e(__('adminstaticword.LinktoCart')); ?></option>
                    <option <?php echo e($coupan->link_by == 'category' ? "selected" : ""); ?> value="category"><?php echo e(__('adminstaticword.LinktoCategory')); ?></option>
                  </select>
                
              </div>

              <div style="<?php echo e($coupan->link_by == 'course' ? "" : "display: none"); ?>" id="probox" class="form-group">
                <label><?php echo e(__('adminstaticword.SelectCourse')); ?>: <span class="redstar">*</span> </label>
                <br>
                <select id="pro_id" name="course_id" class="js-example-basic-single form-control">
                    <option value="none" selected disabled hidden> 
                       <?php echo e(__('adminstaticword.SelectanOption')); ?>

                    </option>
                    <?php $__currentLoopData = App\Course::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($product->type == 1): ?>
                        <option <?php echo e($coupan->course_id == $product->id ? 'selected' : ""); ?> value="<?php echo e($product->id); ?>"><?php echo e($product['title']); ?></option>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div style="<?php echo e($coupan->link_by == 'category' ? "" : "display: none"); ?>" id="catbox" class="form-group">
                <label><?php echo e(__('adminstaticword.SelectCategories')); ?>: <span class="redstar">*</span> </label>
                <br>
                <select style="width: 100%" id="cat_id" name="category_id" class="js-example-basic-single form-control">
                    <option value="none" selected disabled hidden> 
                      <?php echo e(__('adminstaticword.SelectanOption')); ?>

                    </option>
                    <?php $__currentLoopData = App\Categories::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php echo e($coupan->category_id == $category->id ? 'selected' : ""); ?> value="<?php echo e($category->id); ?>"><?php echo e($category['title']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div class="form-group">
                <label><?php echo e(__('adminstaticword.MaxUsageLimit')); ?>: <span class="redstar">*</span></label>
                <input value="<?php echo e($coupan->maxusage); ?>" type="number" min="1" class="form-control" name="maxusage">
              </div>
              <div style="<?php echo e($coupan->link_by=='product' ? "display:none" : ""); ?>" id="minAmount" class="form-group">
                <label><?php echo e(__('adminstaticword.MinAmount')); ?>: </label>
                <div class="input-group">
                  <?php
                      $currency = App\Currency::first();
                  ?> 
                  <span class="input-group-addon"><i class="<?php echo e($currency->icon); ?>"></i></span>
                  <input value="<?php echo e($coupan->minamount); ?>" type="number" min="0.0" value="0.00" step="0.1" class="form-control" name="minamount">
                </div>
              </div>
               <div class="form-group">
                <label><?php echo e(__('adminstaticword.ExpiryDate')); ?>: </label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input value="<?php echo e(date('Y-m-d',strtotime($coupan->expirydate))); ?>" id="expirydate" type="text" class="form-control" name="expirydate">
                </div>
              </div>
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-md btn-primary">
              <i class="fa fa-save"></i> <?php echo e(__('adminstaticword.Update')); ?>

            </button>
          </form>
          <a href="<?php echo e(route('coupon.index')); ?>" title="Cancel and go back" class="btn btn-md btn-default btn-flat"><i class="fa fa-reply"></i> <?php echo e(__('adminstaticword.Back')); ?></a>
          </div>
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
          $('#catbox').hide();
          $('#pro_id').attr('required','required');
        }else{
          $('#minAmount').show();
          $('#probox').hide();
          $('#catbox').show();
          $('#pro_id').removeAttr('required');
        }
    });

      $('#link_by').on('change',function(){
        var opt = $(this).val();
       
        if(opt == 'category'){
          $('#catbox').show();
          $('#probox').hide();
          $('#cat_id').attr('required','required');
        }else{
          $('#catbox').hide();
          $('#probox').show();
          $('#cat_id').removeAttr('required');
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

<?php echo $__env->make("admin/layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/coupan/edit.blade.php ENDPATH**/ ?>