@extends('admin/layout')
@section('page_title','Tax')
@section('tax_select','active')
@section('container')
<div class="alert alert-success" role="alert">
  {{session('message')}}
</div>
<h1>Tax</h1>
<a href="{{url('admin/tax/manage_tax')}}">
<button class="btn btn-success" type="button">Add Tax</button>
</a>
<div class="row mt-3">
	<div class="col-md-12">
		<table class="table table-borderless table-data3">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tax Description</th>
					<th>Tax Value</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $dat)
				<tr>
					<td>{{$dat->id}}</td>
					<td>{{$dat->tax_desc}}</td>
					<td>{{$dat->tax_value}}</td>
					<td>
						@if($dat->status =='0')
						<a href="{{url('admin/tax/status/1')}}/{{$dat->id}}"><button type="button" class="btn btn-success">Active</button>
						</a>
						@else
						<a href="{{url('admin/tax/status/0')}}/{{$dat->id}}"><button type="button" class="btn btn-warning">Deactive</button>
						</a>
						@endif
					</td>
					<td>
						<a href="{{url('admin/tax/manage_tax/')}}/{{$dat->id}}"><button type="button" class="btn btn-success">Edit</button>
						</a>                        
                        
						<a href="{{url('admin/tax/delete/')}}/{{$dat->id}}"><button type="button" class="btn btn-danger">Delete</button>
						</a>
						
					</td>
			    </tr>
			    @endforeach
			</tbody>			
		</table>
	</div>	
</div>	

@endsection