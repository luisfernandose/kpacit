<form enctype="multipart/form-data" method="POST" action="<?php echo e(route('setting.store')); ?>">
	<?php echo csrf_field(); ?>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputDetails"><?php echo e(__('adminstaticword.TextLogo')); ?>:</label>
			    <li class="tg-list-item">
			        <input class="tgl tgl-skewed" id="opp" type="checkbox" name="project_logo" <?php echo e($gsetting->logo_type == 'L' ? 'checked' : ''); ?>>
			        <label class="tgl-btn" data-tg-off="Text" data-tg-on="Logo" for="opp"></label>
			    </li>
			    <input type="hidden" name="free" value="0" for="opp" id="oppp">
		    </div>
		</div>
		<div class="col-md-6">
			<div class="row">

				<?php if($errors->has('logo')): ?>
				<div class="display-none" id="logo">
                    <strong class="text-danger"><?php echo e($errors->first('logo')); ?></strong>
                </div>
                <?php endif; ?>
				<div class="col-md-6">
					<div class="form-group">
						<input type="file" name="logo" value="<?php echo e($setting->logo); ?>" id="logo" class="<?php echo e($errors->has('logo') ? ' is-invalid' : ''); ?> inputfile inputfile-1"/>
				<label for="logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span><?php echo e(__('adminstaticword.ChooseaLogo')); ?></span></label>
				<span class="text-danger invalid-feedback" role="alert"></span>
					</div>
				 	  
				</div>
				<div class="col-md-4">
					<?php if($setting->logo !=""): ?>
						<div class="logo-settings">
							<img src="<?php echo e(asset('images/logo/'.$setting->logo)); ?>" alt="<?php echo e($setting->logo); ?>" class="img-responsive">
						</div>
					<?php else: ?>
						<div class="alert alert-danger">
							<?php echo e(__('adminstaticword.Nologofound')); ?>

						</div>
					<?php endif; ?>
				</div>
			</div>
			<br>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="project_title"><?php echo e(__('adminstaticword.ProjectTitle')); ?>:<sup class="redstar">*</sup></label>
			  	<input value="<?php echo e($setting->project_title); ?>" placeholder="Enter project title" name="project_title" type="text" class="<?php echo e($errors->has('project_title') ? ' is-invalid' : ''); ?> form-control">
			  	<?php if($errors->has('project_title')): ?>
	                <span class="text-danger invalid-feedback" role="alert">
	                    <strong><?php echo e($errors->first('project_title')); ?></strong>
	                </span>
	            <?php endif; ?>
	        </div>
		</div>
		<div class="col-md-6">
			<div class="row">
				
				<?php if($errors->has('favicon')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('favicon')); ?></strong>
                <?php endif; ?>
				<div class="col-md-6">
					<label for="exampleInputDetails"><?php echo e(__('adminstaticword.Favicon')); ?></label>- <p class="inline info">Size: 35x35</p>	
					<input type="file" name="favicon" id="favi" class="<?php echo e($errors->has('favicon') ? ' is-invalid' : ''); ?> inputfile inputfile-1"/>

					<label for="favi"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span><?php echo e(__('adminstaticword.Chooseafavicon')); ?></span></label>
				</div>
				<div class="col-md-4">
					<?php if($setting->favicon !=""): ?>
						<div class="favicon-settings">
							<img src="<?php echo e(asset('images/favicon/'.$setting->favicon)); ?>" alt="<?php echo e($setting->favicon); ?>" class="img-responsive">
						</div>
					<?php else: ?>
						<div class="alert alert-danger">
							<?php echo e(__('adminstaticword.NoFaviconfound')); ?>

						</div>
					<?php endif; ?>

				</div>
			</div>
			<br>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<label for="APP_URL"><?php echo e(__('adminstaticword.APPURL')); ?>:<sup class="redstar">*</sup></label>
		  	<input placeholder="http://localhost/" name="APP_URL" type="text" class="<?php echo e($errors->has('APP_URL') ? ' is-invalid' : ''); ?> form-control" value="<?php echo e($env_files['APP_URL']); ?>" >
		  	<?php if($errors->has('APP_URL')): ?>
                <span class="text-danger invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('APP_URL')); ?></strong>
                </span>
            <?php endif; ?>
            <br>
		</div>
		<div class="col-md-6">
			<label for="phone"><?php echo e(__('adminstaticword.Contact')); ?>:<sup class="redstar">*</sup></label>
            <input value="<?php echo e($setting->default_phone); ?>" name="default_phone" placeholder="Enter contact no." type="text" class="<?php echo e($errors->has('default_phone') ? ' is-invalid' : ''); ?> form-control" required>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
            <label for="cpy_txt"><?php echo e(__('adminstaticword.CopyrightText')); ?>:<sup class="redstar">*</sup></label>
            <input value="<?php echo e($setting->cpy_txt); ?>" name="cpy_txt" placeholder="Enter Copyright Text" type="text" required class="<?php echo e($errors->has('cpy_txt') ? ' is-invalid' : ''); ?> form-control">
		</div>
		<div class="col-md-6">
			<label for="wel_email"><?php echo e(__('adminstaticword.Email')); ?>:<sup class="redstar">*</sup></label>
            <input value="<?php echo e($setting->wel_email); ?>" name="wel_email" placeholder="Enter your email" type="text" class="<?php echo e($errors->has('wel_email') ? ' is-invalid' : ''); ?> form-control" required>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-6">
			<label for="exampleInputDetails"><?php echo e(__('adminstaticword.Address')); ?>:<sup class="redstar">*</sup></label>
            <textarea name="default_address" rows="3" class="form-control" placeholder="Enter your address" required><?php echo e($setting->default_address); ?></textarea>
		</div>
		<div class="col-md-6">
			<br>
			<div class="row">
				<div  class="col-md-6">
					<label for=""><?php echo e(__('adminstaticword.RightClick')); ?>: </label>
					<br>
					<li class="tg-list-item">              
			            <input class="tgl tgl-skewed" id="cb3" type="checkbox" name="rightclick" <?php echo e($gsetting->rightclick == '1' ? 'checked' : ''); ?> >
			            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="cb3"></label>
		            </li>
		            <input type="hidden"  name="free" value="0" for="cb3" id="cb3"> 
				</div>
				<div  class="col-md-6">
					<label for=""><?php echo e(__('adminstaticword.InspectElement')); ?>: </label>
					<br>
		    		<li class="tg-list-item">              
			            <input class="tgl tgl-skewed" id="cb4" type="checkbox" name="inspect" <?php echo e($setting->inspect == '1' ? 'checked' : ''); ?> >
			            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="cb4"></label>
		            </li>
		            <input type="hidden" id="inspect" name="free" value="0" for="cb4" id="cb4">
				</div>
				
			</div>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-6">
			<label for="feature_amount">Amount to feature a course:</label>
			<small>(Instructor can feature its course, by paying this amount)</small>
            <input min="1" class="form-control" name="feature_amount" type="number" value="<?php echo e($setting->feature_amount); ?>" id="duration"  placeholder="Enter amount to feature course ex: 100" class="<?php echo e($errors->has('feature_amount') ? ' is-invalid' : ''); ?> form-control">
		</div>
		<div class="col-md-3">
        	<label for=""><?php echo e(__('adminstaticword.PreloaderEnable')); ?>: </label>
			<li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="preloader" type="checkbox" name="preloader_enable" <?php echo e($gsetting->preloader_enable == '1' ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="preloader"></label>
            </li>
            <input type="hidden"  name="free" value="0" for="preloader" id="preloader">
        </div>
        <div  class="col-md-3">
		            <label><?php echo e(__('adminstaticword.APPDebug')); ?>:</label>
		            <br>
		            <li class="tg-list-item">              
			            <input class="tgl tgl-skewed" id="debug" type="checkbox" name="APP_DEBUG" <?php echo e(env('APP_DEBUG') == true ? "checked" : ""); ?> >
			            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="debug"></label>
		            </li>
		            <input type="hidden"  name="free" value="0" for="debug" id="debug">
				</div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div >
						<label for=""><?php echo e(__('adminstaticword.WelcomeEmail')); ?>: </label>

						<li class="tg-list-item">              
				            <input class="tgl tgl-skewed" id="welmail" type="checkbox" name="w_email_enable" <?php echo e($gsetting->w_email_enable == '1' ? 'checked' : ''); ?> >
				            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="welmail"></label>
			            </li>
			            <input type="hidden"  name="free" value="0" for="welmail" id="welmail">
			          
					</div>
				</div>
				<div class="col-md-6">
					<div >
						<label for=""><?php echo e(__('adminstaticword.VerifyEmail')); ?>: </label>

						<li class="tg-list-item">              
				            <input class="tgl tgl-skewed" id="verify" type="checkbox" name="verify_enable" <?php echo e($gsetting->verify_enable == '1' ? 'checked' : ''); ?> >
				            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="verify"></label>
			            </li>
			            <input type="hidden"  name="free" value="0" for="verify" id="verify">
			          
					</div>
				</div>
			</div>

			<div>
	            <small>(If you enable it, a welcome email will be sent to user's register email id,<br> make sure you updated your mail setting in Site Setting >> Mail Settings before enable it.)</small>
      			<small class="text-danger"><?php echo e($errors->first('color')); ?></small> 
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-3">
	        	<label for=""><?php echo e(__('adminstaticword.BecomeAnInstructor')); ?>: </label>
				<li class="tg-list-item">              
		            <input class="tgl tgl-skewed" id="instructor" type="checkbox" name="instructor_enable" <?php echo e($gsetting->instructor_enable == '1' ? 'checked' : ''); ?> >
		            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="instructor"></label>
	            </li>
	            <input type="hidden"  name="free" value="0" for="instructor" id="instructor">
	        </div>
	        <div class="col-md-3">
	        	<label for=""><?php echo e(__('adminstaticword.CategoryMenu')); ?>: </label>
				<li class="tg-list-item">              
		            <input class="tgl tgl-skewed" id="category" type="checkbox" name="cat_enable" <?php echo e($gsetting->cat_enable == '1' ? 'checked' : ''); ?> >
		            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="category"></label>
	            </li>
	            <input type="hidden"  name="free" value="0" for="category" id="category">
	            <div>
		            <small>(If you enable it, Category menu will show on instructor Dashboard)</small>
	      			<small class="text-danger"><?php echo e($errors->first('color')); ?></small> 
				</div>
	        </div>

	    </div>
		
	</div>
	<hr>

	        <div class="row">
	        	<div class="col-md-6">
	        		
	        	<label for=""><?php echo e(__('Enable Zoom On Portal')); ?>: </label>
				<li class="tg-list-item">              
		            <input class="tgl tgl-skewed" id="zoom_enable" type="checkbox" name="zoom_enable" <?php echo e($gsetting->zoom_enable == 1 ? 'checked' : ''); ?> >
		            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="zoom_enable"></label>
	            </li>
	            <div>
		            <small>(Enable Live zoom meetings on portal)</small>
				</div>
	        
	        	</div>
	        	<div class="col-md-6">
			<label for="LIVE_URL">Live chart URL:<sup class="redstar">*</sup></label>
		  	<input placeholder="http://localhost/" name="LIVE_URL" type="text" class="<?php echo e($errors->has('LIVE_URL') ? ' is-invalid' : ''); ?> form-control" value="<?php echo e($gsetting->live_url); ?>" >
		  	<?php if($errors->has('LIVE_URL')): ?>
                <span class="text-danger invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('LIVE_URL')); ?></strong>
                </span>
            <?php endif; ?>
            <br>
		</div>
	        </div>
	<br>
	<br>
	
	<div class="box-footer">
		<button type="Submit" class="btn btn-lg col-md-3 btn-primary btn-md"><i class="fa fa-save"></i> <?php echo e(__('adminstaticword.Save')); ?></button>
	</div>

</form>
<?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/admin/setting/genral.blade.php ENDPATH**/ ?>