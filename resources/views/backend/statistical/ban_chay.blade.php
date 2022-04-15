  @extends('backend.master')
  @section('title', 'Thống kê sản phẩm bán chạy')
  @section('namepage', 'Thống kê')
  @section('main')
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                    <div class="">
                        <table id="datatable-buttons" class="table table-bordered  dataTable dtr-inline table-hover">
                            <thead>
								<tr role="row">
									<th class="sorting">STT</th>
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
								@foreach($order_details as $value)
								<tr>
                                    <td>{{$loop->index +1}}</td>
									<td>{{$value->product_details->sku}}</td>
									<td><img src="{{url('public/uploads')}}/{{$value->product_details->products->image}}" alt="" width="50px"></td>
									<td>{{$value->product_details->products->name}}</td>
									<td>{{$value->product_details->attrs->name=="size"?$value->product_details->attrs->value:''}}</td>
									<td>{{$value->product_details->attrs->name=="khoi-luong"?$value->product_details->attrs->value:''}}</td>
									{{-- <td>{{$value->product_details->attrs->name}}</td> --}}
									<td>{{number_format($value->product_details->price)}}</td>
									<td>{{$value->product_details->discount}}</td>
									<td>{{$value->quantity}}</td>
									<td>{!!($value->product_details->status==1)?'<span class="badge badge-pill badge-soft-success font-size-12">Hiện</span>':'<span class="badge badge-pill badge-soft-danger font-size-12">Ẩn</span>'!!}</td>
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
