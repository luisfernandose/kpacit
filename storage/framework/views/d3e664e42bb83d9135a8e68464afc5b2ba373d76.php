<?php $__env->startSection('title','All Coupons'); ?>

<?php $__env->startSection('body'); ?>
<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('adminstaticword.Coupon')); ?></h3>
        </div>
        <div class="box-header">
          <a title="Create new Coupon" href="<?php echo e(route('coupon.create')); ?>" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> <?php echo e(__('adminstaticword.Add')); ?></a>
          <br>
        </div>

        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <th><?php echo e(__('adminstaticword.ID')); ?></th>
                <th><?php echo e(__('adminstaticword.CODE')); ?></th>
                <th><?php echo e(__('adminstaticword.Amount')); ?></th>
                <th><?php echo e(__('adminstaticword.MaxUsage')); ?></th>
                <th><?php echo e(__('adminstaticword.Detail')); ?></th>
                <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                <th><?php echo e(__('adminstaticword.Delete')); ?></th>
              </thead>

              <tbody>
                <?php $__currentLoopData = $coupans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $cpn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($cpn->code); ?></td>
                    <?php
                        $currency = App\Currency::first();
                    ?> 
                    <td><?php if($cpn->distype == 'fix'): ?> <i class="fa <?php echo e($currency->icon); ?>"></i> <?php endif; ?> <?php echo e($cpn->amount); ?><?php if($cpn->distype == 'per'): ?>% <?php endif; ?> </td>
                    <td><?php echo e($cpn->maxusage); ?></td>
                    <td>
                      <p><?php echo e(__('adminstaticword.Linkedto')); ?>: <b><?php echo e(ucfirst($cpn->link_by)); ?></b></p>
                      <p><?php echo e(__('adminstaticword.ExpiryDate')); ?>: <b><?php echo e(date('d-M-Y',strtotime($cpn->expirydate))); ?></b></p>
                      <p><?php echo e(__('adminstaticword.DiscountType')); ?>: <b><?php echo e($cpn->distype == 'per' ? "Percentage" : "Fixed Amount"); ?></b></p>
                    </td>
                    <td>
                      <a title="Edit coupon" href="<?php echo e(route('coupon.edit',$cpn->id)); ?>" class="btn btn-success btn-sm">
                        <i class="fa fa-pencil"></i>
                      </a>
                    </td>
                    <td>
                      <a title="Delete coupon" data-toggle="modal" data-target="#coupon<?php echo e($cpn->id); ?>" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>

                    <div id="coupon<?php echo e($cpn->id); ?>" class="delete-modal modal fade" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <div class="delete-icon"></div>
                            </div>
                            <div class="modal-body text-center">
                              <h4 class="modal-heading">Are You Sure ?</h4>
                              <p>Do you really want to delete this Coupon ? This process cannot be undone.</p>
                            </div>
                            <div class="modal-footer">
                                 <form method="post" action="<?php echo e(route('coupon.destroy',$cpn->id)); ?>" class="pull-right">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field("DELETE")); ?>

                                          
                                 <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin/layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/coupan/index.blade.php ENDPATH**/ ?>