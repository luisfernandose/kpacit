<form action="<?php echo e(route('seo.set')); ?>" method="POST">
	<?php echo csrf_field(); ?>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group<?php echo e($errors->has('meta_data_desc') ? ' has-error' : ''); ?>">
				<label for=""><?php echo e(__('adminstaticword.MetaDataDescription')); ?>:</label>
				<textarea placeholder="Enter description" class="form-control" name="meta_data_desc" id="" cols="30" rows="10"><?php echo e($setting->meta_data_desc); ?></textarea>
				<small class="text-danger"><?php echo e($errors->first('meta_data_desc','Meta data description is required !')); ?></small>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group<?php echo e($errors->has('meta_data_keyword') ? ' has-error' : ''); ?>">
				<label for=""><?php echo e(__('adminstaticword.MetaDataKeywords')); ?>:</label>
				<textarea placeholder="Use Comma to seprate keyword" class="form-control" name="meta_data_keyword" id="" cols="30" rows="10"><?php echo e($setting->meta_data_keyword); ?>

				</textarea>
				<small class="text-danger"><?php echo e($errors->first('meta_data_keyword','Meta Keyword Cannot be blank !')); ?></small>
			</div>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group<?php echo e($errors->has('google_ana') ? ' has-error' : ''); ?>">
				<label for=""><?php echo e(__('adminstaticword.GoogleAnalyticKey')); ?>:</label>
				<input type="text" class="form-control" placeholder="Enter Google analytic key" name="google_ana" value="<?php echo e($setting->google_ana); ?>">
				<small class="text-danger"><?php echo e($errors->first('google_ana','Google analytic Code is required !')); ?></small>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group<?php echo e($errors->has('fb_pixel') ? ' has-error' : ''); ?>">
				<label for=""><?php echo e(__('adminstaticword.FacebookPixelCode')); ?>:</label>
				<input type="text" name="fb_pixel" class="form-control" placeholder="Enter Facebook Pixel Code" value="<?php echo e($setting->fb_pixel); ?>">
				<small class="text-danger"><?php echo e($errors->first('fb_pixel','Facebook Pixel Code is required !')); ?></small>
			</div>
		</div>
	</div>
	<br>

	<div class="box-footer">	
		<button type="submit" class="btn btn-md btn-primary"><i class="fa fa-save"></i><?php echo e(__('adminstaticword.Save')); ?></button>
	</div>
	
</form>


<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/admin/setting/seo.blade.php ENDPATH**/ ?>