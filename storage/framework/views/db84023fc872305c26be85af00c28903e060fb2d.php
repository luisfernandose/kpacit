<?php $__env->startSection('title',"Start Quiz"); ?>

<?php $__env->startSection('content'); ?>

<section id="quiz-nav-bar" class="quiz-nav-bar-block">
  <div class="nav-bar">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="navbar-header">
              <!-- Branding Image -->
              
              <?php if($topic): ?>
                <h4 class="heading"><?php echo e($topic->title); ?></h4>
              
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li></li>               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
 <section class="quiz-main-block quiz-main-block-two">
   <div class="container">

   
  

    <?php if(Auth::check()): ?>
      <div class="">
        <?php 
        $users =  App\QuizAnswer::where('topic_id',$topic->id)->where('user_id',Auth::user()->id)->first();
        $que =  App\Quiz::where('topic_id',$topic->id)->get();
         $que_count =  App\Quiz::where('topic_id',$topic->id)->count();
        ?>

        <?php if($que->isEmpty()): ?>
        <div class="alert alert-danger">
                No Questions in this quiz
        </div>

        <?php else: ?>

      

         <?php if(!empty($users)): ?>
            <div class="alert alert-danger">
                You have already Given the test ! Try to give other Quizes
            </div>
         <?php else: ?>
        <div id="question_block" class="question-block">
          <div class="question"  id="question-div" >
           
       <form action="<?php echo e(route('start.quiz.store',$topic->id)); ?>" method="POST" id="question-form">
            <?php echo e(csrf_field()); ?>

                <?php 
                  $count=1;
                  
                 ?>
                <div id="more_quiz0">
                 <span id="quizNumber"><?php echo e($count); ?></span><span>/<?php echo e($que_count); ?></span>
                <div class="jumbotron" id="quiz1" >
                  <h4 style="color:black;">Q<?php echo e($count); ?>.&emsp;<?php echo e($que[0]['question']); ?></h4>
                  <input type="hidden" id="question_id[<?php echo e($count); ?>]" name="question_id[<?php echo e($count); ?>]" value="<?php echo e($que[0]['id']); ?>">
                  <input type="hidden" id="canswer[<?php echo e($count); ?>]" name="canswer[<?php echo e($count); ?>]" value="<?php echo e($que[0]['answer']); ?>">
                  <label class="radio">
                     <input type="radio" required name="answer[<?php echo e($count); ?>]" value="A"><?php echo e($que[0]['a']); ?>

                  </label>
                  <label class="radio">
                     <input type="radio" required name="answer[<?php echo e($count); ?>]" value="B"><?php echo e($que[0]['b']); ?>

                  </label>
                  <label class="radio">
                     <input type="radio" required name="answer[<?php echo e($count); ?>]" value="C"><?php echo e($que[0]['c']); ?>

                  </label>
                  <label class="radio">
                     <input type="radio" required name="answer[<?php echo e($count); ?>]" value="D"><?php echo e($que[0]['d']); ?>

                  </label>
                   <br>
                 </div> 
               </div>

              <?php $__currentLoopData = $que; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $equestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <?php if($key>0): ?>
               <div style="display: none;" id="more_quiz<?php echo e($key); ?>">
                <div>
               <span id="quizNumber"><?php echo e($count); ?></span><span>/<?php echo e($que_count); ?></span>
             </div>
                <div class="jumbotron" id="quiz<?php echo e($key+1); ?>" >
                  <h4 style="color:black;">Q<?php echo e($count); ?>.&emsp;<?php echo e($equestion['question']); ?></h4>
                  <input type="hidden" id="question_id[<?php echo e($count); ?>]" name="question_id[<?php echo e($count); ?>]" value="<?php echo e($equestion['id']); ?>">
                  <input type="hidden" id="canswer[<?php echo e($count); ?>]" name="canswer[<?php echo e($count); ?>]" value="<?php echo e($equestion['answer']); ?>">
                  <label class="radio">
                     <input type="radio" required name="answer[<?php echo e($count); ?>]" value="A"><?php echo e($equestion['a']); ?>

                  </label>
                  <label class="radio">
                     <input type="radio" required name="answer[<?php echo e($count); ?>]" value="B"><?php echo e($equestion['b']); ?>

                  </label>
                  <label class="radio">
                     <input type="radio" required name="answer[<?php echo e($count); ?>]" value="C"><?php echo e($equestion['c']); ?>

                  </label>
                  <label class="radio">
                     <input type="radio" required name="answer[<?php echo e($count); ?>]" value="D"><?php echo e($equestion['d']); ?>

                  </label>
                   <br>
                 </div>
                 </div>
                 <?php endif; ?>
                    <?php $count++; ?>

                
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
              <button style="display: none;" id="prev" title="Click to see previous question" class="btn btn-md btn-primary" value="1"><< <?php echo e(__('frontstaticword.Prev')); ?></button>
              <?php if($que_count>1): ?>
              <button title="Click to see next question" id="next" class="pull-right btn btn-md btn-primary" value="0"><?php echo e(__('frontstaticword.Next')); ?> >></button>
              <?php else: ?>
              <button title="Finish the quiz" type="submit" class="btn btn-md btn-primary"><?php echo e(__('frontstaticword.Finish')); ?></button>
              <?php endif; ?>
              
         </form>
          
     </div>
        </div>
        <?php endif; ?>
        
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
  
</section>
  <!-- jQuery 3 -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
  <script type="text/javascript">

    var totalques = 0;

    
    $(document).ready(function(){
        
         totalques = $('.jumbotron').length;

    });

     
    
     var i =1;

     $('#next').click(function(){

      var x = $('#next').val();
      var y = $('#prev').val();
      
      i++;

        $('#prev').show();

        x++ ;
        if(x<totalques){

          $('#more_quiz'+x).show('fast');
          var z = x-1;
          $('#more_quiz'+z).hide('fast');

          $('#next').val(x);
          $('#prev').val(x);

          if(i== totalques){
            $('#next').attr('type','submit');
            $('#next').text('Finish');
          }
          

        }else{
          
          //code
         
        }
          
          
    });

     $('#prev').click(function(){

      i--;

      var x = $('#next').val();
      var y = $('#prev').val();

      $('#next').removeAttr('type');
      $('#next').text('Next >>');


        $('#next').show();

        y--;
        
        if(y==0){
          $('#next').val(0);
          $('#prev').val(1);
          $('#prev').hide();
        }else{
          $('#next').val(y);
          $('#prev').val(y);
        }

        $('#more_quiz'+y).show('fast');
        $('#more_quiz'+x).hide();
                
          
    });


  </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/front/quiz/main_quiz.blade.php ENDPATH**/ ?>