@extends('admin/layout')
@section('page_title','Coupon')
@section('coupon_select','active')
@section('container')
<div class="alert alert-success" role="alert">
  {{session('message')}}
</div>
<h1>Coupon</h1>
<a href="{{url('admin/coupon/manage_coupon')}}">
<button class="btn btn-success" type="button">Add Coupon</button>
</a>
<div class="row mt-3">
	<div class="col-md-12">
		<table class="table table-borderless table-data3">
			<thead>
				<tr>
					<th>ID</th>
					<th>Coupon Title</th>
					<th>Code</th>
					<th>Value</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $dat)
				<tr>
					<td>{{$dat->id}}</td>
					<td>{{$dat->title}}</td>
					<td>{{$dat->code}}</td>
					<td>{{$dat->value}}</td>
					<td>
						@if($dat->status =='1')
						<a href="{{url('admin/coupon/status/0')}}/{{$dat->id}}"><button type="button" class="btn btn-success">Active</button>
						</a>
						@else
						<a href="{{url('admin/coupon/status/1')}}/{{$dat->id}}"><button type="button" class="btn btn-warning">Deactive</button>
						</a>
						@endif
					</td>
					<td>
						<a href="{{url('admin/coupon/manage_coupon/')}}/{{$dat->id}}"><button type="button" class="btn btn-primary">Edit</button>
						</a>
						<a href="{{url('admin/coupon/delete/')}}/{{$dat->id}}"><button type="button" class="btn btn-danger">Delete</button>
						</a>
						
					</td>
			    </tr>
			    @endforeach
			</tbody>			
		</table>
	</div>	
</div>	

@endsection