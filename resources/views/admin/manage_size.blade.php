@extends('admin/layout')
@section('page_title','Manage Size')
@section('size_select','active')
@section('container')
<h1>Size</h1>
<a href="{{url('admin/size')}}">
<button class="btn btn-primary" type="button">Back</button>
</a>
<div class="row mt-3">
	<div class="col-md-12">
		<form action="{{route('size.manage_size')}}" method="post">
			@csrf
			<div class="form-group">
				<label>Size Title</label>
				<input type="text" name="size" value="{{$size}}" class="form-control">
			@error('size')
			   <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
			@enderror
			</div>
						
			<button class="btn btn-secondary" type="submit">Add Size</button>
			<input type="hidden" name="id" value="{{$id}}">
		</form>
	</div>	
</div>	

@endsection