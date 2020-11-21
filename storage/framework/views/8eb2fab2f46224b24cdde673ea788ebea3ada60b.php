<section id="nav-bar" class="nav-bar-main-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <div class="logo">
                            <?php
                                $setting = App\Setting::first();
                            ?>

                            <?php if($setting->logo_type == 'L'): ?>
                                <a href="<?php echo e(url('/')); ?>" ><img src="<?php echo e(asset('images/logo/'.$setting->logo)); ?>" class="img-fluid" alt="logo"></a>
                            <?php else: ?>
                                <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e(str_limit($setting->project_title, $limit=6, $end="")); ?></div></b></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="navigation">
                            <div id="cssmenu">
                                <ul>
                                    <li><a href="#" title="Categories"><i class="flaticon-grid"></i><?php echo e(__('frontstaticword.Categories')); ?></a>
                                        <?php
                                         $categories = App\Categories::orderBy('position','ASC')->get();
                                        ?>
                                        <ul>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($cate->status == 1 ): ?>
                                            <li><a href="<?php echo e(route('category.page',$cate->id)); ?>" title="<?php echo e($cate->title); ?>"><i class="fa <?php echo e($cate->icon); ?> rgt-20"></i><?php echo e($cate->title); ?><i class="fa fa-chevron-right float-rgt"></i></a>
                                            <ul>   
                                                <?php $__currentLoopData = $cate->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($sub->status ==1): ?>
                                                <li><a href="<?php echo e(route('subcategory.page',$sub->id)); ?>" title="<?php echo e($sub->title); ?>"><i class="fa <?php echo e($sub->icon); ?> rgt-20"></i><?php echo e($sub->title); ?>

                                                    <i class="fa fa-chevron-right float-rgt"></i></a>
                                                    <ul>
                                                        <?php $__currentLoopData = $sub->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($child->status ==1): ?>
                                                        <li>
                                                            <a href="<?php echo e(route('childcategory.page',$child->id)); ?>" title="<?php echo e($child->title); ?>"><i class="fa <?php echo e($child->icon); ?> rgt-20"></i><?php echo e($child->title); ?></a>
                                                        </li>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                                <?php endif; ?>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            </li>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <div class="nav-search">
                            <form action="<?php echo e(route('search')); ?>" class="form-inline search-form" method="GET">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search" name="searchTerm" placeholder="<?php echo e(__('frontstaticword.Searchforcourses')); ?>" value="<?php echo e(isset($searchTerm) ? $searchTerm : ''); ?>">
                                </div>              
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php if(auth()->guard()->guest()): ?>
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="learning-business">
                            <?php if($setting->instructor_enable == 1): ?>
                                <a href="<?php echo e(route('login')); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Login/Register To Become an Instructor"><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <div class="Login-btn">
                            <?php if(isset(Auth::User()->role) && (Auth::User()->role=='admin' || Auth::User()->role=='instructor')): ?>
                            <a class="btn btn-success generate_liveclass" data-id="<?php echo \Auth::user()->id; ?>" data-pro="absera" data-date="<?php echo time(); ?>" target="_blank">Live Class</a></li>
                            
                            <?php endif; ?>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary" title="register"><?php echo e(__('frontstaticword.Signup')); ?></a>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-secondary" title="login"><?php echo e(__('frontstaticword.Login')); ?></a>
                        </div> 
                    </div>
                <?php endif; ?>

                <?php if(auth()->guard()->check()): ?>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="learning-business learning-business-two">
                            <?php if(Auth::User()->role == "user"): ?>
                                <?php if($setting->instructor_enable == 1): ?>
                                    <a href="#" class="btn btn-link" data-toggle="modal" data-target="#myModalinstructor" title="Become An Instructor"><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <?php if(isset(Auth::User()->role) && Auth::User()->role!=''): ?>
                            <a class="btn btn-success generate_liveclass" data-id="<?php echo \Auth::user()->id; ?>" data-pro="absera" data-date="<?php echo time(); ?>" target="_blank">Live Class</a></li>
                            <?php else: ?>
                            <a class="btn btn-success" href="<?php echo \URL::to('login'); ?>">Live Class</a></li>
                            <?php endif; ?>
                    </div>
                    <div class="col-lg-2 col-md-2 col-6">
                        <div class="learning-business">
                            <a href="<?php echo e(route('mycourse.show')); ?>" class="btn btn-link" title="My Course"><?php echo e(__('frontstaticword.MyCourses')); ?></a>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-2 col-2">
                        <div class="nav-wishlist">
                            <ul id="nav">
                                <li id="notification_li">
                                    <a href="<?php echo e(url('send')); ?>" id="notificationLink" title="Notification"><i class="fa fa-bell"></i></a>
                                    <span class="red-menu-badge red-bg-success">
                                        <?php echo e(Auth()->user()->unreadNotifications->count()); ?>

                                    </span>
                                    <div id="notificationContainer">
                                    <div id="notificationTitle"><?php echo e(__('frontstaticword.Notifications')); ?></div>
                                    <div id="notificationsBody" class="notifications">
                                        <ul>
                                            <?php $__currentLoopData = Auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="unread-notification">
                                                    <a href="<?php echo e(url('notifications/'.$notification->id)); ?>">          
                                                    <div class="notification-image">
                                                        <?php if($notification->data['image'] !== NULL ): ?>
                                                            <img src="<?php echo e(asset('images/course/'.$notification->data['image'])); ?>" alt="course" class="img-fluid" >
                                                        <?php else: ?>
                                                            <img src="<?php echo e(Avatar::create($notification->data['id'])->toBase64()); ?>" alt="course" class="img-fluid">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="notification-data">
                                                        In <?php echo e(str_limit($notification->data['id'], $limit = 20, $end = '...')); ?>

                                                        <br>
                                                        <?php echo e(str_limit($notification->data['data'], $limit = 20, $end = '...')); ?>

                                                    </div>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php $__currentLoopData = Auth()->user()->readNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="<?php echo e(route('mycourse.show')); ?>">
                                                    <div class="notification-image">
                                                        <?php if($notification->data['image'] !== NULL ): ?>
                                                            <img src="<?php echo e(asset('images/course/'.$notification->data['image'])); ?>" alt="course" class="img-fluid" >
                                                        <?php else: ?>
                                                           <img src="<?php echo e(Avatar::create($notification->data['id'])->toBase64()); ?>" alt="course" class="img-fluid">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="notification-data">
                                                        In <?php echo e(str_limit($notification->data['id'], $limit = 20, $end = '...')); ?>

                                                        <br>
                                                        <?php echo e(str_limit($notification->data['data'], $limit = 20, $end = '...')); ?>

                                                    </div>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                    <div id="notificationFooter"><a href="<?php echo e(route('deleteNotification')); ?>"><?php echo e(__('frontstaticword.ClearAll')); ?></a></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-2 col-2">
                        <div class="nav-wishlist">
                            <a href="<?php echo e(route('wishlist.show')); ?>" title="Go to Wishlist"><i class="fa fa-heart"></i></a>
                            <span class="red-menu-badge red-bg-success">
                                <?php
                                    $data = App\Wishlist::where('user_id', Auth::User()->id)->get();
                                    if(count($data)>0){

                                        echo count($data);
                                    }
                                    else{

                                        echo "0";
                                    }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-2 col-2">
                        <div class="shopping-cart">
                            <a href="<?php echo e(route('cart.show')); ?>" title="Cart"><i class="flaticon-shopping-cart"></i></a>
                            <span class="red-menu-badge red-bg-success">
                                <?php
                                    $item = App\Cart::where('user_id', Auth::User()->id)->get();
                                    if(count($item)>0){

                                        echo count($item);
                                    }
                                    else{

                                        echo "0";
                                    }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-6 col-6">
                        <div class="my-container">
                          <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle  my-dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
                                  <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="circle" alt="user">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>"  class="circle" alt="user">
                                <?php endif; ?>
                                <span class="dropdown__item name" id="name"><?php echo e(str_limit(Auth::User()->fname, $limit = 10, $end = '..')); ?></span>
                                <span class="dropdown__item caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right User-Dropdown U-open" aria-labelledby="dropdownMenu1">
                                <div id="notificationTitle">
                                    <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
                                      <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="dropdown-user-circle" alt="user">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="dropdown-user-circle" alt="user">
                                    <?php endif; ?>
                                    <div class="user-detailss">
                                        <?php echo e(Auth::User()->fname); ?>

                                        <br>
                                        <?php echo e(Auth::User()->email); ?>

                                    </div>
                                    
                                </div>
                                <?php if(Auth::User()->role == "admin" || Auth::User()->role == "instructor"  ): ?>
                                <a target="_blank" href="<?php echo e(url('/admins')); ?>"><li><i class="fa fa-dashboard"></i><?php echo e(__('frontstaticword.AdminDashboard')); ?></li></a>
                                <?php endif; ?>
                                <a href="<?php echo e(route('mycourse.show')); ?>"><li><i class="fa fa-diamond"></i><?php echo e(__('frontstaticword.MyCourses')); ?></li></a>
                                <a href="<?php echo e(route('wishlist.show')); ?>"><li><i class="fa fa-heart"></i><?php echo e(__('frontstaticword.MyWishlist')); ?></li></a>
                                <a href="<?php echo e(route('purchase.show')); ?>"><li><i class="fa fa-shopping-cart"></i><?php echo e(__('frontstaticword.PurchaseHistory')); ?></li></a>
                                <a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>"><li ><i class="fa fa-user"></i><?php echo e(__('frontstaticword.UserProfile')); ?></li></a>
                                <?php if(Auth::User()->role == "user"): ?>
                                <?php if($gsetting->instructor_enable == 1): ?>
                                <a href="#" data-toggle="modal" data-target="#myModalinstructor" title="Become An Instructor"><li><i class="fas fa-chalkboard-teacher"></i><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?></li></a>
                                <?php endif; ?>
                        
                                <?php endif; ?>

                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div id="notificationFooter"><i class="fa fa-power-off"></i>
                                        <?php echo e(__('frontstaticword.Logout')); ?>

                                        
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="display-none">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </a>
                            </ul>
                          </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('instructormodel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/theme/nav.blade.php ENDPATH**/ ?>