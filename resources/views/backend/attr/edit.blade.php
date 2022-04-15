@extends('backend.master')
@section('title','Sửa thuộc tính')
@section('namepage','Sản phẩm')
@section('main')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4">
						<form method="POST" action="{{route('attr.update',$attr_id->id)}}">
							@csrf
							@method('PUT')
							<h4>Sửa thuộc tính</h4>
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label>Thuộc tính </label>
										<select name="name" id="input" class="form-control" required="required">
											<option value="size" {{$attr_id->name=="size"?'selected':''}}>Size</option>
											<option value="khoi-luong" {{$attr_id->name=="khoi-luong"?'selected':''}}>Khối lượng</option>
										</select>
									</div>
									<!-- <select name="name" id="attr" class="form-control">
										<option value="1">Size</option>
										<option value="2">Color</option>
									</select> -->
								</div>
								<div class="col"> 
									<div class="form-group">
										<label>Giá trị</label>
										<div class="input-group " id="size" >
											<input type="text" class="form-control input-lg" name="value" value="{{$attr_id->value}}">
										</div>
										<!-- <div class="input-group colorpicker-default colorpicker-element" title="Using format option" data-colorpicker-id="2" id="color">
											<input type="text" class="form-control input-lg" name="value" value="#ccc">
											<span class="input-group-append">
												<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0" aria-describedby="popover416910"><i style="background: rgb(96, 106, 134);"></i></span>
											</span>
										</div> -->
										@error('value')
										<span class="text-red">{{$message}}</span>
										@enderror
									</div>
								</div>
							</div>
							<button class="btn btn-success" type="submit">Cập nhật</button>
						</form>
					</div>
					<div class="col-sm-8">
						<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info">
							<thead>
								<tr role="row">
									<th class="sorting">STT</th>
									<th class="sorting">Thuộc tính</th>
									<th class="sorting">Giá trị (g)</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach($attr as $value)
								<tr>
									<td>{{$loop->index +1}}</td>
									<td>{{$value->name}}</td>
									<td>{{$value->value}}</td>
									<td>
											
											<div class="row">
											<div class="col">
												<!-- Sửa -->
												<a href="{{route('attr.edit',$value->id)}}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"><i class="mdi mdi-pencil btn-success btn "></i></a>
											</div>
											<div class="col">
												<!-- Xóa -->
												<form action="{{route('attr.destroy',$value->id)}}" method="POST">
													@csrf
													@method('DELETE')
													<button class="btn btn-danger mdi mdi-close" onclick="return confirm('Xóa danh mục -{{$value->name}}- không?')" type="submit" title="" data-original-title="Xóa" data-toggle="tooltip">
													</button>

												</form>
											</div>
										</div>
									</td>
								</tr>
								
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
</div> <!-- end col -->

@stop