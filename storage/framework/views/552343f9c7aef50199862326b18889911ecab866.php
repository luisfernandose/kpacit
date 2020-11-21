<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2019.
**********************************************************************************************************  -->
<!-- 
Template Name: NextClass
Version: 1.0.0
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<html lang="en">
<!-- <![endif]-->
<!-- head -->
<!-- theme styles -->
<link href="<?php echo e(url('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
<link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet" type="text/css"/> <!-- custom css -->
<!-- google fonts -->



<style type="text/css">
  
  @font-face {
    font-family: 'Great Vibes';
    src: url('<?php echo e(public_path('GreatVibes-Regular.ttf')); ?>') format("ttf");
  }

</style>


</head>


<!-- end head -->
<!-- body start-->
<body>
<!-- terms end-->
<!-- about-home start -->
<section id="cirtificate" class="course-cirtificate">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="cirtificate-border-one text-center">
                    <div class="cirtificate-border-two">
                       <div class="cirtificate-heading" style="">Certificate of Completion</div>
                       <p class="cirtificate-detail" style="font-size:30px">This is to certify that <b><?php echo e(Auth::User()['fname']); ?></b> successfully completed <b><?php echo e($course['title']); ?></b> online course on <br><span style="font-size:25px"><?php echo e(date('jS F Y', strtotime($course['created_at']))); ?></span></p>

                       <span class="cirtificate-instructor"><?php echo e(($course->user['fname'])); ?> <?php echo e(($course->user['lname'])); ?></span>
                       <br>
                       <span class="cirtificate-one"><?php echo e(($course->user['fname'])); ?> <?php echo e(($course->user['lname'])); ?>, Instructor</span>
                       <br>
                       <span>&</span>
                       <div class="cirtificate-logo">
                        <?php if($gsetting['logo_type'] == 'L'): ?>
                            <img src="<?php echo e(asset('images/logo/'.$gsetting['logo'])); ?>" class="img-fluid" alt="logo">
                        <?php else: ?>
                            <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e($gsetting['project_title']); ?></div></b></a>
                        <?php endif; ?>
                      </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer start -->

<!-- footer end -->
<!-- jquery -->
<script src="<?php echo e(url('js/jquery-2.min.js')); ?>"></script> <!-- jquery library js -->
<script src="<?php echo e(url('js/bootstrap.bundle.js')); ?>"></script> <!-- bootstrap js -->
<!-- end jquery -->
</body>
<!-- body end -->
</html> 





<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/front/certificate/download.blade.php ENDPATH**/ ?>