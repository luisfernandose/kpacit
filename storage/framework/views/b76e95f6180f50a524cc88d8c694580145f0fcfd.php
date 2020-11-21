<form action="<?php echo e(route('api.update')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('POST')); ?>

            
            <div class="row">
              <div class="col-md-12">
                            <label for="s_enable"><?php echo e(__('adminstaticword.STRIPEPAYMENT')); ?></label>
                            <li class="tg-list-item">
                              <input class="tgl tgl-skewed" id="s_sec1" type="checkbox" name="stripe_check" <?php echo e($gsetting->stripe_enable==1 ? 'checked' : ''); ?>/>
                              <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="s_sec1"></label>
                            </li>
                            

                            <br>
                            <div class="row" style="<?php echo e($gsetting->stripe_enable==1 ? '' : 'display:none'); ?>" id="s_sec">
                              <div class="col-md-6">
                            <label for="STRIPE_KEY"><?php echo e(__('adminstaticword.StripeKey')); ?><sup class="redstar">*</sup></label>
                            <input value="<?php echo e($env_files['STRIPE_KEY']); ?>" autofocus name="STRIPE_KEY" type="text" class="form-control" placeholder="Enter Stripe Key"/>
                            <br>
                          </div>

                          <div class="col-md-6">
                            <label for="s_secretkey"><?php echo e(__('adminstaticword.StripeSecretKey')); ?><sup class="redstar">*</sup></label>
                            <input value="<?php echo e($env_files['STRIPE_SECRET']); ?>" autofocus name="STRIPE_SECRET" type="text" class="form-control" placeholder="Enter Stripe Secret Key"/>
                          </div>
                        </div>
                        </div>
                    </div>
            <br>

                    <div class="row">
              <div class="col-md-12">
                            <label for="pay_enable"><?php echo e(__('adminstaticword.PAYPALPAYMENT')); ?></label> 
                            <li class="tg-list-item">
                              <input class="tgl tgl-skewed" id="pay_sec1" type="checkbox" name="paypal_check" <?php echo e($gsetting->paypal_enable==1 ? 'checked' : ''); ?>/>
                              <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="pay_sec1"></label>
                            </li>
                             <br>
                            <div class="row" style="<?php echo e($gsetting->paypal_enable==1 ? '' : 'display:none'); ?>" id="pay_sec">
                          <div class="col-md-6">
                              <label for="pay_cid"><?php echo e(__('adminstaticword.PaypalClientID')); ?><sup class="redstar">*</sup></label>
                              <input value="<?php echo e($env_files['PAYPAL_CLIENT_ID']); ?>" autofocus name="PAYPAL_CLIENT_ID" type="text" class="form-control" placeholder="Enter Paypal Client ID"/>
                              <br>
                          </div>

                          <div class="col-md-6">
                              <label for="pay_sid"><?php echo e(__('adminstaticword.PaypalSecretID')); ?><sup class="redstar">*</sup></label>
                              <input value="<?php echo e($env_files['PAYPAL_SECRET']); ?>" autofocus name="PAYPAL_SECRET" type="text" class="form-control" placeholder="Enter Paypal Secret ID"/>
                              <br>
                          </div>

                            <div class="col-md-6">
                              <label for="pay_mode"><?php echo e(__('adminstaticword.PaypalMode')); ?><sup class="redstar">*</sup></label>
                              <input value="<?php echo e($env_files['PAYPAL_MODE']); ?>" autofocus name="PAYPAL_MODE" type="text" class="form-control" placeholder="Enter Paypal Mode"/>
                            </div>

                        </div>
                        </div>
                    </div>
            <br>
            <br>

