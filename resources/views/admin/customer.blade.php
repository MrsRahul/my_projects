@extends('admin/layout')
@section('page_title','Customers')
@section('customer_select','active')
@section('container')
<div class="alert alert-success" role="alert">
  {{session('message')}}
</div>
<h1>Customer</h1>

<div class="row mt-3">
	<div class="col-md-12">
		<table class="table table-borderless table-data3">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>City</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $dat)
				<tr>
					<td>{{$dat->id}}</td>
					<td>{{$dat->name}}</td>
					<td>{{$dat->email}}</td>
					<td>{{$dat->mobile}}</td>
					<td>{{$dat->city}}</td>
					<td>
						<a href="{{url('admin/customers/show/')}}/{{$dat->id}}"><button type="button" class="btn btn-primary">Show</button>
						</a>
						@if($dat->status =='1')
						<a href="{{url('admin/customers/status/0')}}/{{$dat->id}}"><button type="button" class="btn btn-success">Active</button>
						</a>
						@else
						<a href="{{url('admin/customers/status/1')}}/{{$dat->id}}"><button type="button" class="btn btn-warning">Deactive</button>
						</a>
						@endif
					</td>
					
			    </tr>
			    @endforeach
			</tbody>			
		</table>
	</div>	
</div>	

@endsection