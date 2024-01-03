@extends('admin/layout')
@section('page_title','Product')
@section('product_select','active')
@section('container')
<div class="alert alert-success" role="alert">
  {{session('message')}}
</div>
<h1>Product</h1>
<a href="{{url('admin/product/manage_product')}}">
<button class="btn btn-success" type="button">Add Product</button>
</a>
<div class="row mt-3">
	<div class="col-md-12">
		<table class="table table-borderless table-data3">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Slug</th>
					<th>Image</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $dat)
				<tr>
					<td>{{$dat->id}}</td>
					<td>{{$dat->name}}</td>
					<td>{{$dat->slug}}</td>
					<td><img src="{{asset('storage/media/'.$dat->image)}}" height="50px;" width="50px;"></td>
					<td>
						@if($dat->status =='1')
						<a href="{{url('admin/product/status/0')}}/{{$dat->id}}"><button type="button" class="btn btn-success">Active</button>
						</a>
						@else
						<a href="{{url('admin/product/status/1')}}/{{$dat->id}}"><button type="button" class="btn btn-warning">Deactive</button>
						</a>
						@endif
					</td>
					<td>
						<a href="{{url('admin/product/manage_product/')}}/{{$dat->id}}"><button type="button" class="btn btn-success">Edit</button>
						</a>                        
                        
						<a href="{{url('admin/product/delete/')}}/{{$dat->id}}"><button type="button" class="btn btn-danger">Delete</button>
						</a>						
					</td>
			    </tr>
			    @endforeach
			</tbody>			
		</table>
	</div>	
</div>	

@endsection