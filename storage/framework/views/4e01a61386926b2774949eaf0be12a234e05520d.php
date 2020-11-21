<section class="content">
  <div class="row">
    <div class="col-md-12">
      <br>
      <br>
      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th><?php echo e(__('adminstaticword.Course')); ?></th>
              <th><?php echo e(__('adminstaticword.User')); ?></th>
              <th><?php echo e(__('adminstaticword.Review')); ?></th>
              <th><?php echo e(__('adminstaticword.Learn')); ?></th>
              <th><?php echo e(__('adminstaticword.Price')); ?></th>
              <th><?php echo e(__('adminstaticword.Value')); ?></th>
              <th><?php echo e(__('adminstaticword.Status')); ?></th>
              <th><?php echo e(__('adminstaticword.Approved')); ?></th>
              <th><?php echo e(__('adminstaticword.Featured')); ?></th>
              <th><?php echo e(__('adminstaticword.Edit')); ?></th>
              <th><?php echo e(__('adminstaticword.Delete')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $cor->review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($jp->courses->title); ?></td>

                <?php
                $chn = App\User::where('id','=',$cor->user_id)->get();
                ?>
                <td>
                <?php $__currentLoopData = $chn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ccc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($ccc['fname']); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>

                <td><?php echo e($jp->review); ?></td>
                <td><?php echo e($jp->learn); ?></td>
                <td><?php echo e($jp->price); ?></td>
                <td><?php echo e($jp->value); ?></td> 

                <td>
                  <form action="<?php echo e(route('reviewstatus.quick',$jp->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <button type="Submit" class="btn btn-xs <?php echo e($jp->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                      <?php if($jp->status ==1): ?>
                      <?php echo e(__('adminstaticword.Active')); ?>

                      <?php else: ?>
                      <?php echo e(__('adminstaticword.Deactive')); ?>

                      <?php endif; ?>
                    </button>
                  </form>
                </td>
                <td>
                  <form action="<?php echo e(route('reviewapproved.quick',$jp->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <button type="Submit" class="btn btn-xs <?php echo e($jp->approved ==1 ? 'btn-success' : 'btn-danger'); ?>">
                      <?php if($jp->approved ==1): ?>
                      <?php echo e(__('adminstaticword.Active')); ?>

                      <?php else: ?>
                      <?php echo e(__('adminstaticword.Deactive')); ?>

                      <?php endif; ?>
                    </button>
                  </form>
                </td>
                <td>
                  <form action="<?php echo e(route('reviewfeatured.quick',$jp->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <button type="Submit" class="btn btn-xs <?php echo e($jp->featured ==1 ? 'btn-success' : 'btn-danger'); ?>">
                      <?php if($jp->featured ==1): ?>
                      <?php echo e(__('adminstaticword.Active')); ?>

                      <?php else: ?>
                      <?php echo e(__('adminstaticword.Deactive')); ?>

                      <?php endif; ?>
                    </button>
                  </form>
                </td>
      
                <td><a class="btn btn-success btn-sm" href="<?php echo e(url('reviewrating/'.$jp->id)); ?>"><i class="glyphicon glyphicon-pencil"></i></a></td> 
          

                <td>
                  <form  method="post" action="<?php echo e(url('reviewrating/'.$jp->id)); ?>"data-parsley-validate class="form-horizontal form-label-left">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                  <button  type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                  </form>
                </td>
               
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
      </table>
    </div>
  </div>
</section> 
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/course/reviewrating/index.blade.php ENDPATH**/ ?>