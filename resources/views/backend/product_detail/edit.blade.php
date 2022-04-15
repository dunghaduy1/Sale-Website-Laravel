@extends('backend.master')
@section('title','Cập nhật Thuộc tính sản phẩm')
@section('namepage','Sản phẩm')
@section('main')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	{{Session::get('success')}}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
</div>
@endif
<div class="row">
	<div class="col-12">
		<div class="card">
			
			<div class="card-body">
				<h4>Thuộc tính của sp: {{$product->name}}</h4>
				<h4>Code: {{$product->sku}}</h4>
				<form action="" method="POST">
					@csrf
					<div class="row">
						<div class="form-group col">
							<label for="sku">SKU</label>
							<input type="text" class="form-control " placeholder="Sku" id="sku"name="sku" value="{{$product_detail->sku}}"/>
							@error('sku')
							<span class="text-red">{{$message}}</span>
							@enderror
						</div>

						<div class="form-group  col">
							<label for="id_attr">Size (g)</label><a href="{{route('attr.index')}}" class=""> --Thêm mới--</a>
							<select name="id_attr" id="input" class="form-control " >
								<option value="">--Size--</option>
								@foreach($attr as $value)
								<option value="{{$value->id}}" {{$product_detail->id_attr==$value->id?'selected':''}}>{{$value->value}}</option>
								@endforeach
							</select>
							@error('id_attr')
							<span class="text-red">{{$message}}</span>
							@enderror
						</div>
						<div class="form-group  col">
							<label for="price">Price</label>
							<input type="text" class="form-control " placeholder="Price" name="price" value="{{$product_detail->price}}"/>
							@error('price')
							<span class="text-red">{{$message}}</span>
							@enderror
						</div>
						<div class="form-group  col">
							<label for="discount">Discount</label>
							<input type="text" class="form-control " placeholder="Discount" name="discount" value="{{$product_detail->discount}}"/>
							@error('discount')
							<span class="text-red">{{$message}}</span>
							@enderror
						</div>
						<div class="form-group  col">
							<label for="quantity">Quantity</label>
							<input type="text" class="form-control " placeholder="Quantity" name="quantity" value="{{$product_detail->quantity}}"/>
							@error('quantity')
							<span class="text-red">{{$message}}</span>
							@enderror
						</div>
						<div class="form-group col">
							<label for="">Status</label>
							<div class="radio">
								<label>
									<input type="radio" name="status" id="input" value="1" {{$product_detail->status==1?'checked':''}}>
									Hiện
								</label>
								<label>
									<input type="radio" name="status" id="input" value="0" {{$product_detail->status==0?'checked':''}}>
									Ẩn
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<button type="submit" class="btn btn-info">Cập nhật</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</div>


@stop