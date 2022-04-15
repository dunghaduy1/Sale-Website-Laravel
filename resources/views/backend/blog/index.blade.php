@extends('backend.master')
@section('title','Danh sách tin tức')
@section('namepage','Tin tức')
@section('main')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="text-sm-left">
							<a href="{{route('blog.create')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i>Thêm mới Tin tức</a>
						</div>
					</div>
                    <div class="col-12">
						<table id="datatable-buttons" class="table table-bordered dataTable dtr-inline table-hover" role="grid" aria-describedby="datatable-buttons_info">
							<thead>
								<tr>
									<th class="sorting">#</th>
									<th class="sorting">Hình ảnh</th>
									<th class="sorting">Tiêu đề</th>
									<th class="sorting">Danh mục</th>
									<th class="sorting">Trạng thái</th>
									<th class="sorting">Hành động</th>
								</tr>
							</thead>
							<tbody>
								@foreach($blog as $value)
								<tr>
									<td class="sorting_1">{{$loop->index+1}}</td>
									<td><img src="{{url('public/uploads')}}/{{$value->image}}" alt="" width="50px"></td>	
									<td class="sorting_1 w-50">{{$value->name}}</td>
									<td class="sorting_1">{{$value->categories->name}}</td>
									<td>{!!($value->status==1)?'<span class="badge badge-pill badge-soft-success font-size-12">Hiện</span>':'<span class="badge badge-pill badge-soft-danger font-size-12">Ẩn</span>'!!}</td>
									<td>
										<div class="row">
											<div class="col">
												<!-- Sửa -->
												<a href="{{route('blog.edit',$value->id)}}" class=" text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"><i class="mdi mdi-pencil btn-success btn "></i></a>
											</div>
											<div class="col">
												<!-- Xóa -->
												<form action="{{route('blog.destroy',$value->id)}}" method="POST">
													@csrf
													@method('DELETE')
													<button class="btn btn-danger mdi mdi-close" onclick="return confirm('Xóa tin -{{$value->name}}- không?')" type="submit" title="" data-original-title="Xóa" data-toggle="tooltip">
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