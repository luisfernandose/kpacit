<?php $__env->startSection('title', "$course->title"); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- courses content header start -->
<section id="class-nav" class="class-nav-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="class-logo">
                    
                    <a href="<?php echo e(url('/')); ?>" title="logo"><img src="<?php echo e(asset('images/favicon/'.$gsetting->favicon)); ?>" class="img-fluid" alt="logo"></a>
                </div>
                <div class="class-nav-heading"><?php echo e($course->title); ?></div>
            </div>
            <div class="col-lg-4">
                <div class="class-button txt-rgt">
                    <ul>
                        <li>
                            <a href="<?php echo e(route('cirtificate.show', $course->id)); ?>" class="course_btn"> <i class="fas fa-trophy"></i>&nbsp;Get Certificate</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>" class="course_btn"> <?php echo e(__('frontstaticword.Coursedetails')); ?> <i class="fa fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="learning-courses-home" class="learning-courses-home-main-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="learning-courses-home-video text-white btm-30">
                    <div class="video-item hidden-xs">
                        <div class="video-device">
                            <?php if($course['preview_image'] !== NULL && $course['preview_image'] !== ''): ?>
                                <img src="<?php echo e(asset('images/course/'.$course->preview_image)); ?>" class="img-fluid" alt="Background">
                            <?php else: ?>
                                <img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" class="bg_img img-fluid" alt="Background">
                            <?php endif; ?>
                            <div class="video-preview">
                                <?php
                                    //if empty 
                                    $items = App\CourseClass::where('course_id', $course->id)->first();
                                ?> 
                                
                                <?php if(isset($items) && count($course->chapter)>0): ?>
                                
                                <?php if(count($course->chapter[0]->courseclass)>0 && $course->chapter[0]->courseclass[0]->iframe_url == NULL): ?>
                               
                                    <a href="<?php echo e(route('watchcourse',$course->id)); ?>" class="btn-video-play iframe"><i class="fa fa-play"></i></a>
                                <?php else: ?> 
                                    <?php
                                    if(count($course->chapter)>0 && count($course->chapter[0]->courseclass)>0){
                                        $url = Crypt::encrypt($course->chapter[0]->courseclass[0]->iframe_url);
                                    
                                    }else{
                                    $url='';
                                    }
                                    ?>
                                    <a href=" <?php echo e(route('watchinframe',[$url, 'course_id' => $course->id])); ?>" class="btn-video-play"><i class="fa fa-play"></i></a>
                                <?php endif; ?>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="learning-courses-home-block text-white">
                    <h3 class="learning-courses-home-heading btm-20"><a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>" title="heading"><?php echo e($course->title); ?></a></h3>
                    <div class="learning-courses btm-20"><?php echo e($course->user->fname); ?></div>
                    <div class="learning-courses btm-20"><?php echo e($course->short_detail); ?></div>
                    
                    <?php if(isset($items)  && count($course->chapter)>0): ?> 
                    <?php if(count($course->chapter[0]->courseclass)>0 && $course->chapter[0]->courseclass[0]->iframe_url == NULL): ?>
                    <div class="learning-courses-home-btn">
                        <a href="<?php echo e(route('watchcourse',$course->id)); ?>" class="iframe btn btn-primary" title="Continue"><?php echo e(__('frontstaticword.ContinuetoLecture')); ?></a>
                    </div>
                    <?php else: ?>
                    <div class="learning-courses-home-btn">
                        <?php
                            if(count($course->chapter)>0 && count($course->chapter[0]->courseclass)>0){
                                        $url = Crypt::encrypt($course->chapter[0]->courseclass[0]->iframe_url);
                                    
                                    }else{
                                    $url='';
                                    }
                        ?>
                        <a href="<?php echo e(route('watchinframe',[$url, 'course_id' => $course->id])); ?>" class="btn btn-primary" title="Continue"><?php echo e(__('frontstaticword.ContinuetoLecture')); ?></a>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- courses content header end -->
