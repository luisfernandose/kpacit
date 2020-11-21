<?php $__env->startSection('title', 'Purchase History'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<!-- about-home start -->
<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white"><?php echo e(__('frontstaticword.PurchaseHistory')); ?></h1>
    </div>
</section> 
<!-- about-home start -->

<!-- about-home end -->
<section id="purchase-block" class="purchase-main-block">
	<div class="container">
		<div class="purchase-table table-responsive">
	        <table class="table">
			  <thead>
			    <tr>
	                <th class="purchase-history-heading"><?php echo e(__('frontstaticword.PurchaseHistory')); ?></th>
				    <th class="purchase-text"><?php echo e(__('frontstaticword.Enrollon')); ?></th>
				    <th class="purchase-text"><?php echo e(__('frontstaticword.EnrollEnd')); ?></th>
				    <th class="purchase-text"><?php echo e(__('frontstaticword.PaymentMode')); ?></th>
				    <th class="purchase-text"><?php echo e(__('frontstaticword.TotalPrice')); ?></th>
				    <th class="purchase-text"><?php echo e(__('frontstaticword.PaymentStatus')); ?>s</th>
				    <th class="purchase-text"><?php echo e(__('frontstaticword.Actions')); ?></th>
				    
			    </tr>
			  </thead>
				
				<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($order->user_id == Auth::User()->id): ?>
		            <div class="purchase-history-table">
		            	<tbody>
			            	<tr>
				    			<td >
				                    <div class="purchase-history-course-img">
				                    	<?php if($order->courses['preview_image'] !== NULL && $order->courses['preview_image'] !== ''): ?>
				                        	<a href="<?php echo e(route('user.course.show',['id' => $order->courses->id, 'slug' => $order->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'. $order->courses->preview_image)); ?>" class="img-fluid" alt="course"></a>
				                        <?php else: ?>
				                        	<a href="<?php echo e(route('user.course.show',['id' => $order->courses->id, 'slug' => $order->courses->slug ])); ?>"><img src="<?php echo e(Avatar::create($order->courses->title)->toBase64()); ?>" class="img-fluid" alt="course"></a>
				                        <?php endif; ?>

				                    </div>
				                    <div class="purchase-history-course-title">
				                        <a href="<?php echo e(route('user.course.show',['id' => $order->courses->id, 'slug' => $order->courses->slug ])); ?>"><?php echo e($order->courses->title); ?></a>
				                    </div>
				                </td>
				                <td>
				                   	<div class="purchase-text"><?php echo e(date('jS F Y', strtotime($order->created_at))); ?></div>			                   	
				                </td>

				                <td>
				                	<div class="purchase-text">
				                		<?php if($order->enroll_expire != NULL): ?>
				                            <?php echo e(date('jS F Y', strtotime($order->enroll_expire))); ?>

				                        <?php else: ?>
				                            -
				                        <?php endif; ?>
				                	</div>
				                </td>

				                <td>   
				                    <div class="purchase-text"><?php echo e($order->payment_method); ?></div>
				                </td>

				              
				                
				                <td>
				                	<?php if($order->coupon_discount == !NULL): ?>
				                    	<div class="purchase-text"><b><i class="fa <?php echo e($order->currency_icon); ?>"></i><?php echo e($order->total_amount - $order->coupon_discount); ?></b></div>
				                    <?php else: ?>
				                    	<div class="purchase-text"><b><i class="fa <?php echo e($order->currency_icon); ?>"></i><?php echo e($order->total_amount); ?></b></div>
				                    <?php endif; ?>

				                </td>

				                <td>
				                	<div class="purchase-text">
				                		<?php if($order->status ==1): ?>
				                            <?php echo e(__('frontstaticword.Recieved')); ?>

				                        <?php else: ?>
				                            <?php echo e(__('frontstaticword.Pending')); ?>

				                        <?php endif; ?>
				                	</div>
				                </td>
				               
				                <td>
				                    <div class="invoice-btn">
				                    	
				                    	<a href="<?php echo e(route('invoice.show',$order->id)); ?>"  class="btn btn-secondary"><?php echo e(__('frontstaticword.Invoice')); ?></a>
				                    	
				                    </div>

				                </td>
				                
				               
				            </tr>
				        </tbody>
		            </div>
	            <?php endif; ?>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </table>
        </div>
	</div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/front/purchase_history/purchase.blade.php ENDPATH**/ ?>