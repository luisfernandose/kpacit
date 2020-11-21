@extends("admin/layouts.master")
@section('title','All States')
@section("body")

<section class="content">
	@include('admin.message')
	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-primary" >
	      <div class="box-header">
	        <h3 class="box-title">{{ __('adminstaticword.State') }}</h3>
	        <div class="panel-heading">
	            <a href=" {{url('admin/state/create')}} " class="btn btn-info btn-sm">+ {{ __('adminstaticword.Add') }} {{ __('adminstaticword.State') }}</a> 
	        </div>       
	        <div class="box-body">
	        	<div class="table-responsive">
	          	<table id="example1" class="table table-bordered table-striped table-responsive">
		          	<thead>
			            <tr class="table-heading-row">
			              <th>#</th>
			              <th>{{ __('adminstaticword.State') }}</th>
			              <th>{{ __('adminstaticword.Country') }}</th>
			              <th>{{ __('adminstaticword.Delete') }}</th>
			            </tr>
		          	</thead>
		          	<tbody>
						<?php $i=0;?> 
		                @foreach ($states as $state)

			                <tr>
			                  <?php $i++;?>
			                  <td><?php echo $i;?></td>
			                  <td>{{ $state->name }}</td>
			                  <td>{{ $state->country->nicename }}</td>
			                  
			                  <td><form  method="post" action="{{url('admin/state/'.$state->id)}}" data-parsley-validate class="form-horizontal form-label-left">
			                      {{ csrf_field() }}
			                      {{ method_field('DELETE') }}
			                       <button  type="submit" class="btn btn-danger" onclick="return confirm('Delete This User..?)" ><i class="fa fa-fw fa-trash-o"></i></button>
			                       </form>
			                   </td>
			                      
			                  </td>
			                </tr>
		                @endforeach
		          	</tbody>
		        </table>
		    	</div>
      		</div>
	    </div>
	  </div>
	</div>
</section>
@endsection

  

