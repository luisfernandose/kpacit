<?php $__env->startSection('title', 'Edit User - Admin'); ?>
<?php $__env->startSection('body'); ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>
 
<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Users')); ?></h3>

          
        </div>
        <br>
        <div class="panel-body">
          <form action="<?php echo e(route('user.update',$user->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>


            <div class="row">
              <div class="col-md-6">
                <label for="fname">
                  <?php echo e(__('adminstaticword.FirstName')); ?>:
                  <sup class="redstar">*</sup>
                </label>
                <input value="<?php echo e($user->fname); ?>" autofocus required name="fname" type="text" class="form-control" placeholder="Enter first name"/>
              </div>

              <div class="col-md-6">
                <label for="lname">
                  <?php echo e(__('adminstaticword.LastName')); ?>:
                  <sup class="redstar">*</sup>
                </label>
                <input value="<?php echo e($user->lname); ?>" required name="lname" type="text" class="form-control" placeholder="Enter last name"/>
              </div>
            </div>
            <br>

            <div class="row">

              <div class="col-md-6">
                <label for="mobile"> <?php echo e(__('adminstaticword.Mobile')); ?>:<sup class="redstar">*</sup></label>
                <input value="<?php echo e($user->mobile); ?>" required type="text" name="mobile" placeholder="Enter mobile no" class="form-control">
               </div>
               <div class="col-md-6">
                <label for="mobile"><?php echo e(__('adminstaticword.Email')); ?>:<sup class="redstar">*</sup> </label>
                <input value="<?php echo e($user->email); ?>" required type="email" name="email" placeholder="Enter email" class="form-control">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-6">
                  <label for="address"><?php echo e(__('adminstaticword.Address')); ?>:<sup class="redstar">*</sup> </label>
                  <textarea name="address" class="form-control" rows="1" required  placeholder="Enter adderss" value=""><?php echo e($user->address); ?></textarea>
              </div>

              <div class="col-md-6">
                <label for="dob"><?php echo e(__('adminstaticword.DateofBirth')); ?>: </label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  
                  <input type="date" id="date" name="dob" class="form-control" placeholder="" value="<?php echo e($user->dob); ?>" >
                </div>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-6">
               <label for="gender"><?php echo e(__('adminstaticword.Gender')); ?>:</label>
                <br>
                <input type="radio" name="gender" id="ch1" value="m" <?php echo e($user->gender == 'm' ? 'checked' : ''); ?>> <?php echo e(__('adminstaticword.Male')); ?>

                <input type="radio" name="gender" id="ch2" value="f" <?php echo e($user->gender == 'f' ? 'checked' : ''); ?>> <?php echo e(__('adminstaticword.Female')); ?>

                <input type="radio" name="gender" id="ch3" value="o" <?php echo e($user->gender == 'o' ? 'checked' : ''); ?>> <?php echo e(__('adminstaticword.Other')); ?>

              </div>

              <div class="col-md-6">
                <label for="role"><?php echo e(__('adminstaticword.SelectRole')); ?>:</label>
                  <?php if(Auth::User()->role=="admin"): ?>
                  <select class="form-control js-example-basic-single" name="role">
                    <option <?php echo e($user->role == 'user' ? 'selected' : ''); ?> value="user"><?php echo e(__('adminstaticword.User')); ?></option>
                    <option <?php echo e($user->role == 'admin' ? 'selected' : ''); ?> value="admin"><?php echo e(__('adminstaticword.Admin')); ?></option>
                    <option <?php echo e($user->role == 'instructor' ? 'selected' : ''); ?> value="instructor"><?php echo e(__('adminstaticword.Instructor')); ?></option>
                  </select>
                  <?php endif; ?>
                  <?php if(Auth::User()->role=="instructor"): ?>
                  <select class="form-control js-example-basic-single" name="role">
                    <option <?php echo e($user->role == 'user' ? 'selected' : ''); ?> value="user"><?php echo e(__('adminstaticword.Free')); ?></option>
                    <option <?php echo e($user->role == 'instructor' ? 'selected' : ''); ?> value="instructor">Instructor<?php echo e(__('adminstaticword.User')); ?></option>
                  </select>
                  <?php endif; ?>
                  <?php if(Auth::User()->role=="user"): ?>
                  <select class="form-control js-example-basic-single" name="role">
                    <option <?php echo e($user->role == 'user' ? 'selected' : ''); ?> value="user"><?php echo e(__('adminstaticword.User')); ?></option>
                  </select>
                  <?php endif; ?>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-3">
                <label for="city_id"><?php echo e(__('adminstaticword.Country')); ?>:</label>
                <select id="country_id" class="form-control js-example-basic-single" name="country_id">
                  <option value="none" selected disabled hidden> 
                      <?php echo e(__('adminstaticword.SelectanOption')); ?>

                    </option>
                  
                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($coun->country_id); ?>" <?php echo e($user->country_id == $coun->country_id ? 'selected' : ''); ?>><?php echo e($coun->nicename); ?>

                    </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div class="col-md-3">
                <label for="city_id"><?php echo e(__('adminstaticword.State')); ?>:</label>
                <select id="upload_id" class="form-control js-example-basic-single" name="state_id">
                  <option value="none" selected disabled hidden> 
                    <?php echo e(__('adminstaticword.SelectanOption')); ?>

                  </option>
                  <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($s->id); ?>" <?php echo e($user->state_id==$s->id ? 'selected' : ''); ?>><?php echo e($s->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>
              </div>

              <div class="col-md-3">
                <label for="city_id"><?php echo e(__('adminstaticword.City')); ?>:</label>
                <select id="grand" class="form-control js-example-basic-single" name="city_id">
                  <option value="none" selected disabled hidden> 
                     <?php echo e(__('adminstaticword.SelectanOption')); ?>

                  </option>
                  <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($c->id); ?>" <?php echo e($user->city_id == $c->id ? 'selected' : ''); ?>><?php echo e($c->name); ?>

                    </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
          
              <div class="col-md-3">
                <label for="pin_code"><?php echo e(__('adminstaticword.Pincode')); ?>:</label>
                <input value="<?php echo e($user->pin_code); ?>" placeholder="Enter Pincode" type="text" name="pin_code" class="form-control">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-3">
                <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Verified')); ?>:</label>
                <li class="tg-list-item">
                  <input class="tgl tgl-skewed" id="c033"   type="checkbox"  <?php echo e($user->verified==1 ? 'checked' : ''); ?>>
                <label class="tgl-btn" data-tg-off="No" data-tg-on="Yes" for="c033"></label>
                </li>
                <input type="hidden" name="verified" value="<?php echo e($user->varified); ?>" id="tt">
              </div>

              <div class="col-md-3">
                <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                <li class="tg-list-item">              
                  <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" <?php echo e($user->status == '1' ? 'checked' : ''); ?> >
                  <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
              </li>
              <input type="hidden"  name="free" value="0" for="status" id="status">
              </div>


              <div class="col-md-3">
                  <label  for="married_status"><?php echo e(__('adminstaticword.ChooseMarrigeStatus')); ?>: </label>
                  <select class="form-control js-example-basic-single" id="married_status" name="married_status">
                    <option value="none" selected disabled hidden> 
                       <?php echo e(__('adminstaticword.SelectanOption')); ?>

                    </option> 
                    <option id="Unmarried" <?php echo e($user->married_status == 'Unmarried' ? 'selected' : ''); ?> value="Unmarried"><?php echo e(__('adminstaticword.Unmarried')); ?></option>
                    <option id="Married" <?php echo e($user->married_status == 'Married' ? 'selected' : ''); ?> value="Married"><?php echo e(__('adminstaticword.Married')); ?></option>
                    <option id="Divorced" <?php echo e($user->married_status == 'Divorced' ? 'selected' : ''); ?> value="Divorced"><?php echo e(__('adminstaticword.Divorced')); ?></option>
                    <option id="Widowed" <?php echo e($user->married_status == 'Widowed' ? 'selected' : ''); ?> value="Widowed"><?php echo e(__('adminstaticword.Widowed')); ?></option>
                  </select>
                  <br> 
              </div>


              <div class="col-md-3 display-none" id="doaboxxx">
                <label for="dob"><?php echo e(__('adminstaticword.DateofAnniversary')); ?>: </label>
                <input value="<?php echo e($user->doa); ?>" name="doa" id="doa" type="text" class="form-control" placeholder="Enter Date of anniversary">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-6">
                <label><?php echo e(__('adminstaticword.Image')); ?>:<sup class="redstar">*</sup></label>
                <input type="file" name="user_img" class="form-control">
              </div>
              <div class="col-md-6">
                <?php if($user->user_img != null || $user->user_img !=''): ?>
                  <div class="edit-user-img">
                    <img src="<?php echo e(url('/images/user_img/'.$user->user_img)); ?>" class="img-fluid" alt="User Image" class="img-responsive">
                  </div>
                <?php else: ?>
                  <div class="edit-user-img">
                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-fluid" alt="User Image" class="img-responsive">
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <div class="update-password">
                  <label for="box1"> <?php echo e(__('adminstaticword.UpdatePassword')); ?>:</label>
                  <input type="checkbox" id="myCheck" name="update_pass" onclick="myFunction()">
                </div>
              </div>
            </div>

            <div class="row display-none" id="update-password">
              <div class="col-md-6">
                <label><?php echo e(__('adminstaticword.Password')); ?></label>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
              </div>
              <div class="col-md-6">
                <label><?php echo e(__('adminstaticword.ConfirmPassword')); ?></label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm password">
              </div>
            </div>
            <br>


            <div class="row">
              <div class="col-md-12">
                <label for="detail"><?php echo e(__('adminstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                <textarea id="detail" name="detail" class="form-control" rows="5" placeholder="Enter your details" value=""><?php echo e($user->detail); ?></textarea>
              </div>
            </div>
            <br>

            <div class="box-header with-border">
              <h3 class="box-title"><?php echo e(__('adminstaticword.SocialProfile')); ?></h3>
            </div>
            <br>

            <div class="row">
              <div class="col-md-6">
                <label for="fb_url">
                <?php echo e(__('adminstaticword.FacebookUrl')); ?>:
                </label>
                <input autofocus name="fb_url" value="<?php echo e($user->fb_url); ?>" type="text" class="form-control" placeholder="Facebook.com/"/>
              </div>
              <div class="col-md-6">
                <label for="youtube_url">
                <?php echo e(__('adminstaticword.YoutubeUrl')); ?>:
                </label>
                <input autofocus name="youtube_url" value="<?php echo e($user->youtube_url); ?>" type="text" class="form-control" placeholder="youtube.com/"/>
                <br>
              </div>
            
              <div class="col-md-6">
                <label for="twitter_url">
                <?php echo e(__('adminstaticword.TwitterUrl')); ?>:
                </label>
                <input autofocus name="twitter_url" value="<?php echo e($user->twitter_url); ?>" type="text" class="form-control" placeholder="Twitter.com/"/>
              </div>
              <div class="col-md-6">
                <label for="linkedin_url">
                <?php echo e(__('adminstaticword.LinkedInUrl')); ?>:
                </label>
                <input autofocus name="linkedin_url" value="<?php echo e($user->linkedin_url); ?>" type="text" class="form-control" placeholder="Linkedin.com/"/>
              </div>
            </div>
            <br>
            <br>
            

            <div class="box-footer">
              <button type="submit" class="btn btn-md btn-primary">
                <i class="fa fa-save"></i> <?php echo e(__('adminstaticword.Save')); ?>

              </button>
            </form>
              <a href="<?php echo e(route('user.index')); ?>" title="Cancel and go back" class="btn btn-md btn-default btn-flat">
                <i class="fa fa-reply"></i> <?php echo e(__('adminstaticword.Back')); ?>

              </a>
            </div>
            <br>

          </form>
        </div>
        <!-- /.panel body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
(function($) {
  "use strict";

  $( function() {
    $( "#dob,#doa" ).datepicker({
      changeYear: true,
      yearRange: "-100:+0",
      dateFormat: 'yy/mm/dd',
    });
  });
  

  $('#married_status').change(function() {
      
    if($(this).val() == 'Married')
    {
      $('#doaboxxx').show();
    }
    else
    {
      $('#doaboxxx').hide();
    }
  });

  tinymce.init({selector:'textarea#detail'});

  $(function() {
    var urlLike = '<?php echo e(url('country/dropdown')); ?>';
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
    var urlLike = '<?php echo e(url('country/gcity')); ?>';
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

<script>
  function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("update-password");
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
       text.style.display = "none";
    }
  }
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/user/edit.blade.php ENDPATH**/ ?>