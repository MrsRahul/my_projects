@extends('admin/layout')
@section('page_title','Manage Brand')
@section('brand_select','active')
@section('container')
<h1>Brand</h1>
<a href="{{url('admin/brand')}}">
<button class="btn btn-primary" type="button">Back</button>
</a>

<div class="row mt-3">
	<div class="col-md-12">
		<form action="{{route('brand.manage_brand')}}" method="post" enctype="multipart/form-data">
			<div class="card">
				<div class="card-body">
			@csrf
			<div class="row">
				<div class="col-md-8"></div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Show In Home</label>
						<input type="checkbox" name="is_home" {{$is_home_selected}}>	
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" value="{{$name}}" class="form-control">
			@error('name')
			   <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
			@enderror
			</div>

			<div class="form-group">
				<label>Image</label>
				<input type="file" name="image"  class="form-control">
				@if($image!="")
					<img src="{{asset('storage/media/brand/'.$image)}}" height="50px;" width="50px;">
				@endif
			@error('image')
			   <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
			@enderror
			</div>
						
			<button class="btn btn-secondary" type="submit">Add Brand</button>
			<input type="hidden" name="id" value="{{$id}}">
		</div>
	    </div>
		</form>
	</div>	
</div>	

@endsection