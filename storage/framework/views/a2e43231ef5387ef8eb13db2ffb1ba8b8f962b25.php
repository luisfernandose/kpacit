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
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(__('adminstaticword.Instructor')); ?></a>
        </div>
      </div>
 

      <?php if(Auth::User()->role == "instructor"): ?>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header"><?php echo e(__('adminstaticword.Navigation')); ?> </li>

          <li class="<?php echo e(Nav::isRoute('instructor.index')); ?>"><a href="<?php echo e(route('instructor.index')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Dashboard')); ?></span></a></li>
          
          <li class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?> <?php echo e(Nav::isResource('course')); ?> <?php echo e(Nav::isResource('courselang')); ?> treeview">
            <a href="#">
                <i class="fa fa-folder"></i><?php echo e(__('adminstaticword.Course')); ?>

                <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?> <?php echo e(Nav::isResource('course')); ?> <?php echo e(Nav::isResource('courselang')); ?> treeview">
                 
                  <?php if($gsetting->cat_enable == 1): ?>
                  <a href="#"><i class="fa fa-star" aria-hidden="true"></i><?php echo e(__('adminstaticword.Category')); ?><i class="fa fa-angle-left pull-right"></i></a>
                  
                  <ul class="treeview-menu">
                    <li class="<?php echo e(Nav::isResource('category')); ?>"><a href="<?php echo e(url('category')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.Category')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('subcategory')); ?>"><a href="<?php echo e(url('subcategory')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.SubCategory')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('childcategory')); ?>"><a href="<?php echo e(url('childcategory')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.ChildCategory')); ?></a></li>
                  </ul>
                  <?php endif; ?>                           

                
                  <li class="<?php echo e(Nav::isResource('course')); ?>"><a href="<?php echo e(url('course')); ?>"><i class="fa fa-book" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Course')); ?></span></a></li>
                   <!-- <li class="<?php echo e(Nav::isResource('courselang')); ?>"><a href="<?php echo e(url('courselang')); ?>"> <i class="fa fa-language" aria-hidden="true"></i></i><span> <?php echo e(__('adminstaticword.Course')); ?> <?php echo e(__('adminstaticword.Language')); ?></span></a></li> -->
                  
                </li>
              </ul>
          </li>



          <li class="<?php echo e(Nav::isResource('userenroll')); ?>"><a href="<?php echo e(url('userenroll')); ?>"><i class="fa fa-user" aria-hidden="true"></i><span> <?php echo e(__('adminstaticword.User')); ?> <?php echo e(__('adminstaticword.Enrolled')); ?></span></a></li>


          <li class="<?php echo e(Nav::isResource('instructorquestion')); ?> <?php echo e(Nav::isResource('instructoranswer')); ?> treeview">
            <a href="#">
                <i class="fa fa-question"></i> <?php echo e(__('adminstaticword.Question')); ?> / <?php echo e(__('adminstaticword.Answer')); ?>

                <i class="fa fa-angle-left pull-right"></i>
            </a>                            

            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('instructorquestion')); ?>"><a href="<?php echo e(url('instructorquestion')); ?>"><i class="fa fa-circle-o" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Question')); ?></span></a></li>

              <li class="<?php echo e(Nav::isResource('instructoranswer')); ?>"><a href="<?php echo e(url('instructoranswer')); ?>"><i class="fa fa-circle-o" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Answer')); ?></span></a></li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('instructor/announcement')); ?>"><a href="<?php echo e(url('instructor/announcement')); ?>"><i class="fa fa-compass" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Announcement')); ?></span></a></li>

          <li class="<?php echo e(Nav::isResource('blog')); ?>"><a href="<?php echo e(url('blog')); ?>"><i class="fa fa-cube"></i><?php echo e(__('adminstaticword.Blog')); ?></a></li>
          
          <?php if(isset($gsetting->feature_amount)): ?>
          <li class="<?php echo e(Nav::isResource('featurecourse')); ?>"><a href="<?php echo e(url('featurecourse')); ?>"><i class="fa fa-book" aria-hidden="true"></i><span> <?php echo e(__('adminstaticword.Feature')); ?> <?php echo e(__('adminstaticword.Course')); ?></span></a></li>
          <?php endif; ?>

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
            </ul>
          </li>
       <?php endif; ?>


          <li class="<?php echo e(Nav::isResource('pending.payout')); ?> <?php echo e(Nav::isRoute('admin.completed')); ?> treeview">
            <a href="#">
                <i class="fa fa-question"></i> <?php echo e(__('adminstaticword.MyRevenue')); ?>

                <i class="fa fa-angle-left pull-right"></i>
            </a>                            

            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('pending.payout')); ?>"><a href="<?php echo e(route('pending.payout')); ?>"><i class="fa fa-circle-o" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.PendingPayout')); ?></span></a></li>

              <li class="<?php echo e(Nav::isRoute('admin.completed')); ?>"><a href="<?php echo e(route('admin.completed')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('adminstaticword.CompletedPayout')); ?></a></li>

            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('instructor.pay')); ?>"><a href="<?php echo e(route('instructor.pay')); ?>"><i class="fa fa-cogs" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.PayoutSettings')); ?></span></a></li>
          
          

          <li class="<?php echo e(Nav::isResource('usermessage')); ?>"><a href="<?php echo e(url('usermessage')); ?>"><i class="fa fa-phone" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.ContactUs')); ?></span></a></li>
          

        <ul>
      <?php endif; ?>


    </section>
    <!-- /.sidebar -->
</aside><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/instructor/layouts/sidebar.blade.php ENDPATH**/ ?>