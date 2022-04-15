  @extends('backend.master')
  @section('title', 'Thống kê sản phẩm tồn kho')
  @section('namepage', 'Thống kê')
  @section('main')
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                    <div class="">
                        <table id="datatable-buttons" class="table table-bordered dataTable dtr-inline table-hover">
                            <thead>
								<tr role="row">
									<th class="sorting">#</th>
									<th class="sorting">SKU</th>
									<th class="sorting">Hình ảnh</th>
									<th class="sorting">Tên sản phẩm</th>
									<th class="sorting">Size</th>
									<th class="sorting">Khối lượng (g)</th>
									<th class="sorting">Price (đ)</th>
									<th class="sorting">Discount (%)</th>
									<th class="sorting">Quantity</th>
									<th class="sorting">Status</th>
								</tr>
							</thead>
							<tbody class="">
								@foreach($product_details as $value)
								<tr>
                                    <td>{{$loop->index +1}}</td>
									<td>{{$value->sku}}</td>
									<td><img src="{{url('public/uploads')}}/{{$value->products->image}}" alt="" width="50px"></td>
									<td>{{$value->products->name}}</td>
									<td>{{$value->attrs->name=="size"?$value->attrs->value:''}}</td>
									<td>{{$value->attrs->name=="khoi-luong"?$value->attrs->value:''}}</td>
									{{-- <td>{{$value->attrs->name}}</td> --}}
									<td>{{number_format($value->price)}}</td>
									<td>{{$value->discount}}</td>
									<td>{{$value->quantity}}</td>
									<td>{!!($value->status==1)?'<span class="badge badge-pill badge-soft-success font-size-12">Hiện</span>':'<span class="badge badge-pill badge-soft-danger font-size-12">Ẩn</span>'!!}</td>
								</tr>
								@endforeach
							</tbody>
                        </table>
                    </div>
                </div>
              </div>
          </div>
      </div>
  @stop
