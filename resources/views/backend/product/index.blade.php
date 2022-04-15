@extends('backend.master')
@section('title','Danh sách sản phẩm')
@section('namepage','Sản phẩm')
@section('main')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="text-sm-left">
							<a href="{{route('product.create')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i>Thêm mới sản phẩm</a>
						</div>
					</div>
                    <div class="col-12">
						<table id="datatable-buttons" class="table table-bordered nowrap dataTable no-footer dtr-inline table-hover" role="grid" aria-describedby="datatable-buttons_info">
							<thead>
								<tr role="row">
									<th class="sorting">#</th>
									<th class="sorting">Ảnh đại diện</th>
									<th class="sorting">Tên sản phẩm</th>
									<th class="sorting">Danh mục</th>
									<th class="sorting">Trạng thái</th>
									<th class="sorting">Hành động</th>
								</tr>
							</thead>
							<tbody>
								@foreach($product as $value)
								<tr role="row" class="odd">
									<td class="dtr-control" tabindex="0">{{$loop->index+1}}</td>
									<td><img src="{{url('public/uploads')}}/{{$value->image}}" alt="" width="50px"></td>
									<td class="sorting_1">{{$value->name}}</td>
									<td>{{$value->categories->name}}</td>
									<td>{!!($value->status==1)?'<span class="badge badge-pill badge-soft-success font-size-12">Hiện</span>':'<span class="badge badge-pill badge-soft-danger font-size-12">Ẩn</span>'!!}</td>
									<td>
										<div class="row">
											<div class="col">
												<a href="{{route('product_detail_backend',$value->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chi tiết sản phẩm"><i class="mdi mdi-eye btn-info btn"></i></a>
											</div>
											<div class="col">
												<!-- Sửa -->
												<a href="{{route('product.edit',$value->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"><i class="mdi mdi-pencil btn-success btn"></i></a>
											</div>
											<div class="col">
												<!-- Xóa -->
												<form action="{{route('product.destroy',$value->id)}}" method="POST">
													@csrf
													@method('DELETE')
													<button class="mdi mdi-close btn-danger btn " onclick="return confirm('Xóa sản phẩm -{{$value->name}}- không?')" type="submit" title="" data-original-title="Xóa" data-toggle="tooltip">
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