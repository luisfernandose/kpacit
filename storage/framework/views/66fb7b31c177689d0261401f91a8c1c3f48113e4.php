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
      <a data-toggle="modal" data-target="#myModalabc" href="#" class="btn btn-info btn-sm">+<?php echo e(__('adminstaticword.Add')); ?></a>
      <br>
      <br>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th><?php echo e(__('adminstaticword.RelatedCourse')); ?></th>
            <th><?php echo e(__('adminstaticword.Status')); ?></th>
            <th><?php echo e(__('adminstaticword.Edit')); ?></th>
            <th><?php echo e(__('adminstaticword.Delete')); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $relatedcourse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($cat->courses->title); ?></td>
              <td>
                  <?php if($cat->status==1): ?>
                   <?php echo e(__('adminstaticword.Active')); ?>

                  <?php else: ?>
                   <?php echo e(__('adminstaticword.Deactive')); ?>

                  <?php endif; ?>
              </td>
              <td>
                <a class="btn btn-success btn-sm" href="<?php echo e(url('relatedcourse/'.$cat->id)); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
              </td>
              <td>
                <form  method="post" action="<?php echo e(url('relatedcourse/'.$cat->id)); ?>

                "data-parsley-validate class="form-horizontal form-label-left">
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

  <!--Model start-->
  <div class="modal fade" id="myModalabc" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.RelatedCourse')); ?></h4>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="<?php echo e(route('relatedcourse.store')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>


                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo e($cor->user_id); ?>"> 

                <div class="row display-none">             
                  <div class="col-md-12">  
                    <label for="exampleInputSlug"><?php echo e(__('adminstaticword.Course')); ?></label>
                    <select name="main_course_id" class="form-control">
                      <option value="<?php echo e($cor->id); ?>"><?php echo e($cor->title); ?></option>
                    </select>
                  </div>
                </div> 
                      
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.RelatedCourse')); ?>:<sup class="redstar">*</sup></label>
                    <?php
                    $courses = App\Course::all();
                    ?>
                    <select style="width: 100%" name="course_id" class="form-control js-example-basic-single">
                      <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($course->id !== $cor->id): ?>
                          <option value="<?php echo e($course->id); ?>"><?php echo e($course->title); ?></option>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p class="txt-desc"> <?php echo e(__('adminstaticword.Select')); ?> <?php echo e(__('adminstaticword.RelatedCourse')); ?></p>
                  </div>
                </div>
                <br>
                
                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                    <li class="tg-list-item">
                      <input class="tgl tgl-skewed" id="c2"  type="checkbox"/>
                      <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="c2"></label>
                    </li>
                    <input type="hidden" name="status" value="1" id="t2">
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
</section> 
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/course/relatedcourse/index.blade.php ENDPATH**/ ?>