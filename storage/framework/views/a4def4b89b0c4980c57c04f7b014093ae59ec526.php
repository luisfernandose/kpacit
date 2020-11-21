<?php $__env->startSection('title', 'Payment - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">  <?php echo e(__('adminstaticword.PaytoInstructor')); ?></h3>
        </div>
        <div class="box-body">

          <div class="view-order">
            <div class="row">
              <div class="col-md-12">
                <b>Instructor </b>:  <?php echo e($user->fname); ?>

                <br>
                <b>Total Instructor Revenue</b>:  <?php echo e($total); ?>

                <br>
                
              </div>
            </div>
            <br>
          </div>
          
        <?php if($user->prefer_pay_method == "paypal"): ?>
          <form method="post" action="<?php echo e(route('admin.paypal', $user->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>


              <input type="hidden" value="<?php echo e($total); ?>" name="total" class="form-control">
              
              <div class="display-none">
              <?php $__currentLoopData = $allchecked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checked): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <label >
                  <input type="hidden" name="checked[]" value="<?php echo e($checked); ?>">
                  <?php echo e($checked); ?>

               </label>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
             
              <b>PayPal Email</b>:  <?php echo e($user->paypal_email); ?>

              <br>
              <br>
               
            <button type="submit" class="btn btn-md col-md-3 btn-secondary">Pay With Paypal</button>
          </form>
        <?php endif; ?>


        <?php if($user->prefer_pay_method == "banktransfer"): ?>
          <form method="post" action="<?php echo e(route('admin.banktransfer', $user->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>


              <input type="hidden" value="<?php echo e($total); ?>" name="total" class="form-control">
              
              <div class="display-none">
              <?php $__currentLoopData = $allchecked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checked): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <label >
                  <input type="hidden" name="checked[]" value="<?php echo e($checked); ?>">
                  <?php echo e($checked); ?>

               </label>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
             
              <b>Bank Transfer</b>: 

              <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Account holder name:</b>&nbsp;<?php echo e($user['bank_acc_name']); ?></li>
                <li class="list-group-item"><b>Bank name:</b>&nbsp;<?php echo e($user['bank_name']); ?></li>
                <li class="list-group-item"><b>IFCS Code</b>:&nbsp;<?php echo e($user[' ifsc_code']); ?></li>
                <li class="list-group-item"><b>Bank cccount number:</b>&nbsp;<?php echo e($user['bank_acc_no']); ?></li>
              </ul>
                 
              <br>
               
            <button type="submit" class="btn btn-md col-md-3 btn-secondary">Pay to Instructor</button>
          </form>
        <?php endif; ?>


        <?php if($user->prefer_pay_method == "paytm"): ?>
          <form method="post" action="<?php echo e(route('admin.paytm', $user->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>


              <input type="hidden" value="<?php echo e($total); ?>" name="total" class="form-control">
              
              <div class="display-none">
              <?php $__currentLoopData = $allchecked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checked): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <label >
                  <input type="hidden" name="checked[]" value="<?php echo e($checked); ?>">
                  <?php echo e($checked); ?>

               </label>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
             
              <b>Paytm Mobile</b>:  <?php echo e($user->paytm_mobile); ?>

              <p>Do Manual payment to this paytm mobile number</p>
              <br>
              <br>
               
            <button type="submit" class="btn btn-md col-md-3 btn-secondary">Pay With Paytm</button>
          </form>
        <?php endif; ?>
      
       
          
          
         
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


<?php $__env->startSection('scripts'); ?>
  

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/revenue/payment.blade.php ENDPATH**/ ?>