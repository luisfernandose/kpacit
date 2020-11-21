<?php $__env->startSection('title', "$cats->title"); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- categories-tab start-->
<section id="categories-tab" class="categories-tab-main-block">
    <div class="container">
        <div id="categories-tab-slider" class="categories-tab-block owl-carousel">
        	<?php
                $category = App\Categories::all();
            ?>
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($cat->status == 1): ?>
	            <div class="item categories-tab-dtl">
	                <a href="<?php echo e(route('category.page',$cat->id)); ?>" title="tab"><i class="fa <?php echo e($cat->icon); ?>"></i><?php echo e($cat->title); ?></a>
	            </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- categories-tab end-->
<!-- category-title start -->
<section id="business-home" class="business-home-main-block">
    <div class="container">
        <h1 class="text-white"><?php echo e($cats->title); ?></h1>
    </div>
</section>  
<!-- category-title end -->
<!-- category-slider start -->
<section id="business-home-slider" class="business-home-slider-main-block">
    <div class="container">
        <div id="business-home-slider-two" class="business-home-slider owl-carousel">
        	<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<?php if($course->featured == 1 && $course->status == 1): ?>
            <div class="item business-home-slider-block">
                <div class="row">
                    <div class="col-md-5">
                        <div class="business-home-slider-img">
                            <?php if($course['preview_image'] !== NULL && $course['preview_image'] !== ''): ?>
                                <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$course->preview_image)); ?>" class="img-fluid" alt="course"></a>
                            <?php else: ?>
                                <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"><img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" class="img-fluid" alt="course"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="categories-popularity-dtl">
                            <ul>
                                <li>Featured course</li>
                                <li class="heart float-rgt">
                                    <?php if(Auth::check()): ?>
                                        <?php
                                            $wishtt = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                                        ?>
                                        <?php if($wishtt == NULL): ?>
                                            <div class="heart">
                                                <form id="demo-form2" method="post" action="<?php echo e(url('show/wishlist', $course->id)); ?>" data-parsley-validate 
                                                    class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>


                                                    <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                    <input type="hidden" name="course_id"  value="<?php echo e($course->id); ?>" />

                                                    <button class="wishlisht-btn heart-category" title="Add to wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                </form>
                                            </div>
                                        <?php else: ?>
                                            <div class="heart-two">
                                                <form id="demo-form2" method="post" action="<?php echo e(url('remove/wishlist', $course->id)); ?>" data-parsley-validate 
                                                    class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>


                                                    <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                    <input type="hidden" name="course_id"  value="<?php echo e($course->id); ?>" />

                                                    <button class="wishlisht-btn heart" title="Remove from Wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="heart">
                                            <a href="<?php echo e(route('login')); ?>" title="heart"><i class="fa fa-heart rgt-10"></i></a>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            </ul>
                            <div class="view-heading btm-10"><a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"><?php echo e(str_limit($course->title, $limit=50)); ?></a></div>
                            <div class="last-updated btm-10">Last Updated <?php echo e(date('jS F Y', strtotime($course->updated_at))); ?></div>
                            <ul>
                                <li class="rgt-5">
                                	<?php
                                        $data = App\CourseClass::where('course_id', $course->id)->get();
                                        if(count($data)>0){

                                            echo count($data);
                                        }
                                        else{

                                            echo "0";
                                        }
                                    ?> 
                                	classes
                            	</li>
                                <li class="rgt-5">All Levels</li>
                                <li class="rgt-5">
                                    <ul class="rating">
                                        <li>
                                        	<?php 
                                            $learn = 0;
                                            $price = 0;
                                            $value = 0;
                                            $sub_total = 0;
                                            $sub_total = 0;
                                            $reviews = App\ReviewRating::where('course_id',$course->id)->where('status','1')->get();
                                            ?> 
                                            <?php if(!empty($reviews[0])): ?>
                                            <?php
                                            $count =  App\ReviewRating::where('course_id',$course->id)->count();

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
                                                <div class="pull-left"><p>No Ratings</p></div>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </li>
                                <!-- overall rating -->
                                <?php 
                                $learn = 0;
                                $price = 0;
                                $value = 0;
                                $sub_total = 0;
                                $count =  count($reviews);
                                $onlyrev = array();

                                $reviewcount = App\ReviewRating::where('course_id', $course->id)->where('status',"1")->WhereNotNull('review')->get();

                                foreach($reviews as $review){

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
                                    $reviewsrating = App\ReviewRating::where('course_id', $course->id)->first();
                                ?>
                                <?php if(!$reviews->isEmpty()): ?>
                                <li class="rgt-5">
                                    <b><?php echo e(round($overallrating, 1)); ?></b>
                                </li>
                                <?php endif; ?>

                                <li>
                                	(<?php
                                        $data = App\ReviewRating::where('course_id', $course->id)->get();
                                        if(count($data)>0){

                                            echo count($data);
                                        }
                                        else{

                                            echo "0";
                                        }
                                    ?> ratings)
                                </li> 
                            </ul>
                            <p class="btm-20"><?php echo e(str_limit($course->short_detail, $limit = 70, $end='...')); ?></p>
                            <div class="business-home-slider-btn btm-20">
                                <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>" type="button" class="btn btn-info">Explore course</a>
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
<!-- category sliderslider end -->
<!-- sub categories start -->
<section id="categories" class="categories-main-block categories-main-block-one">
    <div class="container">
        <h4 class="categories-heading">Sub Categories</h4>
        <div class="row">
			<?php
                $subcat = App\SubCategory::where('category_id', $cats->id)->get();
            ?>
        	<?php $__currentLoopData = $subcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cat->status == 1): ?>
            <div class="col-lg-3 col-sm-6">
                <div class="categories-block">
                    <ul>
                        <li><a href="#" title="<?php echo e($cat->title); ?>"><i class="fa <?php echo e($cat->icon); ?>"></i>
                        </a></li>
                        <li><a href="<?php echo e(route('subcategory.page',$cat->id)); ?>"><?php echo e($cat->title); ?></a></li>
                    </ul>
                </div>  
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- sub categories end -->
<!-- instructor profiles start -->
<section id="instructors" class="instructors-main-block btm-40">
    <div class="container">
        <?php
            $instructors = App\Instructor::get();
        ?>
        <?php if(! $instructors->isEmpty()): ?>
        <h4 class="btm-40">Popular Instructors</h4>
        <div id="testimonial-slider-one" class="testimonial-slider-main-block owl-carousel">
            <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($user['status'] == 1): ?>
                <?php if($user->role == "instructor"): ?>
                    <div class="item testimonial-block text-center btm-30">
                        <div class="instructors-img-block btm-20">
                            <?php if($user->user['user_img'] != null || $user->user['user_img'] !=''): ?>
                                <img src="<?php echo e(asset('images/user_img/'.$user->user['user_img'])); ?>" alt="User">
                            <?php else: ?>
                                <img src="<?php echo e(asset('images/user_img/default.jpg')); ?>" class="user-image" alt="User Image">
                            <?php endif; ?>
                        </div>
                        <div class="instructors-dtl">
                            <ul>
                                <li><?php echo e($user['fname']); ?></li>
                                <li>
                                    <?php
                                        $data = App\Course::where('user_id', $user->user['id'])->get();
                                        if(count($data)>0){

                                            echo count($data );
                                        }
                                        else{

                                            echo "0";
                                        }
                                    ?>
                                    Course
                                </li>
                                <li><?php echo e(strip_tags(str_limit($user->detail, $limit = 75, $end = '...'))); ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> 
        <?php endif; ?>
    </div>
