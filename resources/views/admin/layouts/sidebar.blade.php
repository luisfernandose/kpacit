<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::User()->user_img != null || Auth::User()->user_img !='')
          <img src="{{ asset('images/user_img/'.Auth::User()->user_img)}}" class="img-circle" alt="User Image">

          @else
          <img src="{{ asset('images/default/user.jpg') }}" class="img-circle" alt="User Image">

          @endif
        </div>
        <div class="pull-left info">
          <p>{{ Auth::User()->fname }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.Online') }}</a>
        </div>
      </div>

      @if(Auth::User()->role == "admin")
        <ul class="sidebar-menu" data-widget="tree">
        
          <li class="{{ Nav::isRoute('admin.index') }}"><a href="{{route('admin.index')}}"><i class="fa fa-tachometer" aria-hidden="true"></i><span>{{ __('adminstaticword.Dashboard') }}</span></a></li>
          
          <li class="{{ Nav::isRoute('user.index') }} {{ Nav::isRoute('user.add') }} {{ Nav::isRoute('user.edit') }}"><a href="{{route('user.index')}}"><i class="fa fa-user-o" aria-hidden="true"></i><span>{{ __('adminstaticword.User') }}</span></a></li>

          <li class="{{ Nav::isRoute('all.instructor') }} {{ Nav::isResource('requestinstructor') }} treeview">
           <a href="#">
             <i class="fa fa-user-plus" aria-hidden="true"></i> <span>{{ __('adminstaticword.Instructor') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isRoute('all.instructor') }}"><a href="{{route('all.instructor')}}">{{ __('adminstaticword.AllInstructor') }}</a></li>
              <li class="{{ Nav::isResource('requestinstructor') }}"><a href="{{url('requestinstructor')}}">{{ __('adminstaticword.InstructorRequest') }}</a></li>
            </ul>
          </li>

          <li class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }} treeview">
            <a href="#">
                <i class="fa fa-book"></i>{{ __('adminstaticword.Course') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a>                            
            <ul class="treeview-menu">
                <li class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }} {{ Nav::isResource('coursereview') }} treeview">
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i>{{ __('adminstaticword.Category') }}<i class="fa fa-angle-left pull-right"></i></a>                    
                    <ul class="treeview-menu">
                      <li class="{{ Nav::isResource('category') }}"><a href="{{url('category')}}">{{ __('adminstaticword.Category') }}</a></li>
                      <li class="{{ Nav::isResource('subcategory') }}"><a href="{{url('subcategory')}}">{{ __('adminstaticword.SubCategory') }}</a></li>
                      <li class="{{ Nav::isResource('childcategory') }}"><a href="{{url('childcategory')}}">{{ __('adminstaticword.ChildCategory') }}</a></li>
                    </ul>

                    <li class="{{ Nav::isResource('course') }}"><a href="{{url('course')}}"><i class="fa fa-book" aria-hidden="true"></i><span>{{ __('adminstaticword.Course') }}</span></a></li>

                    <li class="{{ Nav::isResource('courselang') }}"><a href="{{url('courselang')}}"><i class="fa fa-language" aria-hidden="true"></i><span>{{ __('adminstaticword.CourseLanguage') }}</span></a></li>

                    <li class="{{ Nav::isResource('coursereview') }}"><a href="{{url('coursereview')}}"><i class="fa fa-history" aria-hidden="true"></i><span>{{ __('adminstaticword.CourseReview') }}</span></a></li>
                </li>
            </ul>
          </li>

          <li class="{{ Nav::isResource('admin/country') }} {{ Nav::isResource('admin/state') }} {{ Nav::isResource('admin/city') }} treeview">
            <a href="#">
              <i class="fa fa-globe" aria-hidden="true"></i> <span>{{ __('adminstaticword.Location') }}</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('admin/country') }}"><a href="{{url('admin/country')}}">{{ __('adminstaticword.Country') }}</a></li>
              <li class="{{ Nav::isResource('admin/state') }}"><a href="{{url('admin/state')}}">{{ __('adminstaticword.State') }}</a></li>
              <li class="{{ Nav::isResource('admin/city') }}"><a href="{{url('admin/city')}}">{{ __('adminstaticword.City') }}</a></li>
            </ul>
          </li>

          <li class="{{ Nav::isResource('currency') }}"><a href="{{url('currency')}}"> <i class="fa fa-money"></i><span>{{ __('adminstaticword.Currency') }}</span></a></li>

          <li class="{{ Nav::isResource('coupon') }}"><a href="{{url('coupon')}}"><i class="fa fa-tags" aria-hidden="true"></i><span>{{ __('adminstaticword.Coupon') }}</span></a></li>
          

          <li class="{{ Nav::isResource('order') }}"><a href="{{url('order')}}"><i class="fa  fa-history" aria-hidden="true"></i><span>{{ __('adminstaticword.Order') }}</span></a></li>
    
          <li class="{{ Nav::isResource('page') }}"><a href="{{url('page')}}"><i class="fa fa-columns" aria-hidden="true"></i><span>{{ __('adminstaticword.Pages') }}</span></a></li>

          <li class="{{ Nav::isResource('faq') }} {{ Nav::isResource('faqinstructor') }}  treeview">
           <a href="#">
             <i class="fa fa-question-circle" aria-hidden="true"></i> <span>{{ __('adminstaticword.Faq') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('faq') }}"><a href="{{url('faq')}}">{{ __('adminstaticword.FaqStudent') }}</a></li>
              <li class="{{ Nav::isResource('faqinstructor') }}"><a href="{{url('faqinstructor')}}">{{ __('adminstaticword.FaqInstructor') }}</a></li>
            </ul>
          </li>

          <li class="{{ Nav::isRoute('instructor.settings') }} {{ Nav::isRoute('admin.instructor') }} {{ Nav::isRoute('admin.completed') }}  treeview">
           <a href="#">
             <i class="fa fa-money" aria-hidden="true"></i> <span>{{ __('adminstaticword.InstructorPayout') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isRoute('instructor.settings') }}"><a href="{{route('instructor.settings')}}">{{ __('adminstaticword.PayoutSettings') }}</a></li>
              <li class="{{ Nav::isRoute('admin.instructor') }}"><a href="{{route('admin.instructor')}}">{{ __('adminstaticword.PendingPayout') }}</a></li>

              <li class="{{ Nav::isRoute('admin.completed') }}"><a href="{{route('admin.completed')}}">{{ __('adminstaticword.CompletedPayout') }}</a></li>
            
            </ul>
          </li>

          <li class="{{ Nav::isResource('user/course/report') }}  treeview">
           <a href="#">
             <i class="fa fa-flag" aria-hidden="true"></i> <span>{{ __('adminstaticword.Report') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('user/course/report') }}"><a href="{{url('user/course/report')}}"><span>{{ __('adminstaticword.Report') }} Course</span></a></li>
              <li class="{{ Nav::isResource('user/question/report') }}"><a href="{{url('user/question/report')}}"><span>{{ __('adminstaticword.Report') }} Question</span></a></li>
            </ul>
          </li>

          <li class="{{ Nav::isResource('slider') }} {{ Nav::isResource('facts') }} {{ Nav::isRoute('category.slider') }} {{ Nav::isResource('coursetext') }} {{ Nav::isResource('getstarted') }} {{ Nav::isResource('trusted') }} {{ Nav::isRoute('widget.setting') }} {{ Nav::isRoute('terms') }} {{ Nav::isResource('testimonial') }} treeview">
           <a href="#">
             <i class="fa fa-sliders" aria-hidden="true"></i> <span>{{ __('adminstaticword.FrontSetting') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('slider') }}"><a href="{{url('slider')}}"><span>{{ __('adminstaticword.Slider') }}</span></a></li>
              <li class="{{ Nav::isResource('facts') }}"><a href="{{url('facts')}}"><span>{{ __('adminstaticword.FactsSlider') }}</span></a></li>
              <li class="{{ Nav::isRoute('category.slider') }}"><a href="{{route('category.slider')}}"><span>{{ __('adminstaticword.CategorySlider') }}</span></a></li>
              <li class="{{ Nav::isResource('coursetext') }}"><a href="{{url('coursetext')}}"> {{ __('adminstaticword.CourseText') }}</a></li>
              <li class="{{ Nav::isResource('getstarted') }}"><a href="{{url('getstarted')}}">{{ __('adminstaticword.GetStarted') }}</a></li>
              <li class="{{ Nav::isResource('trusted') }}"><a href="{{url('trusted')}}"><span>{{ __('adminstaticword.TrustedSlider') }}</span></a></li>
              <li class="{{ Nav::isRoute('widget.setting') }}"><a href="{{route('widget.setting')}}">{{ __('adminstaticword.WidgetSetting') }}</a></li>
              <li class="{{ Nav::isResource('testimonial') }}"><a href="{{url('testimonial')}}">{{ __('adminstaticword.Testimonial') }}</a></li>
            </ul>
          </li>
          
          <li class="{{ Nav::isRoute('gen.set') }} {{ Nav::isRoute('api.setApiView') }} {{ Nav::isResource('blog') }} {{ Nav::isRoute('about.page') }} {{ Nav::isRoute('careers.page') }} {{ Nav::isRoute('comingsoon.page') }} {{ Nav::isRoute('termscondition') }} {{ Nav::isRoute('policy') }} {{ Nav::isRoute('bank.transfer') }} {{ Nav::isRoute('show.pwa') }} treeview">
           <a href="#">
             <i class="fa fa-cogs" aria-hidden="true"></i> <span>{{ __('adminstaticword.SiteSetting') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isRoute('gen.set') }}"><a href="{{route('gen.set')}}"><span>{{ __('adminstaticword.Setting') }}</span></a></li>
              <li class="{{ Nav::isRoute('api.setApiView') }}"><a href="{{route('api.setApiView')}}">{{ __('adminstaticword.APISetting') }}</a></li>
              
              <li class="{{ Nav::isResource('blog') }}"><a href="{{url('blog')}}">{{ __('adminstaticword.Blog') }}</a></li>
              <li class="{{ Nav::isRoute('about.page') }}"><a href="{{route('about.page')}}">{{ __('adminstaticword.About') }}</a></li>
              <li class="{{ Nav::isRoute('comingsoon.page') }}"><a href="{{route('comingsoon.page')}}">{{ __('adminstaticword.ComingSoon') }}</a></li>
              <li class="{{ Nav::isRoute('termscondition') }}"><a href="{{route('termscondition')}}">{{ __('adminstaticword.Terms&Condition') }} </a></li>
              <li class="{{ Nav::isRoute('policy') }}"><a href="{{route('policy')}}"> {{ __('adminstaticword.PrivacyPolicy') }}</a></li>

              @if(isset($zoom_enable) && $zoom_enable == 1)
              <li class="{{ Nav::isRoute('meeting.create') }} {{ Nav::isRoute('zoom.show') }} {{ Nav::isRoute('zoom.edit') }} {{ Nav::isRoute('zoom.setting') }} {{ Nav::isRoute('zoom.index') }}  treeview">
                <a href="#">
                 <i class="fa fa-grav" aria-hidden="true"></i> <span>{{ __('Zoom Live Meetings') }}</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="{{ Nav::isRoute('zoom.setting') }}"><a href="{{route('zoom.setting')}}">{{ __('Zoom Settings') }}</a></li>
                  <li class="{{ Nav::isRoute('zoom.index') }} {{ Nav::isRoute('zoom.show') }} {{ Nav::isRoute('zoom.edit') }} {{ Nav::isRoute('meeting.create') }}"><a href="{{route('zoom.index')}}">{{ __('Zoom Dashboard') }}</a></li>
                  <li class="{{ Nav::isRoute('meeting.show') }}"><a href="{{route('meeting.show')}}">{{ __('adminstaticword.AllMeetings') }}</a></li>
                </ul>
              </li>
           @endif
            </ul>
          </li>

