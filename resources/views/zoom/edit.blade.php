@extends('admin/layouts.master')
@section('title', 'Edit Zoom Meeting : '.$response['id'])
@section('body')
<section class="content">
	<div class="box">

		<div class="box-header with-border">
			<div class="box-title">
				Edit Zoom Meeting : <b>{{ $response['id'] }}</b>
			</div>
		</div>

		<div class="box-body">
			<form autocomplete="off" action="{{ route('zoom.update',$response['id']) }}" method="POST">
					@csrf
					<div class="form-group">
						<label>
							Meeting Topic:<sup class="redstar">*</sup>
						</label>

						<input value="{{ $response['topic'] }}" type="text" name="topic" placeholder="Ex. My Meeting" class="form-control" required>
					</div>

					<div class="form-group">
						<label>
							Meeting Start Time:<sup class="redstar">*</sup>
						</label>

                        <div class='input-group date' id='datetimepicker1'>
                          <input value="{{ date('d-m-Y | h:i:s A',strtotime($response['start_time'])) }}" name="start_time" type='text' class="form-control" required />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
					</div>

					<div class="form-group">
						<label>
							Duration:<sup class="redstar">*</sup>
						</label>

						<input value="{{ $response['duration'] }}" placeholder="enter in mins eg 60" type="number" min="1" name="duration" class="form-control" required>
					</div>

					<div class="form-group">
						<div class="eyeCy">
							<label>
								Meeting Password: (Optional)
							</label>

							<input  value="{{ isset($response['password']) ? $response['password'] : "" }}" id="password" type="password" name="password" class="form-control">
							<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						</div>
					</div>

					<div class="form-group">
						<label>
							Meeting Agenda:
						</label>

						<input value="{{ $response['agenda'] }}" type="text" name="agenda" placeholder="Meeting Agenda" class="form-control">
					</div>

					<div class="panel panel-default">
						<div class="panel-body">
							<h5 class="panel-title">Meeting Setting :</h5>
							<hr>
							<div class="custom-control custom-checkbox">
							  <input {{ $response['settings']['host_video'] == true ? "checked" : "" }} name="host_video" type="checkbox" class="custom-control-input" id="host_video">
							  <label class="custom-control-label" for="host_video">Enable Host Video</label>
							</div>

							<div class="custom-control custom-checkbox">
							  <input {{ $response['settings']['participant_video'] == true ? "checked" : "" }} name="participant_video" type="checkbox" class="custom-control-input" id="participant_video">
							  <label class="custom-control-label" for="participant_video">Enable Participant Video</label>
							</div>

							<div class="custom-control custom-checkbox">
							  <input {{ $response['settings']['join_before_host'] == true ? "checked" : "" }} name="join_before_host" type="checkbox" class="custom-control-input" id="join_before_host">
							  <label class="custom-control-label" for="join_before_host">Join before host?</label>
							</div>

							<div class="custom-control custom-checkbox">
							  <input {{ $response['settings']['mute_upon_entry'] == true ? "checked" : "" }} name="mute_upon_entry" type="checkbox" class="custom-control-input" id="mute_upon_entry">
							  <label class="custom-control-label" for="mute_upon_entry">Mute Upon Entry?</label>
							</div>

							<div class="custom-control custom-checkbox">
							  <input {{ $response['settings']['registrants_email_notification'] == true ? "checked" : "" }} name="registrants_email_notification" type="checkbox" class="custom-control-input" id="registrants_email_notification">
							  <label class="custom-control-label" for="registrants_email_notification">Registrants email notification?</label>
							</div>
						</div>
	
						
					</div>
					<hr>
					<div class="m-1 form-group">
							<button class="btn btn-success btn-md">Update Meeting</button>
						</div>

				</form>
		</div>
	</div>
</section>
@endsection
@section('script')
	<script>
		 $('#datetimepicker1').datetimepicker({
		    format: 'YYYY-MM-DD HH:mm:ss',
		  });

		   $(".toggle-password").on('click', function() {
		    $(this).toggleClass("fa-eye fa-eye-slash");
		    var input = $($(this).attr("toggle"));
		    if(input.attr("type") == "password") {
		      input.attr("type", "text");
		    } else {
		      input.attr("type", "password");
		    }
		  });
	</script>
@endsection