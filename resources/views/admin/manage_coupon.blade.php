@extends('admin/layout')
@section('page_title','Manage Coupon')
@section('coupon_select','active')
@section('container')
<h1>Coupon</h1>
<a href="{{url('admin/coupon')}}">
<button class="btn btn-primary" type="button">Back</button>
</a>
<div class="row mt-3">
	<div class="col-md-12">
		<form action="{{route('coupon.manage_coupon')}}" method="post">
			<div class="card">
				<div class="card-body">
			@csrf
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Coupon Title</label>
						<input type="text" name="title" value="{{$title}}" class="form-control">
					@error('title')
					   <div class="alert alert-danger" role="alert">
		                  {{$message}}
		                </div>
					@enderror
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Code</label>
						<input type="text" name="code" value="{{$code}}" class="form-control">
						@error('code')
						<div class="alert alert-danger" role="alert">
		                  {{$message}}
		                </div>
						@enderror
					</div>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Value</label>
						<input type="text" name="value" value="{{$value}}" class="form-control">
						@error('value')
						<div class="alert alert-danger" role="alert">
		                  {{$message}}
		                </div>
						@enderror
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>Type</label>
						<select id="type" name="type" class="form-control">
							@if($type == 'Value')
							<option value="Value" selected>Value</option>
							<option value="Per">Per</option>
							@elseif($type == 'Per')
							<option value="Value">Value</option>
							<option value="Per" selected>Per</option>
							@else
							<option value="Value">Value</option>
							<option value="Per">Per</option>
							@endif
						</select>
						@error('type')
						<div class="alert alert-danger" role="alert">
		                  {{$message}}
		                </div>
						@enderror
					</div>
				</div>				
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Min Order Amt</label>
						<input type="text" name="min_order_amt" value="{{$min_order_amt}}" class="form-control">
						@error('min_order_amt')
						<div class="alert alert-danger" role="alert">
		                  {{$message}}
		                </div>
						@enderror
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>Is One Time</label>
						<select id="type" name="is_one_time" class="form-control">
							@if($is_one_time == '1')
							<option value="1" selected>Yes</option>
							<option value="0">No</option>
							@else
							<option value="1">Yes</option>
							<option value="0" selected>No</option>
							@endif
						</select>
						@error('is_one_time')
						<div class="alert alert-danger" role="alert">
		                  {{$message}}
		                </div>
						@enderror
					</div>
				</div>				
			</div>		
						
			<button class="btn btn-secondary" type="submit">Add Coupon</button>
			<input type="hidden" name="id" value="{{$id}}">
		</div>
	</div>
		</form>
	</div>	
</div>	

@endsection