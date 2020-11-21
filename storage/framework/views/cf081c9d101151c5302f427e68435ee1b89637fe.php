<section class="content">
 
  <div class="row">
    <div class="col-md-12">
      <a data-toggle="modal" data-target="#myModalab" href="#" class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.Add')); ?></a>
      <br>
      <br>
      <table id="example1" class="table table-bordered table-striped db">
        <thead>
          <tr>
            <th><?php echo e(__('adminstaticword.CourseChapter')); ?></th>
            <th><?php echo e(__('adminstaticword.Title')); ?></th>
            <th><?php echo e(__('adminstaticword.Status')); ?></th>
            <th><?php echo e(__('adminstaticword.Featured')); ?></th>
            <th><?php echo e(__('adminstaticword.Edit')); ?></th>
            <th><?php echo e(__('adminstaticword.Delete')); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $courseclass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <?php
              $chname = App\CourseChapter::where('id','=',$cat->coursechapter_id)->get();
              ?>
              <td>
                <?php $__currentLoopData = $chname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($cc->chapter_name); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </td>
              <td><?php echo e($cat->title); ?></td>
              <td>
                <?php if($cat->status==1): ?>
                 <?php echo e(__('adminstaticword.Active')); ?>

                <?php else: ?>
                 <?php echo e(__('adminstaticword.Deactive')); ?>

                <?php endif; ?>
              </td>
              <td>
                <?php if($cat->featured==1): ?>
                  <?php echo e(__('adminstaticword.Yes')); ?>

                <?php else: ?>
                  <?php echo e(__('adminstaticword.No')); ?>

                <?php endif; ?>
              </td>
              <td>
                <a class="btn btn-success btn-sm" href="<?php echo e(url('courseclass/'.$cat->id)); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
              </td> 
              <td>
                <form  method="post" action="<?php echo e(url('courseclass/'.$cat->id)); ?>"data-parsley-validate class="form-horizontal form-label-left">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>


                  <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <?php if(count($courseclass) == 0): ?>
            <div class="col-md-12 text-center">
              <?php echo e(__('adminstaticword.empty')); ?>

            </div>
      <?php endif; ?> 
    </div>
  </div>

  <!--Model start-->
  <div class="modal fade" id="myModalab" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.CourseClass')); ?></h4>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form enctype="multipart/form-data" id="demo-form2" method="post" action="<?php echo e(route('courseclass.store')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>

                          

                <select class="display-none" name="course_id" class="form-control">
                  <option value="<?php echo e($cor->id); ?>"><?php echo e($cor->title); ?></option>
                </select>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.ChapterName')); ?></label>
                    <select name="course_chapters" class="form-control col-md-7 col-xs-12 js-example-basic-single">
                      <?php $__currentLoopData = $coursechapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($c->id); ?>"><?php echo e($c->chapter_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Title')); ?>:<sup class="redstar">*</sup></label>
                    <input type="text" class="form-control " name="title" id="exampleInputTitle"   placeholder="Enter Your Title"value="" required>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <label for="type"><?php echo e(__('adminstaticword.Type')); ?>:</label>
                    <select name="type" id="filetype" class="form-control js-example-basic-single">
                      <option><?php echo e(__('adminstaticword.ChooseFileType')); ?></option>
                      <option value="video"><?php echo e(__('adminstaticword.Video')); ?></option>
                      <option value="pdf"><?php echo e(__('adminstaticword.Pdf')); ?></option>
                    <!--
                      <option value="image"><?php echo e(__('adminstaticword.Image')); ?></option>
                      <option value="zip"><?php echo e(__('adminstaticword.Zip')); ?></option>
                      -->
                    </select>
                  </div>
                  <br>

                  <!--for image -->
                  <div class="col-md-12 display-none" id="imageChoose">
                    <input type="radio" name="checkImage" id="ch3" value="url"> <?php echo e(__('adminstaticword.URL')); ?>

                    <input type="radio" name="checkImage" id="ch4" value="uploadimage"> <?php echo e(__('adminstaticword.UploadImage')); ?>

                  </div>
                  
                  <div class="col-md-12 display-none" id="imageURL">
                    <label for=""><?php echo e(__('adminstaticword.URL')); ?>: </label>
                    <input type="text" name="imgurl" placeholder="Enter Your URL" class="form-control">
                  </div>

                  <div class="col-md-12 display-none" id="imageUpload">
                    <label for=""><?php echo e(__('adminstaticword.UploadImage')); ?>: </label>
                    <input type="file" name="image" class="form-control">
                  </div>



                  <!--video-->
                  <div class="col-md-12 display-none" id="videotype">
                    <input type="radio" name="checkVideo" id="ch2" value="uploadvideo" checked="true"><?php echo e(__('adminstaticword.UploadVideo')); ?>

                    <!--
                    <input type="radio" name="checkVideo" id="ch1" value="url"> <?php echo e(__('adminstaticword.URL')); ?>

                    <input type="radio" name="checkVideo" id="ch9" value="iframeurl"> <?php echo e(__('adminstaticword.IframeURL')); ?>

                    <input type="radio" name="checkVideo" id="ch10" value="liveurl"> <?php echo e(__('adminstaticword.LiveClass')); ?>

                    -->
                  </div>

                  <div class="col-md-12 display-none" id="videoURL">
                    <label for=""><?php echo e(__('adminstaticword.URL')); ?>: </label>
                    <input type="text" name="vidurl"  placeholder="Enter Your URL" class="form-control">
                  </div>

                  <div class="col-md-12 display-none" id="videoUpload">
                    <label for=""><?php echo e(__('adminstaticword.UploadVideo')); ?>: </label>
                    <input type="file" name="video_upld" class="form-control">
                  </div>

                  <div class="col-md-12 display-none" id="iframeURLBox">
                    <label for=""><?php echo e(__('adminstaticword.IframeURL')); ?>: </label>
                    <input type="text" name="iframe_url"  placeholder="Enter Your Iframe URL" class="form-control">
                  </div>

                  

                  <div class="row display-none" id="liveclassBox">
                    <div class="col-md-12">
                      <label for="appt">Select a Date & Time:</label>
                      <input type="datetime-local" id="date_time" name="date_time">
                    </div>
                    
                  </div>
              

                  




                  <!-- zip -->
                  <div class="col-md-12 display-none" id="zipChoose">
                    <input type="radio" value="zipURLEnable" name="checkZip" id="ch5"> <?php echo e(__('adminstaticword.URL')); ?>

                    <input type="radio" value="zipEnable" name="checkZip" id="ch6"> <?php echo e(__('adminstaticword.UploadZip')); ?>

                  </div>
                  
                  <div class="col-md-12 display-none" id="zipURL">
                    <label for=""><?php echo e(__('adminstaticword.URL')); ?>: </label>
                    <input type="text" name="zipurl" placeholder="Enter Your URL" class="form-control">
                  </div>

                  <div class="col-md-12 display-none" id="zipUpload">
                    <label for=""><?php echo e(__('adminstaticword.UploadZip')); ?>: </label>
                    <input type="file" name="uplzip" class="form-control">
                  </div>


                  <!-- pdf -->
                  <div class="col-md-12 display-none" id="pdfChoose">
                    <input type="radio" value="pdfURLEnable" name="checkUrl" id="ch7"> <?php echo e(__('adminstaticword.URL')); ?>

                    <input type="radio" value="pdfEnable" name="checkPdf" id="ch8"> <?php echo e(__('adminstaticword.UploadPdf')); ?>

                  </div>
                  <div class="col-md-12 display-none" id="pdfURL">
                    <label for=""> <?php echo e(__('adminstaticword.URL')); ?>: </label>
                    <input type="text" name="pdfurl" placeholder="Enter Your URL" class="form-control">
                  </div>
                  <div class="col-md-12 display-none" id="pdfUpload">
                    <label for=""> <?php echo e(__('adminstaticword.UploadPdf')); ?>: </label>
                    <input type="file" name="pdf" class="form-control">
                  </div>
                  <br>


                  <div class="col-md-12 display-none" id="duration">
                    <label for=""> <?php echo e(__('adminstaticword.Duration')); ?>:</label>
                    <input type="text" name="duration" placeholder="Enter class duration in (mins) Eg:160" class="form-control">
                  </div>
                  <br> 

                  <div class="col-md-12 display-none" id="size">
                    <label for=""><?php echo e(__('adminstaticword.Size')); ?>:</label>
                    <input type="text" name="size" placeholder="Enter Your Size" class="form-control">
                  </div>
                </div>
                <br>

               
                <!-- preview video -->
                <div class="row"> 
                  <div class="col-md-12 display-none" id="previewUrl">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.PreviewVideo')); ?>:</label>
                    <li class="tg-list-item">              
                      <input name="preview_type" class="tgl tgl-skewed" id="previewvid" type="checkbox"/>
                      <label class="tgl-btn" data-tg-off="URL" data-tg-on="Upload" for="previewvid"></label>                
                    </li>
                    <input type="hidden" name="free" value="0" id="cxv">
                 
                    <div class="display-none" id="document11">
                      <label for="exampleInputSlug">Preview <?php echo e(__('adminstaticword.UploadVideo')); ?>:</label>
                      <input type="file" name="video" id="video" value="" class="form-control">
                    </div> 
                    <div id="document22">
                      <label for="">Preview <?php echo e(__('adminstaticword.URL')); ?>: </label>
                      <input type="text" name="url" id="url"  placeholder="Enter Your URL" class="form-control" >
                    </div>
                  </div>
                </div>
                </br>
                <!-- end preview video -->


                <div class="row">  
                  <div class="col-md-4">    
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                    <li class="tg-list-item">   
                      <input class="tgl tgl-skewed" id="c11"  type="checkbox"/>
                      <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="c11"></label>
                    </li>
                    <input type="hidden" name="status" value="1" id="t11">
                  </div>
                  <div class="col-md-4">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Featured')); ?>:</label>    
                    <li class="tg-list-item">
                      <input class="tgl tgl-skewed" id="cb100"   type="checkbox"/>
                      <label class="tgl-btn" data-tg-off="NO" data-tg-on="YES" for="cb100"></label>
                    </li>
                    <input type="hidden" name="featured" value="1" id="c100">
                  </div>
                </div> 
                <br>
                <br>
               
                <div id="subtitle" class="display-none">
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
  <!--Model close -->    

</section> 

 

<?php $__env->startSection('script'); ?>
<!--courseclass.js is included -->

<script type="text/javascript">


 $('#previewvid').on('change',function(){
  if($('#previewvid').is(':checked')){
    $('#document11').show('fast');
    $('#document22').hide('fast');
  }else{
    $('#document22').show('fast');
    $('#document11').hide('fast');
  }

});

</script>

<?php $__env->stopSection(); ?>
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/course/courseclass/index.blade.php ENDPATH**/ ?>