<form action="<?php echo e(route('api.sms')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('POST')); ?>

            
            <div class="row">
              <div class="col-md-12">
                            <label for="s_enable">SMS Gateway</label>
                            <li class="tg-list-item">
                              <input class="tgl tgl-skewed" id="sms_sec1" type="checkbox" name="sms_enable" <?php echo e($gsetting->sms_enable==1 ? 'checked' : ''); ?>/>
                              <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="sms_sec1"></label>
                            </li>
                            

                            <br>
                            <div class="row" style="<?php echo e($gsetting->sms_enable==1 ? '' : 'display:none'); ?>" id="sms_sec">
                              <div class="col-md-6">
                            <label for="SMS_KEY">SMS Key<sup class="redstar">*</sup></label>
                            <input value="<?php echo e($gsetting->sms_key); ?>" autofocus name="sms_key" type="text" class="form-control" placeholder="Enter SMS Key"/>
                            <br>
                          </div>
                        </div>
                        </div>
                    </div>

            <div class="box-footer">
                      <button value="" type="submit"  class="btn btn-lg col-md-4 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
                    </div>

                </form><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/setting/smsapi.blade.php ENDPATH**/ ?>