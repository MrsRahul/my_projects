@extends('admin/layout')
@section('page_title','Show Customers Detail')
@section('customer_select','active')
@section('container')
<div class="alert alert-success" role="alert">
  {{session('message')}}
</div>
<h1>Customers Detail</h1>

<div class="row mt-3">
	<div class="col-md-8">
		<table class="table table-borderless table-data3">
			<thead>
				<tr>
					<th>Field</th>
					<th>Value</th>					
				</tr>
			</thead>
			<tbody>
				<tr>
				  <td><strong>Name</strong></td>
				  <td>{{$customer_list->name}}</td>
			  </tr>
				<tr>
				  <td><strong>Email</strong></td>
				  <td>{{$customer_list->email}}</td>
			  </tr>
			  <tr>
				  <td><strong>Mobile</strong></td>
				  <td>{{$customer_list->mobile}}</td>
			  </tr>
			  <tr>
				  <td><strong>Address</strong></td>
				  <td>{{$customer_list->address}}</td>
			  </tr>
			  <tr>
				  <td><strong>City</strong></td>
				  <td>{{$customer_list->city}}</td>
			  </tr>	
			  <tr>
				  <td><strong>State</strong></td>
				  <td>{{$customer_list->state}}</td>
			  </tr>
				<tr>
				  <td><strong>Zip</strong></td>
				  <td>{{$customer_list->zip}}</td>
			  </tr>
			  <tr>
				  <td><strong>Company</strong></td>
				  <td>{{$customer_list->company}}</td>
			  </tr>
			  <tr>
				  <td><strong>GST Number</strong></td>
				  <td>{{$customer_list->gstin}}</td>
			  </tr>
			  <tr>
				  <td><strong>Created On</strong></td>
				  <td>{{\Carbon\Carbon::parse($customer_list->created_at)->format('d-m-Y H:i:s')}}</td>
			  </tr>
			  <tr>
				  <td><strong>Updated On</strong></td>
				  <td>{{\Carbon\Carbon::parse($customer_list->updated_at)->format('d-m-Y H:i:s')}}</td>
			  </tr>				
			</tbody>			
		</table>
	</div>	
</div>	

@endsection