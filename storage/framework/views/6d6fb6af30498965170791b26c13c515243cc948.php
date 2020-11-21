<?php
    $cats= App\Categories::find($cate);
?>


<div class="row">
    <?php $__currentLoopData = $cats->courses->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($c->status == 1): ?>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="item immi-slider-block development">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($c->id); ?>">
                    <div class="view-block">
                        <div class="view-img">
                            <?php if($c['preview_image'] !== NULL && $c['preview_image'] !== ''): ?>
                                <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$c['preview_image'])); ?>" alt="course" class="img-fluid" >
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(Avatar::create($c->title)->toBase64()); ?>" alt="course"class="img-fluid">
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading btm-10"><a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><?php echo e(str_limit($c['title'], $limit = 35, $end = '...')); ?></a></div>
                            <p class="btm-10"><a herf="#">by <?php echo e($c->user['fname']); ?></a></p>
                            <div class="rating">
                                <ul>
                                    <li>
                                        <?php 
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $sub_total = 0;
                                        $reviews = App\ReviewRating::where('course_id',$c->id)->get();
                                        ?> 
                                        <?php if(!empty($reviews[0])): ?>
                                        <?php
                                        $count =  App\ReviewRating::where('course_id',$c->id)->count();

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
                                            <div class="pull-left"><?php echo e(__('frontstaticword.NoRating')); ?></div>
                                        <?php endif; ?> 
                                    </li>
                                    
                                    
                                    <?php 
                                    $learn = 0;
                                    $price = 0;
                                    $value = 0;
                                    $sub_total = 0;
                                    $count =  count($reviews);
                                    $onlyrev = array();

                                    $reviewcount = App\ReviewRating::where('course_id', $c->id)->WhereNotNull('review')->get();

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
                                        $reviewsrating = App\ReviewRating::where('course_id', $c->id)->first();
                                    ?>
                                    <?php if(!empty($reviewsrating)): ?>
                                    <li>
                                        <b><?php echo e(round($overallrating, 1)); ?></b>
                                    </li>
                                    <?php endif; ?>

                                    <li>(<?php echo e($c->order->count()); ?>)</li> 
                                </ul>
                            </div>
                            <?php if( $c->type == 1): ?>
                                <div class="rate text-right">
                                    <ul>  
                                        <?php
                                            $currency = App\Currency::first();
                                        ?> 
                                        <?php if($c->discount_price == !NULL): ?>

                                            <li><a><b><i class="<?php echo e($currency['icon']); ?>"></i><?php echo e($c['discount_price']); ?></b></a></li>&nbsp;
                                            <li><a><b><strike><i class="<?php echo e($currency['icon']); ?>"></i><?php echo e($c['price']); ?></strike></b></a></li>
                                            
                                        <?php else: ?>
                                            <li><a><b><i class="<?php echo e($currency['icon']); ?>"></i><?php echo e($c->price); ?></b></a></li>
                                        <?php endif; ?>

                                        
                                    </ul>
                                </div>
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
                <div id="prime-next-item-description-block<?php echo e($c->id); ?>" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading"><?php echo e($c['title']); ?></h5>
                            <div class="protip-img">
                                <?php if($c['preview_image'] !== NULL && $c['preview_image'] !== ''): ?>
                                    <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$c['preview_image'])); ?>" alt="student" class="img-fluid">
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(Avatar::create($c->title)->toBase64()); ?>" alt="student" class="img-fluid">
                                    </a>
                                <?php endif; ?>
                            </div>

                            <ul class="description-list">
                                <li><?php echo e(__('frontstaticword.Classes')); ?>: 
                                    <?php
                                        $data = App\CourseClass::where('course_id', $c->id)->get();
                                        if(count($data)>0){

                                            echo count($data);
                                        }
                                        else{

                                            echo "0";
                                        }
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                    $learn = 0;
                                    $price = 0;
                                    $value = 0;
                                    $sub_total = 0;
                                    $count =  count($reviews);
                                    $onlyrev = array();

                                    $reviewcount = App\ReviewRating::where('course_id', $c->id)->where('status',"1")->WhereNotNull('review')->get();

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
                                </li>
                            </ul>

                            <div class="main-des">
                                <p><?php echo e(str_limit($c->detail, $limit = 200, $end = '...')); ?></p>
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <?php if($c->type == 1): ?>
                                            <?php if(Auth::check()): ?>
                                                <?php if(Auth::User()->role == "admin"): ?>
                                                    <div class="protip-btn">
                                                        <a href="<?php echo e(url('show/coursecontent',$c->id)); ?>" class="btn btn-secondary" title="course">Go To Course</a>
                                                    </div>
                                                <?php else: ?>
                                                    <?php
                                                        $order = App\Order::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                    ?>
                                                    <?php if(!empty($order) && $order->status == 1): ?>
                                                        <div class="protip-btn">
                                                            <a href="<?php echo e(url('show/coursecontent',$c->id)); ?>" class="btn btn-secondary" title="course"><?php echo e(__('frontstaticword.GoToCourse')); ?></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <?php
                                                            $cart = App\Cart::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                        ?>
                                                        <?php if(!empty($cart)): ?>
                                                            <div class="protip-btn">
                                                                <form id="demo-form2" method="post" action="<?php echo e(route('remove.item.cart',$cart->id)); ?>">
                                                                        <?php echo e(csrf_field()); ?>

                                                                            
                                                                    <div class="box-footer">
                                                                     <button type="submit" class="btn btn-primary"><?php echo e(__('frontstaticword.RemoveFromCart')); ?></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="protip-btn">
                                                                <form id="demo-form2" method="post" action="<?php echo e(route('addtocart',['course_id' => $c->id, 'price' => $c->price, 'discount_price' => $c->discount_price ])); ?>"
                                                                    data-parsley-validate class="form-horizontal form-label-left">
                                                                        <?php echo e(csrf_field()); ?>


                                                                    <input type="hidden" name="category_id"  value="<?php echo e($c->category->id); ?>" />
                                                                            
                                                                    <div class="box-footer">
                                                                     <button type="submit" class="btn btn-primary"><?php echo e(__('frontstaticword.AddToCart')); ?></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <div class="protip-btn">
                                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;<?php echo e(__('frontstaticword.AddToCart')); ?></a>
                                                </div>
                                            <?php endif; ?>
                                        <?php else: ?>
                                             <?php if(Auth::check()): ?>
                                                <?php if(Auth::User()->role == "admin"): ?>
                                                    <div class="protip-btn">
                                                        <a href="<?php echo e(url('show/coursecontent',$c->id)); ?>" class="btn btn-secondary" title="course"><?php echo e(__('frontstaticword.GoToCourse')); ?></a>
                                                    </div>
                                                <?php else: ?>
                                                    <?php
                                                        $enroll = App\Order::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                    ?>
                                                    <?php if($enroll == NULL): ?>
                                                        <div class="protip-btn">
                                                            <a href="<?php echo e(url('enroll/show',$c->id)); ?>" class="btn btn-primary" title="Enroll Now"><?php echo e(__('frontstaticword.EnrollNow')); ?></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="protip-btn">
                                                            <a href="<?php echo e(url('show/coursecontent',$c->id)); ?>" class="btn btn-secondary" title="Cart"><?php echo e(__('frontstaticword.GoToCourse')); ?></a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <div class="protip-btn">
                                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary" title="Enroll Now"><?php echo e(__('frontstaticword.EnrollNow')); ?></a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="protip-wishlist">
                                            <ul>
                                                <?php if(Auth::check()): ?>
                                                    <?php
                                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                    ?>
                                                    <?php if($wish == NULL): ?>
                                                        <li class="protip-wish-btn">
                                                            <form id="demo-form2" method="post" action="<?php echo e(url('show/wishlist', $c->id)); ?>" data-parsley-validate 
                                                                class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>


                                                                <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                                <input type="hidden" name="course_id"  value="<?php echo e($c->id); ?>" />

                                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                            </form>
                                                        </li>
                                                    <?php else: ?>
                                                        <li class="protip-wish-btn-two">
                                                            <form id="demo-form2" method="post" action="<?php echo e(url('remove/wishlist', $c->id)); ?>" data-parsley-validate 
                                                                class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>


                                                                <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                                <input type="hidden" name="course_id"  value="<?php echo e($c->id); ?>" />

                                                                <button class="wishlisht-btn" title="Remove from Wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                            </form>
                                                        </li>
                                                    <?php endif; ?> 
                                                <?php else: ?>
                                                    <li class="protip-wish-btn"><a href="<?php echo e(route('login')); ?>" title="heart"><i class="fa fa-heart rgt-10"></i></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<?php
    $count = $cats->courses->where('status','=','1')->count();
?>
<?php if($count >= 3): ?>
    <div class="view-button txt-rgt">
        <a href="<?php echo e(route('category.page',$cats->id)); ?>" class="btn btn-secondary" title="View More"><?php echo e(__('frontstaticword.ViewMore')); ?></a>
    </div>
<?php endif; ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/tabs.blade.php ENDPATH**/ ?>