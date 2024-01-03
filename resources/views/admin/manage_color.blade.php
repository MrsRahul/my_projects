@extends('admin/layout')
@section('page_title','Manage Color')
@section('color_select','active')
@section('container')
<h1>Color</h1>
<a href="{{url('admin/color')}}">
<button class="btn btn-primary" type="button">Back</button>
</a>
<div class="row mt-3">
	<div class="col-md-12">
		<form action="{{route('color.manage_color')}}" method="post">
			@csrf
			<div class="form-group">
				<label>Color</label>
				<input type="text" name="color" value="{{$color}}" class="form-control">
			@error('color')
			   <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
			@enderror
			</div>
						
			<button class="btn btn-secondary" type="submit">Add Color</button>
			<input type="hidden" name="id" value="{{$id}}">
		</form>
	</div>	
</div>	

@endsection