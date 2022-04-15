@extends('frontend.master')
@section('title', 'Lịch sử mua hàng')
@section('main')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-12 text-center">
        <div class="container">
            <h1>Lịch sử mua hàng</h1>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lịch sử mua hàng</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- Cart Area Start -->
    <div class="cart-area table-area pt-80 pb-60">
        <div class="container">
            @if (Session::has('success'))
                <div class="alert bg-green text-white alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            @if ($orders->count() > 0)
                @foreach ($orders as $order)
                    <div class="card">
                        <div class="card-body">
                            <div class="text-right">
                                <h4 class="card-text">Trạng thái:
                                    @if ($order->status == 0)
                                        <span class="badge badge-pill badge-soft-secondary  font-size-12">Chưa xử
                                            lý</span>
                                    @endif
                                    @if ($order->status == 1)
                                        <span class="badge badge-pill badge-soft-warning font-size-12">Đã xử lý</span>
                                    @endif
                                    @if ($order->status == 2)
                                        <span class="badge badge-pill badge-soft-success font-size-12">Đang giao
                                            hàng</span>
                                    @endif
                                    @if ($order->status == 3)
                                        <span class="badge badge-pill badge-soft-success font-size-12">Đã nhận
                                            hàng</span>
                                    @endif
                                    @if ($order->status == 4)
                                        <span class="badge badge-pill badge-soft-danger font-size-12">Đã hủy hàng</span>
                                    @endif
                                </h4>
                            </div>
                            <hr>
                            <div class="don-hang">
                                @foreach ($order->order_details as $item)
                                <div class="media mt-3">
                                    <img width="100px" class="mr-3"
                                    src="{{ url('public/uploads') }}/{{ $item->product_details->products->image }}"
                                    alt="">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="mb-0 font-weight-bold">{{ $item->product_details->products->name }} ({{ is_numeric($item->product_details->attrs->value)?$item->product_details->attrs->value.'g':$item->product_details->attrs->value  }})</h5>
                                            </div>
                                            <div class="col">
                                                <h4 class="text-right text-red">{{ number_format($item->price) }} đ</h4>
                                            </div>
                                        </div>
                                        <p>X {{ $item->quantity }}</p>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                            </div>
                            <div class="text-right">
                                <h3 class="">Tổng tiền: <span class="text-red">{{ number_format($order->total_price) }} đ</span></h3>
                                <a href="{{ route('order-detail-frontend', ['id' => $order->id]) }}"
                                    class="btn btn-green text-white">Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-secondary col-12"></button>
                @endforeach
            @else
                <div class="" role="alert">
                    <h4>
                        <strong>Bạn chưa mua gì</strong>
                        , quay lại <strong><a href="{{ route('shop') }}">shop</a></strong> để tiếp tục mua hàng.
                    </h4>
                    <a href="{{ route('shop') }}" class="btn btn-green text-white btn-lg">Quay lại</a>
                </div>
            @endif
        </div>
    </div>
    <!-- Cart Area End -->
@stop
