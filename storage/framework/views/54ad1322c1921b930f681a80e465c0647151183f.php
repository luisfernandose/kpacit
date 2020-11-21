<?php $__env->startSection('title',"Show Report"); ?>
<?php $__env->startSection('content'); ?>
 <section class="main-wrapper finish-main-block">
   <div class="container">
    <br/>
  <?php if($auth): ?>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="">
          <div class="question-block">
           

          <?php if($topics->show_ans==1): ?>
        
          <div class="question-block">
            <h3 class="text-center main-block-heading"><?php echo e(__('frontstaticword.answerreoprt')); ?></h3>
            <br/>
            <table class="table table-bordered result-table">
              <thead>
                <tr>
                  <th><?php echo e(__('frontstaticword.Question')); ?></th> 
                  <th style="color: red;"><?php echo e(__('frontstaticword.YourAnswer')); ?></th>
                  <th style="color: #48A3C6;"><?php echo e(__('frontstaticword.CorrectAnswer')); ?></th>
                </tr>
              </thead>
              <tbody>
                
                <?php
                $x = $count_questions;               
                $y = 1;
                ?>
                <?php $__currentLoopData = $ans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($a->quiz->question); ?></td>
                       <td><?php echo e($a->user_answer); ?></td>
                      <td><?php echo e($a->answer); ?></td>
                     
                    
                    </tr>
                    <?php                
                      $y++;
                      if($y > $x){                 
                        break;
                      }
                    ?>
                 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
               
              </tbody>
            </table>
            
          </div>

          <?php endif; ?>

           <h3 class="text-center main-block-heading"><?php echo e(__('frontstaticword.scorecard')); ?> </h3>
            <br/>

            <table class="table table-bordered result-table">
              <thead>
                <tr>
                  <th><?php echo e(__('frontstaticword.TotalQuestion')); ?></th>
                  <th><?php echo e(__('frontstaticword.CorrectQuestions')); ?></th>
                  <th><?php echo e(__('frontstaticword.PerQuestionMark')); ?></th>
                  <th><?php echo e(__('frontstaticword.TotalMarks')); ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo e($count_questions); ?></td>
                  <td>
                    <?php
                      $mark = 0;
                      $ca=0;
                      $correct = collect();
                    ?>
                    <?php $__currentLoopData = $ans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($answer->answer == $answer->user_answer): ?>
                      
                        <?php
                          $mark++;
                          $ca++;
                        ?>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($ca); ?>

                  </td>
                  <td><?php echo e($topics->per_q_mark); ?></td>
                    <?php
                        $correct = $mark*$topics->per_q_mark;
                    ?>
                  <td><?php echo e($correct); ?></td>
                </tr>
              </tbody>
            </table>
           
            <br/>
            <h2 class="text-center"><?php echo e(__('frontstaticword.ThankYou')); ?></h2>
            <div class="finish-btn text-center">
              <?php if($topics->quiz_again == '1'): ?>
              <a href="<?php echo e(route('tryagain',$topics->id)); ?>" class="btn btn-primary"><?php echo e(__('frontstaticword.TryAgain')); ?> </a>
              <?php endif; ?>
              <a href="<?php echo e(url('show/coursecontent',$topics->course_id)); ?>" class="btn btn-secondary"><?php echo e(__('frontstaticword.Back')); ?> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
</section>
<br/>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/front/quiz/finish.blade.php ENDPATH**/ ?>