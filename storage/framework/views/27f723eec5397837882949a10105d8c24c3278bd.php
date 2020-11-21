<?php $__env->startSection('title', 'Edit Class - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  
  <div class="row">
    <div class="col-md-7">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.CourseClass')); ?></h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form enctype="multipart/form-data" id="demo-form" method="post" action="<?php echo e(url('courseclass/'.$cate->id)); ?>"data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

                        
              <select class="display-none" name="coursechapter" class="form-control col-md-7 col-xs-12">
                <?php
                 $coursechapters = App\CourseChapter::all();
                ?>  
                <?php $__currentLoopData = $coursechapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($cate->coursechapter_id == $cat->id ? 'selected' : ""); ?> value="<?php echo e($cat->id); ?>"><?php echo e($cat->chapter_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>


              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Title')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control " name="title" id="exampleInputTitle"  value="<?php echo e($cate->title); ?>" required>                  
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12">
                  <label for="type"><?php echo e(__('adminstaticword.CourseChapter')); ?>:</label>

                  <select name="coursechapter_id" id="chapters" class="form-control">
                    <?php $__currentLoopData = $coursechapt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($chapters->id); ?>" <?php echo e($cate->coursechapter_id==$chapters->id ? 'selected' : ''); ?>><?php echo e($chapters->chapter_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              <br>
              
              <div class="row">
                <div class="col-md-12">
                  <label for="type"><?php echo e(__('adminstaticword.Type')); ?>:</label>
                  <select name="type" id="filetype" class="form-control">
                    <option value="<?php echo e($cate->type); ?>"><?php echo e($cate->type); ?></option>
                  </select>
                </div>
              </div>
              <br>
             
              <?php if($cate->type =="video"): ?>
                <div class="row">
                  <div class="col-md-12" id="videotype">
                    <input type="radio" name="checkVideo" id="ch1" value="url" <?php echo e($cate->url !="" ? 'checked' : ""); ?>> <?php echo e(__('adminstaticword.URL')); ?>

                    <input type="radio" name="checkVideo" id="ch2" value="uploadvideo" <?php echo e($cate->video !="" ? 'checked' : ""); ?>> <?php echo e(__('adminstaticword.UploadVideo')); ?>

                    <input type="radio" name="checkVideo" id="ch9" value="iframeurl" <?php echo e($cate->iframe_url !="" ? 'checked' : ""); ?>><?php echo e(__('adminstaticword.IframeURL')); ?>

                    <input type="radio" name="checkVideo" id="ch10" value="liveurl" <?php echo e($cate->date_time !="" ? 'checked' : ""); ?>><?php echo e(__('adminstaticword.LiveClass')); ?>

                    <br>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div id="videoURL" <?php if($cate->video !=NULL || $cate->iframe_url !=NULL): ?> class="display-none" <?php endif; ?> >
                      <label for=""><?php echo e(__('adminstaticword.URL')); ?>: </label>
                      <input type="text" value="<?php echo e($cate->url); ?>" name="vidurl" class="form-control">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div id="videoUpload" <?php if($cate->url !=NULL || $cate->iframe_url !=NULL): ?> class="display-none" <?php endif; ?> >
                      <label for=""><?php echo e(__('adminstaticword.UploadVideo')); ?>: </label>
                      <input type="file" name="video_upld" class="form-control">
                      <?php if($cate->video !=""): ?>
                        <video src="<?php echo e(asset('video/class/'.$cate->video)); ?>" autoplay="no">
                        </video>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div id="iframeURLBox" <?php if($cate->url !=NULL || $cate->video !=NULL): ?> class="display-none" <?php endif; ?> >
                      <label for=""><?php echo e(__('adminstaticword.IframeURL')); ?>: </label>
                      <input type="text" value="<?php echo e($cate->iframe_url); ?>" name="iframe_url" class="form-control">
                    </div>
                  </div>
                </div>

              

                <div class="row">
                  <div class="col-md-12">
                    <div id="liveURLBox" <?php if($cate->iframe_url !=NULL || $cate->video !=NULL): ?> class="display-none" <?php endif; ?> >
                      <label for="appt">Select a Date & Time:</label>
                      
                      <input type="datetime-local" id="date_time" name="date_time" value="<?php echo e($live_date); ?>" class="form-control">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div  class="col-md-12" id="duration">
                    <label for=""><?php echo e(__('adminstaticword.Duration')); ?> :</label>
                    <input type="text" name="duration" value="<?php echo e($cate->duration); ?>" class="form-control" placeholder="Enter class duration in (mins) Eg:160">
                  </div>
                </div>
                <br>
              <?php endif; ?>

              <?php if($cate->type =="image"): ?>
               
                  <div class="col-md-7" id="imagetype">
                    <input type="radio" name="checkImage" id="ch3" value="url" <?php echo e($cate->url !="" ? 'checked' : ""); ?>> <?php echo e(__('adminstaticword.URL')); ?>

                    <input type="radio" name="checkImage" id="ch4"  <?php echo e($cate->image !="" ? 'checked' : ""); ?> value="uploadimage"> <?php echo e(__('adminstaticword.UploadImage')); ?>

                  </div>

                  <div class="col-md-7" id="imageURL" <?php if($cate->image !=""): ?> class="display-none" <?php endif; ?> >
                    <label for=""><?php echo e(__('adminstaticword.URL')); ?>: </label>
                    <input type="text" value="<?php echo e($cate->url); ?>" name="imgurl" class="form-control">
                  </div>

                  <div class="col-md-7" id="imageUpload" <?php if($cate->url !=""): ?> class="display-none" <?php endif; ?> >
                    <label for=""><?php echo e(__('adminstaticword.UploadImage')); ?>:</label>
                    <input type="file" name="image" class="form-control">
                    <br>
                    <?php if($cate->image !=""): ?>
                    <img src="<?php echo e(asset('images/class/'.$cate->image)); ?>" width="200" height="150" autoplay="no"> 
                    </img>

                    <?php endif; ?>
                  </div>
                  <br>
                  <br>
                   <div  class="col-md-7" id="size">
                    <label for=""><?php echo e(__('adminstaticword.Size')); ?>:</label>
                    <input type="text" name="size" value="<?php echo e($cate->size); ?>" class="form-control">
                  </div>
              <?php endif; ?>

              <?php if($cate->type =="zip"): ?>
                <div class="col-md-7" id="ziptype">
                  <input type="radio" name="checkZip" id="ch5" value="url" <?php echo e($cate->url !="" ? 'checked' : ""); ?>> <?php echo e(__('adminstaticword.URL')); ?>

                  <input type="radio" name="checkZip" id="ch6"  <?php echo e($cate->zip !="" ? 'checked' : ""); ?> value="uploadzip"> <?php echo e(__('adminstaticword.UploadZip')); ?>

                </div>

                <div class="col-md-7" id="zipURL" <?php if($cate->zip !=""): ?> class="display-none" <?php endif; ?> >
                  <label for=""> <?php echo e(__('adminstaticword.URL')); ?>: </label>
                  <input type="text" value="<?php echo e($cate->url); ?>" name="zipurl" class="form-control">
                </div>

                <div class="col-md-7" id="zipUpload" <?php if($cate->url !=""): ?> class="display-none" <?php endif; ?>>
                  <label for=""><?php echo e(__('adminstaticword.UploadZip')); ?>:</label>
                  <input type="file" name="zip" class="form-control">
                  <br>
                  <?php if($cate->zip !=""): ?>
                  <label for=""><?php echo e(__('adminstaticword.ZipFileName')); ?>:</label>
                  <input value="<?php echo e($cate->zip); ?>">
                  <?php endif; ?>
                </div>
                <br>
                <br>
                 <div  class="col-md-7" id="size">
                  <label for=""> <?php echo e(__('adminstaticword.Size')); ?>:</label>
                  <input type="text" name="size" value="<?php echo e($cate->size); ?>" class="form-control">
                </div>
              <?php endif; ?>

              <?php if($cate->type =="pdf"): ?>
                <div class="col-md-7" id="pdftype">
                  <input type="radio" name="checkPdf" id="ch8" value="url" <?php echo e($cate->url !="" ? 'checked' : ""); ?>> <?php echo e(__('adminstaticword.URL')); ?>

                  <input type="radio" name="checkPdf" id="ch9"  <?php echo e($cate->pdf !="" ? 'checked' : ""); ?> value="uploadpdf"> <?php echo e(__('adminstaticword.UploadPdf')); ?>

                </div>

                <div class="col-md-7" id="pdfURL" <?php if($cate->pdf !=""): ?> class="display-none" <?php endif; ?> >
                  <label for=""> <?php echo e(__('adminstaticword.URL')); ?>: </label>
                  <input type="text" value="<?php echo e($cate->url); ?>" name="pdfurl" class="form-control">
                </div>

                <div class="col-md-7" id="pdfUpload" <?php if($cate->url !=""): ?> class="display-none" <?php endif; ?> >
                  <label for=""> <?php echo e(__('adminstaticword.UploadPdf')); ?>:</label>
                  <input type="file" name="pdf" class="form-control">
                  <br>
                  <?php if($cate->pdf !=""): ?>
                  <label for=""><?php echo e(__('adminstaticword.PdfFileName')); ?>:</label>
                  <input value="<?php echo e($cate->pdf); ?>">
                  <?php endif; ?>
                </div>
                <br>
                <br>
                 <div  class="col-md-7" id="size">
                  <label for=""><?php echo e(__('adminstaticword.Size')); ?>:</label>
                  <input type="text" name="size" value="<?php echo e($cate->size); ?>" class="form-control">
                </div>
              <?php endif; ?>


              <!-- preview video -->
              <?php if($cate->type =="video"): ?>
              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.PreviewVideo')); ?>:</label>  
                  <li class="tg-list-item"> 
                    <input name="preview_type" class="tgl tgl-skewed" id="previewvide" type="checkbox" >

                    <label class="tgl-btn" data-tg-off="URL" data-tg-on="Upload" for="previewvide" ></label>
                  </li>
                  <input type="hidden" name="free" value="0" id="to">

                  <div <?php if($cate->preview_type =="url" ): ?> class="display-none" <?php endif; ?> id="document11">
                    <label for="exampleInputSlug">Preview <?php echo e(__('adminstaticword.UploadVideo')); ?>: <sup class="redstar">*</sup></label>
                    <input  type="file" class="form-control" name="preview_video" id="video" value="<?php echo e($cate->video); ?>">
                    <?php if($cate->preview_video !=""): ?>
                      <video src="<?php echo e(asset('video/class/preview/'.$cate->preview_video)); ?>" width="200" height="150" autoplay="no">
                      </video>
                    <?php endif; ?> 
                  </div>

                  <div <?php if($cate->preview_type =="video"): ?> class="display-none" <?php endif; ?> id="document22">
                   
                    <label for="exampleInputSlug">Preview <?php echo e(__('adminstaticword.URL')); ?>: <sup class="redstar">*</sup></label>
                    <input  class="form-control" placeholder="Enter Your URL" name="preview_url" id="url" value="<?php echo e($cate->preview_url); ?>">
                  </div>
                </div>
              </div>
              <br>
              <?php endif; ?>

              <!-- end preview video -->
             
              <div class="row">
                <div class="col-md-4"> 
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                  <li class="tg-list-item">              
                  <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> >
                  <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                </li>
                <input type="hidden"  name="free" value="0" for="status" id="status">
                  <br>
                </div>
                <div class="col-md-4"> 
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Featured')); ?>:</label>
                  <li class="tg-list-item">              
                  <input class="tgl tgl-skewed" id="featured" type="checkbox" name="featured" <?php echo e($cate->featured == '1' ? 'checked' : ''); ?> >
                  <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="featured"></label>
                </li>
                  <input type="hidden" name="free" value="0" id="featured">
                  <br>
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-lg col-md-4 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
              </div>
            </form>
          </div>
      </div>
      </div>
    </div>


    <?php if($cate->type =="video"): ?>

    <div class="col-md-5">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.Subtitle')); ?></h3>
        </div>
        <div class="box-body">
        <a data-toggle="modal" data-target="#myModalSubtitle" href="#" class="btn btn-info btn-sm">+  <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Subtitle')); ?></a>

          <!--Model start-->
        <div class="modal fade" id="myModalSubtitle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('adminstaticword.Add')); ?><?php echo e(__('adminstaticword.Subtitle')); ?></h4>
              </div>
              <div class="box box-primary">
              <div class="panel panel-sum">
                <div  class="modal-body">
                  <form enctype="multipart/form-data" id="demo-form2" method="post" action="<?php echo e(route('add.subtitle',$cate->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                    <?php echo e(csrf_field()); ?>


                    <div id="subtitle">

                      <label><?php echo e(__('adminstaticword.Subtitle')); ?>:</label>
                      <table class="table table-bordered" id="dynamic_field">  
                        <tr> 
                            <td>
                               <div class="<?php echo e($errors->has('sub_t') ? ' has-error' : ''); ?> input-file-block">
                                <input type="file" name="sub_t[]"/>
                                <p class="info">Choose subtitle file ex. subtitle.srt, or. txt</p>
                                <small class="text-danger"><?php echo e($errors->first('sub_t')); ?></small>
                              </div>
                            </td>

                            <td>
                              <input type="text" name="sub_lang[]" placeholder="Subtitle Language" class="form-control name_list" />
                            </td>  
                            <td><button type="button" name="add" id="add" class="btn btn-xs btn-success">
                              <i class="fa fa-plus"></i>
                            </button></td>  
                        </tr>  
                      </table>
                     
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('adminstaticword.Submit')); ?></button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <br>
            <br>
            <tr>
              <th>#</th>
              <th><?php echo e(__('adminstaticword.SubtitleLanguage')); ?> </th>
              <th><?php echo e(__('adminstaticword.Delete')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0;?>
            <?php $__currentLoopData = $subtitles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtitle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $i++;?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo e($subtitle->sub_lang); ?></td>
                <td>
                  <form  method="post" action="<?php echo e(route('del.subtitle',$subtitle->id)); ?>"
                        data-parsley-validate class="form-horizontal form-label-left">
                    <?php echo e(csrf_field()); ?>


                    <button type="submit" class="btn btn-danger display-inline">
                      <i class="fa fa-fw fa-trash-o"></i>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </tbody> 
        </table>
    </div>
    <?php endif; ?>
  </div>
</section> 

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<script type="text/javascript">
   $('#previewvide').on('change',function(){

    if($('#previewvide').is(':checked')){
      $('#document11').show('fast');
      $('#document22').hide('fast');
    }else{
      $('#document22').show('fast');
      $('#document11').hide('fast');
    }

  });
</script>

 <?php if($cate->type =="video"): ?>
  <script>
    (function($) {
    "use strict";
   
     $('#ch1').click(function(){
       $('#videoURL').show();
       $('#videoUpload').hide();
       $('#iframeURLBox').hide();
     });
    
    $('#ch2').click(function(){
       $('#videoURL').hide();
       $('#videoUpload').show();
       $('#iframeURLBox').hide();
     });

    $('#ch9').click(function(){
       $('#iframeURLBox').show();
       $('#videoURL').hide();
       $('#videoUpload').hide();
     });

    })(jQuery);
   
  </script>
 <?php endif; ?>

 <?php if($cate->type =="image"): ?>
  <script>
    (function($) {
    "use strict";
   
     $('#ch3').click(function(){
       $('#imageURL').show();
       $('#imageUpload').hide();
     });
    
    $('#ch4').click(function(){
       $('#imageURL').hide();
       $('#imageUpload').show();

     });

  })(jQuery);
  </script>
 <?php endif; ?>

 <?php if($cate->type =="zip"): ?>
  <script>
    (function($) {
    "use strict";
   
     $('#ch5').click(function(){
       $('#zipURL').show();
       $('#zipUpload').hide();
     });
    
    $('#ch6').click(function(){
       $('#zipURL').hide();
       $('#zipUpload').show();
     });

  })(jQuery);
   
  </script>

  
 <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/course/courseclass/edit.blade.php ENDPATH**/ ?>