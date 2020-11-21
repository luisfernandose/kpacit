<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <a data-toggle="modal" data-target="#myModaltopic" href="#" class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.Add')); ?></a>
      
      <table id="example1" class="table table-bordered table-striped">

        <thead>
          <br>
          <br>
          <th>#</th>
          <th><?php echo e(__('adminstaticword.Question')); ?></th>
          <th><?php echo e(__('adminstaticword.Marks')); ?></th>
          
          <th><?php echo e(__('adminstaticword.Status')); ?></th>
          <th><?php echo e(__('adminstaticword.Reattempt')); ?></th>
          <th><?php echo e(__('adminstaticword.DueDays')); ?></th>
          <th><?php echo e(__('adminstaticword.Action')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0;?>
        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <?php $i++;?>
          <td><?php echo $i;?></td>
            <td><?php echo e($topic->title); ?></td>
            <td><?php echo e($topic->per_q_mark); ?></td>
            
            
            <td>
                <?php if($topic->status==1): ?>
                  <?php echo e(__('adminstaticword.Active')); ?>

                <?php else: ?>
                 <?php echo e(__('adminstaticword.Deactive')); ?>

                <?php endif; ?>                      
            </td>
            <td>
                <?php if($topic->quiz_again==1): ?>
                  <?php echo e(__('adminstaticword.Yes')); ?>

                <?php else: ?>
                 <?php echo e(__('adminstaticword.No')); ?>

                <?php endif; ?>                      
            </td>
            <td><?php echo e($topic->due_days); ?></td>
          
            <td>
              <a class="btn btn-primary btn-sm" title="Add Question" href="<?php echo e(route('answersheet', $topic->id)); ?>"> Delete Answer</a>

              <a class="btn btn-primary btn-sm" title="Add Question" href="<?php echo e(route('questions.show', $topic->id)); ?>"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Question')); ?></a>
           
              <a href="<?php echo e(url('admin/quiztopic/'.$topic->id)); ?>" title="Edit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>

              <form  method="post" action="<?php echo e(url('admin/quiztopic/'.$topic->id)); ?>

                "data-parsley-validate class="form-horizontal form-label-left">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>

                  <button  type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-fw fa-trash-o"></i></button>
              </form>
              
            </td>
        </tr>


         


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </tfoot>
      </table>


    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!--Model start-->
  <div class="modal fade" id="myModaltopic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Question')); ?></h4>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="<?php echo e(url('admin/quiztopic/')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>

               
                <input type="hidden" name="course_id" value="<?php echo e($cor->id); ?>"  />
               

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.QuizTopic')); ?>:<span class="redstar">*</span> </label>
                    <input type="text" placeholder="Enter Quiz Topic" class="form-control " name="title" id="exampleInputTitle" value="">
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.QuizDescription')); ?>:<sup class="redstar">*</sup></label>
                    <textarea name="description" rows="3" class="form-control" placeholder="Enter Description"></textarea>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Marks')); ?>:<span class="redstar">*</span> </label>
                    <input type="number" placeholder="Enter Per Question Mark" class="form-control " name="per_q_mark" id="exampleInputTitle" value="">
                  </div>
                </div>
                <br>


                <div class="row display-none">
                  <div class="col-md-12">
                    <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.QuizTimer')); ?>:<span class="redstar">*</span> </label>
                    <input type="text" placeholder="Enter Quiz Time" class="form-control" name="timer" id="exampleInputTitle" value="1">
                  </div>
                </div>
               

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Days')); ?>:</label>
                    <small>(Days after quiz will start when user enroll in course)</small>
                    <input type="text" placeholder="Enter Due Days" class="form-control" name="due_days" id="exampleInputTitle" >
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                    <li class="tg-list-item">   
                      <input class="tgl tgl-skewed" id="c18" name="status"  type="checkbox"/>
                      <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="c18"></label>
                    </li>
                    <input type="hidden" name="free" value="1" id="t18">
                  </div>
               
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.QuizReattempt')); ?>:</label>
                    <li class="tg-list-item">              
                      <input class="tgl tgl-skewed" id="111" type="checkbox" name="quiz_again"  >
                      <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="111"></label>
                    </li>
                    <input type="hidden" name="free" value="0" for="status" id="13">
                </div>
              </div>
                <br>
        
                <div class="box-footer">
                  <button type="submit" value="Add Answer" class="btn btn-md col-md-3 btn-primary">+ <?php echo e(__('adminstaticword.Save')); ?></button>
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
<?php /**PATH /opt/lampp/htdocs/MFolder/projects/edu/edu/resources/views/admin/course/quiztopic/index.blade.php ENDPATH**/ ?>