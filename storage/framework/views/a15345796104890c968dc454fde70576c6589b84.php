<?php $__env->startSection('title', 'Add Childcategory - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.AddChildCategory')); ?></h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="<?php echo e(url('childcategory/')); ?>" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              <?php echo e(csrf_field()); ?>

                
              <div class="row">
                <div class="col-md-5">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Category')); ?></label>
                  <select name="category_id" id="category_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    <option value="0"><?php echo e(__('adminstaticword.PleaseSelect')); ?></option>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                <div class="col-md-5">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.SubCategory')); ?></label>
                  <select name="subcategories" id="upload_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                  </select>
                </div>

                <div class="col-md-2">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.SubCategory')); ?></label>
                  <br>
                  <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#myModal7" title="AddCategory" class="btn btn-md btn-primary"><?php echo e(__('adminstaticword.Add')); ?></button>
                </div>
              </div>
              <br>       
                     
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Title')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle" placeholder="Enter your childcategory" value="">
                </div>
              
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Icon')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control icp-auto icp" name="icon" id="exampleInputTitle" placeholder="Enter your icon" value="">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12 ">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                  <br>
                  <li class="tg-list-item">              
                    <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" >
                    <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
              </div>
              <br>

              <div class="box-footer">
                <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
              </div>
         
            </form>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>

<script>
(function($) {
  "use strict";

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

})(jQuery);
</script> 
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/category/childcategory/insert.blade.php ENDPATH**/ ?>