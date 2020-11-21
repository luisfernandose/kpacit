<?php $__env->startSection('title', 'Dashboard - Admin'); ?>
<?php $__env->startSection('body'); ?>

<?php if(Auth::User()->role == "admin"): ?>

<section class="content-header">
  <h1>
    <?php echo e(__('adminstaticword.Dashboard')); ?>

    <small><?php echo e($project_title); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i><?php echo e(__('adminstaticword.Home')); ?></a></li>
    <li class="active"><?php echo e(__('adminstaticword.Dashboard')); ?></li>
  </ol>
</section>
<section class="content">
	<!-- Main row -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
              	<?php
              		$user = App\User::all();
              		if(count($user)>0){

              			echo count($user);
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>
              <p><?php echo e(__('adminstaticword.User')); ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo e(route('user.index')); ?>" class="small-box-footer"><?php echo e(__('adminstaticword.Moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              	<?php
              		$cat = App\Categories::all();
              		if(count($cat)>0){

              			echo count($cat);
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>
              <p><?php echo e(__('adminstaticword.Categories')); ?></p>
            </div>
            <div class="icon">
            	<i class="fa fa-th-large"></i>
            </div>
            <a href="<?php echo e(url('category')); ?>" class="small-box-footer"><?php echo e(__('adminstaticword.Moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
              	<?php
              		$course = App\Course::all();
              		if(count($course)>0){

              			echo count($course);
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>
              <p><?php echo e(__('adminstaticword.CourseAvailable')); ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo e(url('course')); ?>" class="small-box-footer"><?php echo e(__('adminstaticword.Moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
              	<?php
              		$page = App\Order::all();
              		if(count($page)>0){

              			echo count($page);
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>
              <p><?php echo e(__('adminstaticword.Orders')); ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo e(url('order')); ?>" class="small-box-footer"><?php echo e(__('adminstaticword.Moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
              	<?php
              		$faq = App\FaqStudent::all();
              		if(count($faq)>0){

              			echo count($faq);
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>
              <p><?php echo e(__('adminstaticword.Faq')); ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-question"></i>
            </div>
            <a href="<?php echo e(url('faq')); ?>" class="small-box-footer"><?php echo e(__('adminstaticword.Moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php
              		$review = App\Page::all();
              		if(count($review)>0){

              			echo count($review);
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>
              <p><?php echo e(__('adminstaticword.Pages')); ?></p>
            </div>
            <div class="icon">
             <i class="fa fa-folder"></i>
            </div>
            <a href="<?php echo e(url('page')); ?>" class="small-box-footer"><?php echo e(__('adminstaticword.Moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                <?php
              		$review = App\Instructor::all();
              		if(count($review)>0){

              			echo count($review);
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>
              <p><?php echo e(__('adminstaticword.Instructor')); ?></p>
            </div>
            <div class="icon">
             <i class="fa fa-user"></i>
            </div>
            <a href="<?php echo e(url('requestinstructor')); ?>" class="small-box-footer"><?php echo e(__('adminstaticword.Moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>
                <?php
              		$review = App\Testimonial::all();
              		if(count($review)>0){

              			echo count($review);
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>
              <p><?php echo e(__('adminstaticword.Testimonial')); ?></p>
            </div>
            <div class="icon">
             <i class="fa fa-folder"></i>
            </div>
            <a href="<?php echo e(url('testimonial')); ?>" class="small-box-footer"><?php echo e(__('adminstaticword.Moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

	<!-- Main row -->
	<div class="row">
		<!-- Left col -->
    <div class="col-md-4">
      <!-- USERS LIST -->
      <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(__('adminstaticword.LatestUsers')); ?></h3>

            <div class="box-tools pull-right">
              <span class="label label-danger">
                <?php
                    $user = App\User::all();
                    if(count($user)>0){

                      echo count($user);
                    }
                    else{

                      echo "0";
                    }
                  ?>
                <?php echo e(__('adminstaticword.Users')); ?>

            </span>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <?php
              $users = App\User::limit(8)->orderBy('id', 'DESC')->get();
            ?>
            <ul class="users-list clearfix">
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                <?php if($user['user_img'] != null || $user['user_img'] !=''): ?>
                  <img src="<?php echo e(asset('/images/user_img/'.$user['user_img'])); ?>" class="img-fluid" alt="User Image">
                <?php else: ?>
                  <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-fluid" alt="User Image">
                <?php endif; ?>
                <a class="users-list-name" href="#"><?php echo e($user['fname']); ?> <?php echo e($user['lname']); ?></a>
                <span class="users-list-date"><?php echo e(date('F Y', strtotime($user['created_at']))); ?></span>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-center">
            <a href="<?php echo e(route('user.index')); ?>" class="uppercase"><?php echo e(__('adminstaticword.ViewAll')); ?></a>
          </div>
          <!-- /.box-footer -->
      </div>
      <!--/.box -->

        <!-- PRODUCT LIST -->
      <?php
        $courses = App\Course::limit(5)->orderBy('id', 'DESC')->get()
      ?>
      <?php if(!$courses->isEmpty()): ?>
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(__('adminstaticword.RecentCourses')); ?></h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              
              <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="item">
                <div class="product-img">
                  <?php if($course['preview_image'] !== NULL && $course['preview_image'] !== ''): ?>
                    <img src="images/course/<?php echo $course['preview_image'];  ?>" alt="Course Image">
                  <?php else: ?>
                    <img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" alt="Course Image">
                  <?php endif; ?>

                </div>
                <div class="product-info">
                  <a href="javascript:void(0)" class="product-title"><?php echo e(str_limit($course['title'], $limit = 25, $end = '...')); ?>

                  <span class="label label-warning pull-right">
                    <?php if( $course->type == 1): ?>
                      <?php
                          $currency2 = App\Currency::first();
                      ?>
                      <?php if($course->discount_price == !NULL): ?>
                        <i class="<?php echo e($currency2['icon']); ?>"></i><?php echo e($course['discount_price']); ?>

                      <?php else: ?>
                        <i class="<?php echo e($currency2['icon']); ?>"></i><?php echo e($course['price']); ?>

                      <?php endif; ?>
                    <?php else: ?>
                      <?php echo e(__('adminstaticword.Free')); ?>

                    <?php endif; ?>
                </span></a>
                 
                  <span class="product-description">
                      <?php echo e(str_limit($course->short_detail, $limit = 40, $end = '...')); ?>

                  </span>
                </div>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-center">
            <a href="<?php echo e(url('course')); ?>" class="uppercase"><?php echo e(__('adminstaticword.ViewAll')); ?></a>
          </div>
          <!-- /.box-footer -->
      </div>
      <?php endif; ?>
      <!-- /.box -->
    </div>
    <!-- /.col -->
		<div class="col-md-8">
		  <!-- TABLE: LATEST ORDERS -->
      <?php
        $orders = App\Order::limit(7)->orderBy('id', 'DESC')->get();
      ?>
      <?php if( !$orders->isEmpty() ): ?>
			<div class="box box-info">
			    <div class="box-header with-border">
			      <h3 class="box-title"><?php echo e(__('adminstaticword.LatestOrders')); ?></h3>

			      <div class="box-tools pull-right">
			        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			        </button>
			        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			      </div>
			    </div>
			    <!-- /.box-header -->
			    <div class="box-body">
			      <div class="table-responsive">
			        <table class="table no-margin">
			          <thead>
			          <tr>
			            <th><?php echo e(__('adminstaticword.User')); ?></th>
			            <th><?php echo e(__('adminstaticword.Course')); ?></th>
			            <th><?php echo e(__('adminstaticword.Amount')); ?></th>
			            <th><?php echo e(__('adminstaticword.Date')); ?></th>
                  <th><?php echo e(__('adminstaticword.Invoice')); ?></th>
			          </tr>
			          </thead>
			          <tbody>
                  <?php
                    $orders = App\Order::limit(7)->orderBy('id', 'DESC')->get();
                  ?>
                  <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    			          <tr>
    			            <td><a href="#"><?php echo e($order->user['fname']); ?></a></td>
    			            <td><?php echo e($order->courses['title']); ?></td>
    			            <td>
                        <?php if($order->coupon_discount == !NULL): ?>
                          <span class="label label-success"><i class="fa <?php echo e($order['currency_icon']); ?>"></i> <?php echo e($order['total_amount'] - $order['coupon_discount']); ?></span>
                        <?php else: ?>
                          <span class="label label-success"><i class="fa <?php echo e($order['currency_icon']); ?>"></i> <?php echo e($order['total_amount']); ?></span>
                        <?php endif; ?>
                      </td>
    			            <td>
    			              <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo e(date('jS F Y', strtotime($order['created_at']))); ?></div>
    			            </td>
                      <td><a href="<?php echo e(route('view.order',$order['id'])); ?>"><?php echo e(__('adminstaticword.Invoice')); ?></a></td>
    			          </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			          </tbody>
			        </table>
			      </div>
			      <!-- /.table-responsive -->
			    </div>
			    <!-- /.box-body -->
			    <div class="box-footer clearfix">
			      <a href="<?php echo e(url('order')); ?>" class="btn btn-sm btn-default btn-flat pull-right"><?php echo e(__('adminstaticword.ViewAllOrders')); ?></a>
			    </div>
			    <!-- /.box-footer -->
			</div>
      <?php endif; ?>

			<!-- /.box -->

      <!-- Instructor box -->
      <?php
        $instructors = App\Instructor::limit(3)->orderBy('id', 'DESC')->get();
      ?>
      <?php if( !$instructors->isEmpty() ): ?>
      <div class="box box-success">
        <div class="box-header">
          <i class="fa fa-user-plus"></i>

          <h3 class="box-title"><?php echo e(__('adminstaticword.InstructorRequest')); ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body chat" id="chat-box">
          <!-- chat item -->
          
          <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($instructor->status == 0): ?>
            <div class="item">
              <img src="<?php echo e(asset('images/instructor/'.$instructor['image'])); ?>" alt="user image" class="online">

              <p class="message">
                <a href="#" class="name">
                  <small class="text-muted pull-right"><i class="fa fa-calendar-check-o"></i>&nbsp;<?php echo e(date('jS F Y', strtotime($instructor['created_at']))); ?></small>
                  <?php echo e($instructor['fname']); ?>&nbsp;<?php echo e($instructor['lname']); ?>

                </a>
                <?php echo e(str_limit($instructor['detail'], $limit = 160, $end = '...')); ?>

              </p>
              <div class="attachment">
                <h4><?php echo e(__('adminstaticword.Resume')); ?>:</h4>
                <p class="filename">
                  <a href="<?php echo e(asset('files/instructor/'.$instructor['file'])); ?>" download="<?php echo e($instructor['file']); ?>"><?php echo e(__('adminstaticword.Download')); ?> <i class="fa fa-download"></i></a>
                </p>

                <div class="pull-right">
                  <button type="button" onclick="window.location.href = '<?php echo e(route('requestinstructor.edit',$instructor['id'])); ?>';" class="btn btn-primary btn-sm btn-flat"><?php echo e(__('adminstaticword.ViewDetails')); ?></button>
                </div>
              </div>
              <!-- /.attachment -->
            </div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <!-- /.item -->
        </div>
        <!-- /.chat -->
        <div class="box-footer text-center">
          <a href="<?php echo e(route('all.instructor')); ?>" class="btn btn-sm bg-navy btn-flat pull-left"><?php echo e(__('adminstaticword.AllInstructor')); ?></a>
          <a href="<?php echo e(url('requestinstructor')); ?>" class="btn btn-sm btn-default btn-flat pull-right"><?php echo e(__('adminstaticword.ViewAllInstructor')); ?></a>
        </div>
      </div>
      <?php endif; ?>
      <!-- /.box (Instructor box) -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>