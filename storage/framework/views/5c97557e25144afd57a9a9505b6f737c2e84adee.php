<section class="content">
 
  <div class="row">
    <div class="col-md-12">
      <a data-toggle="modal" data-target="#myModalabcdef" href="#" class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.Add')); ?></a>
      <br>
      <br>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th><?php echo e(__('adminstaticword.Course')); ?></th>
            <th><?php echo e(__('adminstaticword.Announcement')); ?></th>
            <th><?php echo e(__('adminstaticword.Status')); ?></th>
            <th><?php echo e(__('adminstaticword.Edit')); ?></th>
            <th><?php echo e(__('adminstaticword.Delete')); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $cor->announsment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $an): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($an->courses->title); ?></td>
              <td><?php echo e(str_limit($an->announsment, $limit = 70, $end = '....')); ?></td> 
              <td>
                <?php if($an->status==1): ?>
                 <?php echo e(__('adminstaticword.Active')); ?>

                <?php else: ?>
                  <?php echo e(__('adminstaticword.Deactive')); ?>

                <?php endif; ?>
              </td>
          
              <td>
                <a class="btn btn-success btn-sm" href="<?php echo e(url('announsment/'.$an->id)); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
              </td> 

              <td>
                <form  method="post" action="<?php echo e(url('announsment/'.$an->id)); ?>" ata-parsley-validate class="form-horizontal form-label-left">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>


                  <button  type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <?php if(count($cor->announsment) == 0): ?>
            <div class="col-md-12 text-center">
              <?php echo e(__('adminstaticword.empty')); ?>

            </div>
      <?php endif; ?> 
    </div>
  </div>

  <!--Model start-->
  <div class="modal fade" id="myModalabcdef" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?php echo e(__('adminstaticword.Add')); ?><?php echo e(__('adminstaticword.Announcement')); ?></h4>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="<?php echo e(route('announsment.store')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>

                          
               
                <label class="display-none" for="exampleInputSlug"> <?php echo e(__('adminstaticword.Course')); ?><span class="required" >*</span></label>
                <select name="course_id" class="form-control display-none">
                  <option value="<?php echo e($cor->id); ?>"><?php echo e($cor->title); ?></option>
                </select>
            
                <label class="display-none"  for="exampleInputTit1e"><?php echo e(__('adminstaticword.User')); ?></label>

                <select class="display-none" name="user_id" class="form-control col-md-7 col-xs-12">
                  <?php
                   $users = App\User::all();
                  ?>

                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($us->id); ?>"><?php echo e($us->fname); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                
                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Announcement')); ?>:<sup class="redstar">*</sup></label>
                    <textarea name="announsment" rows="3" class="form-control" placeholder="Enter Your announsment"></textarea>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                    <li class="tg-list-item">
                      <input class="tgl tgl-skewed" id="uuuu"  type="checkbox"/>
                      <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="uuuu"></label>
                    </li>
                    <input type="hidden" name="status" value="1" id="uuuuu">
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

     <!--Model close -->    

</section> 
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/course/announsment/index.blade.php ENDPATH**/ ?>