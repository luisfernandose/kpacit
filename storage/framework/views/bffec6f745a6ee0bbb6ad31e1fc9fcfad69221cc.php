<?php $__env->startSection('title', 'View Slider - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.Slider')); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">

            <thead>
              <a class="btn btn-info btn-sm" href="<?php echo e(url('slider/create')); ?>">
              <i class="glyphicon glyphicon-th-l">+<?php echo e(__('adminstaticword.Add')); ?></i></a>
              <br>
              <br>
              <tr>
                <th>#</th>
                <th><?php echo e(__('adminstaticword.Image')); ?></th>
                <th><?php echo e(__('adminstaticword.Heading')); ?></th>
                <th><?php echo e(__('adminstaticword.SubHeading')); ?></th>
                <th><?php echo e(__('adminstaticword.SearchText')); ?></th>
                <th><?php echo e(__('adminstaticword.Detail')); ?></th>
                <th><?php echo e(__('adminstaticword.Status')); ?></th>
                <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                <th><?php echo e(__('adminstaticword.Delete')); ?></th>
              </tr>
            </thead>
            <tbody id="sortable">
              <?php $i=0;?>
              <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $i++;?>
              <tr class="sortable" id="id-<?php echo e($cat->id); ?>">
                <td><?php echo $i;?></td>
                <td>
                  <img src="images/slider/<?php echo $cat['image'];  ?>" class="img-responsive">
                </td>
                <td><?php echo e($cat->heading); ?></td>
                <td><?php echo e($cat->sub_heading); ?></td>
                <td><?php echo e($cat->search_text); ?></td>
                <td><?php echo e(strip_tags(str_limit($cat->detail, $limit = 50, $end = '...'))); ?></td>   
                <td>
                   <form action="<?php echo e(route('slider.quick',$cat->id)); ?>" method="POST">
                      <?php echo e(csrf_field()); ?>

                      <button  type="Submit" class="btn btn-xs <?php echo e($cat->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                        <?php if($cat->status ==1): ?>
                        <?php echo e(__('adminstaticword.Active')); ?>

                        <?php else: ?>
                        <?php echo e(__('adminstaticword.Deactive')); ?>

                        <?php endif; ?>
                      </button>
                    </form>
                </td>
              
                <th><a class="btn btn-primary btn-sm" href="<?php echo e(url('slider/'.$cat->id)); ?>">
                  <i class="glyphicon glyphicon-pencil"></i></a></th>

                <td>
                  <form  method="post" action="<?php echo e(url('slider/'.$cat->id)); ?>

                      "data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>

                       <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i></button>
                  </form>
                </td>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
              </tr>
            </tfoot>
          </table>
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
        url: "<?php echo e(route('slider_reposition')); ?>",
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/slider/index.blade.php ENDPATH**/ ?>