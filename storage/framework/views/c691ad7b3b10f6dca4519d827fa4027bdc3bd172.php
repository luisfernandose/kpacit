<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2019.
**********************************************************************************************************  -->
<!-- 
Template Name: NextClass
Version: 1.0.0
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<html lang="en">
<!-- <![endif]-->
<!-- head -->
<!-- theme styles -->
<link href="<?php echo e(url('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
<link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet" type="text/css"/> <!-- custom css -->
<!-- google fonts -->

<!-- end theme styles -->
</head>


<!-- end head -->
<!-- body start-->
<body>
<!-- terms end-->
<!-- about-home start -->
<section id="wishlist-home" class="invoice-home-main-block ">
    <div class="container-fluid">
        <h1><?php echo e(__('frontstaticword.Invoice')); ?></h1>
    </div>
</section> 
<!-- about-home end -->
<section id="purchase-block" class="Invoice-main-block">
    <div class="container-fluid">
        <div class="panel-body">
      
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <div class="page-header">
              <?php
                  $setting = App\setting::first();
              ?>
              <div class="download-logo">
                <?php if($setting['logo_type'] == 'L'): ?>
                    <img src="<?php echo e(asset('images/logo/'.$setting['logo'])); ?>" class="img-fluid" alt="logo">
                <?php else: ?>
                    <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e($setting['project_title']); ?></div></b></a>
                <?php endif; ?>
              </div>
              <br>
              <small class="purchase-date"><?php echo e(__('frontstaticword.Puchasedon')); ?>: <?php echo e(date('jS F Y', strtotime($orders['created_at']))); ?></small>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="view-order">
         <table class="table table-striped">
            <thead>
              <th class="col-sm-4 invoice-col">
                From:
                <address>
                  <strong><?php echo e($orders->courses->user['fname']); ?></strong><br>
                  
                 
                  <?php echo e(__('frontstaticword.address')); ?>: <?php echo e($orders->courses->user['address']); ?><br>
                    <?php if($orders->courses->user->state_id == !NULL): ?>
                      <?php echo e($orders->courses->user->state['name']); ?>,
                    <?php endif; ?>
                    <?php if($orders->courses->user->state_id == !NULL): ?>
                      <?php echo e($orders->courses->user->country['name']); ?>

                    <?php endif; ?>
                    <br>

                  <?php echo e(__('frontstaticword.Phone')); ?>: <?php echo e($orders->courses->user['mobile']); ?><br>
                  <?php echo e(__('frontstaticword.Email')); ?>: <?php echo e($orders->courses->user['email']); ?>

                </address>
              </th>
              <!-- /.col -->
              <th class="col-sm-4 invoice-col">
                To:
                <address>
                  <strong><?php echo e($orders->user['fname']); ?></strong><br>
                  <?php echo e(__('frontstaticword.address')); ?>: <?php echo e($orders->user['address']); ?><br>
                    <?php if($orders->user->state_id == !NULL): ?>
                      <?php echo e($orders->user->state['name']); ?>,
                    <?php endif; ?>
                    <?php if($orders->user->country_id == !NULL): ?>
                      <?php echo e($orders->user->country['name']); ?>

                    <?php endif; ?>
                    <br>
                  <?php echo e(__('frontstaticword.Phone')); ?>: <?php echo e($orders->user['mobile']); ?><br>
                  <?php echo e(__('frontstaticword.Email')); ?>: <?php echo e($orders->user['email']); ?>

                </address>
              </th>
              <!-- /.col -->
              <th class="col-sm-4 invoice-col">
                <b><?php echo e(__('frontstaticword.OrderID')); ?>:</b> <?php echo e($orders['order_id']); ?><br>
                <b><?php echo e(__('frontstaticword.TransactionID')); ?>:</b> <?php echo e($orders['transaction_id']); ?><br>
                <b><?php echo e(__('frontstaticword.PaymentMode')); ?>:</b> <?php echo e($orders['payment_method']); ?><br>
                <b><?php echo e(__('frontstaticword.Currency')); ?>:</b> <?php echo e($orders['currency']); ?></br>
                <b><?php echo e(__('frontstaticword.PaymentStatus')); ?>:</b> 
                <?php if($orders->status ==1): ?>
                  <?php echo e(__('frontstaticword.Recieved')); ?>

                <?php else: ?> 
                  <?php echo e(__('frontstaticword.Pending')); ?>

                <?php endif; ?>
              </th>
          </thead>
      </table>
             
        </div>
        <!-- /.row -->
        <div class="order-table table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th><?php echo e(__('frontstaticword.Courses')); ?></th>
                <th><?php echo e(__('frontstaticword.Instructor')); ?></th>
                <th><?php echo e(__('frontstaticword.Currency')); ?></th>
                <?php if($orders->coupon_discount != 0): ?>
                <th class="text-center">Coupon Discount</th>
                <?php endif; ?>
                <th class="txt-rgt"><?php echo e(__('frontstaticword.Total')); ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo e($orders->courses['title']); ?></td>
                <td><?php echo e($orders->courses->user['email']); ?></td>
                <td><?php echo e($orders['currency']); ?></td>

                <?php if($orders->coupon_discount != 0): ?>
                <td class="text-center">
                  (-)&nbsp;<i class="<?php echo e($orders['currency_icon']); ?>"></i><?php echo e($orders['coupon_discount']); ?>

                </td>
                <?php endif; ?>

                <td class="txt-rgt">
                  <?php if($orders->coupon_discount == !NULL): ?>
                    <i class="fa <?php echo e($orders['currency_icon']); ?>"></i><?php echo e($orders['total_amount'] - $orders['coupon_discount']); ?>

                  <?php else: ?>
                    <i class="fa <?php echo e($orders['currency_icon']); ?>"></i><?php echo e($orders['total_amount']); ?>

                  <?php endif; ?>
                </td>
               
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    </div>
</section>
<!-- footer start -->

<!-- footer end -->
<!-- jquery -->
<script src="<?php echo e(url('js/jquery-2.min.js')); ?>"></script> <!-- jquery library js -->
<script src="<?php echo e(url('js/bootstrap.bundle.js')); ?>"></script> <!-- bootstrap js -->
<!-- end jquery -->
</body>
<!-- body end -->
</html> 



<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/front/purchase_history/download.blade.php ENDPATH**/ ?>