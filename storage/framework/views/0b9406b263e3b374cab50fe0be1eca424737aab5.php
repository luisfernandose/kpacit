<?php $__env->startSection('title', 'Payment Settings - Instructor'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
   	<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  	<div class="row">
        <div class="col-md-12">
        	<div class="box box-primary">
	           	<div class="box-header with-border">
              		<h3 class="box-title"><?php echo e(__('adminstaticword.Setuppaymentinformations')); ?></h3>
           		</div>
	          	<div class="panel-body">
	          		<form action="<?php echo e(route('instructor.payout', $user->id)); ?>" method="POST">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('POST')); ?>



		            <div class="row">
	                  <div class="col-md-6">
	                    <label for="type"><?php echo e(__('adminstaticword.Type')); ?>:</label>
	                    <select name="type" id="paytype" class="form-control js-example-basic-single">
	                      <option><?php echo e(__('adminstaticword.ChoosePaymentType')); ?></option>

	                      <?php if($isetting->paytm_enable == 1): ?>
	                      	<option <?php echo e($user->prefer_pay_method == 'paytm' ? 'selected' : ''); ?> value="paytm"><?php echo e(__('adminstaticword.Paytm')); ?></option>
	                      <?php endif; ?>
	                      <?php if($isetting->paypal_enable == 1): ?>
	                      <option <?php echo e($user->prefer_pay_method == 'paypal' ? 'selected' : ''); ?> value="paypal"><?php echo e(__('adminstaticword.Paypal')); ?></option>
	                      <?php endif; ?>
	                      <?php if($isetting->bank_enable == 1): ?>
	                      <option <?php echo e($user->prefer_pay_method == 'banktransfer' ? 'selected' : ''); ?> value="bank"><?php echo e(__('adminstaticword.BankTransfer')); ?></option>
	                      <?php endif; ?>
	                    </select>
	                  </div>
	              	</div>
	            	<br>
					
						
		              
		         
                        <div class="row">
			                <div class="col-md-6">

			                	<div id="paypalpayment" <?php if($user->prefer_pay_method == "banktransfer" || $user->prefer_pay_method == "paytm" ): ?> class="display-none" <?php endif; ?>>
			                	
			                	<h5 class="box-title"><?php echo e(__('adminstaticword.PAYPALPAYMENT')); ?></h5>
			                    <label for="pay_cid"><?php echo e(__('adminstaticword.PaypalEmail')); ?><sup class="redstar">*</sup></label>
			                    <input value="<?php echo e($user->paypal_email); ?>" autofocus name="paypal_email" type="text" class="form-control" placeholder="Enter Paypal Email"/>
			                    <br>
			                </div>
			                </div>

		              	</div>
		              	<br>
		             

						
		              
                        <div class="row">
			                <div class="col-md-6">

			                	<div id="paytmpayment" <?php if($user->prefer_pay_method == "banktransfer" || $user->prefer_pay_method == "paypal" ): ?> class="display-none" <?php endif; ?>>
			                	<h5 class="box-title"><?php echo e(__('adminstaticword.PAYTMPAYMENT')); ?></h5>
			                    <label for="pay_cid"><?php echo e(__('adminstaticword.PaytmMobileNo')); ?><sup class="redstar">*</sup></label>
			                    <input value="<?php echo e($user->paytm_mobile); ?>" autofocus name="paytm_mobile" type="text" class="form-control" placeholder="Enter Paytm Mobile No"/>
			                    <br>
			                </div>
			                </div>

		              	</div>
		              	<br>
						
		           
		              
                        <div class="row display-none">

                        	<div id="bankpayment" <?php if($user->prefer_pay_method == "paypal" || $user->prefer_pay_method == "paypal" ): ?> class="display-none" <?php endif; ?>>
			                <div class="col-md-6">
			                    <label for="pay_cid"><?php echo e(__('adminstaticword.AccountHolderName')); ?><sup class="redstar">*</sup></label>
			                    <input value="<?php echo e($user->bank_acc_name); ?>" autofocus name="bank_acc_name" type="text" class="form-control" placeholder="Enter Account Holder Name"/>
			                    <br>
			                </div>

			                <div class="col-md-6">
			                    <label for="pay_cid"><?php echo e(__('adminstaticword.BankName')); ?><sup class="redstar">*</sup></label>
			                    <input value="<?php echo e($user->bank_acc_no); ?>" autofocus name="bank_acc_no" type="text" class="form-control" placeholder="Enter Bank Name"/>
			                    <br>
			                </div>

			                <div class="col-md-6">
			                    <label for="pay_cid"><?php echo e(__('adminstaticword.IFCSCode')); ?><sup class="redstar">*</sup></label>
			                    <input value="<?php echo e($user->ifsc_code); ?>" autofocus name="ifsc_code" type="text" class="form-control" placeholder="Enter IFCS Code"/>
			                    <br>
			                </div>

			                <div class="col-md-6">
			                    <label for="pay_cid"><?php echo e(__('adminstaticword.AccountNumber')); ?><sup class="redstar">*</sup></label>
			                    <input value="<?php echo e($user->bank_name); ?>" autofocus name="bank_name" type="text" class="form-control" placeholder="Enter Account Number"/>
			                    <br>
			                </div>
			            </div>

		              	</div>
		              	<br>
		              	<br>

		                   

						
						<div class="box-footer">
		              		<button value="" type="submit"  class="btn btn-md col-md-3 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
		              	</div>

		          	</form>
	          	</div>
	      	</div>
      	</div>
    </div>
</section>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>

<script type="text/javascript">
	 $('#paytype').change(function() {
      
    if($(this).val() == 'paytm')
    {
      $('#paytmpayment').show();
      $('#paypalpayment').hide();
      $('#bankpayment').hide();
     
    }
    else if($(this).val() == 'paypal')
    { 
      $('#paytmpayment').hide();
      $('#paypalpayment').show();
      $('#bankpayment').hide();
    
    }
    else if($(this).val() == 'bank')
    {
      $('#paypalpayment').hide();
      $('#paytmpayment').hide();
      $('#bankpayment').show();
    }
    else
    {
      $('#videotype').hide();
      $('#videoUpload').hide();
      $('#zipUpload').hide();
      $('#videoURL').hide();
      $('#zipURL').hide();
      $('#pdfUpload').hide();
      $('#pdfChoose').hide();  
      $('#pdfURL').hide();
      $('#imageChoose').hide();
      $('#zipChoose').hide();
      $('#duration').hide();
      $('#subtitle').hide();
    }
  });

    
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/instructor/settings/pay_settings.blade.php ENDPATH**/ ?>