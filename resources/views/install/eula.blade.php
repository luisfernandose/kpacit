<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('installer/css/bootstrap.min.css') }}">
	  <link rel="stylesheet" href="{{ url('installer/css/shards.min.css') }}">
    <link rel="stylesheet" href="{{ url('installer/css/custom.css') }}">
    <title>Installing App - Terms and Condition</title>
   
  </head>
  <body>
    @include('admin.message')
   	  
      <div class="preL display-none">
        <div class="preloader3 display-none"></div>
      </div>

   		<div class="container">
   			<div class="card">
          <div class="card-header">
              <h3 class="m-3 text-center text-dark ">
                  Installing Online Courses - Learning Management System
              </h3>
          </div>
   				<div class="card-body" id="stepbox">
               <form action="{{ route('store.eula') }}" id="step1form" method="POST" class="needs-validation" novalidate>
                  @csrf
                  <h3>Terms & Conditions</h3>
                   <hr>
                  <div class="form-row">
                    <br>
                   <div class="col-md-12">
                      <p class="text-dark font-weight-bold">Please read this agreement carefully before installing or using this product.</p>
                      <p class="text-dark font-weight-normal"></p>
                      
                      <b>Note:</b> <span class="text-dark font-weight-normal">
                      </span> 
                      <br><br>
                     <hr>
                    <div class="custom-control custom-checkbox">
                      <input required="" type="checkbox" class="custom-control-input" id="customCheck1" name="eula"/>
                      <label class="custom-control-label" for="customCheck1"><b>I read the terms and condition carefully and I agree on it.</b></label>
                    </div>
                   </div>
                  </div>
                  
                <button class="float-right step1btn btn btn-primary" type="submit">Continue to Installation...</button>
              </form>
   				</div>
   			</div>
        <p class="text-center m-3 text-white">&copy;{{ date('Y') }} | Online Courses - Learning Management System</p>
   		</div>
      
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('installer/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('installer/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('installer/js/additional-methods.min.js') }}"></script>
    <script src="{{ url('installer/js/ej.web.all.min.js') }}"></script>
    <script src="{{ url('installer/js/popper.min.js') }}"></script>
    <script src="{{ url('installer/js/bootstrap.min.js') }}"></script>

    <script src="{{ url('installer/js/shards.min.js') }}"></script>
    @yield('script-zone')
    <script>
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          var forms = document.getElementsByClassName('needs-validation');
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>

    <script>
      (function() {
        'use strict';
          $(function() 
          { 
            $("form").submit(function () {
              if($(this).valid()){
                  $('.preL').fadeIn('fast');
                  $('.preloader3').fadeIn('fast');
                  $('.container').css({ '-webkit-filter':'blur(5px)'});
                  $('body').attr('scroll','no');
                  $('body').css('overflow','hidden');
                }
            });
          });
        })(jQuery);
    </script>

</body>
</html>