<!-- courses-content start -->
<section id="learning-courses" class="learning-courses-about-main-block">
    <div class="container">
        <div class="about-block">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active text-center" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo e(__('frontstaticword.Overview')); ?></a>
                    <a class="nav-item nav-link text-center" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo e(__('frontstaticword.CourseContent')); ?></a>
                    <a class="nav-item nav-link text-center" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><?php echo e(__('frontstaticword.Q&A')); ?></a>
                    <a class="nav-item nav-link text-center" id="nav-announcement-tab" data-toggle="tab" href="#nav-announcement" role="tab" aria-controls="nav-announcement" aria-selected="false"><?php echo e(__('frontstaticword.Announcements')); ?></a>
                    <a class="nav-item nav-link text-center" id="nav-quiz-tab" data-toggle="tab" href="#nav-quiz" role="tab" aria-controls="nav-quiz" aria-selected="false"><?php echo e(__('frontstaticword.Quiz')); ?></a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="overview-block">
                        <h4><?php echo e(__('frontstaticword.RecentActivity')); ?></h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="learning-questions-block btm-40">
                                    <h5 class="learning-questions-heading"><?php echo e(__('frontstaticword.RecentQuestions')); ?></h5>

                                    <?php if($coursequestions->isEmpty()): ?>
                                        <div class="learning-questions-content text-center">
                                            <h3 class="text-center"><?php echo e(__('frontstaticword.No')); ?> <?php echo e(__('frontstaticword.RecentQuestions')); ?></h3>
                                        </div>
                                    <?php else: ?>
                                        <?php
                                            $questions = App\Question::where('course_id', $course->id)->orderBy('created_at','desc')->limit(2)->get();
                                        ?>
                                        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="learning-questions-dtl-block">
                                            <div class="learning-questions-img rgt-20"><?php echo e($question->user->fname); ?><?php echo e($question->user->lname); ?></div>
                                            <div class="learning-questions-dtl"><a href="#" title="questions"><?php echo e($question->question); ?></a>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <div class="learning-questions-heading"><a href="#" id="goTab3" title="browse"><?php echo e(__('frontstaticword.Browsequestions')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="learning-questions-block btm-40">
                                    <h5 class="learning-questions-heading"><?php echo e(__('frontstaticword.RecentAnnouncements')); ?></h5>
                                    <?php if($announsments->isEmpty()): ?>
                                        <div class="learning-questions-content text-center">
                                            <h3 class="text-center"><?php echo e(__('frontstaticword.No')); ?> <?php echo e(__('frontstaticword.RecentAnnouncements')); ?></h3>
                                        </div>
                                    <?php else: ?>
                                        <div id="accordion" class="second-accordion">
                                        <?php $__currentLoopData = $announsments->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announsment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card">
                                            <div class="card-header" id="headingFour<?php echo e($announsment->id); ?>">
                                                <div class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour<?php echo e($announsment->id); ?>" aria-expanded="true" aria-controls="collapseFour">
                                                        <div class="learning-questions-img rgt-20"><?php echo e($announsment->user->fname); ?><?php echo e($announsment->user->lname); ?>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-6">
                                                                <div class="section"><a href="#" title="questions"><?php echo e($announsment->user->fname); ?> <?php echo e($announsment->user->lname); ?></a> <a href="#" title="questions"><?php echo e(date('jS F Y', strtotime($announsment->created_at))); ?></a></div>
                                                            </div>
                                                            <div class="col-lg-6 col-6">
                                                                <div class="section-dividation text-right">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-8 col-6"> 
                                                                <div class="profile-heading"><?php echo e(__('frontstaticword.Announcements')); ?></div>
                                                            </div>
                                                            <div class="col-lg-4 col-6">
                                                            </div>

                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="collapseFour<?php echo e($announsment->id); ?>" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                               
                                                <div class="card-body">
                                                    <p class="announsment-text"><?php echo e($announsment->announsment); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="learning-questions-heading"><a id="goTab4" href="" title="browse"><?php echo e(__('frontstaticword.Browseannouncements')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-course-block">
                            <h4 class="content-course"><?php echo e(__('frontstaticword.Aboutthiscourse')); ?></h4>
                            <p class="btm-40"><?php echo e($course->short_detail); ?></p>
                        </div>
                        <hr>
                        <div class="content-course-number-block">
                            <div class="row">
                                <div class="col-lg-3 col-sm-4">
                                    <div class="content-course-number"><?php echo e(__('frontstaticword.Bythenumbers')); ?></div>
                                </div>
                                <div class="col-lg-6 col-sm-5">
                                    <div class="content-course-number">
                                        <ul>
                                            <li><?php echo e(__('frontstaticword.studentsenrolled')); ?>: 
                                                <?php
                                                    $data = App\Order::where('course_id', $course->id)->get();
                                                    if(count($data)>0){

                                                        echo count($data);
                                                    }
                                                    else{

                                                        echo "0";
                                                    }
                                                ?>
                                            </li>
                                            <?php if($course->language_id == !NULL): ?>
                                            <li><?php echo e(__('frontstaticword.Languages')); ?>: <?php echo e($course->language->name); ?></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <div class="content-course-number">
                                        <ul>
                                            <li><?php echo e(__('frontstaticword.Classes')); ?>:
                                                <?php
                                                    $data = App\CourseClass::where('course_id', $course->id)->get();
                                                    if(count($data)>0){

                                                        echo count($data);
                                                    }
                                                    else{

                                                        echo "0";
                                                    }
                                                ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="content-course-number"><?php echo e(__('frontstaticword.Description')); ?></div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="content-course-number content-course-one">
                                        <h5 class="content-course-number-heading"><?php echo e(__('frontstaticword.Aboutthiscourse')); ?></h5>
                                        <p><?php echo e($course->short_detail); ?><p>
                                        <h5 class="content-course-number-heading"><?php echo e(__('frontstaticword.Description')); ?></h5>
                                        <p><?php echo e($course->detail); ?><p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3 col-sm-3">
                                    <div class="content-course-number"><?php echo e(__('frontstaticword.Instructor')); ?></div>
                                </div>
                                <div class="col-lg-9 col-sm-9">
                                    <div class="content-course-number content-course-number-one">
                                        <div class="content-img-block btm-20">
                                            <div class="content-img">
                                               

                                                <?php if($course->user->user_img != null || $course->user->user_img !=''): ?>
                                                  <img src="<?php echo e(asset('images/user_img/'.$course->user->user_img)); ?>" class="img-fluid"  alt="instructor" >
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-fluid" alt="instructor">
                                                <?php endif; ?>
                                            </div>
                                            <div class="content-img-dtl">
                                                <div class="profile"><a href="#" title="profile"><?php echo e($course->user->fname); ?>

                                                </a></div>
                                                <p><?php echo e($course->user->email); ?></p>
                                            </div>
                                        </div>
                                        <ul>
                                            <li class="rgt-10"><a href="<?php echo e($course->user['twitter_url']); ?>" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="<?php echo e($course->user['fb_url']); ?>" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                        </ul>
                                        <p><?php echo $course->user->detail; ?><p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="profile-block">
                        <div id="accordion" class="second-accordion">
                            <?php $i=0;?>
                            <?php $__currentLoopData = $coursechapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coursechapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $i++;?>
                            <div class="card btm-10">
                                <div class="card-header" id="headingOne<?php echo e($coursechapter->id); ?>">
                                    <div class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne<?php echo e($coursechapter->id); ?>" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="row">
                                                <div class="col-lg-6 col-6">
                                                    <div class="section"><?php echo e(__('frontstaticword.Section')); ?>: <?php echo $i;?></div>
                                                </div>
                                                <div class="col-lg-6 col-6">
                                                    <div class="section-dividation text-right">
                                                        <?php
                                                            $classone = App\CourseClass::where('coursechapter_id', $coursechapter->id)->get();
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
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-10 col-8">
                                                    <div class="profile-heading"><?php echo e($coursechapter->chapter_name); ?>

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-4">
                                                    <div class="text-right">
                                                        <?php
                                                        echo $classtwo =  App\CourseClass::where('coursechapter_id', $coursechapter->id)->sum("duration");
                                                        ?>
                                                        min
                                                    </div>
                                                </div>
                                            </div>

                                        </button>
                                    </div>
                                </div>
                                <div id="collapseOne<?php echo e($coursechapter->id); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">

                                    <?php
                                        $classes = App\CourseClass::where('coursechapter_id', $coursechapter->id)->orderBy('order_position', 'asc')->get();

                                        $mytime = Carbon\Carbon::now();
                                    ?>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card-body">
                                        <table class="table">  
                                            <tbody>
                                                <tr>
                                                    <td class="class-type">
                                                        <?php if($class->type =='video' && $class->video ): ?>
                                                          <a href="<?php echo e(route('watchcourseclass',$class->id)); ?>" title="Course" class="iframe"><i class="fa fa-play-circle"></i>&nbsp;<?php echo e(__('frontstaticword.class')); ?></a>
                                                        
                                                        <?php endif; ?>
                                                        
                                                        <?php
                                                            $url = Crypt::encrypt($class->iframe_url);
                                                        ?>
                                                        <?php if($class->type =='video' && $class->iframe_url ): ?>
                                                        <a href="<?php echo e(route('watchinframe',[$url, 'course_id' => $course->id])); ?>" title="Course"><i class="fa fa-play-circle"></i>&nbsp;<?php echo e(__('frontstaticword.class')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($class->type =='image' && $class->image ): ?>
                                                        <a href="<?php echo e(asset('images/class/'.$class->image)); ?>" download="<?php echo e($class->image); ?>" title="Course"><i class="fas fa-image"></i>&nbsp;<?php echo e(__('frontstaticword.save')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($class->type =='pdf' && $class->pdf ): ?>
                                                        <a href="<?php echo e(route('downloadPdf',$class->id)); ?>" title="Course"><i class="fas fa-file-pdf"></i>&nbsp;<?php echo e(__('frontstaticword.save')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($class->type =='zip' && $class->zip ): ?>
                                                        <a href="<?php echo e(asset('files/zip/'.$class->zip)); ?>" download="<?php echo e($class->zip); ?>" title="Course"><i class="far fa-file-archive"></i>&nbsp;<?php echo e(__('frontstaticword.save')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($class->url): ?>
                                                            <?php if($class->type =='video'): ?>
                                                            <?php if($mytime >= $class->date_time): ?>
                                                            <a href="<?php echo e(route('watchcourseclass',$class->id)); ?>" title="Course" class="iframe"><i class="fa fa-play-circle"></i>&nbsp;<?php echo e(__('frontstaticword.class')); ?></a>
                                                            <?php else: ?>
                                                            <a href="" title="Course"><i class="fa fa-play-circle"></i>&nbsp;<?php echo e(__('frontstaticword.class')); ?></a>
                                                            <?php endif; ?>
                                                            <?php endif; ?>
                                                            <?php if($class->type =='image'): ?>
                                                            <a href="<?php echo e($class->url); ?>" title="Course"><i class="fas fa-image"></i>&nbsp;<?php echo e(__('frontstaticword.link')); ?></a>
                                                            <?php endif; ?>
                                                            <?php if($class->type =='pdf'): ?>
                                                            <a href="<?php echo e($class->url); ?>" title="Course"><i class="fas fa-file-pdf"></i>&nbsp;<?php echo e(__('frontstaticword.link')); ?></a>
                                                            <?php endif; ?>
                                                            <?php if($class->type =='zip'): ?>
                                                            <a href="<?php echo e($class->url); ?>" title="Course"><i class="far fa-file-archive">&nbsp;<?php echo e(__('frontstaticword.link')); ?></i></a>
                                                            <?php endif; ?>
                                                        <?php endif; ?> 
                                                    </td>

                                                    <td class="class-name">
                                                        <a href="#" title="Course"><?php echo e($class->title); ?></a>&nbsp;
                                                        <?php if($class->date_time != NULL): ?>
                                                           <div class="live-class">Live at: <?php echo e($class->date_time); ?></div>
                                                        <?php endif; ?>
                                                    </td>

                                                    <td class="class-size txt-rgt">
                                                        <?php if($class->type =='video'): ?>
                                                            <?php echo e($class->duration); ?> Min
                                                        <?php endif; ?>
                                                        <?php if($class->type =='image' || $class->type =='pdf' || $class->type =='zip' ): ?>
                                                            <?php echo e($class->size); ?> Mb
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="learning-contact-block">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-search-block btm-40">
                                    <div class="learning-contact-search">
                                        <?php if($coursequestions->isEmpty()): ?>
                                            <h4 class="question-text"><?php echo e(__('frontstaticword.No')); ?> <?php echo e(__('frontstaticword.RecentQuestions')); ?></h4>
                                        <?php else: ?>
                                            <h4 class="question-text">
                                            <?php
                                                $quess = App\Question::where('course_id', $course->id)->get();
                                                if(count($quess)>0){

                                                    echo count($quess);
                                                }
                                                else{

                                                    echo "0";
                                                }
                                            ?>
                                            <?php echo e(__('frontstaticword.questionsinthiscourse')); ?></h4>
                                        <?php endif; ?>
                                        
                                    </div>
                                    <div class="learning-contact-btn">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><?php echo e(__('frontstaticword.Askanewquestion')); ?>

                                        </button>

                                        <!--Model start-->
                                        <div id="myModal" class="modal fade" role="dialog">
                                          <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h4 class="modal-title"><?php echo e(__('frontstaticword.Askanewquestion')); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              </div>

                                              <div class="modal-body">
                                                
                                                <form id="demo-form2" method="post" action="<?php echo e(url('addquestion', $course->id)); ?>"
                                                    data-parsley-validate class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>

                                                            
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <input type="hidden" name="instructor_id" class="form-control" value="<?php echo e($course->user_id); ?>"  />
                                                        <input type="hidden" name="user_id"  value="<?php echo e(Auth::user()->id); ?>" />
                                                      </div>
                                                      <div class="col-md-6">
                                                        <input type="hidden" name="course_id"  value="<?php echo e($course->id); ?>" />
                                                        <input type="hidden" name="status"  value="1" />
                                                      </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                      <div class="col-md-12">
                                                        <label for="detail"><?php echo e(__('frontstaticword.Question')); ?>:<sup class="redstar">*</sup></label>
                                                        <textarea name="question" rows="4"  class="form-control" placeholder=""></textarea>
                                                      </div>
                                                    </div>
                                                    <br>
                                                    <div class="box-footer">
                                                     <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('frontstaticword.Submit')); ?></button>
                                                    </div>
                                                </form>
                                            </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('frontstaticword.Close')); ?></button>
                                              </div>
                                            </div>

                                          </div>
                                        </div>
                                        <!--Model end-->
                                    </div>
                                </div>
                                
                                <div id="accordion" class="second-accordion">
                                    <?php
                                        $questions = App\Question::where('course_id', $course->id)->get();
                                    ?>
                                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($ques->status == 1): ?>
                                    <div class="card btm-10">
                                        <div class="card-header" id="headingThree<?php echo e($ques->id); ?>">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree<?php echo e($ques->id); ?>" aria-expanded="true" aria-controls="collapseThree">
                                                    <div class="learning-questions-img rgt-10"><?php echo e($ques->user->fname); ?><?php echo e($ques->user->lname); ?>

                                                    </div>
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-6 col-8">
                                                            <div class="section">
                                                                <a href="#" title="questions"><?php echo e($ques->user->fname); ?> </a> 
                                                                <a href="#" title="questions"><?php echo e(date('jS F Y', strtotime($ques->created_at))); ?></a>
                                                                <div class="author-tag">
                                                                    <?php echo e($ques->user->role); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="col-lg-5 col-3">
                                                            <div class="section-dividation text-right">
                                                                <?php
                                                                    $answer = App\Answer::where('question_id', $ques->id)->get();
                                                                    if(count($answer)>0){

                                                                        echo count($answer);
                                                                    }
                                                                    else{

                                                                        echo "0";
                                                                    }
                                                                ?>
                                                                <?php echo e(__('frontstaticword.Answer')); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-1">
                                                            <div class="question-report txt-rgt">
                                                                 <a href="#" data-toggle="modal" data-target="#myModalquesReport<?php echo e($ques->id); ?>" title="response"><i class="fa fa-flag" aria-hidden="true"></i></a>
                                                            </div>
                                                            
                                                        </div>

                                                    </div>
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-8 col-8"> 
                                                            <div class="profile-heading"><?php echo e($ques->question); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-3"> 
                                                            <div class="profile-heading txt-rgt"><a href="#" data-toggle="modal" data-target="#myModalanswer<?php echo e($ques->id); ?>" title="response"><?php echo e(__('frontstaticword.AddAnswer')); ?></a>
                                                            </div>
                                                        </div>
                                                        

                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                        <!--Model start-->
                                        <div class="modal fade" id="myModalanswer<?php echo e($ques->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">

                                                  <h4 class="modal-title" id="myModalLabel"><?php echo e(__('frontstaticword.Answer')); ?></h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="box box-primary">
                                                  <div class="panel panel-sum">
                                                    <div class="modal-body">
                                                    
                                                    <form id="demo-form2" method="post" action="<?php echo e(url('addanswer', $ques->id)); ?>"
                                                        data-parsley-validate class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                        <input type="hidden" name="question_id"  value="<?php echo e($ques->id); ?>" />
                                                        <input type="hidden" name="instructor_id"  value="<?php echo e($course->user_id); ?>" />
                                                        <input type="hidden" name="ans_user_id"  value="<?php echo e(Auth::user()->id); ?>" />
                                                        <input type="hidden" name="ques_user_id"  value="<?php echo e($ques->user_id); ?>" />
                                                        <input type="hidden" name="course_id"  value="<?php echo e($ques->course_id); ?>" />
                                                        <input type="hidden" name="question_id"  value="<?php echo e($ques->id); ?>" />
                                                        <input type="hidden" name="status"  value="1" />       
                                                        
                                                        <div class="row">
                                                          <div class="col-md-12">
                                                            <?php echo e($ques->question); ?>

                                                            <br>
                                                            <br>
                                                          </div>
                                                          <div class="col-md-12">
                                                            <label for="detail"><?php echo e(__('frontstaticword.Answer')); ?>:<sup class="redstar">*</sup></label>
                                                            <textarea name="answer" rows="4"  class="form-control" placeholder=""></textarea>
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
                                        <!--Model close -->

                                        <!--Model start Question Report-->
                                                           
                                        <div class="modal fade" id="myModalquesReport<?php echo e($ques->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">

                                                  <h4 class="modal-title" id="myModalLabel"><?php echo e(__('frontstaticword.Report')); ?> Question</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="box box-primary">
                                                  <div class="panel panel-sum">
                                                    <div class="modal-body">
                                                    
                                                    <form id="demo-form2" method="post" action="<?php echo e(route('question.report', $ques->id)); ?>"
                                                        data-parsley-validate class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                        <input type="hidden" name="course_id"  value="<?php echo e($course->id); ?>" />

                                                        <input type="hidden" name="question_id"  value="<?php echo e($ques->id); ?>" />
                                                                
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
                                      
                                        <!--Model close -->

                                        
                                        <div id="collapseThree<?php echo e($ques->id); ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <?php
                                                $answers = App\Answer::where('question_id', $ques->id)->get();
                                            ?>
                                            <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($ans->status == 1): ?>
                                            <div class="card-body">
                                                <div class="answer-block">
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-1 col-2">
                                                            <div class="learning-questions-img-two"><?php echo e($ans->user->fname); ?><?php echo e($ans->user->lname); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-11 col-10">
                                                            
                                                            <div class="section">
                                                                <a href="#" title="questions"><?php echo e($ans->user->fname); ?></a> <a href="#" title="questions"><?php echo e(date('jS F Y', strtotime($ans->created_at))); ?></a>
                                                                <div class="author-tag">
                                                                    <?php echo e($ans->user->role); ?>

                                                                </div>
                                                            </div>
                                                            <br>

                                                            <div class="section-answer">
                                                                <a href="#" title="Course"><?php echo e($ans->answer); ?></a>
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-announcement" role="tabpanel" aria-labelledby="nav-announcement-tab">
                    <?php if($announsments->isEmpty()): ?>
                        <div class="learning-announcement-null text-center">
                            <div class="offset-lg-2 col-lg-8">
                                <h1><?php echo e(__('frontstaticword.Noannouncements')); ?></h1>
                                <p><?php echo e(__('frontstaticword.Noannouncementsdetail')); ?></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="learning-announcement text-center">
                            <div class="col-lg-12">
                                <div id="accordion" class="second-accordion">
                                    
                                    <?php $__currentLoopData = $announsments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announsment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($announsment->status == 1): ?>
                                    <div class="card btm-30">
                                        <div class="card-header" id="headingFive<?php echo e($announsment->id); ?>">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive<?php echo e($announsment->id); ?>" aria-expanded="true" aria-controls="collapseFive">
                                                    <div class="learning-questions-img rgt-20"><?php echo e($announsment->user->fname); ?><?php echo e($announsment->user->lname); ?>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-6">
                                                            <div class="section"><a href="#" title="questions"><?php echo e($announsment->user->fname); ?> <?php echo e($announsment->user->lname); ?></a> <a href="#" title="questions"><?php echo e(date('jS F Y', strtotime($announsment->created_at))); ?></a></div>
                                                        </div>
                                                        <div class="col-lg-6 col-6">
                                                            <div class="section-dividation text-right">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-8 col-6"> 
                                                            <div class="profile-heading">
                                                                <?php echo e(__('frontstaticword.Announcements')); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-6">
                                                        </div>

                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="collapseFive<?php echo e($announsment->id); ?>" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                            <div class="card-body">
                                                <p><?php echo e($announsment->announsment); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="nav-quiz" role="tabpanel" aria-labelledby="nav-quiz-tab">
                    <div class="container">
                        <div class="quiz-main-block">
                          <div class="row">
                            <?php 
                                $topics = App\QuizTopic::where('course_id', $course->id)->get();
                            ?>
                            <?php if(count($topics)>0 ): ?>
                              <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($topic->status == 1): ?>

                                <?php if(Auth::User()->role == 'instructor' || Auth::User()->role == 'user'): ?>
                                <?php 
                                    $order = App\Order::where('course_id', $course->id)->where('user_id', '=', Auth::user()->id)->first();

                                    $days = $topic->due_days;
                                    $orderDate = $order['created_at'];
                                    $startDate = date("Y-m-d", strtotime("$orderDate +$days days"));
                                ?>

                                <?php else: ?>

                                <?php 
                                    
                                    $startDate = '0';
                                ?>
                                <?php endif; ?>

                               
                               
                                <?php if($mytime >= $startDate): ?>
                              
                                <div class="col-md-6 col-lg-4">
                                  <div class="topic-block">
                                    <div class="card blue-grey darken-1">
                                      <div class="card-content dark-text">
                                        <span class="card-title"><?php echo e($topic->title); ?></span>
                                        <p title="<?php echo e($topic->description); ?>"><?php echo e(str_limit($topic->description, 120)); ?></p>
                                        <div class="row">
                                          <div class="col-lg-6 col-6">
                                            <ul class="topic-detail">
                                              <li><?php echo e(__('frontstaticword.PerQuestionMark')); ?><i class="fa fa-long-arrow-right"></i></li>
                                              <li><?php echo e(__('frontstaticword.TotalMarks')); ?><i class="fa fa-long-arrow-right"></i></li>
                                              <li><?php echo e(__('frontstaticword.TotalQuestions')); ?><i class="fa fa-long-arrow-right"></i></li>
                                              <li><?php echo e(__('frontstaticword.QuizPrice')); ?><i class="fa fa-long-arrow-right"></i></li>
                                            </ul>
                                          </div>
                                          <div class="col-lg-6 col-6">
                                            <ul class="topic-detail">
                                              <li><?php echo e($topic->per_q_mark); ?></li>
                                              <li>
                                                <?php
                                                    $qu_count = 0;
                                                    $quizz = App\Quiz::get();
                                                ?>
                                                <?php $__currentLoopData = $quizz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <?php if($quiz->topic_id == $topic->id): ?>
                                                    <?php 
                                                      $qu_count++;
                                                    ?>
                                                  <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($topic->per_q_mark*$qu_count); ?>

                                              </li>
                                              <li>
                                                <?php echo e($qu_count); ?>

                                              </li>
                                              
                                              <li>
                                                <?php echo e(__('frontstaticword.Free')); ?>

                                              </li>

                                            </ul>
                                          </div>
                                        </div>
                                      </div>


                                   <div class="card-action text-center">

                                      <?php
                                        $users =  App\QuizAnswer::where('topic_id',$topic->id)->where('user_id',Auth::user()->id)->first();
                                        $quiz_question =  App\Quiz::where('course_id',$course->id)->get();

                                      ?>
                                      <?php if(empty($users)): ?>
                                        <?php if($quiz_question != null || $quiz_question!= ''): ?>
                                         
                                            <a href="<?php echo e(route('start_quiz', ['id' => $topic->id])); ?>" class="btn btn-block" title="Start Quiz"> <?php echo e(__('frontstaticword.StartQuiz')); ?></a>
                                        
                                        <?php endif; ?>
                                      <?php else: ?>
                                         <a href="<?php echo e(route('start.quiz.show',$topic->id)); ?>" class="btn btn-block"><?php echo e(__('frontstaticword.ShowQuizReport')); ?> </a>
                                       
                                        <?php if($topic->quiz_again == '1'): ?>
                                         <a href="<?php echo e(route('tryagain',$topic->id)); ?>" class="btn btn-block"><?php echo e(__('frontstaticword.TryAgain')); ?> </a>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                        
                                      </div>
                                    
                                    </div>
                                  </div>
                                </div>

                                <?php endif; ?>

                               
                              <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                
                                <div class="learning-quiz-null text-center">
                                    <div class="col-lg-12">
                                        <h1><?php echo e(__('frontstaticword.Noquiz')); ?></h1>
                                        <p><?php echo e(__('frontstaticword.Noquizsdetail')); ?></p>
                                    </div>
                                </div> 
                            <?php endif; ?>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</section>
<!-- courses-content end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<!-- iframe script -->
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
    $(".iframe").colorbox({iframe:true, width:"100%", height:"100%"});
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
<!-- script to remain on active tab -->
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
<!-- link for another tab -->
<script>
(function($) {
  "use strict";
    $("#goTab4").click(function(){
        $("#nav-tab a:nth-child(4)").click();
        return false;
    });

    $("#goTab3").click(function(){
        $("#nav-tab a:nth-child(3)").click();
        return false;
    });
})(jQuery);    
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/front/course_content.blade.php ENDPATH**/ ?>