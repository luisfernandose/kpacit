<?php $__env->startSection('title', 'Blog'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- about-home start -->
<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white"><?php echo e(__('frontstaticword.Blog')); ?></h1>
    </div>
</section> 
<!-- about-home end --> 
<!-- blog start -->
<?php if(isset($blogs)): ?>
<section id="blog" class="blog-main-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div id="blog-slider" class="blog-slider owl-carousel btm-40">
                    <?php $__currentLoopData = $blogs->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->status == 1 && $item->approved == 1): ?>
                        <div class="item blog-slider-block">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="blog-slider-img">
                                        <a href="<?php echo e(route('blog.detail',$item->id)); ?>"><img src="<?php echo e(asset('images/blog/'.$item->image)); ?>" class="img-fluid" alt="blog"></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="blog-slider-dtl">
                                        <div class="slider-date btm-10"><?php echo e(date('jS F Y', strtotime($item->created_at))); ?></div>
                                        <h3 class="blog-slider-heading"><a href="<?php echo e(route('blog.detail',$item->id)); ?>" title="heading"><?php echo e($item->heading); ?></a></h3>
                                        <p class="btm-10"><?php echo str_limit($item->detail, $limit = 400, $end = '...'); ?></p>
                                        <div class="business-home-slider-btn btm-20">
                                            <button type="button" class="btn btn-link"><?php echo e($item->text); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($blog->status == 1 && $blog->approved == 1): ?>
                    <div class="blog-block btm-40">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="slider-date btm-10"><?php echo e(date('jS F Y', strtotime($blog->created_at))); ?></div>
                                <div class="blog-block-img">
                                   <a href="<?php echo e(route('blog.detail',$blog->id)); ?>"><img src="<?php echo e(asset('images/blog/'.$blog->image)); ?>" class="img-fluid"  alt="blog"></a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="block-block-dtl">
                                    <h3 class="blog-slider-heading"><a href="<?php echo e(route('blog.detail',$blog->id)); ?>" title="heading"><?php echo e($blog->heading); ?></a></h3>
                                    <p><?php echo str_limit($item->detail, $limit = 400, $end = '...'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="pull-right"><?php echo e($blogs->links()); ?></div>
            </div>
            
        </div>
    </div>
    <hr>
</section>
<?php endif; ?>
<!-- blog end -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/front/blog/blog.blade.php ENDPATH**/ ?>