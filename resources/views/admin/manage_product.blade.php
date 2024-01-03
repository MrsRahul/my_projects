@extends('admin/layout')
@section('page_title','Manage Product')
@section('product_select','active')
@section('container')

@if($id>0)
{{$img_required=""}}
@else
{{$img_required="required"}}
@endif
<h1>Manage Product</h1>

<div class="alert alert-danger" role="alert">
  {{session('sku_error')}}
</div>

@error('attr_image.*')
<div class="alert alert-danger" role="alert">
  {{$message}}
</div>
@enderror

<a href="{{url('admin/product')}}">
<button class="btn btn-secondary" type="button">Back</button>
</a>
<div class="row mt-3">
	<div class="col-md-12">
		<form action="{{route('product.manage_product')}}" enctype="multipart/form-data" method="post">
			<div class="card">
				<div class="card-body">
			@csrf
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" value="{{$name}}" class="form-control" required>
			@error('name')
			   <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
			@enderror
			</div>
			<div class="form-group">
				<label>Slug</label>
				<input type="text" name="slug" value="{{$slug}}" class="form-control" required>
			@error('slug')
			   <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
			@enderror
			</div>
			<div class="form-group">
				<label>Category Id</label>
				<select id="category_id" name="category_id" class="form-control">
					<option for="category_id">--Select Category--</option>
					@foreach($category as $list)
						@if($category_id == $list->id)
						<option selected value="{{$list->id}}">{{$list->category_name}}</option>
						@else
						<option value="{{$list->id}}">{{$list->category_name}}</option>
						@endif
					@endforeach
				</select>
				
			@error('category_id')
			   <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
			@enderror
			</div>
			<div class="form-group">
				<label>Image</label>
				<input type="file" name="image"  class="form-control" {{$img_required}}>
				@if($image!="")
				 <img src="{{asset('storage/media/'.$image)}}" height="50px;" width="50px;">
				@endif

			@error('image')
			   <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
			@enderror
			</div>
			<div class="form-group">
				<label>brand</label>
				<input type="text" name="brand" value="{{$brand}}" class="form-control" required>
			@error('brand')
			   <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
			@enderror
			</div>
			<div class="form-group">
				<label>Model</label>
				<input type="text" name="model" value="{{$model}}" class="form-control" required>
			@error('model')
			   <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
			@enderror
			</div>
			<div class="form-group">
				<label>Short Desc</label>
				<textarea id="short_desc" name="short_desc" class="form-control" required>{{$short_desc}}</textarea>
		
				@error('short_desc')
				   <div class="alert alert-danger" role="alert">
	                  {{$message}}
	                </div>
				@enderror
			</div>
			<div class="form-group">
				<label>Desc</label>
				<textarea id="desc" name="desc" class="form-control" required>{{$desc}}</textarea>
		
				@error('desc')
				   <div class="alert alert-danger" role="alert">
	                  {{$message}}
	                </div>
				@enderror
			</div>
			<div class="form-group">
				<label>Keywords</label>
				<textarea id="keywords" name="keywords" class="form-control" required>{{$keywords}}</textarea>
		
				@error('keywords')
				   <div class="alert alert-danger" role="alert">
	                  {{$message}}
	                </div>
				@enderror
			</div>

			<div class="form-group">
				<label>Technical Specification</label>
				<textarea id="technical_specification" name="technical_specification" class="form-control" required>{{$technical_specification}}</textarea>
		
				@error('technical_specification')
				   <div class="alert alert-danger" role="alert">
	                  {{$message}}
	                </div>
				@enderror
			</div>
			<div class="form-group">
				<label>Uses</label>
				<textarea id="uses" name="uses" class="form-control" required>{{$uses}}</textarea>
		
				@error('uses')
				   <div class="alert alert-danger" role="alert">
	                  {{$message}}
	                </div>
				@enderror
			</div>
			<div class="form-group">
				<label>Warranty</label>
				<textarea id="warranty" name="warranty" class="form-control" required>{{$warranty}}</textarea>
		
				@error('warranty')
				   <div class="alert alert-danger" role="alert">
	                  {{$message}}
	                </div>
				@enderror
			</div>
			<div class="form-group">
				<div class="row">
				<div class="col-md-8">
					<label>Lead Time</label>
			    <input type="text" name="lead_time" value="{{$lead_time}}" class="form-control" required>
					@error('lead_time')
					   <div class="alert alert-danger" role="alert">
		                  {{$message}}
		                </div>
					@enderror
				</div>
				<div class="col-md-4">
					<label>Tax Id</label>
					<select id="tax_id" name="tax_id" class="form-control" >
						<option value="">Select Tax</option>
						@foreach($taxs as $list)
						@if($tax_id == $list->id)
						<option selected value="{{$list->id}}">{{$list->tax_desc}}</option>
						@else
						<option value="{{$list->id}}">{{$list->tax_desc}}</option>
						@endif	
					
						@endforeach								
					</select>
				</div>
				</div>				
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						<label>Is Promo</label>
						<select id="is_promo" name="is_promo" class="form-control">
							@if($is_promo =='1')
							<option value="1" selected>Yes</option>
							<option value="0">No</option>
							@else
							<option value="1">Yes</option>
							<option value="0" selected>No</option>
							@endif
						</select>
					</div>
					<div class="col-md-3">
						<label>Is Featured</label>
						<select id="is_featured" name="is_featured" class="form-control">
							@if($is_featured =='1')
							<option value="1" selected>Yes</option>
							<option value="0">No</option>
							@else
							<option value="1">Yes</option>
							<option value="0" selected>No</option>
							@endif
						</select>
					</div>
					<div class="col-md-3">
						<label>Is Discounted</label>
						<select id="is_discounted" name="is_discounted" class="form-control">
							@if($is_discounted =='1')
							<option value="1" selected>Yes</option>
							<option value="0">No</option>
							@else
							<option value="1">Yes</option>
							<option value="0" selected>No</option>
							@endif
						</select>
					</div>
					<div class="col-md-3">
						<label>Is Tranding</label>
						<select id="is_tranding" name="is_tranding" class="form-control">
							@if($is_tranding =='1')
							<option value="1" selected>Yes</option>
							<option value="0">No</option>
							@else
							<option value="1">Yes</option>
							<option value="0" selected>No</option>
							@endif
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<h1>Product Attributes</h1>
            <div class="col-md-12" id="product_attr_box">
            	@php
            	$loop_count_num = 1;
            	
            	@endphp
            	@foreach($productAttrArr as $key=>$value)
            	<?php
            	$loop_count_prev = $loop_count_num;
            	$arrayName = (array)$value;
            	// print_r($arrayName);
            	// die;
            	?>
            	<input id="paid" type="hidden" name="paid[]" value="{{$arrayName['id']}}">
				<div class="card" id="product_attr_{{$loop_count_num++}}">
					<div class="card-body">
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>SKU</label>
									<input type="text" name="sku[]" class="form-control" value="{{$arrayName['sku']}}" required>
							
									@error('sku')
									   <div class="alert alert-danger" role="alert">
						                  {{$message}}
						                </div>
									@enderror
								</div>							
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>MRP</label>
									<input type="text" name="mrp[]" class="form-control" value="{{$arrayName['mrp']}}" required>
							
									@error('mrp')
									   <div class="alert alert-danger" role="alert">
						                  {{$message}}
						                </div>
									@enderror
								</div>							
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Price</label>
									<input type="text" name="price[]" value="{{$arrayName['price']}}" class="form-control" required>
							
									@error('price')
									   <div class="alert alert-danger" role="alert">
						                  {{$message}}
						                </div>
									@enderror
								</div>							
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Size</label>
									<select id="size_id" name="size_id[]" class="form-control" >
										<option value="">Select</option>
										@foreach($sizes as $list)
										@if($arrayName['size_id'] == $list->id)
										<option selected value="{{$list->id}}">{{$list->size}}</option>
										@else
										<option value="{{$list->id}}">{{$list->size}}</option>
										@endif	
									
										@endforeach								
									</select>							
									@error('size_id')
									   <div class="alert alert-danger" role="alert">
						                  {{$message}}
						                </div>
									@enderror
								</div>							
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Color</label>
							        <select id="color_id" name="color_id[]" class="form-control" >
										<option value="">Select</option>
										@foreach($colors as $list)
										@if($arrayName['color_id'] == $list->id)	<option selected value="{{$list->id}}">{{$list->color}}</option>		
										@else
										<option value="{{$list->id}}">{{$list->color}}</option>	
										@endif								
										@endforeach								
									</select>
									@error('color_id')
									   <div class="alert alert-danger" role="alert">
						                  {{$message}}
						                </div>
									@enderror
								</div>							
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Qty</label>
									<input type="text" name="qty[]" value="{{$arrayName['qty']}}" class="form-control" required>
							
									@error('qty')
									   <div class="alert alert-danger" role="alert">
						                  {{$message}}
						                </div>
									@enderror
								</div>							
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Image</label>
									<input type="file" name="attr_image[]" value="" class="form-control" >
                                    
                                    @if($arrayName['attr_image']!="")
									<img src="{{asset('storage/media/'.$arrayName['attr_image'])}}" height="50px;" width="50px;">
									@endif
							
									@error('attr_image')
									   <div class="alert alert-danger" role="alert">
						                  {{$message}}
						                </div>
									@enderror
								</div>							
							</div>
							<div class="col-md-2">
								<div class="form-group" style="padding-top: 27px;">
									<label for="button">&nbsp;&nbsp;&nbsp;&nbsp;</label>
									@if($loop_count_num==2)
									<button type="button" onclick="add_more()" class="btn btn-primary btn-lg"><i class="fas fa-plus">&nbsp;</i>Add</button>
									@else
									<a href="{{url('admin/product/product_attr_delete/')}}/{{$arrayName['id']}}/{{$id}}"><button type="button"  class="btn btn-danger btn-lg"><i class="fas fa-minus">&nbsp;</i>Remove</button></a>
									@endif
								</div>							
							</div>						
						</div>
					</div>				
				</div>
				@endforeach
		    </div>

						
			<button class="btn btn-primary" type="submit">Add Product</button>
			<input type="hidden" name="id" value="{{$id}}">
		</form>
	</div>	
