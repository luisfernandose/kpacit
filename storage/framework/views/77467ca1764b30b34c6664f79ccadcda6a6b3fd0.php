<?php $__env->startSection('title', 'Cart'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- about-home start -->
<section id="wishlist-home" class="wishlist-home-main-block">
    <div class="container">
        <h1 class="wishlist-home-heading text-white"><?php echo e(__('frontstaticword.ShoppingCart')); ?></h1>
    </div>
</section> 
<!-- about-home end -->
<section id="cart-block" class="cart-main-block">
	<div class="container">
		<div class="cart-items btm-30">
			<h4 class="cart-heading">
        		<?php
                    $item = App\Cart::where('user_id', Auth::User()->id)->get();
                    if(count($item)>0){

                        echo count($item);
                    }
                    else{

                        echo "0";
                    }
                ?>
            	Courses in Cart
            </h4>
            <?php if(count($item)>0): ?>
		        <div class="row">
		            <div class="col-lg-9 col-md-9">
	        			<?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    				<div class="cart-add-block">
			                    <div class="row no-gutters">
			                        <div class="col-lg-2 col-sm-6 col-5">
			                            <div class="cart-img">
			                            	<?php if($cart->courses['preview_image'] !== NULL && $cart->courses['preview_image'] !== ''): ?>
			                                	<a href="<?php echo e(route('user.course.show',['id' => $cart->courses->id, 'slug' => $cart->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'. $cart->courses->preview_image)); ?>" class="img-fluid" alt="blog"></a>
			                                <?php else: ?>
			                                	<a href="<?php echo e(route('user.course.show',['id' => $cart->courses->id, 'slug' => $cart->courses->slug ])); ?>"><img src="<?php echo e(Avatar::create($cart->courses->title)->toBase64()); ?>" class="img-fluid" alt="blog"></a>
			                                <?php endif; ?>

			                            </div>
			                        </div>
			                        <div class="col-lg-4 col-sm-6 col-6">
			                        	<div class="cart-course-detail">
				                            <div class="cart-course-name"><a href="<?php echo e(route('user.course.show',['id' => $cart->courses->id, 'slug' => $cart->courses->slug ])); ?>"><?php echo e(str_limit($cart->courses->title, $limit = 50, $end = '...')); ?></a></div>

				                            <div class="cart-course-update"> <?php echo e($cart->courses->user->fname); ?></div>
				                        </div>
			                        </div>
			                        <div class="col-lg-2 offset-lg-1 col-sm-6 col-6">
			                            <div class="cart-actions">
		                                    <span>
		                                    	<form id="cart-form" method="post" action="<?php echo e(url('removefromcart', $cart->id)); ?>" 
					                            	data-parsley-validate class="form-horizontal form-label-left">
					    	                        <?php echo e(csrf_field()); ?>

					    	                        
					    	                      <button  type="submit" class="cart-remove-btn display-inline" title="Remove From cart"><?php echo e(__('frontstaticword.Remove')); ?></button>
					    	                    </form>
											</span>
											<span>
												<form id="wishlist-form" method="post" action="<?php echo e(url('show/wishlist', $cart->id )); ?>" data-parsley-validate class="form-horizontal form-label-left">
					                                <?php echo e(csrf_field()); ?>


					                                <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
					                                <input type="hidden" name="course_id"  value="<?php echo e($cart->course_id); ?>" />

					                                <button class="cart-wishlisht-btn" title="Add to wishlist" type="submit"><?php echo e(__('frontstaticword.AddtoWishlist')); ?></button>
					                            </form>
											</span>
											
			                            </div>
			                        </div>
			                        <div class="col-lg-3 col-sm-6 col-6">
			                        	<div class="row">
			                        		<div class="col-lg-10 col-10">
					                            <div class="cart-course-amount">
					                                <ul>
					                                	<?php
			                                                $currency = App\Currency::first();
			                                            ?> 
			                                            <?php if($cart->courses->discount_price == !NULL): ?>

					                                    	<li><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($cart->courses->discount_price); ?></li>
					                                    	<li><s><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($cart->courses->price); ?></s></li>
					                                    <?php else: ?>
					                                    	<li><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($cart->courses->price); ?></li>
					                                    <?php endif; ?>
					                                    
					                                </ul>
					                            </div>
					                        </div>
					                        <div class="col-lg-2 col-2">
					                        	<?php if($cart->disamount == !NULL): ?>
						                        	<?php if(Session::has('coupanapplied')): ?>
						                            <div class="cart-coupon">
				                    					<a href="" class="btn btn-link top" data-toggle="tooltip" data-placement="top" title="<?php echo e(Session::get('coupanapplied')['msg']); ?>"><i class="fa fa-tag"></i></a>
				                    				</div>
				                    				<?php endif; ?>
				                    			<?php endif; ?>
			                    			</div>
	                    				</div>
			                        </div>
			                    </div>
		                	</div>
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </div>
	                <div class="col-lg-3 col-md-3">
	                	<?php if(! $carts->isEmpty()): ?>
		                	<div class="cart-total">
								<?php
			                        $cartitems = App\Cart::where('user_id', Auth::User()->id)->first();
			                    ?>
			                    <?php if($cartitems == NULL): ?>
			                        <?php echo e(__('frontstaticword.empty')); ?>

			                    <?php else: ?>

			                    <div class="cart-price-detail">
			                		<h4 class="cart-heading"><?php echo e(__('frontstaticword.Total')); ?>:</h4>
			                		<ul>
			                            <li><?php echo e(__('frontstaticword.TotalPrice')); ?><span class="categories-count"><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($price_total); ?></span></li>
			                            <li><?php echo e(__('frontstaticword.OfferDiscount')); ?><span class="categories-count">-&nbsp;<i class="<?php echo e($currency->icon); ?>"></i><?php echo e($price_total - $offer_total); ?></span></li>
			                            <li><?php echo e(__('frontstaticword.CouponDiscount')); ?>

			                            	<?php if( $cpn_discount == !NULL): ?>
			                            		<span class="categories-count">-&nbsp;<i class="<?php echo e($currency->icon); ?>"></i><?php echo e($cpn_discount); ?></span>
			                            	<?php else: ?>
			                            		<span class="categories-count"><a href="#" data-toggle="modal" data-target="#myModalCoupon" title="report"><?php echo e(__('frontstaticword.ApplyCoupon')); ?></a></span>
			                            	<?php endif; ?>
			                            </li>
			                            <li><?php echo e(__('frontstaticword.DiscountPercent')); ?><span class="categories-count"><?php echo e(round($offer_percent, 0)); ?>% Off</span></li>
			                            <hr>
			                            <li class="cart-total-two"><b><?php echo e(__('frontstaticword.Total')); ?>:<span class="categories-count"><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($cart_total); ?></b></span></li>
			                		</ul>
			                	</div>


			                    <div class="course-rate">
			                        
			                        
			                        <div class="checkout-btn">
			                        	<form id="cart-form" method="post" action="<?php echo e(url('gotocheckout')); ?>" 
			                            	data-parsley-validate class="form-horizontal form-label-left">
			    	                        <?php echo e(csrf_field()); ?>


			    	                        <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
			    	                        <input type="hidden" name="price_total"  value="<?php echo e($price_total); ?>" />
			    	                        <input type="hidden" name="offer_total"  value="<?php echo e($offer_total); ?>" />
			    	                        <input type="hidden" name="offer_percent"  value="<?php echo e(round($offer_percent, 2)); ?>" />
			    	                        <input type="hidden" name="cart_total"  value="<?php echo e($cart_total); ?>" />
						                    
			    	                        
			    	                      <button class="btn btn-primary" title="checkout" type="submit"><?php echo e(__('frontstaticword.Checkout')); ?></button>
			    	                    </form>
			    	                    
			                    	</div>
			                    </div>
			                    <?php endif; ?>
			                </div>
			                <hr>
			                <div class="coupon-apply">
								<form id="cart-form" method="post" action="<?php echo e(url('apply/coupon')); ?>" 
	                            	data-parsley-validate class="form-horizontal form-label-left">
	    	                        <?php echo e(csrf_field()); ?>


				                	<div class="row no-gutters">
				                		<div class="col-lg-9 col-9">
				                			<input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
			                    			<input type="text" name="coupon" value="" placeholder="Enter Coupon" />
			                    		</div>
			                    		<div class="col-lg-3 col-3">
			                    			<button data-purpose="coupon-submit" type="submit" class="btn btn-primary"><span><?php echo e(__('frontstaticword.Apply')); ?></span></button>
			                    		</div>
			                    	</div>
			                    </form>
			                </div>

		                    <?php if(Session::has('fail')): ?>
	                    		<div class="alert alert-danger alert-dismissible fade show">
	                    			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									</button>
	                    			<?php echo e(Session::get('fail')); ?>

	                    		</div>
	                		<?php endif; ?>
	                		<?php if(Session::has('coupanapplied')): ?>
	                    		<form id="demo-form2" method="post" action="<?php echo e(route('remove.coupon', Session::get('coupanapplied')['cpnid'])); ?>">
	                                <?php echo e(csrf_field()); ?>

	                                    
		                            <div class="remove-coupon">
		                             <button type="submit" class="btn btn-primary" title="Remove Coupon"><i class="fa fa-times icon-4x" aria-hidden="true"></i></button>
		                            </div>
		                        </form>
								<div class="coupon-code">   
									<?php echo e(Session::get('coupanapplied')['msg']); ?>

								</div>
	                        <?php endif; ?>
		                <?php endif; ?>
	                </div>
		        </div>
		    <?php else: ?>
		    	<div class="cart-no-result">
		    		<i class="fa fa-shopping-cart"></i>
			    	<div class="no-result-courses btm-10"><?php echo e(__('frontstaticword.cartempty')); ?></div>
			    	<div class="recommendation-btn text-white text-center">
		                <a href="<?php echo e(url('/')); ?>" class="btn btn-primary" title="Keep Shopping"><b><?php echo e(__('frontstaticword.KeepShopping')); ?></b></a>
		            </div> 
				</div>
		    <?php endif; ?>
	    </div>
	</div>
	<!--Model start-->
	<div class="modal fade" id="myModalCoupon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog modal-md" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title" id="myModalLabel"><?php echo e(__('frontstaticword.CouponCode')); ?></h4>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        </div>
	        <div class="box box-primary">
	          <div class="panel panel-sum">
	            <div class="modal-body">
	            	<div class="coupon-apply">
						<form id="cart-form" method="post" action="<?php echo e(url('apply/coupon')); ?>" 
	                    	data-parsley-validate class="form-horizontal form-label-left">
	                        <?php echo e(csrf_field()); ?>

	                        
		                	<div class="row no-gutters">
		                		<div class="col-lg-9 col-9">
		                			<input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
	                    			<input type="text" name="coupon" value="" placeholder="Enter Coupon" />
	                    		</div>
	                    		<div class="col-lg-3 col-3">
	                    			<button data-purpose="coupon-submit" type="submit" class="btn btn-primary"><span><?php echo e(__('frontstaticword.Apply')); ?></span></button>
	                    		</div>
	                    	</div>
	                    </form>
	                </div>
	                <hr>
	                <?php if(! $carts->isEmpty()): ?>
	                <div class="available-coupon">
	                	<?php
	                		$cpns = App\Coupon::get();
	                	?>

	                	<?php $__currentLoopData = $cpns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cpn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                		<ul>
	                			<li><?php echo e($cpn->code); ?></li>
	                		</ul>
	                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                	
	                </div>
	                <?php endif; ?>


	            </div>
	          </div>
	        </div>
	      </div>
	    </div> 
	</div>
	<!--Model close -->
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/front/cart.blade.php ENDPATH**/ ?>