<?php $__env->startSection('title', 'Help'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- help start-->
<section id="help" class="help-main-block">
    <div class="container">
        <h1 class="help-heading text-white text-center"<?php echo e(__('frontstaticword.helptext')); ?>></h1>
        <div class="nav-search help-search text">
            <form action="<?php echo e(route('search')); ?>" class="form-inline search-form" method="GET">
                <div class="offset-lg-3 col-lg-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="searchTerm" placeholder="Search for courses" value="<?php echo e(isset($searchTerm) ? $searchTerm : ''); ?>">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>    
                     </div> 
                </div>           
            </form>
        </div>
    </div>
</section>
<!-- help end-->
<!-- help-tab start-->
<section id="help-tab" class="help-tab-main-block">
    <div class="container">
        <div class="offset-lg-4 col-lg-6">
            <nav>
                <div class="nav nav-tabs btm-40" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo e(__('frontstaticword.Students')); ?> </a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo e(__('frontstaticword.Instructor')); ?> </a>
                </div>
            </nav>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="help-tab-heading btm-40"><?php echo e(__('frontstaticword.faq')); ?></div>
                <div class="help-tab-block btm-30">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <?php
                                    $faqs = App\FaqStudent::all();
                                ?>
                                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($faq->status == 1): ?>
                                <div class="col-lg-4">
                                    <a href="<?php echo e(route('faq.detail',$faq->id)); ?>"><div class="categories-block help-tab"><?php echo e($faq->title); ?></div></a>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="help-tab-heading btm-40"><?php echo e(__('frontstaticword.searchtopic')); ?></div>
                <div class="help-tab-block btm-30">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="categories-block help-tab-one text-center">
                                <a href="<?php echo e(route('purchase.show')); ?>">
                                <ul>
                                    <li class="btm-10"><img src="<?php echo e(asset('images/icons/05.png')); ?>"></li>
                                    <li class="btm-5"><span><?php echo e(__('frontstaticword.PurchaseHistory')); ?></span></li>
                                    <li>See your purchase history & explore more Courses</li>
                                </ul>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="categories-block help-tab-one text-center">
                                <?php if(Auth::check()): ?>
                                    <a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>">
                                    <ul>
                                        <li class="btm-10"><img src="<?php echo e(asset('images/icons/02.png')); ?>"></li>
                                        <li class="btm-5"><span><?php echo e(__('frontstaticword.UserProfile')); ?></span></li>
                                        <li>Manage your account settings.</li>
                                    </ul>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>">
                                    <ul>
                                        <li class="btm-10"><img src="<?php echo e(asset('images/icons/02.png')); ?>"></li>
                                        <li class="btm-5"><span><?php echo e(__('frontstaticword.UserProfile')); ?></span></li>
                                        <li>Manage your account settings.</li>
                                    </ul>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4">                            
                            <div class="categories-block help-contact text-center text-white">
                                <?php if(Auth::check()): ?>
                                    <a href="<?php echo e(url('user_contact')); ?>">
                                        <ul>
                                            <li class="btm-10"><img src="<?php echo e(asset('images/icons/contact.png')); ?>"></li>
                                            <br>
                                            <li class="text-white"><span><?php echo e(__('frontstaticword.Contactus')); ?></span></li>
                                            <li class="text-white">Open a support ticket</li>
                                        </ul>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>">
                                        <ul>
                                            <li class="btm-10"><img src="<?php echo e(asset('images/icons/contact.png')); ?>"></li>
                                            <li class="text-white"><span><?php echo e(__('frontstaticword.Contactus')); ?></span></li>
                                            <li class="text-white">Open a support ticket</li>
                                        </ul>
                                    </a>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="help-tab-heading btm-40"><?php echo e(__('frontstaticword.faq')); ?></div>
                <div class="help-tab-block btm-30">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <?php
                                    $faqss = App\FaqInstructor::all();
                                ?>
                                <?php $__currentLoopData = $faqss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($faqs->status == 1): ?>
                                <div class="col-lg-4">
                                    <a href="<?php echo e(route('faqinstructor.detail',$faqs->id)); ?>"><div class="categories-block help-tab"><?php echo e($faqs->title); ?></div></a>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="help-tab-heading btm-40"><?php echo e(__('frontstaticword.searchtopic')); ?></div>
                <div class="help-tab-block btm-30">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="categories-block help-tab-one text-center">
                                <?php if(Auth::check()): ?>
                                    <a href="#" data-toggle="modal" data-target="#myModalinstructor" title="Become An Instructor">
                                    <ul>
                                        <li class="btm-10"><img src="<?php echo e(asset('images/icons/08.png')); ?>"></li>
                                        <li class="btm-5"><span><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?>r</span></li>
                                        <li>To Become An Online Instructor</li>
                                    </ul>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>">
                                    <ul>
                                        <li class="btm-10"><img src="<?php echo e(asset('images/icons/08.png')); ?>"></li>
                                        <li class="btm-5"><span><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?></span></li>
                                        <li>To Become An Online Instructor</li>
                                    </ul>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="categories-block help-contact text-center text-white">
                                <?php if(Auth::check()): ?>
                                    <a href="<?php echo e(url('user_contact')); ?>">
                                        <ul>
                                            <li class="btm-10"><img src="<?php echo e(asset('images/icons/contact.png')); ?>"></li>
                                            <br>
                                            <li class="text-white"><span><?php echo e(__('frontstaticword.Contactus')); ?></span></li>
                                            <li class="text-white">Open a support ticket</li>
                                        </ul>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>">
                                        <ul>
                                            <li class="btm-10"><img src="<?php echo e(asset('images/icons/contact.png')); ?>"></li>
                                            <li class="text-white"><span><?php echo e(__('frontstaticword.Contactus')); ?></span></li>
                                            <li class="text-white">Open a support ticket</li>
                                        </ul>
                                    </a>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- help-tab end-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<!-- script to remain on active tab-->
<script>
(function($) {
  "use strict";
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#nav-tab a[href="' + activeTab + '"]').tab('show');
    }
  });

})(jQuery);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/front/help/faq.blade.php ENDPATH**/ ?>