<!--            <div class="row">
              <div class="col-md-12">
                            <label for="pay_enable"><?php echo e(__('adminstaticword.INSTAMOJOPAYMENT')); ?></label> 
                            <li class="tg-list-item">
                              <input class="tgl tgl-skewed" id="insta_sec1" type="checkbox" name="instamojo_check" <?php echo e($gsetting->instamojo_enable==1 ? 'checked' : ''); ?> />
                              <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="insta_sec1"></label>
                            </li>
                             <br>
                            <div class="row" style="<?php echo e($gsetting->instamojo_enable==1 ? '' : 'display:none'); ?>" id="insta_sec">
                          <div class="col-md-6">
                              <label for="pay_cid"><?php echo e(__('adminstaticword.InstaMojoApiKey')); ?><sup class="redstar">*</sup></label>
                              <input value="<?php echo e($env_files['IM_API_KEY']); ?>" autofocus name="IM_API_KEY" type="text" class="form-control" placeholder="Enter InstaMojo Api Key"/>
                              <br>
                          </div>

                          <div class="col-md-6">
                              <label for="pay_sid"><?php echo e(__('adminstaticword.InstaMojoAuthToken')); ?> <sup class="redstar">*</sup></label>
                              <input value="<?php echo e($env_files['IM_AUTH_TOKEN']); ?>" autofocus name="IM_AUTH_TOKEN" type="text" class="form-control" placeholder="Enter InstaMojo Auth Token"/>
                              <br>
                          </div>

                            <div class="col-md-6">
                              <label for="pay_mode"><?php echo e(__('adminstaticword.InstaMojoURL')); ?><sup class="redstar">*</sup></label>
                              <input value="<?php echo e($env_files['IM_URL']); ?>" autofocus name="IM_URL" type="text" class="form-control" placeholder="Enter InstaMojo Url"/>
                            </div>
                        </div>
                        </div>
                    </div>
            <br>
            <br>-->

            <div class="row">
              <div class="col-md-12">
                            <label for="razorpay_enable"><?php echo e(__('adminstaticword.RAZORPAYPAYMENT')); ?></label>
                            <li class="tg-list-item">
                              <input class="tgl tgl-skewed" id="razor_sec1" type="checkbox" name="razor_check" <?php echo e($gsetting->razorpay_enable==1 ? 'checked' : ''); ?>/>
                              <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="razor_sec1"></label>
                            </li>
                            

                            <br>
                            <div class="row" style="<?php echo e($gsetting->razorpay_enable==1 ? '' : 'display:none'); ?>" id="razor_sec">
                              <div class="col-md-6">
                            <label for="RAZORPAY_KEY"><?php echo e(__('adminstaticword.RazorpayKey')); ?><sup class="redstar">*</sup></label>
                            <input value="<?php echo e($env_files['RAZORPAY_KEY']); ?>" autofocus name="RAZORPAY_KEY" type="text" class="form-control" placeholder="Enter Razorpay Key"/>
                            <br>
                          </div>

                          <div class="col-md-6">
                            <label for="RAZORPAY_SECRET"><?php echo e(__('adminstaticword.RazorpaySecretKey')); ?><sup class="redstar">*</sup></label>
                            <input value="<?php echo e($env_files['RAZORPAY_SECRET']); ?>" autofocus name="RAZORPAY_SECRET" type="text" class="form-control" placeholder="Enter Razorpay Secret Key"/>
                          </div>
                        </div>
                        </div>
                    </div>
            <br> 

                    <!--<div class="row">
              <div class="col-md-12">
                            <label for="paystack_enable"><?php echo e(__('adminstaticword.PAYSTACKPAYMENT')); ?></label>
                            <li class="tg-list-item">
                              <input class="tgl tgl-skewed" id="paystack_sec1" type="checkbox" name="paystack_check" <?php echo e($gsetting->paystack_enable==1 ? 'checked' : ''); ?>/>
                              <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="paystack_sec1"></label>
                            </li>
                            

                            <br>
                            <div class="row" style="<?php echo e($gsetting->paystack_enable==1 ? '' : 'display:none'); ?>" id="paystack_sec">
                              <div class="col-md-6">
                            <label for="RAZORPAY_KEY"><?php echo e(__('adminstaticword.PayStackPublicKey')); ?><sup class="redstar">*</sup></label>
                            <input value="<?php echo e($env_files['PAYSTACK_PUBLIC_KEY']); ?>" autofocus name="PAYSTACK_PUBLIC_KEY" type="text" class="form-control" placeholder="Enter Razorpay Key"/>
                          </div>

                          <div class="col-md-6">
                            <label for="RAZORPAY_SECRET"><?php echo e(__('adminstaticword.PayStackSecretKey')); ?><sup class="redstar">*</sup></label>
                            <input value="<?php echo e($env_files['PAYSTACK_SECRET_KEY']); ?>" autofocus name="PAYSTACK_SECRET_KEY" type="text" class="form-control" placeholder="Enter Razorpay Secret Key"/>
                            <br>
                          </div>

                      
                              <div class="col-md-6">
                            <label for="RAZORPAY_KEY"><?php echo e(__('adminstaticword.PayStackPaymentUrl')); ?><sup class="redstar">*</sup></label>
                            <input value="<?php echo e($env_files['PAYSTACK_PAYMENT_URL']); ?>" autofocus name="PAYSTACK_PAYMENT_URL" type="text" class="form-control" placeholder="Enter Razorpay Key"/>
                            <br>
                          </div>

                          <div class="col-md-6">
                            <label for="RAZORPAY_SECRET"><?php echo e(__('adminstaticword.PayStackMerchantEmail')); ?><sup class="redstar">*</sup></label>
                            <input value="<?php echo e($env_files['PAYSTACK_MERCHANT_EMAIL']); ?>" autofocus name="PAYSTACK_MERCHANT_EMAIL" type="text" class="form-control" placeholder="Enter Razorpay Secret Key"/>
                          </div>
                        </div>
                        </div>
                    </div>
            <br>
 
             <div class="row">
              <div class="col-md-12">
                            <label for="s_enable"><?php echo e(__('adminstaticword.PAYTMPAYMENT')); ?></label>
                            <li class="tg-list-item">
                              <input class="tgl tgl-skewed" id="paytm_sec1" type="checkbox" name="paytm_check" <?php echo e($gsetting->paytm_enable==1 ? 'checked' : ''); ?>/>
                              <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="paytm_sec1"></label>
                            </li>
                            

                            <br>
                            <div class="row" style="<?php echo e($gsetting->paytm_enable==1 ? '' : 'display:none'); ?>" id="paytm_sec">

                              <div class="col-md-6">
                                <div class="form-group">
                              <label for="PAYTM_ENVIRONMENT"><?php echo e(__('adminstaticword.PaytmEnviroment')); ?><sup class="redstar">*</sup></label>
                              <input value="<?php echo e($env_files['PAYTM_ENVIRONMENT']); ?>" autofocus name="PAYTM_ENVIRONMENT" type="text" class="form-control" placeholder="Enter Paytm Enviroment"/>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="PAYTM_MERCHANT_ID"><?php echo e(__('adminstaticword.PaytmMerchantID')); ?><sup class="redstar">*</sup></label>
                              <input value="<?php echo e($env_files['PAYTM_MERCHANT_ID']); ?>" autofocus name="PAYTM_MERCHANT_ID" type="text" class="form-control" placeholder="Enter Paytm Merchant Id"/>
                          </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="PAYTM_MERCHANT_KEY"><?php echo e(__('adminstaticword.PaytmMerchantKey')); ?><sup class="redstar">*</sup></label>
                              <input value="<?php echo e($env_files['PAYTM_MERCHANT_KEY']); ?>" autofocus name="PAYTM_MERCHANT_KEY" type="text" class="form-control" placeholder="Enter Paytm Merchant Key"/>
                          </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="PAYTM_MERCHANT_WEBSITE"><?php echo e(__('adminstaticword.PaytmMerchantWebsite')); ?><sup class="redstar">*</sup></label>
                              <input value="<?php echo e($env_files['PAYTM_MERCHANT_WEBSITE']); ?>" autofocus name="PAYTM_MERCHANT_WEBSITE" type="text" class="form-control" placeholder="Enter Paytm Merchant Website"/>
                          </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="PAYTM_CHANNEL"><?php echo e(__('adminstaticword.PaytmChannel')); ?><sup class="redstar">*</sup></label>
                              <input value="<?php echo e($env_files['PAYTM_CHANNEL']); ?>" autofocus name="PAYTM_CHANNEL" type="text" class="form-control" placeholder="Enter Paytm Channel"/>
                          </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="PAYTM_INDUSTRY_TYPE"><?php echo e(__('adminstaticword.PaytmIndustryType')); ?><sup class="redstar">*</sup></label>
                              <input value="<?php echo e($env_files['PAYTM_INDUSTRY_TYPE']); ?>" autofocus name="PAYTM_INDUSTRY_TYPE" type="text" class="form-control" placeholder="Enter Paytm Industry Type"/>
                          </div>
                          </div>

                        </div>
                        </div>
                    </div>
            <br>
             -->
            <div class="box-footer">
                      <button value="" type="submit"  class="btn btn-lg col-md-4 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
                    </div>

                </form><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/setting/paymentapi.blade.php ENDPATH**/ ?>