</div>	
<script type="text/javascript">
	var loop_count=1;
	function add_more()
	{
		loop_count++;
		//alert('df')
		var html = '<input id="paid" type="hidden" name="paid[]" ><div class="card" id="product_attr_'+loop_count+'"><div class="card-body"><div class="row">';
		
		html+='<div class="col-md-2"><div class="form-group"><label>SKU</label><input type="text" name="sku[]" value="" class="form-control" required>@error('sku')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';

		html+='<div class="col-md-2"><div class="form-group"><label>MRP</label><input type="text" name="mrp[]" value="" class="form-control" required>@error('mrp')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';

		html+='<div class="col-md-2"><div class="form-group"><label>Price</label><input type="text" name="price[]" value="" class="form-control" required>@error('price')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';
        
        var size_id_html = jQuery('#size_id').html();
        size_id_html = size_id_html.replace("selected","");

        html+='<div class="col-md-2"><div class="form-group"><label>Size</label><select id="size_id" class="form-control" name="size_id[]">'+size_id_html+'</select>@error('size_id')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';

        var color_id_html = jQuery('#color_id').html();
        color_id_html = color_id_html.replace("selected","");

        html+='<div class="col-md-2"><div class="form-group"><label>Color</label><select id="color_id" class="form-control" name="color_id[]">'+color_id_html+'</select>@error('color_id')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';

        html+='<div class="col-md-2"><div class="form-group"><label>Qty</label><input type="text" name="qty[]" value="" class="form-control" required>@error('qty')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';

        html+='<div class="col-md-2"><div class="form-group"><label>Image</label><input type="file" name="attr_image[]" value="" class="form-control" required>@error('attr_image')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';

        html+='<div class="col-md-2"><div class="form-group" style="padding-top: 27px;"><label for="button">&nbsp;&nbsp;&nbsp;&nbsp;</label><button type="button" style="margin-top:-36px;" onclick=remove_more("'+loop_count+'") class="btn btn-danger btn-lg"><i class="fas fa-minus">&nbsp;</i>Remove</button></div></div>';

		html+='</div></div></div>';

		jQuery('#product_attr_box').append(html)
	}

	function remove_more(loop_count)
	{
		jQuery('#product_attr_'+loop_count).remove();
	}
</script>


@endsection