<footer id="footer" class="footer-main-block">
    <div class="container">
        <div class="footer-block">
            <div class="row">
                <?php
                    $widgets = App\WidgetSetting::first();
                ?>
                <?php if(isset($widgets)): ?>

                <div class="col-lg-3 col-md-6">
                    <div class="widget"><b><?php echo e($widgets->widget_one); ?></b></div>
                    <div class="footer-link">
                        <ul>
                            <?php if($gsetting->instructor_enable == 1): ?>
                                <?php if(Auth::check()): ?>
                                    <?php if(Auth::User()->role == "user"): ?>
                                    <li><a href="#" data-toggle="modal" data-target="#myModalinstructor" title="Become An Instructor"><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?></a></li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <li><a href="<?php echo e(route('login')); ?>" title="Become an instructor"><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?></a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <li><a href="<?php echo e(route('about.show')); ?>" title="About"><?php echo e(__('frontstaticword.Aboutus')); ?></a></li>
                            <?php if(Auth::check()): ?>
                                <li><a href="<?php echo e(url('user_contact')); ?>" title="About"><?php echo e(__('frontstaticword.Contactus')); ?></a></li>
                            <?php else: ?>
                                <li><a href="<?php echo e(route('login')); ?>" title="Contact Us"><?php echo e(__('frontstaticword.Contactus')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget"><b><?php echo e($widgets->widget_two); ?></b></div>
                    <div class="footer-link">
                        <ul>
                            <li><a href="<?php echo e(route('careers.show')); ?>" title="Careers"><?php echo e(__('frontstaticword.Careers')); ?></a></li>
                            <li><a href="<?php echo e(route('blog.all')); ?>" title="Blog"><?php echo e(__('frontstaticword.Blog')); ?></a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget"><b><?php echo e($widgets->widget_three); ?></b></div>
                    <div class="footer-link">
                        <ul>
                            <li><a href="<?php echo e(route('help.show')); ?>" title="Help"><?php echo e(__('frontstaticword.Help&Support')); ?></a></li>
                            <?php
                                $pages = App\Page::get();
                            ?>
                            
                            <?php if(isset($pages)): ?>
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('page.show', $page->slug)); ?>" title="Help"><?php echo e($page->title); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <?php
                        $languages = App\Language::all(); 
                    ?>
                    <?php if(isset($languages) && count($languages) > 0): ?>
                    <div class="footer-dropdown txt-rgt">
                        <a href="#" class="a" data-toggle="dropdown"><i class="fa fa-globe rgt-15"></i><?php echo e(Session::has('changed_language') ? ucfirst(Session::get('changed_language')) : ''); ?><i class="fa fa-angle-up lft-10"></i></a>

                        
                       
                        <ul class="dropdown-menu">
                          
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('languageSwitch', $language->local)); ?>"><li><?php echo e($language->name); ?></li></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="footer-local-page">
            <ul>
                <?php
                    $languages = App\Language::all(); 
                ?>
                <?php if(isset($languages) && count($languages) > 0): ?>
                    <li class="active"><a href="#"><b><?php echo e(__('frontstaticword.LocalHomePages')); ?>:</b></a></li>
                
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route('languageSwitch', $language->local)); ?>"><?php echo e($language->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul> 
        </div>
    </div>
    <hr>
    <div class="tiny-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo-footer">
                        <ul>
                            <?php
                                $logo = App\Setting::first();
                            ?>
                            <li>
                                <?php if($logo->logo_type == 'L'): ?>
                                    <a href="<?php echo e(url('/')); ?>" title="logo"><img src="<?php echo e(asset('images/logo/'.$logo->logo)); ?>" alt="logo" class="img-fluid" ></a>
                                <?php else: ?>
                                    <a href="<?php echo e(url('/')); ?>"><b><?php echo e($logo->project_title); ?></b></a>
                                <?php endif; ?>
                            </li>

                            <li><?php echo e($cpy_txt); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="copyright-social">
                        <ul>
                            <li><a href="<?php echo e(url('terms_condition')); ?>" title="Terms"><?php echo e(__('frontstaticword.Terms&Condition')); ?></a></li> 
                            <li><a href="<?php echo e(url('privacy_policy')); ?>" title="Policy"><?php echo e(__('frontstaticword.PrivacyPolicy')); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php echo $__env->make('instructormodel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/theme/footer.blade.php ENDPATH**/ ?>