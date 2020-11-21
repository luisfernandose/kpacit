<section class="content">
 
  <div class="row">
    <div class="col-md-12">
      <a data-toggle="modal" data-target="#myModalabcde" href="#" class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.Add')); ?></a>
      <br>
      <br>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th><?php echo e(__('adminstaticword.Course')); ?></th>
            <th><?php echo e(__('adminstaticword.Question')); ?></th>
            <th><?php echo e(__('adminstaticword.Status')); ?></th>
            <th><?php echo e(__('adminstaticword.Edit')); ?></th>
            <th><?php echo e(__('adminstaticword.Delete')); ?></th>
          </tr>
        </thead>
        <tbody>
        <?php //echo "<pre>"; print_r($questions); ?>
          <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $que): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($que->courses->title); ?></td>
              <td><?php echo $que->question; ?></td> 
              <td>
                <form action="<?php echo e(route('ansr.quick',$que->id)); ?>" method="POST">
                  <?php echo e(csrf_field()); ?>

                  <button type="Submit" class="btn btn-xs <?php echo e($que->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                    <?php if($que->status ==1): ?>
                      <?php echo e(__('adminstaticword.Active')); ?>

                    <?php else: ?>
                      <?php echo e(__('adminstaticword.Deactive')); ?>

                    <?php endif; ?>
                  </button>
                </form>
              </td>
              <td>
                <a class="btn btn-success btn-sm" href="<?php echo e(url('questionanswer/'.$que->id)); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
              </td>
              <td>
                <form  method="post" action="<?php echo e(url('questionanswer/'.$que->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>


                  <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                </form>
              </td>
            </tr>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>

  <!--Model start-->
  <div class="modal fade" id="myModalabcde" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Question')); ?></h4>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="<?php echo e(route('questionanswer.store')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="instructor_id" class="form-control" value="<?php echo e(Auth::User()->id); ?>"  />
               
                <label class="display-none" for="exampleInputSlug"> <?php echo e(__('adminstaticword.Course')); ?><span class="redstar">*</span></label>
                <select name="course_id" class="form-control display-none">
                  <option value="<?php echo e($cor->id); ?>"><?php echo e($cor->title); ?></option>
                </select>

                <div class="row"> 
                  <div class="col-md-12">
                    <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.User')); ?></label>
                    <select name="user_id" class="form-control col-md-7 col-xs-12">
                      <option  value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->fname); ?></option>
                    </select>
                  </div>
                </div>
                <br>
                
                <div class="row">  
                  <div class="col-md-12">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Question')); ?>:<sup class="redstar">*</sup></label>
                    <textarea name="question" rows="3" class="form-control" placeholder="Enter Your Question"></textarea>
                  </div>
                </div>
                <br>
                
                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>               
                    <li class="tg-list-item">                
                      <input class="tgl tgl-skewed" id="c2222"  type="checkbox"/>
                      <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="c2222"></label>
                    </li>
                    <input type="hidden" name="status" value="0" id="t2222">
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
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/course/questionanswer/index.blade.php ENDPATH**/ ?>