<?php $__env->startSection('title', 'View Category - Admin'); ?>
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
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.Category')); ?></h3>
        </div>
        <div class="box-header">
          <button type="button"class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal">
            + <?php echo e(__('adminstaticword.Add')); ?>

          </button>
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><?php echo e(__('adminstaticword.AddCategory')); ?></h4>
                </div>
                <div class="modal-body">
                  <form id="demo-form2" method="post" action="<?php echo e(url('category/')); ?>" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
                    <?php echo e(csrf_field()); ?>


                    <div class="row">
                      <div class="col-md-12">
                        <label for="c_name"><?php echo e(__('adminstaticword.Name')); ?>:<sup class="redstar">*</sup></label>
                        <input placeholder="Enter your category" type="text" class="form-control" name="title" required="">
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-12">
                        <label for="icon"><?php echo e(__('adminstaticword.Icon')); ?>:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control icp-auto icp" name="icon" required placeholder="Choose Icon">
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Featured')); ?>:</label>
                          <li class="tg-list-item">              
                          <input class="tgl tgl-skewed" id="featured" type="checkbox" name="featured" >
                          <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="featured"></label>
                        </li>
                        <input type="hidden"  name="free" value="0" for="featured" id="featured">
                      </div>
                      <div class="col-md-4">
                        <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                        <li class="tg-list-item">              
                          <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" >
                          <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                        </li>
                        <input type="hidden"  name="free" value="0" for="status" id="status">

                        
                      </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo e(__('adminstaticword.Category')); ?></th>
                  <th><?php echo e(__('adminstaticword.Icon')); ?></th>
                  <th><?php echo e(__('adminstaticword.Slug')); ?></th>
                  <th><?php echo e(__('adminstaticword.Featured')); ?></th>
                  <th><?php echo e(__('adminstaticword.Status')); ?></th>
                  <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                  <th><?php echo e(__('adminstaticword.Delete')); ?></th>
                </tr>
              </thead>
              <tbody id="sortable">
                <?php $i=0;?>
                <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++;?>
                  <tr class="sortable" id="id-<?php echo e($cat->id); ?>">
                    <td><?php echo $i;?></td>
                    <td><?php echo e($cat->title); ?></td>
                    <td><i class="fa <?php echo e($cat->icon); ?>"></i></td>
                    <td><?php echo e($cat->slug); ?></td>
                    <td>
                      <form action="<?php echo e(route('categoryf.quick',$cat->id)); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <button type="Submit" class="btn btn-xs <?php echo e($cat->featured ==1 ? 'btn-success' : 'btn-danger'); ?>">
                            <?php if($cat->featured ==1): ?>
                            <?php echo e(__('adminstaticword.Yes')); ?>

                            <?php else: ?>
                            <?php echo e(__('adminstaticword.No')); ?>

                            <?php endif; ?>
                          </button>
                        </form>
                    </td>
                    <td>
                        <form action="<?php echo e(route('category.quick',$cat->id)); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <button type="Submit" class="btn btn-xs <?php echo e($cat->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                            <?php if($cat->status ==1): ?>
                            <?php echo e(__('adminstaticword.Active')); ?>

                            <?php else: ?>
                            <?php echo e(__('adminstaticword.Deactive')); ?>

                            <?php endif; ?>
                          </button>
                        </form>
                    </td>
            
                    <td>
                      <a class="btn btn-success btn-sm" href="<?php echo e(url('category/'.$cat->id)); ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                    <td>
                      <form  method="post" action="<?php echo e(url('category/'.$cat->id)); ?>"data-parsley-validate class="form-horizontal form-label-left">
                          <?php echo e(csrf_field()); ?>

                          <?php echo e(method_field('DELETE')); ?>

                        <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i></button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script type="text/javascript">
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );

   $("#sortable").sortable({
   update: function (e, u) {
    var data = $(this).sortable('serialize');
   
    $.ajax({
        url: "<?php echo e(route('category_reposition')); ?>",
        type: 'get',
        data: data,
        dataType: 'json',
        success: function (result) {
          console.log(data);
        }
    });

  }

});
  </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/category/view.blade.php ENDPATH**/ ?>