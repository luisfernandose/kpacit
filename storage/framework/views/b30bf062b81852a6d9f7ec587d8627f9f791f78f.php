<?php $__env->startSection('title','All Countries'); ?>
<?php $__env->startSection("body"); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary" >
        <div class="box-header with-border">
          <h3 class="box-title">Country</h3>
        </div>
        <div class="box-header">
            <a href=" <?php echo e(url('admin/country/create')); ?> " class="btn btn-info btn-sm">+ Add Country</a> 
        </div> 

        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped table-responsive">
             
              <thead>
                <tr class="table-heading-row">
                  <th>#</th>
                  <th>Country Name </th>
                  <th>ISO Code 2</th>
                  <th>ISO Code 3</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?> 
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <tr>
                    <?php $i++;?>
                    <td><?php echo $i;?></td>
                    <td><?php echo e($country->nicename); ?></td>
                    <td><?php echo e($country->iso); ?></td>
                    <td><?php echo e($country->iso3); ?></td>
                    <td>
                      <a class="btn btn-success btn-sm" href="<?php echo e(url('admin/country/'.$country->id. '/edit')); ?>">

                        <i class="glyphicon glyphicon-pencil"></i></a>
                    </td>
                    <td><form  method="post" action="<?php echo e(url('admin/country/'.$country->id)); ?>

                        "data-parsley-validate class="form-horizontal form-label-left">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('DELETE')); ?>

                         <button  type="submit" class="btn btn-danger" onclick="return confirm('Delete This User..?)" ><i class="fa fa-fw fa-trash-o"></i></button></td>
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
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

  


<?php echo $__env->make("admin/layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/country/index.blade.php ENDPATH**/ ?>