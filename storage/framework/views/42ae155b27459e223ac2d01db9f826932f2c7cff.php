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
  <div class="row">
    <div class="col-md-12">
      <a data-toggle="modal" data-target="#myModaljj" href="#" class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.Add')); ?></a>
      <br><br>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th><?php echo e(__('adminstaticword.Course')); ?></th>       
            <th><?php echo e(__('adminstaticword.Detail')); ?></th>
            <th><?php echo e(__('adminstaticword.Status')); ?></th>
            <th><?php echo e(__('adminstaticword.Edit')); ?></th>
            <th><?php echo e(__('adminstaticword.Delete')); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $whatlearns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($cat->courses->title); ?></td>
              <td><?php echo e(strip_tags($cat->detail)); ?></td> 
              <td>
                <form action="<?php echo e(route('what.quick',$cat->id)); ?>" method="POST">
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
                <a class="btn btn-success btn-sm" href="<?php echo e(url('whatlearns/'.$cat->id)); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
              </td> 
              <td>
                <form  method="post" action="<?php echo e(url('whatlearns/'.$cat->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>


                  <button  type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <?php if(count($whatlearns) == 0): ?>
      <div class="col-md-12 text-center">
      <?php echo e(__('adminstaticword.empty')); ?>

      </div>
      <?php endif; ?> 
    </div>
  </div>

  <!--Model start-->
  <div class="modal fade" id="myModaljj" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.WhatLearns')); ?></h4>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="<?php echo e(route('whatlearns.store')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>


                <select name="course_id" class="form-control display-none">
                  <option class="display-none" name="course_id"  value="<?php echo e($cor->id); ?>"><?php echo e($cor->title); ?></option>
                </select>

                <div class="row">
                  <div class="col-md-6">
                    <label  for="exampleInputDetails"><?php echo e(__('adminstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                    <textarea rows="1" name="detail" class="form-control" placeholder="Enter Your Detail"></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                     <li class="tg-list-item">              
                      <input class="tgl tgl-skewed" id="status1" type="checkbox" name="status" >
                      <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status1"></label>
                    </li>
                    <input type="hidden"  name="free" value="0" for="status1" id="status1">
                  </div>
                </div>
                <br>
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
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/course/whatlearns/index.blade.php ENDPATH**/ ?>