<?php $__env->startSection('title','All Cities'); ?>
<?php $__env->startSection("body"); ?>

<section class="content">
	<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-primary" >
	      	<div class="box-header with-border">
	        	<h3 class="box-title"><?php echo e(__('adminstaticword.City')); ?></h3>
	    	</div>
	        <div class="box-header">
	            <a href="<?php echo e(url('admin/city/create')); ?> " class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.City')); ?></a>

	            <a data-toggle="modal" data-target="#myModalcity" href="#" class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.CityManual')); ?></a> 
	        </div>       
		    <div class="box-body">
		    	<div class="table-responsive">
			        <table id="example1" class="table table-bordered table-striped table-responsive">

			          	<thead>
				            <tr class="table-heading-row">
				              <th>#</th>
				              <th><?php echo e(__('adminstaticword.City')); ?></th>
				              <th><?php echo e(__('adminstaticword.State')); ?></th>
				              <th><?php echo e(__('adminstaticword.Country')); ?></th>
				              <th><?php echo e(__('adminstaticword.Delete')); ?></th>
				            </tr>
				          </thead>
			          	<tbody>
						<?php $i=0;?> 
		                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			                <tr>
			                  <?php $i++;?>
			                  <td><?php echo $i;?></td>
			                  <td><?php echo e($city->name); ?></td>
			                  <td><?php echo e($city->state->name); ?></td>
			                  <td><?php echo e($city->country->nicename); ?></td>
			                  
			                 
			                  <td><form  method="post" action="<?php echo e(url('admin/state/'.$city->id)); ?>

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



<!--Model for add question -->
<div class="modal fade" id="myModalcity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.City')); ?></h4>
      </div>
      <div class="box box-primary">
        <div class="panel panel-sum">
          <div class="modal-body">
            <form id="demo-form2" method="post" action="<?php echo e(route('city.manual')); ?>" data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>


				<div class="row">
	              <div class="col-md-12">
	              	<label for="exampleInputDetails"><?php echo e(__('adminstaticword.ChooseState')); ?> :<sup class="redstar">*</sup></label>
	                <select style="width: 100%" required class="form-control js-example-basic-single" name="state_id">
	                  <option><?php echo e(__('adminstaticword.ChooseState')); ?>:</option>

	                  <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    <option value="<?php echo e($state->state_id); ?>"><?php echo e($state->name); ?></option>
	                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                </select>
	              </div>
              	</div>
              	<br>

				<div class="row">
              	  <div class="col-md-12">
	                <label for="exampleInputDetails"> <?php echo e(__('adminstaticword.City')); ?>:<sup class="redstar">*</sup></label>
	                <input type="text" name="name" class="form-control" placeholder="Enter City Name">
                  </div>
            	</div>

                <br>
             
            
              <div class="box-footer">
                <button type="submit" class="btn btn-md col-md-3 btn-primary"><?php echo e(__('adminstaticword.Submit')); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Model close --> 
<?php $__env->stopSection(); ?>



  


<?php echo $__env->make("admin/layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/country/state/city/index.blade.php ENDPATH**/ ?>