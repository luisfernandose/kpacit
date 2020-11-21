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
    <link rel="stylesheet" href="{{ url('installer/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{url('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <title>Installing App - Step 4 - Creating Admin</title>
    
  </head>
  <body>
   	  
      <div class="preL display-none">
        <div class="preloader3 display-none"></div>
      </div>

   		<div class="container">
   			<div class="card">
          <div class="card-header">
              <h3 class="m-3 text-center text-dark ">
                  Welcome To Setup Wizard - Create Admin
              </h3>
          </div>
   				<div class="card-body" id="stepbox">
               <form autocomplete="off" enctype="multipart/form-data" action="{{ route('store.step4') }}" id="step4form" method="POST" class="needs-validation" novalidate>
                  @csrf
                   <h3>Create Admin</h3>
                   <hr>
                  <div class="form-row">
                   
                    <br>
                    <div class="col-md-6 mb-3">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom01">Please First Name:</label>
                          <input name="fname" type="text" class="form-control" id="validationCustom01" placeholder="Enter First Name" value="" required>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                          <div class="invalid-feedback">
                              Please enter name.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom01">Please Last Name:</label>
                          <input name="lname" type="text" class="form-control" id="validationCustom01" placeholder="Enter Last Name" value="" required>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                          <div class="invalid-feedback">
                              Please enter name.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="validationCustom01">Email:</label>
                      <input name="email" type="email" class="form-control" id="validationCustom01" placeholder="user@info.com" value="" required>
                       <div class="invalid-feedback">
                          Please enter email.
                      </div>
                    </div>

                    <div class="col-md-6 mb-3">
                       <label>Password:</label>
                       <input type="password" class="form-control" placeholder="*****" required name="password">
                       <div class="invalid-feedback">
                          Please choose password.
                      </div>
                    </div>

                    <div class="col-md-6 mb-3">
                       <label>Confirm Password:</label>
                       <input type="password" class="form-control" placeholder="*****" required name="password_confirmation">
                       <div class="invalid-feedback">
                          Please confirm password.
                      </div>
                    </div>

                     <div class="col-md-6 mb-3">
                      <label for="validationCustom01">Choose Profile Picture:</label>
                      <input name="profile_photo" type="file" class="form-control" id="logo" value="">
                         
                    </div>

                    <div class="col-md-6 p-3">
                       Preview:
                      <br>
                       <img id="logo-prev" align="center" width="150" height="150" src="" alt="">
                    </div>

                    
                    
                  </div>
                
                  <hr>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                     
                      <label for="validationCustom03">Mobile No.:</label>
                      <input name="mobile" type="text" class="form-control" id="validationCustom03" placeholder="1234567890" required>
                      <div class="invalid-feedback">
                        Please enter mobile no.
                      </div>

                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="validationCustom04">Gender:</label>
                      <select class="form-control" name="gender" id="">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Other</option>
                      </select>
                    </div>
                  </div>
                  <hr>
                <div class="form-row">
                    
                   <div class="col-md-4 mb-3">
                      
                    <label class="info-title" for="country_id">Choose Country:</label>
                    <select required class="js-example-basic-single form-control" name="country" id="country_id">
                        <option value="">Choose Country</option>
                        @foreach(App\Allcountry::all() as $country)
                            <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                        @endforeach
                    </select>
                    
                   </div>

                   <div class="col-md-4 mb-3">
                       <label class="info-title" for="state_id">Choose State:</label>
                        <select class="js-example-basic-single form-control" required name="state_id" id="upload_id">
                           
                        </select>
                   </div>

                   <div class="col-md-4 mb-3">
                       <label class="info-title" for="city_id">Choose City:</label>
                        <select class="js-example-basic-single form-control" required name="city_id" id="grand">
                           
                        </select>
                   </div>
    

                  </div>
                  
                <button class="float-right step1btn btn btn-primary" type="submit">Continue to Step 5...</button>
              </form>
   				</div>
   			</div>
        <p class="text-center m-3 text-white">&copy;{{ date('Y') }} | Online Courses - Learning Management System</p>
   		</div>
      
      <div class="corner-ribbon bottom-right sticky green shadow">Step 4 </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('installer/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('installer/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('installer/js/additional-methods.min.js') }}"></script>
    <script src="{{ url('installer/js/ej.web.all.min.js') }}"></script>
    <script src="{{ url('installer/js/popper.min.js') }}"></script>
    <script src="{{ url('installer/js/bootstrap.min.js') }}"></script>

    <script src="{{ url('installer/js/shards.min.js') }}"></script>
    <script src="{{ url('installer/js/select2.min.js') }}"></script>

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
        })();
    

      (function() {
        'use strict';
        $(document).ready(function() {
          $('.js-example-basic-single').select2();
        });

      })();

   
      function readURL1(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#logo-prev').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#logo").change(function() {
        readURL1(this);
      });

   
      (function() {
        'use strict';

      $(function() {
        var urlLike = '{{ url('allcountry/dropdown') }}';
        $('#country_id').change(function() {
          var up = $('#upload_id').empty();
          var cat_id = $(this).val();    
          if(cat_id){
            $.ajax({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:"GET",
              url: urlLike,
              data: {catId: cat_id},
              success:function(data){   
                console.log(data);
                up.append('<option value="0">Please Choose</option>');
                $.each(data, function(id, title) {
                  up.append($('<option>', {value:id, text:title}));
                });
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
              }
            });
          }
        });
      });
    

      $(function() {
        var urlLike = '{{ url('allcountry/gcity') }}';
        $('#upload_id').change(function() {
          var up = $('#grand').empty();
          var cat_id = $(this).val();    
          if(cat_id){
            $.ajax({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:"GET",
              url: urlLike,
              data: {catId: cat_id},
              success:function(data){   
                console.log(data);
                up.append('<option value="0">Please Choose</option>');
                $.each(data, function(id, title) {
                  up.append($('<option>', {value:id, text:title}));
                });
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
              }
            });
          }
        });
      });

      })(jQuery);
    </script>

</body>
</html>