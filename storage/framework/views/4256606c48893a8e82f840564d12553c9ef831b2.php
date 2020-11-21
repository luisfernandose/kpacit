<?php $__env->startSection('title', 'API Setting - Admin'); ?>
<?php $__env->startSection('body'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Api Settings</h1>
        </div>
    	 <div class="box-body">
          <!-- Nav tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="nav-tab" role="tablist">
              <li role="presentation" class="active"><a href="#payment" aria-controls="payment" role="tab" data-toggle="tab"><i class="fa fa-cogs" aria-hidden="true"></i>Payment api</a></li>
              <li role="presentation"><a href="#sms" aria-controls="sms" role="tab" data-toggle="tab"><i class="fa fa-laptop" aria-hidden="true"></i> SMS api</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="payment">
              	<br>
              	<?php echo $__env->make('admin.setting.paymentapi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="sms">
              	<br>
              	<?php echo $__env->make('admin.setting.smsapi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
            </div>
          </div>
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


  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#nav-tab a[href="' + activeTab + '"]').tab('show');
    }
  });

})(jQuery);

</script>
<script>
(function($) {
  "use strict";

  $(function(){
      $('#sms_sec1').change(function(){
        if($('#sms_sec1').is(':checked')){
          $('#sms_sec').show('fast');
        }else{
          $('#sms_sec').hide('fast');
        }

      });
      $('#s_sec1').change(function(){
        if($('#s_sec1').is(':checked')){
          $('#s_sec').show('fast');
        }else{
          $('#s_sec').hide('fast');
        }

      });
      $('#pay_sec1').change(function(){
        if($('#pay_sec1').is(':checked')){
          $('#pay_sec').show('fast');
        }else{
          $('#pay_sec').hide('fast');
        }

      });
      $('#payu_sec1').change(function(){
        if($('#payu_sec1').is(':checked')){
          $('#payu_sec').show('fast');
        }else{
          $('#payu_sec').hide('fast');
        }

      });
      $('#insta_sec1').change(function(){
        if($('#insta_sec1').is(':checked')){
          $('#insta_sec').show('fast');
        }else{
          $('#insta_sec').hide('fast');
        }

      });

      $('#brain_sec1').change(function(){
        if($('#brain_sec1').is(':checked')){
          $('#brain_sec').show('fast');
        }else{
          $('#brain_sec').hide('fast');
        }

      });

      $('#razor_sec1').change(function(){
        if($('#razor_sec1').is(':checked')){
          $('#razor_sec').show('fast');
        }else{
          $('#razor_sec').hide('fast');
        }

      });

      $('#paystack_sec1').change(function(){
        if($('#paystack_sec1').is(':checked')){
          $('#paystack_sec').show('fast');
        }else{
          $('#paystack_sec').hide('fast');
        }

      });

      $('#paytm_sec1').change(function(){
        if($('#paytm_sec1').is(':checked')){
          $('#paytm_sec').show('fast');
        }else{
          $('#paytm_sec').hide('fast');
        }

      });
  });

})(jQuery);

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/setting/api.blade.php ENDPATH**/ ?>