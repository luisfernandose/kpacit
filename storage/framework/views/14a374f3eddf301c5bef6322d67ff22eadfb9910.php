<?php $__env->startSection('title', 'All Pending Payout - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">  <?php echo e(__('adminstaticword.PendingPayout')); ?></h3>
        </div>

        <div class="box-header">
          <a type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#bulk_delete"> <i class="fa fa-money"></i> Pay Selected</a>
        </div>

        <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <div class="delete-icon"></div>
            </div>
            <div class="modal-body text-center">
              <h4 class="modal-heading">Are You Sure ?</h4>
            </div>
            <div class="modal-footer text-center">

              <form  method="post" action="<?php echo e(action('AdminPayoutController@bulk_payout', $id)); ?>" id="bulk_delete_form" data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>


                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
               
                <input type="submit" value="Yes"  class="btn btn-sm btn-danger"/>
              </form>
            </div>
          </div>
        </div>
      </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">

        <thead>
         
          <br>

          <th>
            <div class="inline">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                <label for="checkboxAll" class="material-checkbox"></label>
              </div>
            #
          </th>
          <th><?php echo e(__('adminstaticword.User')); ?></th>
          <th><?php echo e(__('adminstaticword.Course')); ?></th>
          <th><?php echo e(__('adminstaticword.OrderId')); ?></th>
          <th><?php echo e(__('adminstaticword.PayoutDeatil')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0;?>
        <?php $__currentLoopData = $payout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <?php $i++;?>
          <td>
              <div class="inline">
                <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($pay->id); ?>" id="checkbox<?php echo e($pay->id); ?>">
                <label for="checkbox<?php echo e($pay->id); ?>" class="material-checkbox"></label>
              </div>
              <?php echo $i;?>
            </td>
         
            <td><?php echo e($pay->user->fname); ?></td>
            <td><?php echo e($pay->courses->title); ?></td>
            <td><?php echo e($pay->order->order_id); ?></td> 
            <td>
              <b>Total Amount</b>: <i class="fa <?php echo e($pay->currency_icon); ?>"></i><?php echo e($pay->total_amount); ?>

              <br>

              <b>Instructor Revenue</b>: <i class="fa <?php echo e($pay->currency_icon); ?>"></i> <?php echo e($pay->instructor_revenue); ?>

            </td>
          

          
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </tfoot>
      </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
  <script>
    $(function(){
      $('#checkboxAll').on('change', function(){
        if($(this).prop("checked") == true){
          $('.material-checkbox-input').attr('checked', true);
        }
        else if($(this).prop("checked") == false){
          $('.material-checkbox-input').attr('checked', false);
        }
      });
    });
  </script>

  <script>
    $(function() {
      $('#cb3').change(function() {
        $('#status').val(+ $(this).prop('checked'))
      })
    })
  </script>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/revenue/pending.blade.php ENDPATH**/ ?>