@extends('admin/layout')
@section('page_title','Manage Category')
@section('category_select','active')
@section('container')
<h1>Category</h1>
<a href="{{url('admin/category')}}">
<button class="btn btn-primary" type="button">Back</button>
</a>
<div class="row mt-3">
	<div class="col-md-12">
		<form action="{{route('category.manage_category')}}" method="post" enctype="multipart/form-data">
			<div class="card">
				<div class="card-body">
			@csrf
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Category Name</label>
						<input required type="text" name="category_name" value="{{$category_name}}" class="form-control">
						@error('category_name')
						   <div class="alert alert-danger" role="alert">
			                  {{$message}}
			                </div>
						@enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Parent Category</label>
						<select required id="parent_category_id" name="parent_category_id" class="form-control">
							<option value="0" for="parent_category_id">--Select Category--</option>
							@foreach($par_category_id as $list)
								@if($parent_category_id == $list->id)
								<option selected value="{{$list->id}}">{{$list->category_name}}</option>
								@else
								<option value="{{$list->id}}">{{$list->category_name}}</option>
								@endif
							@endforeach
						</select>						
						@error('parent_category_id')
						<div class="alert alert-danger" role="alert">
		                  {{$message}}
		                </div>
						@enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Category Slug</label>
						<input type="text" name="category_slug" value="{{$category_slug}}" class="form-control">
						@error('category_slug')
						<div class="alert alert-danger" role="alert">
		                  {{$message}}
		                </div>
						@enderror
					</div>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Category Image</label>
						<input type="file" name="category_image"  class="form-control">
						 @if($category_image!="")
							<img src="{{asset('storage/media/category/'.$category_image)}}" height="50px;" width="50px;">
						@endif
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Show In Home</label>
						<input type="checkbox" name="is_home" {{$is_home_selected}}>	
					</div>
				</div>
			</div>
			
						
			<button class="btn btn-secondary" type="submit">Add Category</button>
			<input type="hidden" name="id" value="{{$id}}">
		</div>
	</div>
		</form>
	</div>	
</div>	

@endsection