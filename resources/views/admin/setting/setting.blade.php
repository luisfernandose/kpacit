@extends('admin.layouts.master')
@section('title', 'Settings - Admin')
@section('body')
@include('admin.message')


<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">{{ __('adminstaticword.SiteSetting') }}</h1>
        </div>
    	 <div class="box-body">
          <!-- Nav tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="nav-tab" role="tablist">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-cogs" aria-hidden="true"></i> {{ __('adminstaticword.GeneralSetting') }}</a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-laptop" aria-hidden="true"></i> {{ __('adminstaticword.SeoSetting') }}</a></li>
              <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-envelope" aria-hidden="true"></i> {{ __('adminstaticword.MailSetting') }}</a></li>
              <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-file-code-o" aria-hidden="true"></i> {{ __('adminstaticword.CustomStyleandJS') }}</a></li>
              <li role="presentation"><a href="#soc-settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-facebook-square" aria-hidden="true"></i> / <i class="fa fa-google" aria-hidden="true"></i>&nbsp;&nbsp;{{ __('adminstaticword.SocialLoginSetting') }}</a></li>
              <li role="presentation"><a href="#onboard" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;{{ __('adminstaticword.onboard') }}</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="home">
              	<br>
              	@include('admin.setting.genral')
              </div>
              <div role="tabpanel" class="fade tab-pane" id="profile">
              	<br>
              	@include('admin.setting.seo')
              </div>
              <div role="tabpanel" class="fade tab-pane" id="messages">
          		  <br>
              	@include('admin.setting.mailsetting')</div>
              <div role="tabpanel" class="fade tab-pane" id="settings">
              	<br>
              	@include('admin.setting.customstyle')
              </div>
              <div role="tabpanel" class="fade tab-pane" id="soc-settings">
                <br>
                 @include('admin.setting.sociallogin')
              </div>
              <div role="tabpanel" class="fade tab-pane" id="onboard">
                <br>
                 @include('admin.setting.onboard')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@section('scripts')

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
  $(document).on('click', '.toggle-password', function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    
    var input = $("#mailpass");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
  });
</script>

<script>
    $(document).on('click', '.toggle-password2', function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      
      var input = $("#fb_secret");
      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
    });
</script>

<script>
    $(document).on('click', '.toggle-password3', function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      
      var input = $("#gsecret");
      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
    });
</script>

<script>
    $(document).on('click', '.toggle-password4', function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      
      var input = $("#tsecret");
      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
    });
</script>

@endsection
