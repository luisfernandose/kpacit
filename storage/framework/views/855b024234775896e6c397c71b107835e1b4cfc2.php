<form action="<?php echo e(route('update.mail.set')); ?>" method="POST">
	<?php echo e(csrf_field()); ?>

	<div class="row">
		<div class="col-md-6">
			
			<label for=""><?php echo e(__('adminstaticword.SenderName')); ?>:</label>
			<input value="<?php echo e($env_files['MAIL_FROM_NAME']); ?>" type="text" name="MAIL_FROM_NAME" placeholder="Enter sender name" class="<?php echo e($errors->has('MAIL_FROM_NAME') ? ' is-invalid' : ''); ?> form-control">
			<?php if($errors->has('email')): ?>
                <span class="text-danger invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('MAIL_FROM_NAME')); ?></strong>
                </span>
            <?php endif; ?>
            <br>

            <label for=""><?php echo e(__('adminstaticword.MAILDRIVER')); ?>: (ex. SMTP,MAIL)</label>
			<input value="<?php echo e($env_files['MAIL_DRIVER']); ?>" type="text" name="MAIL_DRIVER" placeholder="Enter mail driver" class="<?php echo e($errors->has('MAIL_DRIVER') ? ' is-invalid' : ''); ?> form-control">
			<?php if($errors->has('MAIL_DRIVER')): ?>
                <span class="text-danger invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('MAIL_DRIVER')); ?></strong>
                </span>
            <?php endif; ?>
            <br>
            <label for=""><?php echo e(__('adminstaticword.MAILHOST')); ?>:<sup class="redstar">*</sup> (ex. smtp.mailtrap.io)</label> 
			<input value="<?php echo e($env_files['MAIL_HOST']); ?>" type="text" name="MAIL_HOST" placeholder="Enter mail host" class="<?php echo e($errors->has('MAIL_HOST') ? ' is-invalid' : ''); ?> form-control" required>
			<?php if($errors->has('MAIL_HOST')): ?>
                <span class="text-danger invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('MAIL_HOST')); ?></strong>
                </span>
            <?php endif; ?>

            <br>
            <label for=""><?php echo e(__('adminstaticword.MAILPORT')); ?>:<sup class="redstar">*</sup> (ex. 2525,467)</label>
			<input value="<?php echo e($env_files['MAIL_PORT']); ?>" type="text" name="MAIL_PORT" placeholder="Enter mail port" class="<?php echo e($errors->has('MAIL_PORT') ? ' is-invalid' : ''); ?> form-control" required>
			<?php if($errors->has('MAIL_PORT')): ?>
                <span class="text-danger invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('MAIL_PORT')); ?></strong>
                </span>
            <?php endif; ?>

        </div>
        <div class="col-md-6">

            <label for=""><?php echo e(__('adminstaticword.MAILADDRESS')); ?>:<sup class="redstar">*</sup></label>
            <input value="<?php echo e($env_files['MAIL_FROM_ADDRESS']); ?>" type="text" name="MAIL_FROM_ADDRESS" placeholder="Enter mail username" class="<?php echo e($errors->has('MAIL_FROM_ADDRESS') ? ' is-invalid' : ''); ?> form-control" required>
            <?php if($errors->has('MAIL_USERNAME')): ?>
                <span class="text-danger invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('MAIL_FROM_ADDRESS')); ?></strong>
                </span>
            <?php endif; ?>

            <br>

            <label for=""><?php echo e(__('adminstaticword.MAILUSERNAME')); ?>:<sup class="redstar">*</sup> (ex. info@test.com)</label>
			<input value="<?php echo e($env_files['MAIL_USERNAME']); ?>" type="text" name="MAIL_USERNAME" placeholder="Enter mail username" class="<?php echo e($errors->has('MAIL_USERNAME') ? ' is-invalid' : ''); ?> form-control" required>
			<?php if($errors->has('MAIL_USERNAME')): ?>
                <span class="text-danger invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('MAIL_USERNAME')); ?></strong>
                </span>
            <?php endif; ?>

            <br>


            <div class="row">
            <div class="col-md-11">
                <label for=""><?php echo e(__('adminstaticword.MAILPASSWORD')); ?>:<sup class="redstar">*</sup> </label>
                <input id="mailpass" value="<?php echo e($env_files['MAIL_PASSWORD']); ?>" type="password" name="MAIL_PASSWORD" placeholder="Enter mail password" class="<?php echo e($errors->has('MAIL_PASSWORD') ? ' is-invalid' : ''); ?> form-control" required> 
                </div>

                <div class="col-md-1">
                    <label class="display-none" for="">eye</label>
                    <br>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>
                </div>
            </div>
           
            
			<?php if($errors->has('MAIL_PASSWORD')): ?>
                <span class="text-danger invalid-feedback form-control" role="alert">
                    <strong><?php echo e($errors->first('MAIL_PASSWORD')); ?></strong>
                </span>
            <?php endif; ?>
                   

            <br>
            
            <label for=""><?php echo e(__('adminstaticword.MAILENCRYPTION')); ?>: (ex. TLS/SSL)</label>
			<input value="<?php echo e($env_files['MAIL_ENCRYPTION']); ?>" type="text" name="MAIL_ENCRYPTION" placeholder="Enter mail encryption" class="<?php echo e($errors->has('MAIL_ENCRYPTION') ? ' is-invalid' : ''); ?> form-control">
			<?php if($errors->has('MAIL_ENCRYPTION')): ?>
                <span class="text-danger invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('MAIL_ENCRYPTION')); ?></strong>
                </span>
            <?php endif; ?>
			<br>
            
		</div>
	</div>
	<br>
	<button type="submit" class="btn btn-md btn-primary"><i class="fa fa-save"></i> <?php echo e(__('adminstaticword.Save')); ?></button>
</form>


<?php /**PATH /var/www/html/resources/views/admin/setting/mailsetting.blade.php ENDPATH**/ ?>