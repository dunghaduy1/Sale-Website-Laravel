@extends('backend.master')
@section('title','Chi tiết đơn hàng')
@section('namepage','Đơn hàng')
@section('main')
<div class="row">
	<div class="col-4">
		<div class="card">
			<div class="card-body">
				<h3 class="font-weight-bold text-green">Đơn hàng số:
					<span class="font-weight-bold">{{ $order->id }}</span>
				</h3>
				<h5 class="card-text">Tên khách hàng:
					<span class="font-weight-bold"> {{ $order->users->name }}</span>
				</h5>
				<h5 class="card-text">Số điện thọai:
					<span class="font-weight-bold"> {{ $order->users->phone }}</h5></span>
				<h5 class="card-text">Địa chỉ nhận hàng:
					<span class="font-weight-bold">{{ $order->address_ship }}</span>
				</h5>
				<h5 class="card-text">Ngày đặt hàng:
					<span class="font-weight-bold"> {{ $order->created_at }}</span>
				</h5>
				<h5 class="card-text">Trạng thái:
					<span class="font-weight-bold">
						@if ($order->status == 0)
							<span class="badge badge-secondary ">Chưa xử lý</span>
						@endif
						@if ($order->status == 1)
							<span class="badge badge-warning">Đã xử lý</span>
						@endif
						@if ($order->status == 2)
							<span class="badge badge-success">Đang giao hàng</span>
						@endif
						@if ($order->status == 3)
							<span class="badge badge-success">Đã nhận hàng</span>
						@endif
						@if ($order->status == 4)
							<span class="badge badge-danger">Đã hủy hàng</span>
						@endif
					</span>
				</h5>
				<hr>
				<form action="" method="POST">
					@csrf
						<div class="form-group">
							<label class="text-danger" for="">Cập nhật trạng thái</label>
							<select name="status" id="input" class="form-control col-6" required="required">
								<option value="1">Đã xử lý</option>
								<option value="2">Đang Giao hàng</option>
								<option value="3">Đã nhận hàng</option>
							</select>
						</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info" onclick="return confirm('Cập nhật trạng thái đơn hàng không?')">Cập nhật</button>
					</div>
				</form>
			</div> 
		</div>
	</div>
	<div class="col-8">
		<div class="card text-center">
			<div class="card-body">
				<div class="row">
					<div class="col">
						<table id="datatable-buttons" class="table table-hover table-bordered">
							<thead>
								<tr role="row">
									<th >#</th>
									<th >Ảnh phẩm</th>
									<th >Tên sản phẩm</th>
									<th >Price (đ)</th>
									<th >Quantity</th>
									<th >Thành tiền</th>
								</tr>
							</thead>
							<tbody>
								@foreach($order_details as $value)
								<tr>
									<td>{{$loop->index +1}}</td>
									<td class="table-image">
                                        <img width="50px"
                                            src="{{ url('public/uploads') }}/{{ $value->product_details->products->image }}"
                                            alt="">
                                </td>
									<td>{{$value->product_details->products->name}}</td>
									<td>{{number_format($value->price)}} đ</td>
									<td>{{$value->quantity}}</td>
									<td>{{number_format($value->price*$value->quantity)}} đ</td>
								</tr>
								@endforeach
								<tr>
									<td class="font-weight-bold font-size-16">Phí ship</td>
									<td colspan="5" class="font-weight-bold text-red font-size-16 text-right">{{number_format(20000)}} đ</td>
								</tr>
								<tr>
									<td class="font-weight-bold font-size-16">Tổng tiền</td>
									<td colspan="5" class="font-weight-bold text-red font-size-16 text-right">{{number_format($order->total_price)}} đ</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop