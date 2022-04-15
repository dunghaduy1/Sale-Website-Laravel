@extends('frontend.master')
@section('title', 'Đơn hàng của tôi')
@section('main')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-12 text-center">
        <div class="container">
            <h1>Đơn hàng của bạn</h1>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('order-frontend', Auth::user()->id) }}">Đơn hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đơn hàng Chi tiết</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- Cart Area Start -->
    <div class=" mt-20">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body bg-gray">
                            <h3 class="font-weight-bold text-green">Đơn hàng số:
                                <span class="ml-2">{{ $order->id }}</span>
                            </h3>
                            <h5 class="card-text">Tên khách hàng:
                                <span class="ml-2"> {{ $order->users->name }}</span>
                            </h5>
                            <h5 class="card-text">Số điện thọai:
                                <span class="ml-2"> {{ $order->users->phone }}</h5></span>
                            <h5 class="card-text">Địa chỉ nhận hàng:
                                <span class="ml-2">{{ $order->address_ship }}</span>
                            </h5>
                            <h5 class="card-text">Ngày đặt hàng:
                                <span class="ml-2"> {{ $order->created_at }}</span>
                            </h5>
                            <h5 class="card-text">Trạng thái:
                                <span class="ml-2">
                                    @if ($order->status == 0)
                                    <span class="badge badge-pill badge-soft-secondary  font-size-12">Chưa xử lý</span>
                                @endif
                                @if ($order->status == 1)
                                    <span class="badge badge-pill badge-soft-warning font-size-12">Đã xử lý</span>
                                @endif
                                @if ($order->status == 2)
                                    <span class="badge badge-pill badge-soft-success font-size-12">Đang giao hàng</span>
                                @endif
                                @if ($order->status == 3)
                                    <span class="badge badge-pill badge-soft-success font-size-12">Đã nhận hàng</span>
                                @endif
                                @if ($order->status == 4)
                                    <span class="badge badge-pill badge-soft-danger font-size-12">Đã hủy hàng</span>
                                @endif
                                </span>
                            </h5>
                            <hr>
                            @if($order->status<3)
                            <h5 class="card-text">
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="status" value="4">
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn muốn hủy hàng?')">Hủy hàng</button>
                                    </div>
                                </form>
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="status" value="3">
                                        <button class="btn btn-green text-white" type="submit" onclick="return confirm('Bạn đã nhận được hàng?')">Đã nhận hàng hàng</button>
                                    </div>
                                </form>
                            </h5>
                            @endif
                            @if($order->status==4)
                            <h5 class="card-text">
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="status" value="0">
                                        <button class="btn btn-green text-white" type="submit" onclick="return confirm('Bạn muốn đặt lại hàng?')">Đặt lại</button>
                                    </div>
                                </form>
                            </h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-area table-area pt-50 pb-60">
        <div class="container">
            <div class="table-responsive">
                <table class="table product-table text-center bg-white">
                    <thead>
                        <tr>
                            <th class="table-p-name">Stt</th>
                            <th class="table-p-name">Tên sản phẩm</th>
                            <th class="table-image">Ảnh</th>
                            <th class="table-qty">Số lượng</th>
                            <th class="table-price">Giá</th>
                            <th class="table-total">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_details as $item)
                            <tr>
                                <td class="table-p-name">{{ $loop->index + 1 }}</td>
                                <td class="table-p-name">{{ $item->product_details->products->name }}</td>
                                <td class="table-image">
                                        <img class="w-50"
                                            src="{{ url('public/uploads') }}/{{ $item->product_details->products->image }}"
                                            alt="">
                                </td>
                                <td class="table-p-name">{{ $item->quantity }}</td>
                                <td class="table-price">{{ number_format($item->price) }} đ</td>
                                <td class="table-price">{{ number_format($item->price*$item->quantity) }} đ </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class=""><h3 class="font-weight-bold text-green">Phí ship</h3></td>
                            <td colspan="5"><h3 class="font-weight-bold text-green text-right">{{ number_format(20000) }} đ</h3></td>
                        </tr>
                        <tr>
                            <td class=""><h3 class="font-weight-bold text-green">Tổng tiền</h3></td>
                            <td colspan="5"><h3 class="font-weight-bold text-green text-right">{{ number_format($order->total_price) }} đ</h3></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
@stop
