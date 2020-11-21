<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <!-- left column -->
    <div class="col-xs-12">
      <!-- general form elements -->
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Course')); ?></h3>
        </div>
        <br>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <form action="<?php echo e(route('course.update',$cor->id)); ?>" method="post" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>  
              <?php echo e(method_field('PUT')); ?>

             
              <div class="row">
                <div class="col-md-3">
                  <label><?php echo e(__('adminstaticword.Category')); ?><span class="redstar">*</span></label>
                  <select name="category_id" id="category_id" class="form-control js-example-basic-single" required>
                    <option value="0"><?php echo e(__('adminstaticword.SelectanOption')); ?></option>
                    <?php
                      $category = App\Categories::all();
                    ?> 

                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php echo e($cor->category_id == $caat->id ? 'selected' : ""); ?> value="<?php echo e($caat->id); ?>"><?php echo e($caat->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </select>
                </div>
                <div class="col-md-3">
                  <label><?php echo e(__('adminstaticword.SubCategory')); ?>:<span class="redstar">*</span></label>
                  <select name="subcategory_id" id="upload_id" class="form-control js-example-basic-single" required>
                    <?php
                      $subcategory = App\SubCategory::all();
                    ?>
                    <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php echo e($cor->subcategory_id == $caat->id ? 'selected' : ""); ?> value="<?php echo e($caat->id); ?>"><?php echo e($caat->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <label><?php echo e(__('adminstaticword.ChildCategory')); ?>:</label>
                  <select name="childcategory_id" id="grand" class="form-control js-example-basic-single">
                    <?php
                      $childcategory = App\ChildCategory::all();
                    ?> 

                    <?php $__currentLoopData = $childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php echo e($cor->subcategory_id == $caat->id ? 'selected' : ""); ?> value="<?php echo e($caat->id); ?>"><?php echo e($caat->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>     
                <div class="col-md-3">
                  <?php
                    $User = App\User::all();
                  ?>
                  <label for="exampleInputSlug"><?php echo e(__('adminstaticword.SelectUser')); ?></label>
                  <select name="user" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    <option  value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->fname); ?></option>
                  </select>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6"> 
                  <?php
                      $languages = App\CourseLanguage::all();
                  ?>
                  <label for="exampleInputSlug"><?php echo e(__('adminstaticword.SelectLanguage')); ?></label>
                  <select name="language_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php echo e($cor->language_id == $cat->id ? 'selected' : ""); ?> value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <div class="col-md-6"> 
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Title')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle" value="<?php echo e($cor->title); ?>">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.ShortDetail')); ?>:<sup class="redstar">*</sup></label>
                  <textarea name="short_detail" rows="3" class="form-control" ><?php echo $cor->short_detail; ?></textarea>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputSlug"><?php echo e(__('adminstaticword.Slug')); ?></label>
                  <input type="slug" class="form-control" name="slug" id="exampleInputPassword1" value="<?php echo e($cor->slug); ?>">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Requirements')); ?>:<sup class="redstar">*</sup></label>
                  <textarea name="requirement" rows="3" class="form-control" required ><?php echo $cor->requirement; ?></textarea>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                  <textarea name="detail" rows="3" class="form-control" required ><?php echo $cor->detail; ?></textarea>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.MoneyBack')); ?>:</label>
                  <li class="tg-list-item">
                    <input  class="tgl tgl-skewed" id="rox" type="checkbox" <?php if($cor->day !="" && $cor->day !=""): ?> checked <?php endif; ?>/>
                    <label class="tgl-btn" data-tg-off="No" data-tg-on="Yes" for="rox" ></label>
                  </li>
                  <input type="hidden" name="money" value="0" id="roxx">
                  <br>     

                  <div <?php if($cor->day =="" && $cor->day ==""): ?> class="display-none" <?php endif; ?> id="jeet">
                    <label for="exampleInputSlug"><?php echo e(__('adminstaticword.Days')); ?>:<sup class="redstar">*</sup></label>
                    <input type="number" min="1"  class="form-control" name="day" id="exampleInputPassword1" placeholder="Please Your Enter day" value="<?php echo e($cor->day); ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Free')); ?>:</label>  
                  <li class="tg-list-item"> 
                    <input  class="tgl tgl-skewed" id="cb111" name="type" type="checkbox" <?php echo e($cor->type == '1' ? 'checked' : ''); ?>/>
                    <label class="tgl-btn" data-tg-off="Free" data-tg-on="Paid" for="cb111" ></label>
                  </li>
                  <input type="hidden" name="free" value="0" id="j111">
                  <br>     

                  <div <?php if($cor->price =="" && $cor->price ==""): ?> class="display-none" <?php endif; ?> id="doabox">
                    <label for="exampleInputSlug"><?php echo e(__('adminstaticword.Price')); ?>: <sup class="redstar">*</sup></label>
                    <input type="number" min="1"   class="form-control" name="price" id="exampleInputPassword1" placeholder="Please Your Enter paid" value="<?php echo e($cor->price); ?>">
                  </div>

                  <div <?php if($cor->price =="" && $cor->discount_price ==""): ?> class="display-none" <?php endif; ?> id="doaboxx">
                  <br>
                    <label for="exampleInputSlug"><?php echo e(__('adminstaticword.DiscountPrice')); ?>: <sup class="redstar">*</sup></label>
                    <input type="number" min="1"  class="form-control" name="discount_price" id="exampleInputPassword1" placeholder="Please Your Enter paid" value="<?php echo e($cor->discount_price); ?>">
                  </div>
                </div>
                <div class="col-md-3"> 
                  <?php if(Auth::User()->role == "admin"): ?>
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Featured')); ?>:</label>
                  <li class="tg-list-item">
                    <input class="tgl tgl-skewed" id="cb1" type="checkbox"<?php echo e($cor->featured==1 ? 'checked' : ''); ?>>
                    <label class="tgl-btn" data-tg-off="No" data-tg-on="Yes" for="cb1"></label>
                  </li>
                  <input type="hidden" name="featured" value="<?php echo e($cor->featured); ?>" id="f">
                  <?php endif; ?>
                </div>
                <div class="col-md-3">
                  <?php if(Auth::User()->role == "admin"): ?>
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                    <li class="tg-list-item">
                    <input class="tgl tgl-skewed" id="cb333" type="checkbox" <?php echo e($cor->status==1 ? 'checked' : ''); ?>>
                    <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="cb333"></label>
                    </li>
                    <input type="hidden" name="status" value="<?php echo e($cor->status); ?>" id="c33">
                  <?php endif; ?>
                </div>
              </div>
              <br>
           
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.PreviewVideo')); ?>:</label>  
                  <li class="tg-list-item"> 
                    <input name="preview_type"  class="tgl tgl-skewed" id="preview" type="checkbox" <?php echo e($cor->preview_type=="video" ? 'checked' : ''); ?>>

                    <label class="tgl-btn" data-tg-off="URL" data-tg-on="Upload" for="preview" ></label>
                  </li>
                  <input type="hidden" name="free" value="0" id="to">

                  <div <?php if($cor->preview_type =="url" ): ?> class="display-none" <?php endif; ?> id="document1">
                    <label for="exampleInputSlug"><?php echo e(__('adminstaticword.UploadVideo')); ?>: <sup class="redstar">*</sup></label>
                    <input  type="file" class="form-control" name="video" id="video" value="<?php echo e($cor->video); ?>">
                    <?php if($cor->video !=""): ?>
                      <video src="<?php echo e(asset('video/preview/'.$cor->video)); ?>" width="200" height="150" autoplay="no">
                      </video>
                    <?php endif; ?> 
                  </div>

                  <div <?php if($cor->preview_type =="video"): ?> class="display-none" <?php endif; ?> id="document2">
                    <br>
                    <label for="exampleInputSlug"><?php echo e(__('adminstaticword.URL')); ?>: <sup class="redstar">*</sup></label>
                    <input  class="form-control" placeholder="Enter Your URL" name="url" id="url" value="<?php echo e($cor->url); ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <label><?php echo e(__('adminstaticword.PreviewImage')); ?>:</label> 
                  <br> 
                  <input type="file" name="image" id="image" class="inputfile inputfile-1"  />
                  <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="7" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span><?php echo e(__('adminstaticword.Chooseafile')); ?>&hellip;</span>
                  </label>
                  <br>
                  <?php if($cor['preview_image'] !== NULL && $cor['preview_image'] !== ''): ?>
                      <img src="<?php echo e(url('/images/course/'.$cor->preview_image)); ?>" height="70px;" width="70px;"/>
                  <?php else: ?>
                      <img src="<?php echo e(Avatar::create($cor->title)->toBase64()); ?>" alt="course" class="img-fluid">
                  <?php endif; ?>
                </div>
                <div class="col-md-3">
                  <label for="exampleInputSlug">Course Expire Duration</label>
                  <p class="inline info"> - Please enter duration in month</p>
                  <input min="1" class="form-control" name="duration" type="number" id="duration" value="<?php echo e($cor->duration); ?>" placeholder="Enter Duration in months">
                </div>
              </div>
              <br>
              <br>

              <div class="box-footer">
                <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
              </div>
         
            </form>
          </div>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 


