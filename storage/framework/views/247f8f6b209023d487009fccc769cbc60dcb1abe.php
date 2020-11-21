<?php $__env->startSection('title', "$course->title"); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- course detail header start -->
<section id="about-home" class="about-home-main-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="about-home-block text-white">
                    <h1 class="about-home-heading text-white"><?php echo e($course['title']); ?></h1>
                    <p><?php echo e($course['short_detail']); ?></p> 
                    <ul>
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
                                <div class="no-rating">
                                    <?php echo e(__('frontstaticword.NoRating')); ?>

                                </div>
                            <?php endif; ?>
                        </li>

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

                        
                        <?php if(! $reviews->isEmpty()): ?>
                        <li>
                            <?php echo e(round($overallrating, 1)); ?> <?php echo e(__('frontstaticword.rating')); ?>

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
                            ?> <?php echo e(__('frontstaticword.Reviews')); ?>)
                        </li>
                        <li>
                            <?php
                                $data = App\Order::where('course_id', $course->id)->get();
                                if(count($data)>0){

                                    echo count($data);
                                }
                                else{

                                    echo "0";
                                }
                            ?> 
                            <?php echo e(__('frontstaticword.studentsenrolled')); ?>

                        </li>
                    </ul>
                    <ul>
                        <li><a href="#" title="about"><?php echo e(__('frontstaticword.Created')); ?>: <?php echo e($course->user['fname']); ?> </a></li>
                        <li><a href="#" title="about"><?php echo e(__('frontstaticword.LastUpdated')); ?>: <?php echo e(date('jS F Y', strtotime($course['updated_at']))); ?></a></li>
                        <?php if($course['language_id'] == !NULL): ?>
                        <li><a href="#" title="about"><i class="fa fa-comment"></i></a> <?php echo e($course->language['name']); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <!-- course preview -->
            <div class="col-lg-4">
                <div class="about-home-icon text-white text-right">
                    <ul>
                        <?php if(Auth::check()): ?>
                            <?php
                                $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                            ?>
                            <?php if($wish == NULL): ?>
                                <li class="about-icon-one">
                                    <form id="demo-form2" method="post" action="<?php echo e(url('show/wishlist', $course->id)); ?>" data-parsley-validate 
                                        class="form-horizontal form-label-left">
                                        <?php echo csrf_field(); ?>

                                        <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                        <input type="hidden" name="course_id"  value="<?php echo e($course->id); ?>" />

                                        <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i class="fa fa-heart rgt-10"></i><?php echo e(__('frontstaticword.Wishlist')); ?></button>
                                    </form>
                                </li>
                            <?php else: ?>
                                <li class="about-icon-two">
                                    <form id="demo-form2" method="post" action="<?php echo e(url('remove/wishlist', $course->id)); ?>" data-parsley-validate 
                                        class="form-horizontal form-label-left">
                                        <?php echo csrf_field(); ?>

                                        <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                        <input type="hidden" name="course_id"  value="<?php echo e($course->id); ?>" />

                                        <button class="wishlisht-btn" title="Remove from Wishlist" type="submit"><i class="fa fa-heart rgt-10"></i><?php echo e(__('frontstaticword.Wishlisted')); ?></button>
                                    </form>
                                </li>
                            <?php endif; ?> 
                        <?php else: ?>
                            <li class="about-icon-one"><a href="<?php echo e(route('login')); ?>" title="heart"><i class="fa fa-heart rgt-10"></i><?php echo e(__('frontstaticword.Wishlist')); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                
                <div class="about-home-product">
                    <div class="video-item hidden-xs">
                        <script type="text/javascript">
                        <?php if($course->video !=""): ?>
                        var video_url = '<iframe src="<?php echo e(asset('video/preview/'.$course['video'])); ?>" frameborder="0" allowfullscreen></iframe>';
                        <?php endif; ?>
                        <?php if($course->url !=""): ?>
                        var video_url = '<iframe src="<?php echo e(str_replace('watch?v=','embed/',$course['url'])); ?>" frameborder="0" allowfullscreen></iframe>';
                        <?php endif; ?>
                        </script>
                        <div class="video-device">
                            <?php if($course['preview_image'] !== NULL && $course['preview_image'] !== ''): ?>
                                <img src="<?php echo e(asset('images/course/'.$course['preview_image'])); ?>" class="bg_img img-fluid" alt="Background">
                            <?php else: ?>
                                <img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" class="bg_img img-fluid" alt="Background">
                            <?php endif; ?>
                            <div class="video-preview">
                                <a href="javascript:void(0);" class="btn-video-play"><i class="fa fa-play"></i></a>
                            </div>
                        </div>
                    </div>
               
                     
                    <div class="about-home-dtl-training">
                        <div class="about-home-dtl-block btm-10">
                        <?php if($course->type == 1): ?>
                            <div class="about-home-rate">
                                <ul>
                                    <?php
                                        $currency = App\Currency::first();
                                    ?>
                                    <?php if($course->discount_price == !NULL): ?> 
                                        <li><i class="<?php echo e($currency['icon']); ?>"></i><?php echo e($course['discount_price']); ?></li>
                                        <li><span><s><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($course['price']); ?></s></span></li>
                                    <?php else: ?>
                                        <li><i class="<?php echo e($currency['icon']); ?>"></i><?php echo e($course['price']); ?></li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                            <?php if(Auth::check()): ?>
                                <?php if(Auth::User()->role == "admin"): ?>
                                    <div class="about-home-btn btm-20">
                                        <a href="<?php echo e(url('show/coursecontent',$course->id)); ?>" class="btn btn-secondary" title="course"><?php echo e(__('frontstaticword.GoToCourse')); ?></a>
                                    </div>
                                <?php else: ?>
                                    <?php if(isset($course->duration)): ?>
                                    <div class="course-duration btm-10"><?php echo e(__('frontstaticword.EnrollDuration')); ?>: <?php echo e($course->duration); ?> Months</div>
                                    <?php endif; ?>

                                    <?php
                                        $order = App\Order::where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                                    ?>

                                   

                                    <?php if(!empty($order) && $order->status == 1): ?>
                                       
                                        <div class="about-home-btn btm-20">
                                            <a href="<?php echo e(url('show/coursecontent',$course->id)); ?>" class="btn btn-secondary" title="course"><?php echo e(__('frontstaticword.GoToCourse')); ?></a>
                                        </div>

                                    <?php else: ?>
                                        <?php
                                            $cart = App\Cart::where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                                        ?>
                                        <?php if(!empty($cart)): ?>
                                            <div class="about-home-btn btm-20">
                                                <form id="demo-form2" method="post" action="<?php echo e(route('remove.item.cart',$cart->id)); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                            
                                                    <div class="box-footer">
                                                     <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;<?php echo e(__('frontstaticword.RemoveFromCart')); ?></button>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php else: ?>
                                            <div class="about-home-btn btm-20">
                                                <form id="demo-form2" method="post" action="<?php echo e(route('addtocart',['course_id' => $course->id, 'price' => $course->price, 'discount_price' => $course->discount_price ])); ?>"
                                                    data-parsley-validate class="form-horizontal form-label-left">
                                                        <?php echo e(csrf_field()); ?>


                                                    <input type="hidden" name="category_id"  value="<?php echo e($course->category->id); ?>" />
                                                            
                                                    <div class="box-footer">
                                                     <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;<?php echo e(__('frontstaticword.AddToCart')); ?></button>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="about-home-btn btm-20">
                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;<?php echo e(__('frontstaticword.AddToCart')); ?></a>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="about-home-rate">
                                <ul>
                                    <li>Free</li>
                                </ul>
                            </div>
                            <?php if(Auth::check()): ?>
                                <?php if(Auth::User()->role == "admin"): ?>
                                    <div class="about-home-btn btm-20">
                                        <a href="<?php echo e(url('show/coursecontent',$course->id)); ?>" class="btn btn-secondary" title="course"><?php echo e(__('frontstaticword.GoToCourse')); ?></a>
                                    </div>
                                <?php else: ?>
                                    <?php
                                        $enroll = App\Order::where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                                    ?>
                                    <?php if($enroll == NULL): ?>
                                        <div class="about-home-btn btm-20">
                                            <a href="<?php echo e(url('enroll/show',$course->id)); ?>" class="btn btn-primary" title="Enroll Now"><?php echo e(__('frontstaticword.EnrollNow')); ?></a>
                                        </div>
                                    <?php else: ?>
                                        <div class="about-home-btn btm-20">
                                            <a href="<?php echo e(url('show/coursecontent',$course->id)); ?>" class="btn btn-secondary" title="Cart"><?php echo e(__('frontstaticword.GoToCourse')); ?></a>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="about-home-btn btm-20">
                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary" title="Enroll Now"><?php echo e(__('frontstaticword.EnrollNow')); ?></a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                            <div class="about-home-includes-list btm-40">
                                <ul class="btm-40">
                                    <?php if($courseinclude->isNotEmpty()): ?>
                                        <li><span>Course Includes</span></li>
                                        <?php $__currentLoopData = $course->include; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($in->status ==1): ?>
                                                <li><i class="fa <?php echo e($in->icon); ?>"></i><?php echo e(str_limit($in->detail, $limit = 50, $end = '...')); ?></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- course header end -->