<!--           <li class="{{ Nav::isRoute('player.set') }} {{ Nav::isResource('ads') }} {{ Nav::isResource('ad.setting') }} treeview">
           <a href="#">
             <i class="fa fa-cogs" aria-hidden="true"></i> <span>{{ __('adminstaticword.PlayerSettings') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{ Nav::isRoute('player.set') }}"><a href="{{route('player.set')}}"> {{ __('adminstaticword.PlayerCustomization') }}</a></li>

              <li class="{{ Nav::isResource('ads') }}"><a href="{{url('admin/ads')}}" title="Create ad">{{ __('adminstaticword.Advertise') }}</a></li>
              @php $ads = App\Ads::all(); @endphp
              @if($ads->count()>0)
              <li class="{{ Nav::isResource('ad.setting') }}"><a href="{{url('admin/ads/setting')}}" title="Ad Settings">{{ __('adminstaticword.AdvertiseSettings') }}</a></li>
              @endif

            </ul>
          </li> -->

          <li class="{{ Nav::isRoute('show.lang') }}"><a href="{{route('show.lang')}}"><i class="fa fa-language" aria-hidden="true"></i><span>{{ __('adminstaticword.Language') }}</span></a></li>

          <li class="{{ Nav::isResource('usermessage') }}"><a href="{{url('usermessage')}}"><i class="fa fa-phone" aria-hidden="true"></i><span>{{ __('adminstaticword.ContactUs') }}</span></a></li>
          

        </ul>
      @endif


    </section>
    <!-- /.sidebar -->
</aside>