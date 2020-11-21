<form enctype="multipart/form-data" method="POST" action="{{ route('setting.store') }}">
	@csrf

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputDetails">{{ __('adminstaticword.TextLogo') }}:</label>
			    <li class="tg-list-item">
			        <input class="tgl tgl-skewed" id="opp" type="checkbox" name="project_logo" {{ $gsetting->logo_type == 'L' ? 'checked' : '' }}>
			        <label class="tgl-btn" data-tg-off="Text" data-tg-on="Logo" for="opp"></label>
			    </li>
			    <input type="hidden" name="free" value="0" for="opp" id="oppp">
		    </div>
		</div>
		<div class="col-md-6">
			<div class="row">

				@if ($errors->has('logo'))
				<div class="display-none" id="logo">
                    <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                </div>
                @endif
				<div class="col-md-6">
					<div class="form-group">
						<input type="file" name="logo" value="{{ $setting->logo }}" id="logo" class="{{ $errors->has('logo') ? ' is-invalid' : '' }} inputfile inputfile-1"/>
				<label for="logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{ __('adminstaticword.ChooseaLogo') }}</span></label>
				<span class="text-danger invalid-feedback" role="alert"></span>
					</div>
				 	  
				</div>
				<div class="col-md-4">
					@if($setting->logo !="")
						<div class="logo-settings">
							<img src="{{ asset('images/logo/'.$setting->logo) }}" alt="{{ $setting->logo }}" class="img-responsive">
						</div>
					@else
						<div class="alert alert-danger">
							{{ __('adminstaticword.Nologofound') }}
						</div>
					@endif
				</div>
			</div>
			<br>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="project_title">{{ __('adminstaticword.ProjectTitle') }}:<sup class="redstar">*</sup></label>
			  	<input value="{{ $setting->project_title }}" placeholder="Enter project title" name="project_title" type="text" class="{{ $errors->has('project_title') ? ' is-invalid' : '' }} form-control">
			  	@if ($errors->has('project_title'))
	                <span class="text-danger invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('project_title') }}</strong>
	                </span>
	            @endif
	        </div>
		</div>
		<div class="col-md-6">
			<div class="row">
				
				@if ($errors->has('favicon'))
                    <strong class="text-danger">{{ $errors->first('favicon') }}</strong>
                @endif
				<div class="col-md-6">
					<label for="exampleInputDetails">{{ __('adminstaticword.Favicon') }}</label>- <p class="inline info">Size: 35x35</p>	
					<input type="file" name="favicon" id="favi" class="{{ $errors->has('favicon') ? ' is-invalid' : '' }} inputfile inputfile-1"/>

					<label for="favi"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{ __('adminstaticword.Chooseafavicon') }}</span></label>
				</div>
				<div class="col-md-4">
					@if($setting->favicon !="")
						<div class="favicon-settings">
							<img src="{{ asset('images/favicon/'.$setting->favicon) }}" alt="{{ $setting->favicon }}" class="img-responsive">
						</div>
					@else
						<div class="alert alert-danger">
							{{ __('adminstaticword.NoFaviconfound') }}
						</div>
					@endif

				</div>
			</div>
			<br>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<label for="APP_URL">{{ __('adminstaticword.APPURL') }}:<sup class="redstar">*</sup></label>
		  	<input placeholder="http://localhost/" name="APP_URL" type="text" class="{{ $errors->has('APP_URL') ? ' is-invalid' : '' }} form-control" value="{{ $env_files['APP_URL'] }}" >
		  	@if ($errors->has('APP_URL'))
                <span class="text-danger invalid-feedback" role="alert">
                    <strong>{{ $errors->first('APP_URL') }}</strong>
                </span>
            @endif
            <br>
		</div>
		<div class="col-md-6">
			<label for="phone">{{ __('adminstaticword.Contact') }}:<sup class="redstar">*</sup></label>
            <input value="{{ $setting->default_phone }}" name="default_phone" placeholder="Enter contact no." type="text" class="{{ $errors->has('default_phone') ? ' is-invalid' : '' }} form-control" required>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
            <label for="cpy_txt">{{ __('adminstaticword.CopyrightText') }}:<sup class="redstar">*</sup></label>
            <input value="{{ $setting->cpy_txt }}" name="cpy_txt" placeholder="Enter Copyright Text" type="text" required class="{{ $errors->has('cpy_txt') ? ' is-invalid' : '' }} form-control">
		</div>
		<div class="col-md-6">
			<label for="wel_email">{{ __('adminstaticword.Email') }}:<sup class="redstar">*</sup></label>
            <input value="{{ $setting->wel_email }}" name="wel_email" placeholder="Enter your email" type="text" class="{{ $errors->has('wel_email') ? ' is-invalid' : '' }} form-control" required>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-6">
			<label for="exampleInputDetails">{{ __('adminstaticword.Address') }}:<sup class="redstar">*</sup></label>
            <textarea name="default_address" rows="3" class="form-control" placeholder="Enter your address" required>{{ $setting->default_address }}</textarea>
		</div>
		<div class="col-md-6">
			<br>
			<div class="row">
				<div  class="col-md-6">
					<label for="">{{ __('adminstaticword.RightClick') }}: </label>
					<br>
					<li class="tg-list-item">              
			            <input class="tgl tgl-skewed" id="cb3" type="checkbox" name="rightclick" {{ $gsetting->rightclick == '1' ? 'checked' : '' }} >
			            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="cb3"></label>
		            </li>
		            <input type="hidden"  name="free" value="0" for="cb3" id="cb3"> 
				</div>
				<div  class="col-md-6">
					<label for="">{{ __('adminstaticword.InspectElement') }}: </label>
					<br>
		    		<li class="tg-list-item">              
			            <input class="tgl tgl-skewed" id="cb4" type="checkbox" name="inspect" {{ $setting->inspect == '1' ? 'checked' : '' }} >
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
            <input min="1" class="form-control" name="feature_amount" type="number" value="{{ $setting->feature_amount }}" id="duration"  placeholder="Enter amount to feature course ex: 100" class="{{ $errors->has('feature_amount') ? ' is-invalid' : '' }} form-control">
		</div>
		<div class="col-md-3">
        	<label for="">{{ __('adminstaticword.PreloaderEnable') }}: </label>
			<li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="preloader" type="checkbox" name="preloader_enable" {{ $gsetting->preloader_enable == '1' ? 'checked' : '' }} >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="preloader"></label>
            </li>
            <input type="hidden"  name="free" value="0" for="preloader" id="preloader">
        </div>
        <div  class="col-md-3">
		            <label>{{ __('adminstaticword.APPDebug') }}:</label>
		            <br>
		            <li class="tg-list-item">              
			            <input class="tgl tgl-skewed" id="debug" type="checkbox" name="APP_DEBUG" {{ env('APP_DEBUG') == true ? "checked" : "" }} >
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
						<label for="">{{ __('adminstaticword.WelcomeEmail') }}: </label>

						<li class="tg-list-item">              
				            <input class="tgl tgl-skewed" id="welmail" type="checkbox" name="w_email_enable" {{ $gsetting->w_email_enable == '1' ? 'checked' : '' }} >
				            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="welmail"></label>
			            </li>
			            <input type="hidden"  name="free" value="0" for="welmail" id="welmail">
			          
					</div>
				</div>
				<div class="col-md-6">
					<div >
						<label for="">{{ __('adminstaticword.VerifyEmail') }}: </label>

						<li class="tg-list-item">              
				            <input class="tgl tgl-skewed" id="verify" type="checkbox" name="verify_enable" {{ $gsetting->verify_enable == '1' ? 'checked' : '' }} >
				            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="verify"></label>
			            </li>
			            <input type="hidden"  name="free" value="0" for="verify" id="verify">
			          
					</div>
				</div>
			</div>

			<div>
	            <small>(If you enable it, a welcome email will be sent to user's register email id,<br> make sure you updated your mail setting in Site Setting >> Mail Settings before enable it.)</small>
      			<small class="text-danger">{{ $errors->first('color') }}</small> 
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-3">
	        	<label for="">{{ __('adminstaticword.BecomeAnInstructor') }}: </label>
				<li class="tg-list-item">              
		            <input class="tgl tgl-skewed" id="instructor" type="checkbox" name="instructor_enable" {{ $gsetting->instructor_enable == '1' ? 'checked' : '' }} >
		            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="instructor"></label>
	            </li>
	            <input type="hidden"  name="free" value="0" for="instructor" id="instructor">
	        </div>
	        <div class="col-md-3">
	        	<label for="">{{ __('adminstaticword.CategoryMenu') }}: </label>
				<li class="tg-list-item">              
		            <input class="tgl tgl-skewed" id="category" type="checkbox" name="cat_enable" {{ $gsetting->cat_enable == '1' ? 'checked' : '' }} >
		            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="category"></label>
	            </li>
	            <input type="hidden"  name="free" value="0" for="category" id="category">
	            <div>
		            <small>(If you enable it, Category menu will show on instructor Dashboard)</small>
	      			<small class="text-danger">{{ $errors->first('color') }}</small> 
				</div>
	        </div>

	    </div>
		
	</div>
	<hr>

	        <div class="row">
	        	<div class="col-md-6">
	        		
	        	<label for="">{{ __('Enable Zoom On Portal') }}: </label>
				<li class="tg-list-item">              
		            <input class="tgl tgl-skewed" id="zoom_enable" type="checkbox" name="zoom_enable" {{ $gsetting->zoom_enable == 1 ? 'checked' : '' }} >
		            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="zoom_enable"></label>
	            </li>
	            <div>
		            <small>(Enable Live zoom meetings on portal)</small>
				</div>
	        
	        	</div>
	        	<div class="col-md-6">
			<label for="LIVE_URL">Live chart URL:<sup class="redstar">*</sup></label>
		  	<input placeholder="http://localhost/" name="LIVE_URL" type="text" class="{{ $errors->has('LIVE_URL') ? ' is-invalid' : '' }} form-control" value="{{ $gsetting->live_url }}" >
		  	@if ($errors->has('LIVE_URL'))
                <span class="text-danger invalid-feedback" role="alert">
                    <strong>{{ $errors->first('LIVE_URL') }}</strong>
                </span>
            @endif
            <br>
		</div>
	        </div>
	<br>
	<br>
	
	<div class="box-footer">
		<button type="Submit" class="btn btn-lg col-md-3 btn-primary btn-md"><i class="fa fa-save"></i> {{ __('adminstaticword.Save') }}</button>
	</div>

</form>