<?php $__env->startSection('scripts'); ?>

<script>
(function($) {
  "use strict";

  $(function() {
    $('.js-example-basic-single').select2();
  });

  $(function() {
    $('#cb1').change(function() {
      $('#f').val(+ $(this).prop('checked'))
    })
  })

  $(function() {
    $('#cb3').change(function() {
      $('#test').val(+ $(this).prop('checked'))
    })
  })

  $(function(){

      $('#murl').change(function(){
        if($('#murl').val()=='yes')
        {
            $('#doab').show();
        }
        else
        {
            $('#doab').hide();
        }
      });

  });

  $(function(){

      $('#murll').change(function(){
        if($('#murll').val()=='yes')
        {
            $('#doabb').show();
        }
        else
        {
            $('#doab').hide();
        }
      });

  });

  $('#preview').on('change',function(){

    if($('#preview').is(':checked')){
      $('#document1').show('fast');
      $('#document2').hide('fast');    

    }else{
      $('#document2').show('fast');
      $('#document1').hide('fast');    
    }

  });

  $(function() {
    var urlLike = '<?php echo e(url('admin/dropdown')); ?>';
    $('#category_id').change(function() {
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
    var urlLike = '<?php echo e(url('admin/gcat')); ?>';
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
  
<?php $__env->stopSection(); ?>
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/course/editcor.blade.php ENDPATH**/ ?>