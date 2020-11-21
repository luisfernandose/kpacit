<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(__('adminstaticword.Course')); ?></h3>
      </div>
      <div class="box-header">
        <a class="btn btn-info btn-sm" href="<?php echo e(url('course/create')); ?>">
          <i class="glyphicon glyphicon">+</i> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Course')); ?>

        </a>
      </div>
      <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">

              <thead>
                
                <tr>
                  <th>#</th>
                  <th><?php echo e(__('adminstaticword.Image')); ?></th>
                  <th><?php echo e(__('adminstaticword.Title')); ?></th>
                  <th><?php echo e(__('adminstaticword.Instructor')); ?></th>
                  <th><?php echo e(__('adminstaticword.Slug')); ?></th>
                  <th><?php echo e(__('adminstaticword.Featured')); ?></th>
                  <th><?php echo e(__('adminstaticword.Status')); ?></th>
                  <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                  <th><?php echo e(__('adminstaticword.Delete')); ?></th>
                </tr>
              </thead>

              <tbody>
                <?php $i=0;?>
                  <?php if(Auth::User()->role == "admin"): ?>
                    <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $i++;?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td>
                          <?php if($cat['preview_image'] !== NULL && $cat['preview_image'] !== ''): ?>
                              <img src="images/course/<?php echo $cat['preview_image'];  ?>" class="img-responsive" >
                          <?php else: ?>
                              <img src="<?php echo e(Avatar::create($cat->title)->toBase64()); ?>" class="img-responsive" >
                          <?php endif; ?>
                        </td>
                        <td><?php echo e($cat->title); ?></td>
                        <td><?php echo e($cat->user['fname'] ?? ' '); ?></td>
                        <td><?php echo e($cat->slug); ?></td>
                        <td>
                          <form action="<?php echo e(route('course.featured',$cat->id)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <button  type="Submit" class="btn btn-xs <?php echo e($cat->featured ==1 ? 'btn-success' : 'btn-danger'); ?>">
                              <?php if($cat->featured ==1): ?>
                              <?php echo e(__('adminstaticword.Yes')); ?>

                              <?php else: ?>
                              <?php echo e(__('adminstaticword.No')); ?>

                              <?php endif; ?>
                            </button>
                          </form>
                        </td>
                         
                        <td>
                          <form action="<?php echo e(route('course.quick',$cat->id)); ?>" method="POST">
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

                        <td>
                          <a class="btn btn-success btn-sm" href="<?php echo e(route('course.show',$cat->id)); ?>">
                          <i class="glyphicon glyphicon-pencil"></i></a>
                        </td>

                        <td>
                          <form  method="post" action="<?php echo e(url('course/'.$cat->id)); ?>

                            "data-parsley-validate class="form-horizontal form-label-left">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                            <button onclick="return confirm('Are you sure you want to delete?')"  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i></button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                  
                    <?php
                      $cors = App\Course::where('user_id', Auth::User()->id)->get();
                    ?>
                    <?php $__currentLoopData = $cors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $i++;?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td>
                          <?php if($cor['preview_image'] !== NULL && $cor['preview_image'] !== ''): ?>
                              <img src="images/course/<?php echo $cor['preview_image'];  ?>" class="img-responsive">
                          <?php else: ?>
                              <img src="<?php echo e(Avatar::create($cor->title)->toBase64()); ?>" class="img-responsive" >
                          <?php endif; ?>
                        </td>
                        <td><?php echo e($cor->title); ?></td>
                        <td><?php echo e($cor->user['fname']); ?></td>
                        <td><?php echo e($cor->slug); ?></td>
                        <td>
                         
                          <?php if($cor->featured ==1): ?>
                            <?php echo e(__('adminstaticword.Yes')); ?>

                          <?php else: ?>
                            <?php echo e(__('adminstaticword.No')); ?>

                          <?php endif; ?>
                          
                        </td>
                         
                        <td>
                          
                          <?php if($cor->status ==1): ?>
                            <?php echo e(__('adminstaticword.Active')); ?>

                          <?php else: ?>
                            <?php echo e(__('adminstaticword.Deactive')); ?>

                          <?php endif; ?>
                            
                        </td>

                        <td>
                          <a class="btn btn-primary btn-sm" href="<?php echo e(route('course.show',$cor->id)); ?>">
                          <i class="glyphicon glyphicon-pencil"></i></a>
                        </td>

                        <td>
                          <form  method="post" action="<?php echo e(url('course/'.$cor->id)); ?>

                            "data-parsley-validate class="form-horizontal form-label-left">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                            <button onclick="return confirm('Are you sure you want to delete?')"  type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
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
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/course/partial/index.blade.php ENDPATH**/ ?>