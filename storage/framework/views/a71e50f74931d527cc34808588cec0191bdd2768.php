<?php $__env->startSection('title','All States'); ?>
<?php $__env->startSection("body"); ?>

<section class="content">
	<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-primary" >
	      <div class="box-header">
	        <h3 class="box-title"><?php echo e(__('adminstaticword.State')); ?></h3>
	        <div class="panel-heading">
	            <a href=" <?php echo e(url('admin/state/create')); ?> " class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.State')); ?></a> 
	        </div>       
	        <div class="box-body">
	        	<div class="table-responsive">
	          	<table id="example1" class="table table-bordered table-striped table-responsive">
		          	<thead>
			            <tr class="table-heading-row">
			              <th>#</th>
			              <th><?php echo e(__('adminstaticword.State')); ?></th>
			              <th><?php echo e(__('adminstaticword.Country')); ?></th>
			              <th><?php echo e(__('adminstaticword.Delete')); ?></th>
			            </tr>
		          	</thead>
		          	<tbody>
						<?php $i=0;?> 
		                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			                <tr>
			                  <?php $i++;?>
			                  <td><?php echo $i;?></td>
			                  <td><?php echo e($state->name); ?></td>
			                  <td><?php echo e($state->country->nicename); ?></td>
			                  
			                  <td><form  method="post" action="<?php echo e(url('admin/state/'.$state->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
			                      <?php echo e(csrf_field()); ?>

			                      <?php echo e(method_field('DELETE')); ?>

			                       <button  type="submit" class="btn btn-danger" onclick="return confirm('Delete This User..?)" ><i class="fa fa-fw fa-trash-o"></i></button>
			                       </form>
			                   </td>
			                      
			                  </td>
			                </tr>
		                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		          	</tbody>
		        </table>
		    	</div>
      		</div>
	    </div>
	  </div>
	</div>
</section>
<?php $__env->stopSection(); ?>

  


<?php echo $__env->make("admin/layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/country/state/index.blade.php ENDPATH**/ ?>