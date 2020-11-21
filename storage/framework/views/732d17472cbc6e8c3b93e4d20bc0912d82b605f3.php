<form action="<?php echo e(route('api.onboard')); ?>" method="POST"  enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('POST')); ?>

            
            <div class="row">
              <div class="col-md-12">
                            <label for="s_enable">Onboard Content</label>
                            <?php if(count($onboard)>0): ?>
                            <?php $__currentLoopData = $onboard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                  <label for="">Name:</label>
                                  <input type="name" name="name[]" class="form-control" id="name" required="" placeholder="Enter name" value="<?php echo $value->name; ?>">
                                  <input type="hidden" name="id[]" value="<?php echo $value->id; ?>">
                                  <small class="text-danger"><?php echo e($errors->first('name','Name is required !')); ?></small>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                  <label for="">Description:</label>
                                  <textarea placeholder="Enter description" class="form-control" name="description[]" id="description" cols="20" rows="5"><?php echo e($value->description); ?>

                                  </textarea>
                                  <small class="text-danger"><?php echo e($errors->first('description','Meta Keyword Cannot be blank !')); ?></small>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group<?php echo e($errors->has('meta_data_keyword') ? ' has-error' : ''); ?>">
                                  <label for="">Image:</label>
                                  <input type="file" name="image[]" id="image" class="form-control">
                                  <div>
                                    <img src="<?php echo $value->image; ?>" style="width: 100px;">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>

            <div class="box-footer">
                      <button value="" type="submit"  class="btn btn-lg col-md-4 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
                    </div>

                </form><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/setting/onboard.blade.php ENDPATH**/ ?>