</section>
<!-- instructor profiles end -->
<!-- categories start -->
<section id="categories-popularity" class="categories-popularity-main-block">
    <div class="container">
    	<h2 class="btm-40"><?php echo e($cats->title); ?> Courses</h2>
        <div class="row">
            <div class="col-lg-9">
                <div class="students-bought btm-30">
					<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($course->status == 1 && $course->slug != ''): ?>
                        <div class="course-bought-block protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($course->id); ?>">
                            <div class="row">
                                <div class="col-lg-4">
                                    <?php if($course['preview_image'] !== NULL && $course['preview_image'] !== ''): ?>
                                        <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$course->preview_image)); ?>" alt="course" class="img-fluid"></a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"><img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" alt="course" class="img-fluid"></a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6">
                                    <div class="categories-popularity-dtl">
                                        <div class="view-heading btm-10"><a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"><?php echo e($course->title); ?></a></div>
                                        <ul>
                                            <li>
                                                <?php
                                                    $data = App\CourseClass::where('course_id', $course->id)->get();
                                                    if(count($data)>0){

                                                        echo count($data);
                                                    }
                                                    else{

                                                        echo "0";
                                                    }
                                                ?> Classes
                                            </li>
                                            <li>
                                                 <?php
                                                    $enroll = App\Order::where('course_id', $course->id)->get();
                                                    if(count($enroll)>0){

                                                        echo count($enroll);
                                                    }
                                                    else{

                                                        echo "0";
                                                    }
                                                ?> Students
                                            </li>
                                            <li>All Levels</li>
                                        </ul>
                                        <p><?php echo e(str_limit($course->short_detail, $limit = 125, $end = '..')); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="rate text-right">
                                        <ul>
                                        	<?php if($course->type == 1): ?>
                                                <?php
                                                    $currency = App\Currency::first();
                                                ?>
                                                <?php if($course->discount_price == !NULL): ?> 
                                                    <li class="rate-r"><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($course->discount_price); ?>&nbsp;<s><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($course->price); ?></s> </li>
                                                <?php else: ?>
                                                    <li class="rate-r"><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($course->price); ?></li>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <li class="rate-r">Free</li>
                                            <?php endif; ?>
                                        </ul>
                                        <div class="rating">
                                            <ul>
                                              <li>
                                                <!-- star rating -->
                                              	<?php 
    		                                    $learn = 0;
    		                                    $price = 0;
    		                                    $value = 0;
    		                                    $sub_total = 0;
    		                                    $sub_total = 0;
    		                                    $reviews = App\ReviewRating::where('course_id',$course->id)->where('status','1')->get();
    		                                    ?> 
    		                                    <?php if(!empty($reviews[0])): ?>
    		                                    <?php
    		                                    $count =  App\ReviewRating::where('course_id',$course->id)->count();

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
    		                                        <div class="pull-left"><p>No Ratings</p></div>
    		                                    <?php endif; ?>
    		                                  </li>
                                                
                                                <!-- overall rating -->
                                                <?php 
                                                $learn = 0;
                                                $price = 0;
                                                $value = 0;
                                                $sub_total = 0;
                                                $count =  count($reviews);
                                                $onlyrev = array();

                                                $reviewcount = App\ReviewRating::where('course_id', $course->id)->where('status',"1")->WhereNotNull('review')->get();

                                                foreach($reviews as $review){

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
                                                    $reviewsrating = App\ReviewRating::where('course_id', $course->id)->first();
                                                ?>
                                                <?php if(!$reviews->isEmpty()): ?>
                                                <li>
                                                    <b>(<?php echo e(round($overallrating, 1)); ?>)</b>
                                                </li>
                                                <?php endif; ?>

                                            </ul>
                                        </div>
                                        <ul>
                                            <li>
                                            	(<?php
    				                                $data = App\ReviewRating::where('course_id', $course->id)->get();
    				                                if(count($data)>0){

    				                                    echo count($data);
    				                                }
    				                                else{

    				                                    echo "0";
    				                                }
    				                            ?> ratings)
                                            </li> 
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <?php if($course['whatlearns']->isNotEmpty()): ?>
                                <div id="prime-next-item-description-block<?php echo e($course->id); ?>" class="prime-description-block">
                                <div class="prime-description-under-block">
                                    <div class="prime-description-under-block">
                                        <h6 >What you will learn</h6>
                                        
                                        <?php $__currentLoopData = $course['whatlearns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($wl->status ==1): ?>
                                            <div class="product-learn-dtl protip-whatlearn">
                                                <ul>
                                                    <li><i class="fa fa-check"></i><?php echo e(str_limit($wl['detail'], $limit = 120, $end = '...')); ?></li>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </div>
                                </div>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        <hr>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="top-20"><?php echo e($courses->links()); ?></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- categories end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/front/category.blade.php ENDPATH**/ ?>