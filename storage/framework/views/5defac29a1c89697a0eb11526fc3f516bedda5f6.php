

<section class="content">
  <div class="row">
    <div class="col-xs-12">
    
        <div class="box-header">
          <a href="<?php echo e(action('LanguageController@create')); ?>" class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.Add')); ?></a>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
           
                <tr class="table-heading-row">
                  <th>#</th>                
                  <th><?php echo e(__('adminstaticword.Name')); ?></th>
                  <th><?php echo e(__('adminstaticword.Local')); ?></th>
                  <th><?php echo e(__('adminstaticword.Default')); ?></th>
                  <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                </tr>
              </thead>
              <?php if($languages): ?>
                <tbody>
                  <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <?php echo e($key+1); ?>

                      </td>
                      <td><?php echo e($language->name); ?></td>
                      <td><?php echo e($language->local); ?></td>
                      <td align="left">
                        <?php if($language->def ==1): ?>
                          <i class="text-success fa fa-check"></i>
                        <?php else: ?>
                          <i class="text-danger fa fa-times"></i>
                        <?php endif; ?>
                      </td>
                      
                      <td><a class="btn btn-success btn-sm" href="<?php echo e(route('frontstatic.lang', $language->local)); ?>">
                        <i class="glyphicon glyphicon-pencil"></i></a>
                      </td>

                     
                    </tr>
                    
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              <?php endif; ?>
            </table>
          </div>
        </div>
        <!-- /.box-body -->
     
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/language/frontstatic/index.blade.php ENDPATH**/ ?>