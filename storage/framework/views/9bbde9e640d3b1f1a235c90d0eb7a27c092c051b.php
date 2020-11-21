<?php $__env->startSection('title', 'View Order - Admin'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
   <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-12">
      	<div class="box box-primary">
           	<div class="box-header with-border">
            	<h3 class="box-title"><?php echo e(__('adminstaticword.Invoice')); ?></h3>
         		</div>
          	<div class="panel-body">
				
  					<div id="printableArea">
  						<!-- title row -->
  						<div class="row">
  						    <div class="col-xs-12">
  						      <h2 class="page-header">
  						        <?php if($setting->logo_type == 'L'): ?>
                        <div class="logo-invoice">
                          <img src="<?php echo e(asset('images/logo/'.$setting->logo)); ?>">
                        </div>
                      <?php else: ?>
                          <a href="<?php echo e(url('/')); ?>"><b><div class="logotext" ><?php echo e($setting->project_title); ?></div></b></a>
                      <?php endif; ?>
  						        <small><?php echo e(__('adminstaticword.Date')); ?>:&nbsp;<?php echo e(date('jS F Y', strtotime($show['created_at']))); ?></small>
  						      </h2>
  						    </div>
  						    <!-- /.col -->
  						</div>
  						<!-- info row -->
              <div class="view-order">
    						<div class="row invoice-info">
    						    <div class="col-sm-4 invoice-col">
    						      <?php echo e(__('adminstaticword.From')); ?>:
    						      <address>
    						        <strong><?php echo e($show->courses->user['fname']); ?></strong><br>
    						        Address: <?php echo e($show->courses->user['address']); ?><br>
                        <?php if($show->courses->user['state_id'] == !NULL): ?>
                        <?php echo e($show->courses->user->state['name']); ?>,
                        <?php endif; ?>
                        <?php if($show->courses->user['country_id'] == !NULL): ?>
                          <?php echo e($show->courses->user->country['name']); ?>

                        <?php endif; ?>
                        <br>
    						        <?php echo e(__('adminstaticword.Phone')); ?>:&nbsp;<?php echo e($show->courses->user['mobile']); ?><br>
    						        <?php echo e(__('adminstaticword.Email')); ?>:&nbsp;<?php echo e($show->courses->user['email']); ?>

    						      </address>
    						    </div>
    						    <!-- /.col -->
    						    <div class="col-sm-4 invoice-col">
    						      <?php echo e(__('adminstaticword.To')); ?>:
    						      <address>
    						        <strong><?php echo e($show->user['fname']); ?></strong><br>
                          <?php echo e(__('adminstaticword.Address')); ?>: <?php echo e($show->user['address']); ?><br>
                        <?php if($show->user['state_id'] == !NULL): ?>
                          <?php echo e($show->user->state['name']); ?>,
                        <?php endif; ?>
                        <?php if($show->user['country_id'] == !NULL): ?>
                          <?php echo e($show->user->country['name']); ?><br>
                        <?php endif; ?>
    						          <?php echo e(__('adminstaticword.Phone')); ?>:&nbsp;<?php echo e($show->user['mobile']); ?><br>
    						          <?php echo e(__('adminstaticword.Email')); ?>:&nbsp;<?php echo e($show->user['email']); ?>

    						      </address>
    						    </div>
    						    <!-- /.col -->
    						    <div class="col-sm-4 invoice-col">
    						      <br>
                      <b><?php echo e(__('adminstaticword.OrderID')); ?>:</b> <?php echo e($show['order_id']); ?><br>
    						      <b><?php echo e(__('adminstaticword.TransactionId')); ?>:</b>&nbsp;<?php echo e($show['transaction_id']); ?><br>
    						      <b><?php echo e(__('adminstaticword.PaymentMethod')); ?>:</b>&nbsp;<?php echo e($show['payment_method']); ?><br>
    						      <b><?php echo e(__('adminstaticword.Currency')); ?>:</b>&nbsp;<?php echo e($show['currency']); ?>

                      <b><?php echo e(__('frontstaticword.PaymentStatus')); ?>:</b> 
                      <?php if($show->status ==1): ?>
                        <?php echo e(__('adminstaticword.Recieved')); ?>

                      <?php else: ?> 
                        <?php echo e(__('adminstaticword.Pending')); ?>

                      <?php endif; ?>
                      </br>
                      <b><?php echo e(__('adminstaticword.Enrollon')); ?>:</b> <?php echo e(date('jS F Y', strtotime($show['created_at']))); ?></br>
                      <b>
                        <?php if($show->enroll_expire != NULL): ?>
                          <?php echo e(__('adminstaticword.EnrollEnd')); ?>:</b> <?php echo e(date('jS F Y', strtotime($show['enroll_expire']))); ?></br>
                        <?php endif; ?>
                        <br>
    						    </div>
    						    <!-- /.col -->
    						</div>
              </div>
  						<!-- /.row -->
  		          		
          		<div class="order-table">
          			<table class="table table-striped">
  							  <thead>
  							    <tr>
  							      <th><?php echo e(__('adminstaticword.Course')); ?></th>
  							      <th><?php echo e(__('adminstaticword.Instructor')); ?></th>
                      <th><?php echo e(__('adminstaticword.Currency')); ?></th>
                      <?php if($show->coupon_discount != 0): ?>
                      <th><?php echo e(__('adminstaticword.CouponDiscount')); ?></th>
                      <?php endif; ?>
  							      <th><?php echo e(__('adminstaticword.Total')); ?></th>
  							    </tr>
  							  </thead>
  							  <tbody>
  							    <tr>
  							      <td><?php echo e($show->courses['title']); ?></td>
  							      <td><?php echo e($show->courses->user['email']); ?></td>
                      <td><?php echo e($show['currency']); ?></td>

                      <?php if($show->coupon_discount != 0): ?>
                      <td>
                        (-)&nbsp;<i class="<?php echo e($show['currency_icon']); ?>"></i><?php echo e($show['coupon_discount']); ?>

                      </td>
                      <?php endif; ?>

  							      <td>
                        <?php if($show->coupon_discount == !NULL): ?>
                          <i class="fa <?php echo e($show['currency_icon']); ?>"></i><?php echo e($show['total_amount'] - $show['coupon_discount']); ?>

                        <?php else: ?>
                          <i class="fa <?php echo e($show['currency_icon']); ?>"></i><?php echo e($show['total_amount']); ?>

                        <?php endif; ?>
                      </td>
  							    </tr>
  							  </tbody>
  							</table>
          		</div>

            </div>
  					
  					<input type="button" class="btn btn-primary"  onclick="printDiv('printableArea')" value="Print Invoice" />

          	</div>
      	</div>
    	</div>
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
  	});
</script>

<script lang='javascript'>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	}
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/order/view.blade.php ENDPATH**/ ?>