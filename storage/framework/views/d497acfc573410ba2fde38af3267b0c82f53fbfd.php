<?php $__env->startSection('title', 'Wishlist'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- about-home start -->
<section id="wishlist-home" class="wishlist-home-main-block">
    <div class="container">
        <h1 class="wishlist-home-heading text-white"><?php echo e(__('frontstaticword.Wishlist')); ?></h1>
    </div>
</section> 
<!-- about-home end -->

<?php
    $item = App\Wishlist::where('user_id', Auth::User()->id)->get();
?>

<?php if(count($item) > 0): ?>
<section id="learning-courses" class="learning-courses-main-block">
    <div class="container">
        <div class="row">
        	<?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<?php if($wish->user_id == Auth::User()->id): ?>
                <div class="col-lg-3 col-sm-6 col-md-4">
                    <div class="view-block">
                        <div class="view-img">
                            <?php if($wish->courses['preview_image'] !== NULL && $wish->courses['preview_image'] !== ''): ?>
                                <a href="<?php echo e(route('user.course.show',['id' => $wish->courses->id, 'slug' => $wish->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$wish->courses->preview_image)); ?>" class="img-fluid" alt="course">
                            <?php else: ?>
                                <a href="<?php echo e(route('user.course.show',['id' => $wish->courses->id, 'slug' => $wish->courses->slug ])); ?>"><img src="<?php echo e(Avatar::create($wish->courses->title)->toBase64()); ?>" class="img-fluid" alt="course">
                            <?php endif; ?>
                            </a>
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading btm-10"><a href="<?php echo e(route('user.course.show',['id' => $wish->courses->id, 'slug' => $wish->courses->slug ])); ?>"><?php echo e(str_limit($wish->courses->title, $limit = 35, $end = '...')); ?></a></div>
                            <p class="btm-10"><a href="#">by <?php echo e($wish->courses->user->fname); ?></a></p>
                            <div class="rating">
                                <ul>
                                    <li>
                                        
                                        <?php 
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $sub_total = 0;
                                        $reviews = App\ReviewRating::where('course_id',$wish->courses->id)->where('status','1')->get();
                                        ?> 
                                        <?php if(!empty($reviews[0])): ?>
                                            <?php
                                            $count =  App\ReviewRating::where('course_id',$wish->courses->id)->count();

                                            foreach($reviews as $review){
                                                $learn = $review->price*5;
                                                $price = $review->price*5;
                                                $value = $review->value*5;
                                                $sub_total = $sub_total + $learn + $price + $value;
                                            }

                                            $count = ($count*3) * 5;
                                            $rat = $sub_total/$count;
                                            $ratings_var = ($rat*100)/5;
                                            ?>
                            
                                            <div class="pull-left">
                                                <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="pull-left">
                                                <?php echo e(__('frontstaticword.NoRating')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </li>

                                    <?php
                                    $reviews = App\ReviewRating::where('course_id' ,$wish->courses->id)->get();
                                    ?>
                                    <?php 
                                    $learn = 0;
                                    $price = 0;
                                    $value = 0;
                                    $sub_total = 0;
                                    $count =  count($reviews);
                                    $onlyrev = array();

                                    $reviewcount = App\ReviewRating::where('course_id', $wish->courses->id)->where('status',"1")->WhereNotNull('review')->get();

                                    foreach($reviewcount as $review){

                                        $learn = $review->learn*5;
                                        $price = $review->price*5;
                                        $value = $review->value*5;
                                        $sub_total = $sub_total + $learn + $price + $value;
                                    }

                                    $count = ($count*3) * 5;
                                     
                                    if($count != "")
                                    {
                                        $rat = $sub_total/$count;
                                 
                                        $ratings_var = ($rat*100)/5;
                               
                                        $overallrating = ($ratings_var/2)/10;
                                    }
                                     
                                    ?>

                                    <?php
                                        $reviewsrating = App\ReviewRating::where('course_id', $wish->courses->id)->first();
                                    ?>
                                    <?php if(!empty($reviewsrating)): ?>
                                    <li>
                                        <b><?php echo e(round($overallrating, 1)); ?></b>
                                    </li>
                                    <?php endif; ?>
                                  
                                    <li>(<?php echo e($wish->order->count()); ?>)</li> 
                                </ul>
                            </div>
                            <?php if($wish->courses->type == 1): ?>
                            <div class="rate text-right">
                                <ul>
                                    <?php
                                        $currency = App\Currency::first();
                                    ?> 
                                    <?php if($wish->courses->discount_price == !NULL): ?>

                                        <li class="rate-r"><s><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($wish->courses->price); ?></s></li>
                                        <li><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($wish->courses->discount_price); ?></b></li>
                                    <?php else: ?>
                                        <li><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($wish->courses->price); ?></b></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php else: ?>
                            <div class="rate text-right">
                                <ul>
                                  <li><b><?php echo e(__('frontstaticword.Free')); ?></b></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="wishlist-action">
                        <div class="row">
                        	<div class="col-md-6 col-6">
                               
                                <?php if($wish->courses->type == 1): ?>
                                <div class="cart-btn">
                                    <form id="demo-form2" method="post" action="<?php echo e(route('addtocart',['course_id' => $wish->courses->id, 'price' => $wish->courses->price, 'discount_price' => $wish->courses->discount_price ])); ?>"
                                            data-parsley-validate class="form-horizontal form-label-left">
                                            <?php echo e(csrf_field()); ?>

                                            
                                            <input type="hidden" name="category_id"  value="<?php echo e($wish->courses->category->id); ?>" />
                                                
                                        
                                         <button type="submit" class="btn btn-primary"  title="Add To Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart</button>
                                    </form>
                                </div>
                                <?php endif; ?>
                        	</div>
                        	<div class="col-md-6 col-6">
                                <div class="wishlist-btn txt-rgt">
                                    <form  method="post" action="<?php echo e(url('delete/wishlist', $wish->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
            	                        <?php echo e(csrf_field()); ?>

            	                        
            	                      <button type="submit" class="btn btn-primary " title="Remove From Wishlist"><i class="fa fa-trash"></i></button>
            	                    </form>
                                </div>
                        	</div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php else: ?>
    <section id="search-block" class="search-main-block search-block-no-result text-center">
        <div class="container">
            <div class="no-result-courses btm-10"><?php echo e(__('frontstaticword.emptywishlist')); ?></div>
            <div class="recommendation-btn text-white text-center">
                <a href="<?php echo e(url('/')); ?>" class="btn btn-primary" title="search"><b><?php echo e(__('frontstaticword.Browse')); ?></b></a>
            </div> 
        </div>
    </section>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/front/wishlist.blade.php ENDPATH**/ ?>