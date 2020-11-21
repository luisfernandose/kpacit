<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
          <img src="<?php echo e(asset('images/user_img/'.Auth::User()->user_img)); ?>" class="img-circle" alt="User Image">

          <?php else: ?>
          <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-circle" alt="User Image">

          <?php endif; ?>
        </div>
        <div class="pull-left info">
          <p><?php echo e(Auth::User()->fname); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(__('adminstaticword.Online')); ?></a>
        </div>
      </div>

      <?php if(Auth::User()->role == "admin"): ?>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header"><?php echo e(__('adminstaticword.Navigation')); ?></li>
        
          <li class="<?php echo e(Nav::isRoute('admin.index')); ?>"><a href="<?php echo e(route('admin.index')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Dashboard')); ?></span></a></li>

          <li class="<?php echo e(Nav::isRoute('user.index')); ?> <?php echo e(Nav::isRoute('user.add')); ?> <?php echo e(Nav::isRoute('user.edit')); ?>"><a href="<?php echo e(route('user.index')); ?>"><i class="fa fa-user-o" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.User')); ?></span></a></li>

          <?php if(isset($zoom_enable) && $zoom_enable == 1): ?>
          <li class="<?php echo e(Nav::isRoute('meeting.create')); ?> <?php echo e(Nav::isRoute('zoom.show')); ?> <?php echo e(Nav::isRoute('zoom.edit')); ?> <?php echo e(Nav::isRoute('zoom.setting')); ?> <?php echo e(Nav::isRoute('zoom.index')); ?>  treeview">
            <a href="#">
             <i class="fa fa-grav" aria-hidden="true"></i> <span><?php echo e(__('Zoom Live Meetings')); ?></span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('zoom.setting')); ?>"><a href="<?php echo e(route('zoom.setting')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('Zoom Settings')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('zoom.index')); ?> <?php echo e(Nav::isRoute('zoom.show')); ?> <?php echo e(Nav::isRoute('zoom.edit')); ?> <?php echo e(Nav::isRoute('meeting.create')); ?>"><a href="<?php echo e(route('zoom.index')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('Zoom Dashboard')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('meeting.show')); ?>"><a href="<?php echo e(route('meeting.show')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.AllMeetings')); ?></a></li>
            </ul>
          </li>
       <?php endif; ?>

          <li class="<?php echo e(Nav::isResource('admin/country')); ?> <?php echo e(Nav::isResource('admin/state')); ?> <?php echo e(Nav::isResource('admin/city')); ?> treeview">
            <a href="#">
              <i class="fa fa-globe" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Location')); ?></span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('admin/country')); ?>"><a href="<?php echo e(url('admin/country')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.Country')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('admin/state')); ?>"><a href="<?php echo e(url('admin/state')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.State')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('admin/city')); ?>"><a href="<?php echo e(url('admin/city')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.City')); ?></a></li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('currency')); ?>"><a href="<?php echo e(url('currency')); ?>"> <i class="fa fa-money"></i><span><?php echo e(__('adminstaticword.Currency')); ?></span></a></li>

          <li class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?> <?php echo e(Nav::isResource('course')); ?> <?php echo e(Nav::isResource('courselang')); ?> treeview">
            <a href="#">
                <i class="fa fa-book"></i><?php echo e(__('adminstaticword.Course')); ?>

                <i class="fa fa-angle-left pull-right"></i>
            </a>                            

            <ul class="treeview-menu">
                <li class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?> <?php echo e(Nav::isResource('course')); ?> <?php echo e(Nav::isResource('courselang')); ?> <?php echo e(Nav::isResource('coursereview')); ?> treeview">
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i><?php echo e(__('adminstaticword.Category')); ?><i class="fa fa-angle-left pull-right"></i></a>
                    
                    <ul class="treeview-menu">
                      <li class="<?php echo e(Nav::isResource('category')); ?>"><a href="<?php echo e(url('category')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.Category')); ?></a></li>
                      <li class="<?php echo e(Nav::isResource('subcategory')); ?>"><a href="<?php echo e(url('subcategory')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.SubCategory')); ?></a></li>
                      <li class="<?php echo e(Nav::isResource('childcategory')); ?>"><a href="<?php echo e(url('childcategory')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.ChildCategory')); ?></a></li>
                    </ul>

                    <li class="<?php echo e(Nav::isResource('course')); ?>"><a href="<?php echo e(url('course')); ?>"><i class="fa fa-book" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Course')); ?></span></a></li>

                    <li class="<?php echo e(Nav::isResource('courselang')); ?>"><a href="<?php echo e(url('courselang')); ?>"><i class="fa fa-language" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.CourseLanguage')); ?></span></a></li>

                    <li class="<?php echo e(Nav::isResource('coursereview')); ?>"><a href="<?php echo e(url('coursereview')); ?>"><i class="fa fa-history" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.CourseReview')); ?></span></a></li>
                </li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('coupon')); ?>"><a href="<?php echo e(url('coupon')); ?>"><i class="fa fa-tags" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Coupon')); ?></span></a></li>

          <li class="<?php echo e(Nav::isRoute('all.instructor')); ?> <?php echo e(Nav::isResource('requestinstructor')); ?> treeview">
           <a href="#">
             <i class="fa fa-user-plus" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Instructor')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('all.instructor')); ?>"><a href="<?php echo e(route('all.instructor')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.AllInstructor')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('requestinstructor')); ?>"><a href="<?php echo e(url('requestinstructor')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.InstructorRequest')); ?></a></li>
            </ul>
          </li>
          

          <li class="<?php echo e(Nav::isResource('order')); ?>"><a href="<?php echo e(url('order')); ?>"><i class="fa  fa-history" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Order')); ?></span></a></li>
    
          <li class="<?php echo e(Nav::isResource('page')); ?>"><a href="<?php echo e(url('page')); ?>"><i class="fa fa-columns" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Pages')); ?></span></a></li>

          <li class="<?php echo e(Nav::isResource('faq')); ?> <?php echo e(Nav::isResource('faqinstructor')); ?>  treeview">
           <a href="#">
             <i class="fa fa-question-circle" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Faq')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('faq')); ?>"><a href="<?php echo e(url('faq')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.FaqStudent')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('faqinstructor')); ?>"><a href="<?php echo e(url('faqinstructor')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.FaqInstructor')); ?></a></li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isRoute('instructor.settings')); ?> <?php echo e(Nav::isRoute('admin.instructor')); ?> <?php echo e(Nav::isRoute('admin.completed')); ?>  treeview">
           <a href="#">
             <i class="fa fa-money" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.InstructorPayout')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('instructor.settings')); ?>"><a href="<?php echo e(route('instructor.settings')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.PayoutSettings')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('admin.instructor')); ?>"><a href="<?php echo e(route('admin.instructor')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.PendingPayout')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('admin.completed')); ?>"><a href="<?php echo e(route('admin.completed')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.CompletedPayout')); ?></a></li>
            
            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('user/course/report')); ?>  treeview">
           <a href="#">
             <i class="fa fa-flag" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Report')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('user/course/report')); ?>"><a href="<?php echo e(url('user/course/report')); ?>"><i class="fa fa-circle-o"></i><span><?php echo e(__('adminstaticword.Report')); ?> Course</span></a></li>
              <li class="<?php echo e(Nav::isResource('user/question/report')); ?>"><a href="<?php echo e(url('user/question/report')); ?>"><i class="fa fa-circle-o"></i><span><?php echo e(__('adminstaticword.Report')); ?> Question</span></a></li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('slider')); ?> <?php echo e(Nav::isResource('facts')); ?> <?php echo e(Nav::isRoute('category.slider')); ?> <?php echo e(Nav::isResource('coursetext')); ?> <?php echo e(Nav::isResource('getstarted')); ?> <?php echo e(Nav::isResource('trusted')); ?> <?php echo e(Nav::isRoute('widget.setting')); ?> <?php echo e(Nav::isRoute('terms')); ?> <?php echo e(Nav::isResource('testimonial')); ?> treeview">
           <a href="#">
             <i class="fa fa-sliders" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.FrontSetting')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('slider')); ?>"><a href="<?php echo e(url('slider')); ?>"><i class="fa fa-circle-o"></i><span><?php echo e(__('adminstaticword.Slider')); ?></span></a></li>
              <li class="<?php echo e(Nav::isResource('facts')); ?>"><a href="<?php echo e(url('facts')); ?>"><i class="fa fa-circle-o"></i><span><?php echo e(__('adminstaticword.FactsSlider')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('category.slider')); ?>"><a href="<?php echo e(route('category.slider')); ?>"><i class="fa fa-circle-o"></i><span><?php echo e(__('adminstaticword.CategorySlider')); ?></span></a></li>
              <li class="<?php echo e(Nav::isResource('coursetext')); ?>"><a href="<?php echo e(url('coursetext')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('adminstaticword.CourseText')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('getstarted')); ?>"><a href="<?php echo e(url('getstarted')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.GetStarted')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('trusted')); ?>"><a href="<?php echo e(url('trusted')); ?>"><i class="fa fa-circle-o"></i><span><?php echo e(__('adminstaticword.TrustedSlider')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('widget.setting')); ?>"><a href="<?php echo e(route('widget.setting')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.WidgetSetting')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('testimonial')); ?>"><a href="<?php echo e(url('testimonial')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.Testimonial')); ?></a></li>
            </ul>
          </li>
          
          <li class="<?php echo e(Nav::isRoute('gen.set')); ?> <?php echo e(Nav::isRoute('api.setApiView')); ?> <?php echo e(Nav::isResource('blog')); ?> <?php echo e(Nav::isRoute('about.page')); ?> <?php echo e(Nav::isRoute('careers.page')); ?> <?php echo e(Nav::isRoute('comingsoon.page')); ?> <?php echo e(Nav::isRoute('termscondition')); ?> <?php echo e(Nav::isRoute('policy')); ?> <?php echo e(Nav::isRoute('bank.transfer')); ?> <?php echo e(Nav::isRoute('show.pwa')); ?> treeview">
           <a href="#">
             <i class="fa fa-cogs" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.SiteSetting')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('gen.set')); ?>"><a href="<?php echo e(route('gen.set')); ?>"><i class="fa fa-circle-o"></i><span><?php echo e(__('adminstaticword.Setting')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('api.setApiView')); ?>"><a href="<?php echo e(route('api.setApiView')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.APISetting')); ?></a></li>
              
              <li class="<?php echo e(Nav::isResource('blog')); ?>"><a href="<?php echo e(url('blog')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.Blog')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('about.page')); ?>"><a href="<?php echo e(route('about.page')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.About')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('careers.page')); ?>"><a href="<?php echo e(route('careers.page')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.Career')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('comingsoon.page')); ?>"><a href="<?php echo e(route('comingsoon.page')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.ComingSoon')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('termscondition')); ?>"><a href="<?php echo e(route('termscondition')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.Terms&Condition')); ?> </a></li>
              <li class="<?php echo e(Nav::isRoute('policy')); ?>"><a href="<?php echo e(route('policy')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('adminstaticword.PrivacyPolicy')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('bank.transfer')); ?>"><a href="<?php echo e(route('bank.transfer')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('adminstaticword.BankDetails')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('show.pwa')); ?>"><a href="<?php echo e(route('show.pwa')); ?>"><i class="fa fa-circle-o" aria-hidden="true"></i><span>PWA Setting</span></a></li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isRoute('player.set')); ?> <?php echo e(Nav::isResource('ads')); ?> <?php echo e(Nav::isResource('ad.setting')); ?> treeview">
           <a href="#">
             <i class="fa fa-cogs" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.PlayerSettings')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="<?php echo e(Nav::isRoute('player.set')); ?>"><a href="<?php echo e(route('player.set')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('adminstaticword.PlayerCustomization')); ?></a></li>

              <li class="<?php echo e(Nav::isResource('ads')); ?>"><a href="<?php echo e(url('admin/ads')); ?>" title="Create ad"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.Advertise')); ?></a></li>
              <?php $ads = App\Ads::all(); ?>
              <?php if($ads->count()>0): ?>
              <li class="<?php echo e(Nav::isResource('ad.setting')); ?>"><a href="<?php echo e(url('admin/ads/setting')); ?>" title="Ad Settings"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.AdvertiseSettings')); ?></a></li>
              <?php endif; ?>

            </ul>
          </li>

          <li class="<?php echo e(Nav::isRoute('show.lang')); ?>"><a href="<?php echo e(route('show.lang')); ?>"><i class="fa fa-language" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Language')); ?></span></a></li>

          <li class="<?php echo e(Nav::isResource('usermessage')); ?>"><a href="<?php echo e(url('usermessage')); ?>"><i class="fa fa-phone" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.ContactUs')); ?></span></a></li>
          

        </ul>
      <?php endif; ?>


    </section>
    <!-- /.sidebar -->
</aside><?php /**PATH /var/www/html/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>