<!-- course detail start -->
<section id="about-product" class="about-product-main-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if($whatlearns->isNotEmpty()): ?>
                    <div class="product-learn-block">
                        <h3 class="product-learn-heading"><?php echo e(__('frontstaticword.Whatlearn')); ?></h2>
                        <div class="row">
                            <?php $__currentLoopData = $course['whatlearns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($wl->status ==1): ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="product-learn-dtl">
                                    <ul>
                                        <li><i class="fa fa-check"></i><?php echo e(str_limit($wl['detail'], $limit = 120, $end = '...')); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="requirements">
                    <h3><?php echo e(__('frontstaticword.Requirements')); ?></h3>
                    <ul>
                        <li class="comment more">
                            <?php if(strlen($course->requirement) > 400): ?>
                            <?php echo e(substr($course->requirement,0,400)); ?>

                            <span class="read-more-show hide_content"><br>+&nbsp;See More</span>
                            <span class="read-more-content"> <?php echo e(substr($course->requirement,400,strlen($course->requirement))); ?>

                            <span class="read-more-hide hide_content"><br>-&nbsp;See Less</span> </span>
                            <?php else: ?>
                            <?php echo e($course->requirement); ?>

                            <?php endif; ?>
                        </li>
                       
                    </ul>
                </div>
                <div class="description-block btm-30">
                    <h3><?php echo e(__('frontstaticword.Description')); ?></h3>

                    <p><?php echo e($course->detail); ?></p>
               
                </div>

                <?php if(auth()->guard()->check()): ?>
                <?php
                    $alreadyrated = App\ReviewRating::where('course_id', $course->id)->limit(1)->first();
                ?>
                <?php if($alreadyrated == !NULL): ?>
                <?php if($alreadyrated->featured == 1): ?>
                    <div class="featured-review btm-40">
                        <h3><?php echo e(__('frontstaticword.FeaturedReview')); ?></h3>
                        <?php

                            $user_count = count([$alreadyrated]);
                            $user_sub_total = 0;
                            $user_learn_t = $alreadyrated->learn * 5;
                            $user_price_t = $alreadyrated->price * 5;
                            $user_value_t = $alreadyrated->value * 5;
                            $user_sub_total = $user_sub_total + $user_learn_t + $user_price_t + $user_value_t;

                            $user_count = ($user_count * 3) * 5;
                            $rat1 = $user_sub_total / $user_count;
                            $ratings_var1 = ($rat1 * 100) / 5;

                        ?>
                        <?php if(isset($alreadyrated)): ?>
                        
                        <?php $__currentLoopData = $coursereviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($rating->review == !null && $rating->featured == 1): ?>
                        <div class="featured-review-block">
                            <div class="row">
                                <div class="col-lg-1 col-sm-1 col-1">
                                    <div class="featured-review-img">
                                        <div class="review-img text-white">
                                        <?php echo e($rating->user->fname[0]); ?><?php echo e($rating->user->lname[0]); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-11 col-sm-11 col-11">
                                    <div class="featured-review-img-dtl">
                                        <div class="review-img-name"><span><?php echo e($rating->user['fname']); ?></span></div>
                                        <div class="pull-left">
                                            <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var1; ?>%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="year btm-20"><?php echo e(date('jS F Y', strtotime($rating['created_at']))); ?></div>
                                    </div>
                                </div>
                            </div>
                            <p class="btm-20"><?php echo e($rating['review']); ?></p>
                            <div class="review"><?php echo e(__('frontstaticword.helpful')); ?>?
                                <?php
                                $help = App\ReviewHelpful::where('user_id', Auth::User()->id)->where('review_id', $rating->id)->first();
                                ?>
                              
                                <?php if($help == !NULL): ?>
                                    <div class="helpful">
                                        <form  method="post" action="<?php echo e(route('helpful.delete', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                            <?php echo e(csrf_field()); ?>

                                            <button type="submit" class="btn btn-link lft-7 rgt-10 yes-submitted"><i class="fa fa-check"></i> <?php echo e(__('frontstaticword.Yes')); ?></button>
                                        </form>
                                    </div>
                                <?php else: ?>
                                    <div class="helpful">
                                        <form  method="post" action="<?php echo e(route('helpful', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                        <?php echo e(csrf_field()); ?>


                                        <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />

                                        <input type="hidden" name="review_id"  value="<?php echo e($rating->id); ?>" />

                                        <input type="hidden" name="helpful"  value="yes" />
                                        
                                          <button type="submit" class="btn btn-link lft-7 rgt-10 "><?php echo e(__('frontstaticword.Yes')); ?></button>
                                        </form>
                                    </div>
                                <?php endif; ?>

                                <a href="#" data-toggle="modal" data-target="#myModalreport"  title="report"><?php echo e(__('frontstaticword.Report')); ?></a>

                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>

                <?php if($coursechapters->isNotEmpty()): ?>
                <div class="course-content-block btm-30">
                    <h3><?php echo e(__('frontstaticword.CourseContent')); ?></h3>
                    <div class="faq-block">
                        <div class="faq-dtl">
                            <div id="accordion" class="second-accordion">
                                <?php $__currentLoopData = $coursechapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($chapter->status == 1 and $chapter->count() > 0 ): ?>
                                
                                <div class="card">
                                    <div class="card-header" id="headingTwo<?php echo e($chapter->id); ?>">
                                        <div class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo<?php echo e($chapter->id); ?>" aria-expanded="false" aria-controls="collapseTwo">
                                               
                                                <div class="row">
                                                <div class="col-lg-8 col-6">
                                                    <?php echo e($chapter['chapter_name']); ?>

                                                </div>
                                                <div class="col-lg-2 col-6">
                                                    <div class="text-right">
                                                        <?php
                                                            $classone = App\CourseClass::where('coursechapter_id', $chapter->id)->get();
                                                            if(count($classone)>0){

                                                                echo count($classone);
                                                            }
                                                            else{

                                                                echo "0";
                                                            }
                                                        ?>
                                                        <?php echo e(__('frontstaticword.Classes')); ?>

                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-12">
                                                    <div class="text-right">
                                                        <?php
                                                        echo $classtwo =  App\CourseClass::where('coursechapter_id', $chapter->id)->sum("duration");
                                                        ?>
                                                        min
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            </button>
                                        </div>

                                    </div>
                                    <div id="collapseTwo<?php echo e($chapter->id); ?>" class="collapse <?php echo e($loop->first ? "show" : ""); ?>" aria-labelledby="headingTwo" data-parent="#accordion">
                                        
                                        <div class="card-body">
                                            <table class="table">  
                                                <tbody>
                                                    <?php $__currentLoopData = $courseclass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($class->coursechapter_id == $chapter->id): ?>
                                                    <tr>
                                                        <th class="class-icon">
                                                        <?php if($class->type =='video' ): ?>
                                                        <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                        <?php endif; ?>
                                                        <?php if($class->type =='image' ): ?>
                                                        <a href="#" title="Course"><i class="fas fa-image"></i></a>
                                                        <?php endif; ?>
                                                        <?php if($class->type =='pdf' ): ?>
                                                        <a href="#" title="Course"><i class="fas fa-file-pdf"></i></a>
                                                        <?php endif; ?>
                                                        <?php if($class->type =='zip' ): ?>
                                                        <a href="#" title="Course"><i class="far fa-file-archive"></i></a>
                                                        <?php endif; ?>
                                                        </th>

                                                        <td><a href="#" title="Course"><?php echo e($class['title']); ?></a>&nbsp;
                                                            <?php if($class->date_time != NULL): ?>
                                                           <div class="live-class">Live at: <?php echo e($class->date_time); ?></div>
                                                        <?php endif; ?>
                                                        </td>

                                                        <td>
                                                            <?php if($class->preview_url != NULL || $class->preview_video != NULL ): ?>

                                                            <a href="<?php echo e(route('lightbox',$class->id)); ?>" class="iframe" style="display: block;">preview</a>

                                                            <?php endif; ?>

                                                        </td>

                                                        
                                                        <td class="txt-rgt">
                                                        <?php if($class->type =='video'): ?>
                                                        <?php echo e($class['duration']); ?>min
                                                        <?php else: ?>
                                                        <?php echo e($class['size']); ?>mb
                                                        <?php endif; ?>
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                               
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="students-bought btm-30">
                    <h3><?php echo e(__('frontstaticword.RecentCourses')); ?></h3>
                    <?php
                        $items = App\Course::orderBy('created_at','desc')->limit(5)->get()
                    ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="course-bought-block">
                        <div class="row">
                            <div class="col-lg-7 col-md-6 col-12">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 col-5">
                                        <div class="course-bought-img">
                                            <?php if($item->preview_image !== NULL && $item->preview_image !== ''): ?>
                                                <a href="<?php echo e(route('user.course.show',['id' => $item->id, 'slug' => $item->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$item['preview_image'])); ?>" class="img-fluid" alt="blog"></a>
                                            <?php else: ?> 
                                                <a href="<?php echo e(route('user.course.show',['id' => $item->id, 'slug' => $item->slug ])); ?>"><img src="<?php echo e(Avatar::create($item->title)->toBase64()); ?>" class="img-fluid" alt="blog"></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-8 col-7">
                                        <div class="course-name"><a href="<?php echo e(route('user.course.show',['id' => $item->id, 'slug' => $item->slug ])); ?>"><?php echo e(str_limit($item['title'], $limit = 35, $end = '...')); ?></a></div>
                                        <div class="course-update"><?php echo e(__('frontstaticword.LastUpdated')); ?> <?php echo e(date('jS F Y', strtotime($item['updated_at']))); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-1 col-4">
                                <div class="course-user">
                                    <ul>
                                        <li><i class="fa fa-user"></i></li>
                                        <li><?php echo e($item->order->count()); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-4">
                                <?php if($item->type==1): ?>
                                    <?php
                                        $currency1 = App\Currency::first();
                                    ?>
                                    <?php if($item->discount_price == !NULL): ?> 
                                        <div class="course-currency txt-rgt">
                                            <ul>
                                                <li class="rate"><i class="<?php echo e($currency1['icon']); ?>"></i><?php echo e($item->discount_price); ?></li>
                                                <li class="rate"><s><i class="<?php echo e($currency1['icon']); ?>"></i><?php echo e($item['price']); ?></s></li>
                                            </ul>
                                        </div>
                                    <?php else: ?>
                                        <div class="course-currency txt-rgt">
                                            <ul>
                                                <li><i class="<?php echo e($currency1['icon']); ?>"></i><?php echo e($item['price']); ?></li>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="course-currency txt-rgt">
                                        <ul>
                                            <li><?php echo e(__('frontstaticword.Free')); ?></li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-1 col-md-2 col-4">
                                <div class="course-rate txt-rgt">
                                    <ul>
                                        <li>
                                        <?php if(Auth::check()): ?>
                                        <?php
                                            $wishtt = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $item->id)->first();
                                        ?>
                                        <?php if($wishtt == NULL): ?>
                                            <div class="heart">
                                                <form id="demo-form2" method="post" action="<?php echo e(url('show/wishlist', $item->id)); ?>" data-parsley-validate 
                                                    class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>


                                                    <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                    <input type="hidden" name="course_id"  value="<?php echo e($item->id); ?>" />

                                                    <button class="wishlisht-btn heart" title="Add to wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                </form>
                                            </div>
                                        <?php else: ?>
                                            <div class="heart-two">
                                                <form id="demo-form2" method="post" action="<?php echo e(url('remove/wishlist', $item->id)); ?>" data-parsley-validate 
                                                    class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>


                                                    <input type="hidden" name="user_id"  value="<?php echo e(Auth::user()->id); ?>" />
                                                    <input type="hidden" name="course_id"  value="<?php echo e($item->id); ?>" />

                                                    <button class="wishlisht-btn heart"  title="Remove from Wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                        <?php else: ?>
                                            <div class="heart"><a href="<?php echo e(route('login')); ?>" title="heart"><i class="fa fa-heart rgt-10"></i></a></div>
                                        <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="about-instructor-block">
                    <h3><?php echo e(__('frontstaticword.AboutInstructor')); ?></h3>
                    
                    <div class="about-instructor btm-40">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <div class="instructor-img btm-30">
                                    <?php if($course->user->user_img != null || $course->user->user_img !=''): ?>
                                      <img src="<?php echo e(asset('images/user_img/'.$course->user['user_img'])); ?>" class="img-fluid"  alt="instructor" >
                                    <?php else: ?>
                                      <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-fluid" alt="instructor">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <div class="instructor-block">
                                    <div class="instructor-name btm-10"><a href="#" title="instructor-name"><?php echo e($course->user['fname']); ?></a></div>
                                    <div class="instructor-post btm-20"><?php echo e(__('frontstaticword.AboutInstructor')); ?></div>
                                    <p><?php echo $course->user['detail']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if(! $reviews->isEmpty()): ?>
                <div class="student-feedback btm-40">
                    <h3 class="student-feedback-heading"><?php echo e(__('frontstaticword.StudentFeedback')); ?></h3>
                    <div class="student-feedback-block">

                        <div class="rating">
                            <?php 
                                $learn = 0;
                                $price = 0;
                                $value = 0;
                                $sub_total = 0;
                                $count =  count($reviews);
                                $onlyrev = array();

                                $reviewcount = App\ReviewRating::where('course_id',1)->where('status',"1")->WhereNotNull('review')->get();

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

                            <div class="rating-num"><?php echo e(round($overallrating, 1)); ?></div>
                            
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
                                    $learn = $review->learn*5;
                                    $price = $review->price*5;
                                    $value = $review->value*5;
                                    $sub_total = $sub_total + $learn + $price + $value;
                                }

                                $count = ($count*3) * 5;
                                $rat = $sub_total/$count;
                                $ratings_var = ($rat*100)/5;
                                ?>
                                <div class="pull-left">
                                    <div class="star-ratings-sprite star-ratings-center"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="pull-left">
                                    <div class="star-ratings-sprite star-ratings-center"><span style="width:%" class="star-ratings-sprite-rating"></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="rating-users"><?php echo e(__('frontstaticword.CourseRating')); ?></div>
                        </div>
                        <div class="histo">
                            <div class="three histo-rate">
                                <span class="histo-star">
                                    <?php 
                                    $learn = 0;
                                    $total = 0;
                                    $reviews = App\ReviewRating::where('course_id',$course->id)->where('status','1')->get();
                                    ?> 
                                    <?php if(!empty($reviews[0])): ?>
                                        <?php
                                        $count =  App\ReviewRating::where('course_id',$course->id)->count();

                                        foreach($reviews as $review){
                                            $learn = $review->learn*5;
                                            $total = $total + $learn;
                                        }

                                        $count = ($count*1) * 5;
                                        $rat = $total/$count;
                                        $ratings_var = ($rat*100)/5;
                                        ?>
                        
                                        <div class="pull-left">
                                            <div class="star-ratings-sprite star-ratings-center"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>
                                     
                                    <?php else: ?>
                                        <div class="pull-left">
                                            <div class="star-ratings-sprite star-ratings-center"><span style="width:%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </span>
                                <span class="histo-percent">
                                    <a href="#" title="rate"><?php echo e(round($ratings_var)); ?>%</a>
                                </span>
                                <span class="bar-block">
                                    <span id="bar-three" style=" width:<?php echo e($ratings_var); ?>%;" class="bar bar-clr bar-radius">&nbsp;</span> 
                                </span>
                            </div>
                            <div class="two histo-rate">
                                <span class="histo-star">
                                    <?php 
                                    $price = 0;
                                    $total = 0;
                                    $reviews = App\ReviewRating::where('course_id',$course->id)->where('status','1')->get();
                                    ?> 
                                    <?php if(!empty($reviews[0])): ?>
                                        <?php
                                        $count =  App\ReviewRating::where('course_id',$course->id)->count();

                                        foreach($reviews as $review){
                                            $price = $review->price*5;
                                            $total = $total + $price;
                                        }

                                        $count = ($count*1) * 5;
                                        $rat = $total/$count;
                                        $ratings_var = ($rat*100)/5;
                                        ?>
                        
                                        <div class="pull-left">
                                            <div class="star-ratings-sprite star-ratings-center"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>
                                     
                                    <?php else: ?>
                                        <div class="pull-left">
                                            <div class="star-ratings-sprite star-ratings-center"><span style="width:%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </span>
                                <span class="histo-percent">
                                    <a href="#" title="rate"><?php echo e(round($ratings_var)); ?>%</a>
                                </span>
                                <span class="bar-block">
                                    <span id="bar-two" style="width: <?php echo e($ratings_var); ?>%" class="bar bar-clr bar-radius">&nbsp;</span> 
                                </span>
                            </div>
                            <div class="one histo-rate">
                                <span class="histo-star">
                                    <?php 
                                    $value = 0;
                                    $total = 0;
                                    $reviews = App\ReviewRating::where('course_id',$course->id)->where('status','1')->get();
                                    ?> 
                                    <?php if(!empty($reviews[0])): ?>
                                        <?php
                                        $count =  App\ReviewRating::where('course_id',$course->id)->count();

                                        foreach($reviews as $review){
                                            $value = $review->value*5;
                                            $total = $total + $value;
                                        }

                                        $count = ($count*1) * 5;
                                        $rat = $total/$count;
                                        $ratings_var = ($rat*100)/5;
                                        ?>
                        
                                        <div class="pull-left">
                                            <div class="star-ratings-sprite star-ratings-center"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>
                                     
                                    <?php else: ?>
                                        <div class="pull-left">
                                            <div class="star-ratings-sprite star-ratings-center"><span style="width:%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </span>
                                <span class="histo-percent">
                                    <a href="#" title="rate"><?php echo e(round($ratings_var)); ?>%</a>
                                </span>
                                <span class="bar-block">
                                    <span id="bar-one" style="width: <?php echo e($ratings_var); ?>%" class="bar bar-clr bar-radius">&nbsp;</span> 
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <?php endif; ?>
                <?php if(auth()->guard()->check()): ?>
                <div class="learning-review btm-40">
                     <?php
                        $orders = App\Order::where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                    ?>
                    <?php if(!empty($orders)): ?>
                        <div class="review-block">
                            <div class="row">
                                <div class="col-lg-2">
                                    <h3 class="top-20"><?php echo e(__('frontstaticword.Reviews')); ?></h3>
                                </div>
                                <div class="col-lg-10 col-12">
                                    <form id="demo-form2" method="post" action="<?php echo e(route('course.rating',$course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="review-table top-20">
                                            <table class="table">
                                              <thead>
                                                <tr>
                                                  <th scope="col"></th>
                                                  <th scope="col">1 <?php echo e(__('frontstaticword.Star')); ?></th>
                                                  <th scope="col">2 <?php echo e(__('frontstaticword.Star')); ?></th>
                                                  <th scope="col">3 <?php echo e(__('frontstaticword.Star')); ?></th>
                                                  <th scope="col">4 <?php echo e(__('frontstaticword.Star')); ?></th>
                                                  <th scope="col">5 <?php echo e(__('frontstaticword.Star')); ?></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <th scope="row"><?php echo e(__('frontstaticword.Learn')); ?></th>
                                                  <td><input type="radio" name="learn" value="1" id="option1" autocomplete="off"></td>
                                                  <td><input type="radio" name="learn" value="2" id="option2" autocomplete="off"></td>
                                                  <td><input type="radio" name="learn" value="3" id="option3" autocomplete="off"></td>
                                                  <td><input type="radio" name="learn" value="4" id="option4" autocomplete="off"></td>
                                                  <td><input type="radio" name="learn" value="5" id="option5" autocomplete="off"></td>
                                                </tr>
                                                <tr>
                                                  <th scope="row"><?php echo e(__('frontstaticword.Price')); ?></th>
                                                  <td><input type="radio" name="price" value="1" id="option6" autocomplete="off"></td>
                                                  <td><input type="radio" name="price" value="2" id="option7" autocomplete="off"></td>
                                                  <td><input type="radio" name="price" value="3" id="option8" autocomplete="off"></td>
                                                  <td><input type="radio" name="price" value="4" id="option9" autocomplete="off"></td>
                                                  <td><input type="radio" name="price" value="5" id="option10" autocomplete="off"></td>
                                                </tr>
                                                <tr>
                                                  <th scope="row"><?php echo e(__('frontstaticword.Value')); ?></th>
                                                  <td><input type="radio" name="value" value="1" id="option11" autocomplete="off"></td>
                                                  <td><input type="radio" name="value" value="2" id="option12" autocomplete="off"></td>
                                                  <td><input type="radio" name="value" value="3" id="option13" autocomplete="off"></td>
                                                  <td><input type="radio" name="value" value="4" id="option14" autocomplete="off"></td>
                                                  <td><input type="radio" name="value" value="5" id="option15" autocomplete="off"></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                            <div class="review-text btm-30">
                                                <label for="review"><?php echo e(__('frontstaticword.Writereview')); ?>:</label>
                                                <textarea name="review" rows="4" class="form-control" placeholder=""></textarea>
                                            </div>
                                            <div class="review-rating-btn text-right">
                                                <button type="submit" class="btn btn-success" title="Review"><?php echo e(__('frontstaticword.Submit')); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>

                    <?php endif; ?>


                    <?php
                        $alreadyrated = App\ReviewRating::where('course_id', $course->id)->first();
                    ?>
                    <?php if($alreadyrated == !NULL): ?>

                    <div class="review-dtl">
                        <?php

                            $user_count = count([$alreadyrated]);
                            $user_sub_total = 0;
                            $user_learn_t = $alreadyrated->learn * 5;
                            $user_price_t = $alreadyrated->price * 5;
                            $user_value_t = $alreadyrated->value * 5;
                            $user_sub_total = $user_sub_total + $user_learn_t + $user_price_t + $user_value_t;

                            $user_count = ($user_count * 3) * 5;
                            $rat1 = $user_sub_total / $user_count;
                            $ratings_var1 = ($rat1 * 100) / 5;

                        ?>
                        <?php if(isset($alreadyrated)): ?>
                        <?php $__currentLoopData = $course->review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($rating->review == !null && $rating->status == 1 && $rating->approved == 1): ?>
                        <div class="row btm-20">
                            <div class="col-lg-4">
                                <div class="review-img text-white">
                                 <?php echo e($rating->user->fname[0]); ?><?php echo e($rating->user->lname[0]); ?></div>
                                <div class="review-img-block">
                                    <div class="review-month"><?php echo e(date('d-m-Y', strtotime($rating['created_at']))); ?></div>
                                    <div class="review-name"><?php echo e($rating->user['fname']); ?></div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="review-rating">
                                    <div class="pull-left-review">
                                        <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var1; ?>%" class="star-ratings-sprite-rating"></span>
                                        </div>
                                    </div>
                                    <div class="review-text">
                                        <p><?php echo e($rating['review']); ?><p>
                                    </div>
                                    
                                    <div class="review"><?php echo e(__('frontstaticword.helpful')); ?>?
                                        <?php
                                        $help = App\ReviewHelpful::where('user_id', Auth::User()->id)->where('review_id', $rating->id)->first();
                                        ?>
                                      
                                        <?php if($help == !NULL): ?>
                                            <div class="helpful">
                                                <form  method="post" action="<?php echo e(route('helpful.delete', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>

                                                    <button type="submit" class="btn btn-link lft-7 rgt-10 yes-submitted"><i class="fa fa-check"></i> <?php echo e(__('frontstaticword.Yes')); ?></button>
                                                </form>
                                            </div>
                                            
                                        <?php else: ?>
                                            <div class="helpful">
                                                <form  method="post" action="<?php echo e(route('helpful', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                                <?php echo e(csrf_field()); ?>


                                                <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />

                                                <input type="hidden" name="review_id"  value="<?php echo e($rating->id); ?>" />

                                                <input type="hidden" name="helpful"  value="yes" />
                                                
                                                  <button type="submit" class="btn btn-link lft-7 rgt-10"><?php echo e(__('frontstaticword.Yes')); ?></button>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <a href="#" data-toggle="modal" data-target="#myModalreport"  title="report"><?php echo e(__('frontstaticword.Report')); ?></a>
                                        <div class="modal fade" id="myModalreport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title" id="myModalLabel"><?php echo e(__('frontstaticword.Report')); ?></h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="box box-primary">
                                                  <div class="panel panel-sum">
                                                    <div class="modal-body">
                                                        <?php
                                                            $courses = App\Course::first();
                                                        ?>
                                                        <form id="demo-form2" method="post" action="<?php echo e(route('report.review', $course->id)); ?>"              data-parsley-validate class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                            <input type="hidden" name="review_id"  value="<?php echo e($rating->id); ?>" />
                                                                    
                                                            <div class="row">
                                                              <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title"><?php echo e(__('frontstaticword.Title')); ?>:<sup class="redstar">*</sup></label>
                                                                    <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter Title" value="">
                                                                </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="email"><?php echo e(__('frontstaticword.Email')); ?>:<sup class="redstar">*</sup></label>
                                                                    <input type="email" class="form-control" name="email" id="title" placeholder="Please Enter Email" value="<?php echo e(Auth::User()->email); ?>" required>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="row">
                                                              <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="detail"><?php echo e(__('frontstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                                                                    <textarea name="detail" rows="4"  class="form-control" placeholder=""></textarea>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <br>
                                                            <div class="box-footer">
                                                             <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('frontstaticword.Submit')); ?></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    
                </div>
                <?php endif; ?>
                
                <?php if(!$relatedcourse->isEmpty()): ?>
                <div class="more-courses btm-30">
                    <h2 class="more-courses-heading"><?php echo e(__('frontstaticword.RelatedCourses')); ?></h2>
                    <div class="row">
                        <?php $__currentLoopData = $relatedcourse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($rel->status ==1): ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="together-img">
                                <div class="student-view-block">
                                    <div class="view-block">
                                        <div class="view-img">
                                            <?php if($rel->courses['preview_image'] !== NULL && $rel->courses['preview_image'] !== ''): ?>
                                                <a href="<?php echo e(route('user.course.show',['id' => $rel->course_id, 'slug' => $rel->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$rel->courses->preview_image)); ?>" alt="student">
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('user.course.show',['id' => $rel->course_id, 'slug' => $rel->courses->slug ])); ?>"><img src="<?php echo e(Avatar::create($rel->courses->title)->toBase64()); ?>" alt="student">
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <?php if(Auth::check()): ?>
                                        <?php
                                            $wishtt = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $rel->course_id)->first();
                                        ?>
                                        <?php if($wishtt == NULL): ?>
                                            <div class="heart">
                                                <form id="demo-form2" method="post" action="<?php echo e(url('show/wishlist', $rel->course_id)); ?>" data-parsley-validate 
                                                    class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>


                                                    <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                    <input type="hidden" name="course_id"  value="<?php echo e($rel->course_id); ?>" />

                                                    <button class="wishlisht-btn heart" title="Add to wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                </form>
                                            </div>
                                        <?php else: ?>
                                            <div class="heart-two">
                                                <form id="demo-form2" method="post" action="<?php echo e(url('remove/wishlist', $rel->course_id)); ?>" data-parsley-validate 
                                                    class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>


                                                    <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                    <input type="hidden" name="course_id"  value="<?php echo e($rel->course_id); ?>" />

                                                    <button class="wishlisht-btn heart"  title="Remove from Wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                        <?php else: ?>
                                            <div class="heart">
                                                <a href="<?php echo e(route('login')); ?>" title="heart"><i class="fa fa-heart rgt-10"></i></a>
                                            </div>
                                        <?php endif; ?>
                                        

                                        <div class="view-dtl">
                                            <div class="view-heading btm-10"><a href="<?php echo e(route('user.course.show',['id' => $rel->course_id, 'slug' => $rel->courses->slug ])); ?>"><?php echo e(str_limit($rel->courses['title'], $limit = 30, $end = '...')); ?></a></div>
                                            <p class="btm-10"><a herf="#">by <?php echo e($rel->user['fname']); ?></a></p>
                                            <div class="rating">
                                                <ul>
                                                    <li>
                                                    <?php 
                                                    $learn = 0;
                                                    $price = 0;
                                                    $value = 0;
                                                    $sub_total = 0;
                                                    $sub_total = 0;
                                                    $reviews = App\ReviewRating::where('course_id',$rel->course_id)->where('status','1')->get();
                                                    ?> 
                                                    <?php if(!empty($reviews[0])): ?>
                                                    <?php
                                                    $count =  App\ReviewRating::where('course_id',$rel->course_id)->count();

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
                                                        <div class="pull-left no-rating">
                                                            <?php echo e(__('frontstaticword.NoRating')); ?>

                                                        </div>
                                                    <?php endif; ?> 
                                                    </li>

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
                                                        $reviewsrating = App\ReviewRating::where('course_id', $rel->course_id)->first();
                                                    ?>
                                                    <?php if(!empty($reviewsrating)): ?>
                                                    <li>
                                                        <b>(<?php echo e(round($overallrating, 1)); ?>)</b>
                                                    </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <?php if( $rel->courses->type == 1): ?>
                                                <?php
                                                    $currency2 = App\Currency::first();
                                                ?>
                                                <?php if($rel->courses->discount_price == !NULL): ?>
                                                    <div class="rate text-right">
                                                        <ul>
                                                            <li><a><b><i class="<?php echo e($currency2['icon']); ?>"></i><?php echo e($rel->courses['discount_price']); ?></b></a></li>&nbsp;
                                                            <li><a><b><strike><i class="<?php echo e($currency2['icon']); ?>"></i><?php echo e($rel->courses['price']); ?></strike></b></a></li>
                                                        </ul>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="rate text-right">
                                                        <ul>
                                                            <li><a><b><i class="<?php echo e($currency2['icon']); ?>"></i><?php echo e($rel->courses['price']); ?></b></a></li>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <div class="rate text-right">
                                                    <ul>
                                                        <li><a><b><?php echo e(__('frontstaticword.Free')); ?></b></a></li>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(Auth::check()): ?>
                    <div class="report-abuse text-center btm-20">
                        <a href="#" data-toggle="modal" data-target="#myModalCourse" title="report"><i class="fa fa-flag rgt-10"></i><?php echo e(__('frontstaticword.Report')); ?></a>
                    </div>
                <?php else: ?>
                    <div class="report-abuse text-center btm-20">
                        <a href="<?php echo e(route('login')); ?>" title="report"><i class="fa fa-flag rgt-10"></i><?php echo e(__('frontstaticword.Report')); ?></a>
                    </div>
                <?php endif; ?>

                <!--Model start-->
                <?php if(auth()->guard()->check()): ?>
                <div class="modal fade" id="myModalCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                          <h4 class="modal-title" id="myModalLabel"><?php echo e(__('frontstaticword.Report')); ?></h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="box box-primary">
                          <div class="panel panel-sum">
                            <div class="modal-body">
                            
                            <form id="demo-form2" method="post" action="<?php echo e(route('course.report', $course->id)); ?>"
                                data-parsley-validate class="form-horizontal form-label-left">
                                    <?php echo e(csrf_field()); ?>

                                        
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title"><?php echo e(__('frontstaticword.Title')); ?>:<sup class="redstar">*</sup></label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter Title" value="" required>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email"><?php echo e(__('frontstaticword.Email')); ?>:<sup class="redstar">*</sup></label>
                                        <input type="email" class="form-control" name="email" id="title" placeholder="Please Enter Email" value="<?php echo e(Auth::user()->email); ?>" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="detail"><?php echo e(__('frontstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                                        <textarea name="detail" rows="4"  class="form-control" placeholder="Enter Detail" required></textarea>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('frontstaticword.Submit')); ?></button>
                                </div>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                </div>
                <?php endif; ?>
                <!--Model close -->
            </div>
        </div>
    </div>
</section>
<!-- course detail end -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom-script'); ?>


<script>
// Hide the extra content initially, using JS so that if JS is disabled, no problemo:
    $('.read-more-content').addClass('hide_content')
    $('.read-more-show, .read-more-hide').removeClass('hide_content')

    // Set up the toggle effect:
    $('.read-more-show').on('click', function(e) {
      $(this).next('.read-more-content').removeClass('hide_content');
      $(this).addClass('hide_content');
      e.preventDefault();
    });

    // Changes contributed by @diego-rzg
    $('.read-more-hide').on('click', function(e) {
      var p = $(this).parent('.read-more-content');
      p.addClass('hide_content');
      p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
      e.preventDefault();
    });
</script>

<script>
(function($) {
  "use strict";
  $(document).ready(function(){
    
    $(".group1").colorbox({rel:'group1'});
    $(".group2").colorbox({rel:'group2', transition:"fade"});
    $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
    $(".group4").colorbox({rel:'group4', slideshow:true});
    $(".ajax").colorbox();
    $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
    $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
    $(".iframe").colorbox({iframe:true, width:"50%", height:"50%"});
    $(".inline").colorbox({inline:true, width:"50%"});
    $(".callbacks").colorbox({
      onOpen:function(){ alert('onOpen: colorbox is about to open'); },
      onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
      onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
      onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
      onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
    });

    $('.non-retina').colorbox({rel:'group5', transition:'none'})
    $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
    
    
    $("#click").click(function(){ 
      $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
      return false;
    });
  });
})(jQuery);
</script>
<?php $__env->stopSection(); ?>


<style type="text/css">
    .read-more-show{
      cursor:pointer;
      color: #0284A2;
    }
    .read-more-hide{
      cursor:pointer;
      color: #0284A2;
    }

    .hide_content{
      display: none;
    }
</style>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/front/course_detail.blade.php ENDPATH**/ ?>