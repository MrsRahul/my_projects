@extends('admin/layout')
@section('page_title','Category')
@section('category_select','active')
@section('container')
<div class="alert alert-success" role="alert">
  {{session('message')}}
</div>
<h1>Category</h1>
<a href="category/manage_category">
<button class="btn btn-success" type="button">Add Category</button>
</a>
<div class="row mt-3">
	<div class="col-md-12">
		<table class="table table-borderless table-data3">
			<thead>
				<tr>
					<th>ID</th>
					<th>Category Name</th>
					<th>Category Slug</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $dat)
				<tr>
					<td>{{$dat->id}}</td>
					<td>{{$dat->category_name}}</td>
					<td>{{$dat->category_slug}}</td>
					<td>
						@if($dat->status==1)
						<a href="{{url('admin/category/status/0')}}/{{$dat->id}}"><button type="button" class="btn btn-primary">Active</button>
						</a>
						@elseif($dat->status==0)
						<a href="{{url('admin/category/status/1')}}/{{$dat->id}}"><button type="button" class="btn btn-warning">Deactive</button>
						</a>
						@endif
					</td>
					<td>
						<a href="{{url('admin/category/manage_category/')}}/{{$dat->id}}"><button type="button" class="btn btn-success">Edit</button>
						</a>
						
						<a href="{{url('admin/category/delete/')}}/{{$dat->id}}"><button type="button" class="btn btn-danger">Delete</button>
						</a>
						
					</td>
			    </tr>
			    @endforeach
			</tbody>			
		</table>
	</div>	
</div>	

@endsection