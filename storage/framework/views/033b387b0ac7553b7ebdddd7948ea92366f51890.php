<?php $__env->startSection('title', 'Careers'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($data['one_enable'] == 1): ?>
<!-- about-home start -->
<section id="careers" class="about-home-one-main-block careers-main-block">
    <div class="container">
        <div class="careers-block">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                <h1 class="careers-heading text-center text-white"><?php echo e($data->one_heading); ?></h1>
                <p class="text-center text-white btm-40"><?php echo e($data->one_text); ?></p>
                <div class="careers-btn btm-40 text-center">
                    <a href="#" class="btn btn-primary" title="careers"><?php echo e($data->one_btntxt); ?></a>
                </div>
            </div>
        </div>
    </div>
</section> 
<!-- about-home end -->
<!-- careers-video start -->
<section id="careers-video" class="careers-video-main-block">
    <div class="container">
        <div class="careers-video">
            <a href="#" title="about">
                <img src="<?php echo e(asset('images/careers/'.$data->one_video)); ?>" class="img-fluid" alt="about-img">
            </a>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- careers-video end -->
<!-- careers-info start -->
<?php if($data['two_enable'] == 1): ?>
<section id="careers-info" class="careers-info-main-block">
    <div class="container">
        <div class="careers-block-one">
            <div class="row">
                <?php
                    $items = App\Testimonial::limit(4)->get();
                ?>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6">
                    <div class="careers-info-block bdr-right">
                        <div class="careers-info-img btm-20"><img src="<?php echo e(asset('images/testimonial/'. $item->image)); ?>" class="img-fluid"></div>
                        <h3 class="careers-info-heding btm-30"><?php echo e($item->client_name); ?></h3>
                        <p><?php echo e(strip_tags(str_limit($item->details, $limit = 150, $end = '...'))); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- careers-info end -->
<!-- careers-learn start -->
<?php if($data['three_enable'] == 1): ?>
<section id="careers-learn" class="careers-learn-main-block" style="background-image: url('<?php echo e(asset('images/careers/'.$data->three_bg_image)); ?>')">
    <div class="container">
        <div class="careers-learn-block">
            <div class="row">
                <div class="col-lg-6">
                    <div class="careers-learn-video bdr-right">
                        <a href="#" title="about">
                            <img src="<?php echo e(asset('images/careers/'.$data->three_video)); ?>" class="img-fluid" alt="careers">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="careers-learn-video-one">
                        <div class="careers-learn-heading btm-10"><?php echo e($data->three_heading); ?></div>
                        <a href="#" title="careers"><?php echo e($data->three_btntxt); ?> ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- careers-learn end -->
<!-- learning-learn-img start-->
<?php if($data['four_enable'] == 1): ?>
<section id="learning-learn-img" class="learning-learn-img-main-block">
    <div class="container-fluid">
        <div class="learning-learn-img-block">
            <div class="row no-gutters">
                <div class="col-lg-2">
                    <a href="#" title="NextClass-learn"><img src="<?php echo e(asset('images/careers/'.$data->four_img_one)); ?>" title="img"></a>
                    <a href="#" title="NextClass-learn"><img src="<?php echo e(asset('images/careers/'.$data->four_img_two)); ?>" title="img"></a>
                </div>
                <div class="col-lg-3">
                    <div class="height">
                        <a href="#" title="NextClass-learn"><img src="<?php echo e(asset('images/careers/'.$data->four_img_three)); ?>" title="img"></a>
                    </div>
                    <div class="height-one">
                        <a href="#" title="NextClass-learn"><img src="<?php echo e(asset('images/careers/'.$data->four_img_four)); ?>" title="img"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <a href="#" title="NextClass-learn"><img src="<?php echo e(asset('images/careers/'.$data->four_img_five)); ?>" title="img"></a>
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <a href="#" title="NextClass-learn"><img src="<?php echo e(asset('images/careers/'.$data->four_img_six)); ?>" title="img"></a>
                        </div>
                        <div class="col-lg-6">
                            <a href="#" title="NextClass-learn"><img src="<?php echo e(asset('images/careers/'.$data->four_img_seven)); ?>" title="img"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="height-one">
                        <a href="#" title="NextClass-learn"><img src="<?php echo e(asset('images/careers/'.$data->four_img_eight)); ?>" title="img"></a>
                    </div>
                    <div class="height">
                        <a href="#" title="NextClass-learn"><img src="<?php echo e(asset('images/careers/'.$data->four_img_nine)); ?>" title="img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- learning-learn-img end -->
<!-- careers-benefits start -->
<?php if($data['five_enable'] == 1): ?>
<section id="careers-benefits" class="careers-benefits-main-block">
    <div class="container">
        <div class="careers-benefits-block">
            <div class="careers-benefits-heading text-center"><?php echo e($data->five_heading); ?></div>
            <p class="text-center btm-40"><?php echo e($data->five_text); ?></p>
            <div class="row">
                <div class="col-lg-6">
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading"><?php echo e($data->five_textone); ?></div>
                            <p><?php echo e($data->five_dtlone); ?></p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading"><?php echo e($data->five_texttwo); ?></div>
                            <p><?php echo e($data->five_dtltwo); ?></p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading"><?php echo e($data->five_textthree); ?></div>
                            <p><?php echo e($data->five_dtlthree); ?></p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading"><?php echo e($data->five_textfour); ?></div>
                            <p><?php echo e($data->five_dtlfour); ?></p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>   
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading"><?php echo e($data->five_textfive); ?></div>
                            <p><?php echo e($data->five_dtlfive); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading"><?php echo e($data->five_textsix); ?></div>
                            <p><?php echo e($data->five_dtlsix); ?></p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading"><?php echo e($data->five_textseven); ?></div>
                            <p><?php echo e($data->five_dtlseven); ?></p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading"><?php echo e($data->five_texteight); ?></div>
                            <p><?php echo e($data->five_dtleight); ?></p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading"><?php echo e($data->five_textnine); ?></div>
                            <p><?php echo e($data->five_dtlnine); ?></p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>   
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading"><?php echo e($data->five_textten); ?></div>
                            <p><?php echo e($data->five_dtlten); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- careers-benefits end -->
<!-- join-team start -->
<?php if($data['six_enable'] == 1): ?>
<section id="join-team" class="join-team-main-block">
    <div class="container">
        <div class="join-team-block">
            <div class="careers-benefits-heading text-center"><?php echo e($data->six_heading); ?></div>
            <p class="text-center btm-40"><?php echo e($data->six_text); ?></p>
            
            <div class="faq-block">
                <div class="faq-dtl">
                    <div id="accordion" class="second-accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <div class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php echo e($data->six_topic_one); ?>

                                        <i class="fa fa-chevron-up"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <div class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><?php echo e($data->six_topic_two); ?>  
                                    <i class="fa fa-chevron-up"></i> </button>
                                </div>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <div class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><?php echo e($data->six_topic_three); ?>  <i class="fa fa-chevron-up"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <div class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><?php echo e($data->six_topic_four); ?> <i class="fa fa-chevron-up"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                <div class="card-body">
                                   <div class="card-body">
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <div class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><?php echo e($data->six_topic_five); ?> 
                                    <i class="fa fa-chevron-up"></i> </button> 
                                </div>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                <div class="card-body">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <div class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"><?php echo e($data->six_topic_six); ?> <i class="fa fa-chevron-up"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                <div class="card-body">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- join-team end -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/front/careers.blade.php ENDPATH**/ ?>