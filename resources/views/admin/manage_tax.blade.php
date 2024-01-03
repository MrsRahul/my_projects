@extends('admin/layout')
@section('page_title','Manage Tax')
@section('tax_select','active')
@section('container')
<h1>Tax</h1>
<a href="{{url('admin/tax')}}">
<button class="btn btn-primary" type="button">Back</button>
</a>
<div class="row mt-3">
	<div class="col-md-12">
		<form action="{{route('tax.manage_tax')}}" method="post">
			@csrf
			<div class="form-group">
				<label>Tax Description</label>
				<input type="text" name="tax_desc" value="{{$tax_desc}}" class="form-control">
			@error('tax_desc')
			   <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
			@enderror
			</div>

			<div class="form-group">
				<label>Tax Value</label>
				<input type="text" name="tax_value" value="{{$tax_value}}" class="form-control">
			@error('tax_value')
			   <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
			@enderror
			</div>
						
			<button class="btn btn-secondary" type="submit">Add Tax</button>
			<input type="hidden" name="id" value="{{$id}}">
		</form>
	</div>	
</div>	

@endsection