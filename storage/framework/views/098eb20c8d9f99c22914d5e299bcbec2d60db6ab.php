<!DOCTYPE html>

<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku'); //make a list of rtl languages
?>

<html class="no-js" lang="en" <?php if(in_array($language,$rtl)): ?> dir="rtl" <?php endif; ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e($project_title); ?></title>
  <!-- Tell the browser to be 
   to screen width -->

  <?php
    $meta = App\Setting::all();
  ?>

  <?php $__currentLoopData = $meta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $met): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <meta name="description" content="<?php echo e($met->meta_data_des); ?>">
    <meta name="keywords" content="<?php echo e($met->meta_data_key); ?>">
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($met->google_ana); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '<?php echo e($met->google_ana); ?>');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '<?php echo e($met->fb_pixel); ?>');
      fbq('track', 'PageView');
    </script>

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
    <noscript>
      <img style="display:none" src="https://www.facebook.com/tr?id=<?php echo e($met->fb_pixel); ?>&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>"> <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(url('css/datepicker.css')); ?>">
  <link rel="icon" type="image/icon" href="<?php echo e(asset('images/favicon/'.$gsetting->favicon)); ?>"> <!-- favicon-icon -->
  <link rel="stylesheet" href="<?php echo e(url('admin/css/select2.min.css')); ?>"> <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('css/fontawesome-iconpicker.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('admin/css/jquery-ui.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/Ionicons/css/ionicons.min.css')); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>"> <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
  <?php
  $language = Session::get('changed_language'); //or 'english' //set the system language
  $rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku'); //make a list of rtl languages
  ?>
  <?php if(in_array($language,$rtl)): ?>
  <link rel="stylesheet" href="<?php echo e(url('admin/dist/css/AdminLTE-rtl.min.css')); ?>">  <!-- adminLTE RTL  style -->
  <?php else: ?>
  <link rel="stylesheet" href="<?php echo e(url('admin/dist/css/AdminLTE.min.css')); ?>">
  <?php endif; ?>
  
  <link rel="stylesheet" href="<?php echo e(url('css/toggle.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/component.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/normalize.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(URL::asset('admin/plugins/pace/pace.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('admin/dist/css/skins/_all-skins.min.css')); ?>">
  <link href="<?php echo e(url('admin/css/bootstrap-toggle.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('css/animate.min.css')); ?>"><!-- Custom Css -->
  <?php if(in_array($language,$rtl)): ?>
  <link rel="stylesheet" href="<?php echo e(url('admin/css/admin-rtl.css')); ?>">
  <?php else: ?>
  <link rel="stylesheet" href="<?php echo e(url('admin/css/admin.css')); ?>">
  <?php endif; ?>
  <link rel="stylesheet" href="<?php echo e(asset('css/custom-style.css')); ?>"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <?php echo $__env->yieldContent('stylesheets'); ?>
  
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo e(url('/')); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <img title="<?php echo e($project_title); ?>" width="20px" src="<?php echo e(url('images/favicon/'.$gsetting->favicon)); ?>" alt=""/>
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"> <img title="<?php echo e($project_title); ?>" width="100px" src="<?php echo e(url('images/logo/'.$gsetting->logo)); ?>" alt=""/></span>
    </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <?php
                $languages = App\Language::all(); 
            ?>
            <li class="dropdown admin-nav language">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-globe"></i> <?php echo e(Session::has('changed_language') ? Session::get('changed_language') : ''); ?></button>

              <ul class="dropdown-menu animated flipInX">
                <?php if(isset($languages) && count($languages) > 0): ?>
                  <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route('languageSwitch', $language->local)); ?>"><?php echo e($language->name); ?> (<?php echo e($language->local); ?>) </a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </ul>
              
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li><a href="<?php echo e(url('/')); ?>" target="_blank" class="visit site" style="color: white"><?php echo e(__('adminstaticword.VisitSite')); ?></a></li>

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
                  <img src="<?php echo e(asset('images/user_img/'.Auth::User()->user_img)); ?>" class="user-image" alt="">
                <?php else: ?>
                  <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="user-image" alt="">
                <?php endif; ?>
                <span class="hidden-xs">Hi ! <?php echo e(Auth::User()->fname); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
                    <img src="<?php echo e(asset('images/user_img/'.Auth::User()->user_img)); ?>" class="img-circle" alt="User Image">
                  <?php else: ?>
                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-circle" alt="User Image">
                  <?php endif; ?>
                  </br>
                  <p>
                   <?php echo e(Auth::User()->fname); ?>

                    <small><?php echo e(__('adminstaticword.MemberSince')); ?>: <?php echo e(date('jS F Y',strtotime( Auth::User()->created_at))); ?></small>
                  </p>
                  
                </li>

                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo e(url('user/edit/'.Auth::User()->id)); ?>" class="btn btn-default btn-flat"><?php echo e(__('adminstaticword.Profile')); ?></a>
                  </div>
                  <div class="pull-right">

                    <a class="btn btn-default btn-flat" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    <?php echo e(__('adminstaticword.Logout')); ?>

                    </a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                    </form>
                  </div>
                </li>
              </ul>

            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
                 <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    <?php echo e(__('adminstaticword.Logout')); ?>

                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                </form>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <?php if(Auth::User()->role == "admin"): ?>
      <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(Auth::User()->role == "instructor"): ?>
      <?php echo $__env->make('instructor.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <?php echo $__env->yieldContent('body'); ?>
      <!-- Main content end-->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <?php echo e($project_title); ?>

      </div>
     <?php echo e($cpy_txt); ?>

    </footer>
    <!-- /.control-sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo e(url('admin/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(url('admin/js/select2.min.js')); ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo e(url('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script> <!-- DataTables -->
  <script src="<?php echo e(url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script> <!-- SlimScroll -->
  <script src="<?php echo e(url('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script> <!-- FastClick -->
  <script src="<?php echo e(url('admin/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(url('admin/dist/js/adminlte.min.js')); ?>"></script> <!-- AdminLTE for demo purposes -->
  <script src="<?php echo e(url('admin/dist/js/demo.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('admin/bower_components/PACE/pace.min.js')); ?>"></script> 
  <!-- PACE -->
  <script src="<?php echo e(URL::asset('admin/bower_components/ckeditor/ckeditor.js')); ?>"></script>
  <!-- CK Editor -->
  <script src="<?php echo e(URL::asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script> <!-- bootstrap datepicker -->
  <script src="<?php echo e(url('admin/js/jquery-ui.js')); ?>"></script>
  <script src="<?php echo e(url('js/custom-toggle.js')); ?>"></script>
  <script src="<?php echo e(url('js/custom-file-input.js')); ?>"></script>
  <script src="<?php echo e(url('js/fontawesome-iconpicker.js')); ?>"></script>
  <script src="<?php echo e(url('admin/js/courseclass.js')); ?>"></script>
  <script src="<?php echo e(url('admin/js/tinymce.min.js')); ?>"></script>
  <script src="<?php echo e(url('admin/bower_components/moment/moment.js')); ?>"></script>
   <script src="<?php echo e(url('js/datepicker.js')); ?>"></script>
  <script src="<?php echo e(url('js/custom-js.js')); ?>"></script>
  
  <!-- page script -->
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    }) 
  </script>

  <script>
  (function($) {
    "use strict"; 
    tinymce.init({
      mode : "specific_textareas",
      editor_selector : "myTextEditor",
      plugins: 'table,textcolor,image,lists,link,code,wordcount,advlist, autosave',
      theme: 'modern',
      menubar: 'none',
      height : '300',
      toolbar: 'restoredraft,bold italic underline | fontselect |  fontsizeselect | forecolor backcolor |alignleft aligncenter alignright alignjustify| bullist,numlist | link image'
    });

    })();
  </script>

  <script>
    window.setTimeout(function(){
      $(".alert").fadeTo(300,0).slideUp(500, function(){
        $(this).remove();
      });
    },2000);
  </script>

  <script>
    $(function(){
      $('.icp-auto').iconpicker();
    });
  </script>

  <script>
 
    $(function () {
      $('.action-destroy').on('click', function () {
        $.iconpicker.batch('.icp.iconpicker-element', 'destroy');
      });
      $(document).on('click', '.action-placement', function (e) {
        $('.action-placement').removeClass('active');
        $(this).addClass('active');
        $('.icp-opts').data('iconpicker').updatePlacement($(this).text());
        e.preventDefault();
        return false;
      });
      $('.action-create').on('click', function () {
        $('.icp-auto').iconpicker();

        $('.icp-dd').iconpicker({
          
        });
        $('.icp-opts').iconpicker({
          title: 'With custom options',
          icons: [
            {
              title: "fab fa-github",
              searchTerms: ['repository', 'code']
            },
            {
              title: "fas fa-heart",
              searchTerms: ['love']
            },
            {
              title: "fab fa-html5",
              searchTerms: ['web']
            },
            {
              title: "fab fa-css3",
              searchTerms: ['style']
            }
          ],
          selectedCustomClass: 'label label-success',
          mustAccept: true,
          placement: 'bottomRight',
          showFooter: true,
          // note that this is ignored cause we have an accept button:
          hideOnSelect: true,
          // fontAwesome5: true,
          templates: {
            footer: '<div class="popover-footer">' +
            '<div style="text-align:left; font-size:12px;">Placements: \n\
            <a href="#" class=" action-placement">inline</a>\n\
            <a href="#" class=" action-placement">topLeftCorner</a>\n\
            <a href="#" class=" action-placement">topLeft</a>\n\
            <a href="#" class=" action-placement">top</a>\n\
            <a href="#" class=" action-placement">topRight</a>\n\
            <a href="#" class=" action-placement">topRightCorner</a>\n\
            <a href="#" class=" action-placement">rightTop</a>\n\
            <a href="#" class=" action-placement">right</a>\n\
            <a href="#" class=" action-placement">rightBottom</a>\n\
            <a href="#" class=" action-placement">bottomRightCorner</a>\n\
            <a href="#" class=" active action-placement">bottomRight</a>\n\
            <a href="#" class=" action-placement">bottom</a>\n\
            <a href="#" class=" action-placement">bottomLeft</a>\n\
            <a href="#" class=" action-placement">bottomLeftCorner</a>\n\
            <a href="#" class=" action-placement">leftBottom</a>\n\
            <a href="#" class=" action-placement">left</a>\n\
            <a href="#" class=" action-placement">leftTop</a>\n\
            </div><hr></div>'
          }
        }).data('iconpicker').show();
      }).trigger('click');

      
      $('.icp').on('iconpickerSelected', function (e) {
        $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
          e.iconpickerInstance.options.iconBaseClass + ' ' +
          e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
      });
    });

  </script>
  
  <script>
    $('#datepicker').datepicker({
      autoclose: true,
      changeYear: true,
    })
  </script>

  <script>
    $(function(){
      $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
          localStorage.setItem('activeTab', $(e.target).attr('href'));
      });
      var activeTab = localStorage.getItem('activeTab');
      if(activeTab){
          $('#nav-tab a[href="' + activeTab + '"]').tab('show');
      }
    });
  </script>

  <script>
    $(function() {
        $('form').attr('autocomplete','off');
    });
  </script>

  <script>
    $(function() {
      $('.js-example-basic-single').select2();
    });
  </script>

  <?php if($gsetting->rightclick=='1'): ?>
    <script>
      (function($) {
        "use strict";
          $(function() {
            $(document).on("contextmenu",function(e) {
               return false;
            });
        });
      })(jQuery);
    </script>
  <?php endif; ?>
  <?php if($gsetting->inspect=='1'): ?>
    <script>
      (function($) {
      "use strict";
           document.onkeydown = function(e) {
          if(event.keyCode == 123) {
             return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
             return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
             return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
             return false;
          }
          if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
             return false;
          }
        }
      })(jQuery);
    </script>
  <?php endif; ?>

<?php echo $__env->yieldContent('scripts'); ?>
<?php echo $__env->yieldContent('script'); ?>

</body>
</html>
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>