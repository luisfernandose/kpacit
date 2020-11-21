<?php $__env->startSection('title', 'Add Question - Admin'); ?>
<?php $__env->startSection('body'); ?>


<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.Quiz')); ?> <?php echo e(__('adminstaticword.Question')); ?></h3>
        </div>
        <div class="box-header">
          <a data-toggle="modal" data-target="#myModalquiz" href="#" class="btn btn-info btn-sm">+   <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Question')); ?></a>

        </div>

        <br>
        <br>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th><?php echo e(__('adminstaticword.Course')); ?></th>
                <th><?php echo e(__('adminstaticword.Topic')); ?></th>
                <th><?php echo e(__('adminstaticword.Question')); ?></th>
                <th><?php echo e(__('adminstaticword.A')); ?></th>
                <th><?php echo e(__('adminstaticword.B')); ?></th>
                <th><?php echo e(__('adminstaticword.C')); ?></th>
                <th><?php echo e(__('adminstaticword.D')); ?></th>
                <th><?php echo e(__('adminstaticword.Answer')); ?></th>
                <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                <th><?php echo e(__('adminstaticword.Delete')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=0;?>
              <?php $__currentLoopData = $quizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo e($quiz->course_id); ?></td>
                  <td><?php echo e($quiz->topic_id); ?></td> 
                  <td><?php echo e($quiz->question); ?></td>
                  <td><?php echo e($quiz->a); ?></td>
                  <td><?php echo e($quiz->b); ?></td>
                  <td><?php echo e($quiz->c); ?></td>
                  <td><?php echo e($quiz->c); ?></td>
                  <td><?php echo e($quiz->answer); ?></td>
                  <td>
                    <a data-toggle="modal" data-target="#myModaledit<?php echo e($quiz->id); ?>" href="#" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
                  </td>
                  <td>
                    <form  method="post" action="<?php echo e(url('admin/questions/'.$quiz->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>


                      <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i></button>
                    </form>
                  </td>
                </tr>  

                <!--Model for edit question-->
                <div class="modal fade" id="myModaledit<?php echo e($quiz->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Question')); ?></h4>
                      </div>
                      <div class="box box-primary">
                        <div class="panel panel-sum">
                          <div class="modal-body">
                            <form id="demo-form2" method="POST" action="<?php echo e(route('questions.update', $quiz->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                              <?php echo e(csrf_field()); ?>

                              <?php echo e(method_field('PUT')); ?>


                              <input type="hidden" name="course_id" value="<?php echo e($topic->course_id); ?>"  />

                              <input type="hidden" name="topic_id" value="<?php echo e($topic->id); ?>"  />

                              <div class="row"> 
                                <div class="col-md-6">
                                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Question')); ?></label>
                                  <textarea name="question" rows="6" class="form-control" placeholder="Enter Your Question" ><?php echo e($quiz->question); ?></textarea>
                                  <br>

                                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Answer')); ?>:<sup class="redstar">*</sup></label>
                                  <select style="width: 100%" name="answer" class="form-control js-example-basic-single">
                                    <option <?php echo e($quiz->answer == 'A' ? 'selected' : ''); ?> value="A"><?php echo e(__('adminstaticword.A')); ?></option>
                                    <option <?php echo e($quiz->answer == 'B' ? 'selected' : ''); ?> value="B"><?php echo e(__('adminstaticword.B')); ?></option>
                                    <option <?php echo e($quiz->answer == 'C' ? 'selected' : ''); ?> value="C"><?php echo e(__('adminstaticword.C')); ?></option>
                                    <option  <?php echo e($quiz->answer == 'D' ? 'selected' : ''); ?> value="D"><?php echo e(__('adminstaticword.D')); ?></option>
                                  </select>
                                </div>
                              
                           
                                <div class="col-md-6">
                                 
                                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.AOption')); ?> :<sup class="redstar">*</sup></label>
                                  <input type="text" name="a" value="<?php echo e($quiz->a); ?>" class="form-control" placeholder="Enter Option A">
                                </div>
                               
                                <div class="col-md-6">
                                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.BOption')); ?> :<sup class="redstar">*</sup></label>
                                  <input type="text" name="b" value="<?php echo e($quiz->b); ?>" class="form-control" placeholder="Enter Option B" />
                                </div>

                                <div class="col-md-6">
                              
                                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.COption')); ?> :<sup class="redstar">*</sup></label> 
                                  <input type="text" name="c" value="<?php echo e($quiz->c); ?>" class="form-control" placeholder="Enter Option C" />
                                </div>

                                <div class="col-md-6">
                               
                                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.DOption')); ?> :<sup class="redstar">*</sup></label>
                                  <input type="text" name="d" value="<?php echo e($quiz->d); ?>" class="form-control" placeholder="Enter Option D" />
                                </div>
                                 


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
        
    
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>


<!--Model for add question -->
<div class="modal fade" id="myModalquiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Question')); ?></h4>
      </div>
      <div class="box box-primary">
        <div class="panel panel-sum">
          <div class="modal-body">
            <form id="demo-form2" method="post" action="<?php echo e(route('questions.store')); ?>" data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>


              <input type="hidden" name="course_id" value="<?php echo e($topic->course_id); ?>"  />

              <input type="hidden" name="topic_id" value="<?php echo e($topic->id); ?>"  />

              <div class="row"> 
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Question')); ?></label>
                  <textarea name="question" rows="6" class="form-control" placeholder="Enter Your Question"></textarea>
                  <br>

                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Answer')); ?>:<sup class="redstar">*</sup></label>
                  <select style="width: 100%" name="answer" class="form-control js-example-basic-single">
                    <option value="none" selected disabled hidden> 
                      <?php echo e(__('adminstaticword.SelectanOption')); ?>

                    </option>
                    <option value="A"><?php echo e(__('adminstaticword.A')); ?></option>
                    <option value="B"><?php echo e(__('adminstaticword.B')); ?></option>
                    <option value="C"><?php echo e(__('adminstaticword.C')); ?></option>
                    <option value="D"><?php echo e(__('adminstaticword.D')); ?></option>
                  </select>
                </div>
              
           
                <div class="col-md-6">
                 
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.AOption')); ?> :<sup class="redstar">*</sup></label>
                  <input type="text" name="a" class="form-control" placeholder="Enter Option A">
                </div>
               
                <div class="col-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.BOption')); ?> :<sup class="redstar">*</sup></label>
                  <input type="text" name="b" class="form-control" placeholder="Enter Option B" />
                </div>

                <div class="col-md-6">
              
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.COption')); ?> :<sup class="redstar">*</sup></label>
                  <input type="text" name="c" class="form-control" placeholder="Enter Option C" />
                </div>

                <div class="col-md-6">
               
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.DOption')); ?> :<sup class="redstar">*</sup></label>
                  <input type="text" name="d" class="form-control" placeholder="Enter Option D" />
                </div>
                 


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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/course/quiz/index.blade.php ENDPATH**/ ?>