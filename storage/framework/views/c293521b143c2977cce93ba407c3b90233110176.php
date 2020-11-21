<?php $__env->startSection('title', 'Language - Admin'); ?>
<?php $__env->startSection('body'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title"><?php echo e(__('adminstaticword.Language')); ?></h1>
        </div>
    	 <div class="box-body">
          <!-- Nav tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="nav-tab" role="tablist">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-language" aria-hidden="true"></i> Language</a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-laptop" aria-hidden="true"></i> Front Static Word Translation</a></li>
              <li role="presentation"><a href="#admin" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-laptop" aria-hidden="true"></i> Admin Static Word Translation</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="home">
              	<br>
              	<?php echo $__env->make('admin.language.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="profile">
              	<br>
              	<?php echo $__env->make('admin.language.frontstatic.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fade tab-pane" id="admin">
                <br>
                <?php echo $__env->make('admin.language.adminstatic.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/language/show.blade.php ENDPATH**/ ?>