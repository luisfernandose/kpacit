<?php $__env->startSection('title', 'Checkout'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- about-home start -->
<section id="wishlist-home" class="wishlist-home-main-block">
    <div class="container">
        <h1 class="wishlist-home-heading text-white"><?php echo e(__('frontstaticword.Checkout')); ?></h1>
    </div>
</section> 
<!-- about-home end -->
<section id="checkout-block" class="checkout-main-block">
	<div class="container">
		<div class="cart-items btm-30">
	        <div class="row">
	        	<div class="col-lg-4 col-sm-4">
	        		<h4 class="cart-heading"><?php echo e(__('frontstaticword.YourItems')); ?>

            		(<?php
                        $item = App\Cart::where('user_id', Auth::User()->id)->get();
                        if(count($item)>0){

                            echo count($item);
                        }
                        else{

                            echo "0";
                        }
                    ?>)
	            	</h4>
	            	<hr>
	            	<div class="checkout-items">
	            		<?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			            	<div class="row btm-10">
			            		<div class="col-lg-3 col-4">
			            			<div class="checkout-course-img">
			            				<?php if($cart->courses['preview_image'] !== NULL && $cart->courses['preview_image'] !== ''): ?>
			            					<a href="<?php echo e(route('user.course.show',['id' => $cart->courses->id, 'slug' => $cart->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'. $cart->courses->preview_image)); ?>" class="img-fluid" alt="course"></a>
			            				<?php else: ?>
											<a href="<?php echo e(route('user.course.show',['id' => $cart->courses->id, 'slug' => $cart->courses->slug ])); ?>"><img src="<?php echo e(Avatar::create($cart->courses->title)->toBase64()); ?>" class="img-fluid" alt="course"></a>
			            				<?php endif; ?>
			            			</div>
			            		</div>
			            		<div class="col-lg-9 col-8">
			            			<ul>
			            				<li class="checkout-course-title"><a href="<?php echo e(route('user.course.show',['id' => $cart->courses->id, 'slug' => $cart->courses->slug ])); ?>"><?php echo e(str_limit($cart->courses->title, $limit =35 , $end = '...')); ?></a></li>
			            				<li class="checkout-course-user">By <?php echo e($cart->courses->user->fname); ?></li>
			            				<?php
		                                    $currency = App\Currency::first();
		                                ?> 
		                                <?php if($cart->courses->discount_price == !NULL): ?>
			            					<li class="checkout-course-price"><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($cart->courses->discount_price); ?></b>  <s><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($cart->courses->price); ?></s></li>
			            				<?php else: ?>
			            					<li class="checkout-course-price"><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($cart->courses->price); ?></b></li>
			            				<?php endif; ?>
			            			</ul>
			            		</div>
			            	</div>
	            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            	</div>
                </div>
	            <div class="col-lg-8 col-sm-8">
	            	<div class="checkout-pricelist">
		            	<ul>
		            		<li><h1 class="checkout-total"><?php echo e(__('frontstaticword.Total')); ?>: <i class="<?php echo e($currency->icon); ?>"></i><?php echo e($cart_total); ?></h1></li>
		            		<li><div class="checkout-price"><s><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($price_total); ?></s></div></li>
		            		<li><div class="checkout-percent"><?php echo e(round($offer_percent, 0)); ?>% Off</div></li>

		            		<?php
		            			if($cart_total != '' || $cart_total != 0){
		            				$mainpay = round($cart_total,2);
		            			}else{
		            				$mainpay = round($cart_total,2);
		            			}
		            		?>
		            		
		            	</ul>
	            	</div>
	            	<?php  			
        				$secureamount = Crypt::encrypt($mainpay);
        			?>
	            	<div class="payment-gateways">
	            		<div id="accordion" class="second-accordion">
	            			<?php if($gsetting->paypal_enable == 1): ?>
						    <div class="card">
	                            <div class="card-header" id="headingOne">
							        <div class="panel-title">
							            <label for='r11'>
								            <input type='radio' id='r11' name='occupation' value='Working' required />
								            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"></a>
								              
								            <img src="<?php echo e(url('images/payment/paypal2.png')); ?>" class="img-fluid" alt="course">
							            </label>
							        </div>
						    	</div>
							    <div id="collapseOne" class="panel-collapse collapse in">
							        <div class="card-body">
		                            
		                            	<div class="payment-proceed-btn">
		                            		<form action="<?php echo e(route('payWithpaypal')); ?>" method="POST" autocomplete="off">
		                            			<?php echo csrf_field(); ?>
		                            			
		                         				<input type="hidden" name="amount" value="<?php echo e($secureamount); ?>"/>
		                         				<input type="hidden" name="course_id" value="<?php echo e($cart->courses->id); ?>"/>
		                            			<button class="btn btn-primary" title="checkout" type="submit"><?php echo e(__('frontstaticword.Proceed')); ?></button>
		                            		</form>
		                            		
		                            	</div>
							        </div>
							    </div>
							</div>
							<?php endif; ?>
							<?php if($gsetting->instamojo_enable == 1): ?>
							<div class="card">
	                            <div class="card-header" id="headingTwo">
							        <div class="panel-title">
							            <label for='r12'>
								            <input type='radio' id='r12' name='occupation' value='Working' required />
								            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"></a>

							            	<img src="<?php echo e(url('images/payment/instamojo.png')); ?>" class="img-fluid-img" alt="course">
							            </label>
							        </div>
						    	</div>
							    <div id="collapseTwo" class="panel-collapse collapse in">
							        <div class="card-body">
		                            	<div class="payment-proceed-btn">

		                            		<form action="<?php echo e(url('pay')); ?>" method="POST" name="laravel_instamojo" autocomplete="off">
											    <?php echo e(csrf_field()); ?>

											    
											     <div class="row">
											        <div class="col-md-12">
											            <div class="form-group">
											                <strong>Name</strong>
											                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
											            </div>
											        </div>
											        <div class="col-md-12">
											            <div class="form-group">
											                <strong>Mobile Number</strong>
											                <input type="text" name="mobile_number" class="form-control" placeholder="Enter Mobile Number" required autocomplete="off">
											            </div>
											        </div>
											        <div class="col-md-12">
											            <div class="form-group">
											                <strong>Email Id</strong>
											                <input type="email" name="email" class="form-control" placeholder="Enter Email id" required>
											            </div>
											        </div>
											        <div class="col-md-12">
											            <div class="form-group">
											                <input type="hidden" name="amount" class="form-control" placeholder="" value="<?php echo e($mainpay); ?>" readonly="">
											            </div>
											        </div>
											        <div class="col-md-12">
											            <button class="btn btn-primary" title="checkout" type="submit"><?php echo e(__('frontstaticword.Proceed')); ?></button>
											        </div>
											    </div>
											     
											</form>
		                            		
		                            	</div>
							        </div>
							    </div>
							</div>
							<?php endif; ?>
							<?php if($gsetting->stripe_enable == 1): ?>
							<div class="card">
	                            <div class="card-header" id="headingThree">
							        <div class="panel-title">
							            <label for='r13'>
							              <input type='radio' id='r13' name='occupation' value='Working' required />
							              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"></a>
							              <img src="<?php echo e(url('images/payment/stripe.png')); ?>" class="img-fluid" alt="course">
							            </label>
							        </div>
						    	</div>
							    <div id="collapseThree" class="panel-collapse collapse in">
							        <div class="card-body">
								      
									    <div class="creditCardForm">
										  
										    <div class="payment">
										        <form accept-charset="UTF-8" action="<?php echo e(route('stripe.pay')); ?>" method="POST"autocomplete="off">
										    		<?php echo e(csrf_field()); ?>

										            <div class="form-group owner">
										                <label for="owner">Owner</label>
										                <input type="text" class="form-control" id="owner" required>
										            </div>
										            <div class="form-group CVV">
										                <label for="cvv">CVV</label>
										                <input type="text" class="form-control" id="cvv" name="ccv" required>
										            </div>
										            <div class="form-group" id="card-number-field">
										                <label for="cardNumber">Card Number</label>
										                <input type="text" class="form-control" id="cardNumber" name="card_no" required>
										            </div>
										            <div class="form-group" id="expiration-date">
										                <label>Expiration Date</label>
										                <select name="expiry_month" required> 
										                    <option value="01">January</option>
										                    <option value="02">February </option>
										                    <option value="03">March</option>
										                    <option value="04">April</option>
										                    <option value="05">May</option>
										                    <option value="06">June</option>
										                    <option value="07">July</option>
										                    <option value="08">August</option>
										                    <option value="09">September</option>
										                    <option value="10">October</option>
										                    <option value="11">November</option>
										                    <option value="12">December</option>
										                </select>
										                <select name="expiry_year" required>
										                    <option value="19">2019</option>
										                    <option value="20">2020</option>
										                    <option value="21">2021</option>
										                    <option value="22">2022</option>
										                    <option value="23">2023</option>
										                    <option value="24">2024</option>
										                    <option value="25">2025</option>
										                    <option value="26">2026</option>
										                    <option value="27">2027</option>
										                    <option value="28">2028</option>
										                    <option value="29">2029</option>
										                    <option value="30">2030</option>
										                    <option value="31">2031</option>
										                    <option value="32">2032</option>
										                </select>
										            </div>
										            <div class="form-group" id="credit_cards">
										                <img src="<?php echo e(url('images/payment/visa.jpg')); ?>" id="visa">
										                <img src="<?php echo e(url('images/payment/mastercard.jpg')); ?>" id="mastercard">
										                <img src="<?php echo e(url('images/payment/amex.jpg')); ?>" id="amex">
										            </div>

										            <input type="hidden" name="amount"  value="<?php echo e($mainpay); ?>" />

										            <button class='form-control btn btn-default' type='submit'><?php echo e(__('frontstaticword.Proceed')); ?></button>
										        </form>
										    </div>
										</div>
							        </div>
							    </div>
							</div>
							<?php endif; ?>
							<?php if($gsetting->braintree_enable == 1): ?>
							
							<?php endif; ?>
							<?php if($gsetting->razorpay_enable == 1): ?>
							<div class="card">
	                            <div class="card-header" id="headingSix">
							        <div class="panel-title">
							            <label for='r16'>
							              <input type='radio' id='r16' name='occupation' value='Working' required />
							              <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"></a>
							              <img src="<?php echo e(url('images/payment/razorpay.png')); ?>"  class="img-fluid" alt="course"> 
							            </label>
							            
							        </div>
						    	</div>
							    <div id="collapseSix" class="panel-collapse collapse in">
							        <div class="card-body">
		                            	<div class="payment-proceed-btn">
		                            		<form action="<?php echo e(route('dopayment')); ?>" method="POST">
		                            			<?php echo csrf_field(); ?>
		                            			
		                         				<input type="hidden" name="amount" value="<?php echo e($secureamount); ?>"/>
		                         				<input type="hidden" name="course_id" value="<?php echo e($cart->courses->id); ?>"/>

		                         				<?php
												    $set = App\Setting::first();
												 ?>

		                         				<script
												    src="https://checkout.razorpay.com/v1/checkout.js"
												    data-key="<?php echo e(env('RAZORPAY_KEY')); ?>"
												    data-amount= "<?php echo e($mainpay*100); ?>"
												    data-currency="INR"
												    data-order_id=""
												    data-buttontext="Proceed"
												    data-name="<?php echo e($set->project_title); ?>"
												    data-description=""
												    data-image="<?php echo e(asset('images/logo/'.$set->logo)); ?>"
												    data-prefill.name="XYZ"
												    data-prefill.email="info@example.com"
												    data-theme.color="#F44A4A"
												></script>
		                            		</form>
		                            	</div>
							        </div>
							    </div>
							</div>
							<?php endif; ?>
							<?php if($gsetting->paystack_enable == 1): ?>
							<div class="card">
	                            <div class="card-header" id="headingSeven">
							        <div class="panel-title">
							            <label for='r14'>
							              <input type='radio' id='r14' name='occupation' value='Working' required />
							              <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"></a>
							              <img src="<?php echo e(url('images/payment/paystack.png')); ?>"  class="img-fluid" alt="course"> 
							            </label>
							        </div>
						    	</div>
							    <div id="collapseSeven" class="panel-collapse collapse in">
							        <div class="card-body">
		                            	<div class="payment-proceed-btn">
		                            		<form method="POST" action="<?php echo e(route('paywithpaystack')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
										        <div class="row">
										          <div class="col-md-8 col-md-offset-2">
										            
										            <input type="hidden" name="email" value="<?php echo e(Auth::User()->email); ?>"> 
										            <input type="hidden" name="amount" value="<?php echo e($mainpay*100); ?>">
										            <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['key_name' => 'value',])); ?>" > 
										            <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>"> 
										            <input type="hidden" name="key" value="<?php echo e(env('PAYSTACK_SECRET_KEY')); ?>"> 
										            <?php echo e(csrf_field()); ?> 

										             <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 

										            <p>
										              <button class="btn btn-primary " type="submit" value="Pay Now"><?php echo e(__('frontstaticword.Proceed')); ?></button>
										            </p>
										          </div>
										        </div>
											</form>
		                            	</div>
							        </div>
							    </div>
							</div>
							<?php endif; ?>
							<?php if($gsetting->paytm_enable == 1): ?>
							<div class="card">
	                            <div class="card-header" id="headingFour">
							        <div class="panel-title">
							            <label for='r17'>
							              <input type='radio' id='r17' name='occupation' value='Working' required />
							              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"></a>
							              <img src="<?php echo e(url('images/payment/paytm.png')); ?>"  class="img-fluid" alt="course"> 
							            </label>
							        </div>
						    	</div>
							    <div id="collapseFour" class="panel-collapse collapse in">
							        <div class="card-body">
		                            	<div class="payment-proceed-btn">
		                            		<form method="post" action="<?php echo e(url('/paywithpayment')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
		                            			<?php echo csrf_field(); ?>

										            <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>"/>
										            <input type="hidden" name="duration" value="<?php echo e($cart->courses->duration); ?>"/>
										          
												    <div class="row">
											        <div class="col-md-12">
											            <div class="form-group">
											                <strong>Name</strong>
											                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo e(Auth::User()->fname); ?>" required>
											            </div>
											        </div>
											        <div class="col-md-12">
											            <div class="form-group">
											                <strong>Mobile Number</strong>
											                <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" value="<?php echo e(Auth::User()->mobile); ?>" required autocomplete="off">
											            </div>
											        </div>
											        <div class="col-md-12">
											            <div class="form-group">
											                <strong>Email Id</strong>
											                <input type="email" name="email" class="form-control" value="<?php echo e(Auth::User()->email); ?>" placeholder="Enter Email id" required>
											            </div>
											        </div>
											        <div class="col-md-12">
											            <div class="form-group">
											                <input type="hidden" name="amount" class="form-control" placeholder="" value="<?php echo e($mainpay); ?>" readonly="">
											            </div>
											        </div>
											        <div class="col-md-12">
											            <button class="btn btn-primary" title="checkout" type="submit"><?php echo e(__('frontstaticword.Proceed')); ?></button>
											        </div>
											    </div>
										          
											</form>
		                            	</div>
							        </div>
							    </div>
							</div>
							<?php endif; ?>

							<?php
								$banktransfer = App\BankTransfer::first();
							?>
							<?php if(isset($banktransfer)): ?>
							<?php if($banktransfer->bank_enable == '1'): ?>
							<div class="card">
	                            <div class="card-header" id="headingEight">
							        <div class="panel-title">
							            <label for='r18'>
							              <input type='radio' id='r18' name='occupation' value='Working' required />
							              <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight"></a>
							              &emsp;<b><?php echo e(__('frontstaticword.banktransfer')); ?></b>
							            </label>
							        </div>
						    	</div>
							    <div id="collapseEight" class="panel-collapse collapse in">
							        <div class="card-body">
		                            	<div class="payment-proceed-btn">
		                            		<form method="POST" action="<?php echo e(url('process/banktransfer')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
		                            			<?php echo csrf_field(); ?>
										        <div class="row">
										          <div class="col-md-8 col-md-offset-2">
										            
									            	<input type="hidden" name="amount" value="<?php echo e($mainpay); ?>"/>

										            <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>"/>

										            <input type="hidden" name="fname" value="<?php echo e(Auth::User()->fname); ?>"/>

										             <input type="hidden" name="mobile" value="<?php echo e(Auth::User()->mobile); ?>"/>

										            <input type="hidden" name="email" value="<?php echo e(Auth::User()->email); ?>"/>


										            <p>
										              <button class="btn btn-primary " type="submit" value="Pay Now"><?php echo e(__('frontstaticword.Proceed')); ?></button>
										            </p>
										          </div>
										        </div>
											</form>

											<div class="card">
											  <div class="card-header">
											    <h5 class="card-title"><?php echo e(__('frontstaticword.banktransferdetail')); ?></h5>
											  </div>
											  <?php
											  	$bankdetail = App\BankTransfer::first();
											  ?>
											  <ul class="list-group list-group-flush">
											    <li class="list-group-item"><b>Account holder name:</b>&nbsp;<?php echo e($bankdetail['account_holder_name']); ?></li>
											    <li class="list-group-item"><b>Bank name:</b>&nbsp;<?php echo e($bankdetail['bank_name']); ?></li>
											    <li class="list-group-item"><b>IFCS Code</b>:&nbsp;<?php echo e($bankdetail['ifcs_code']); ?></li>
											    <li class="list-group-item"><b>Bank cccount number:</b>&nbsp;<?php echo e($bankdetail['account_number']); ?></li>
											  </ul>
											</div>
		                            	</div>
							        </div>
							    </div>
							</div>
							<?php endif; ?>
							<?php endif; ?>

                        </div>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

<script src="<?php echo e(url('js/jquery.payform.min.js')); ?>" charset="utf-8"></script>
<script src="<?php echo e(url('js/script.js')); ?>"></script>

<script src="<?php echo e(url('js/jquery.min.js')); ?>"></script>  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/front/checkout.blade.php ENDPATH**/ ?>