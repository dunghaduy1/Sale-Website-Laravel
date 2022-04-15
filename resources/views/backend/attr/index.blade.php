@extends('backend.master')
@section('title','Thuộc tính sản phẩm')
@section('namepage','Sản phẩm')
@section('main')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4">
						<form method="POST" action="{{route('attr.store')}}">
							@csrf
							<h4>Thêm mới thuộc tính</h4>
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label>Thuộc tính </label>
										<select name="name" id="input" class="form-control" required="required">
											<option value="khoi-luong">Khối lượng</option>
											<option value="size">Size</option>
										</select>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Giá trị</label>
										<div class="input-group " id="size" >
											<input type="text" class="form-control input-lg" name="value" >
										</div>
										@error('value')
								<span class="text-red">{{$message}}</span>
								@enderror
									</div>
								</div>
							</div>
							<button class="btn btn-success" type="submit">Thêm mới</button>
						</form>
					</div>
					<div class="col-sm-8">
						<table id="datatable-buttons" class="table table-striped table-bordered  nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info">
							<thead>
								<tr role="row">
									<th class="sorting">#</th>
									<th class="sorting">Thuộc tính</th>
									<th class="sorting">Giá trị</th>
									<th class="sorting">Hành động</th>
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
											<div class="col-3">
												<!-- Sửa -->
												<a href="{{route('attr.edit',$value->id)}}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"><i class="mdi mdi-pencil btn-success btn "></i></a>
											</div>
											<div class="col">
												<!-- Xóa -->
												<form action="{{route('attr.destroy',$value->id)}}" method="POST">
													@csrf
													@method('DELETE')
													<button class="btn btn-danger mdi mdi-close" onclick="return confirm('Xóa thuộc tính -{{$value->name}}/{{$value->value}}- không?')" type="submit" title="" data-original-title="Xóa" data-toggle="tooltip">
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