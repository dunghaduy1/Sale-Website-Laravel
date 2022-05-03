@extends('frontend.master')
@section('title', 'Giỏ hàng')
@section('main')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-12 text-center">
        <div class="container">
            <h1>Giỏ hàng</h1>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- Cart Area Start -->
    <div class="cart-area table-area pt-80 pb-60">
        <div class="container">
            @if ($carts->count() > 0)
                <div class="table-responsive">
                    <table class="table product-table text-center">
                        <thead>
                            <tr>
                                <th class="">stt</th>
                                <th class="table-image">Hình ảnh</th>
                                <th class="table-p-name">Tên sản phẩm</th>
                                <th class="">size</th>
                                <th class="table-p-price">Giá</th>
                                <th class="table-p-qty">Số lượng</th>
                                <th class="table-total">Tổng</th>
                                <th class="table-remove">Loại bỏ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td class="table-p-name">{{ $loop->index + 1 }}</td>
                                    <td class="table-image">
                                        <a
                                            href="{{ route('product-detail', ['slug' => $cart->options['slug'], 'id_detail' => $cart->id]) }}">
                                            <img src="{{ url('public/uploads') }}/{{ $cart->options['image'] }}" alt="">
                                        </a>
                                    </td>
                                    <td class="table-p-name">
                                        <a
                                            href="{{ route('product-detail', ['slug' => $cart->options['slug'], 'id_detail' => $cart->id]) }}">
                                            {{ $cart->name }}</a>
                                    </td>
                                    <td class="table-p-name">
                                        {{ is_numeric($cart->options['size']) ? $cart->options['size'] . 'g' : $cart->options['size'] }}
                                    </td>
                                    <td class="table-p-price">
                                        <p>{{ number_format($cart->price) }} đ</p>
                                    </td>
                                    <form action="{{ route('update-cart', $cart->rowId) }}" method="POST">
                                        @csrf
                                        <td class="table-p-qty">
                                            <input value="{{ $cart->qty }}" name="qty" type="number" id="qty" max="">
                                            {{-- <span class="qty-hide"> --}}
                                                <button class="btn btn-green text-white btn-lg" type="submit" id="submit">
                                                    
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                </button>
                                            {{-- </span> --}}
                                        </td>
                                    </form>
                                    <td class="table-total">
                                        <p>{{ number_format($cart->qty * $cart->price) }} đ</p>
                                    </td>
                                    <td class="table-remove">
                                        <a href="{{ route('remove-cart', $cart->rowId) }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-update d-flex justify-content-end mt-3">
                    <a href="{{ route('destroy-cart') }}" class="btn btn-danger btn-lg">Xóa tất cả</a>
                </div>
        </div>
        <div class="container">
            <div class="table-total-wrapper d-flex justify-content-end pt-60">
                <div class="table-total-content">
                    <h2>Tổng giỏ hàng</h2>
                    <div class="table-total-amount">
                        <div class="single-total-content d-flex justify-content-between">
                            <span>Tổng tiền</span>
                            <span class="c-total-price">
                                {{ number_format($subtotal) }} đ</span>
                        </div>
                        <div class="single-total-content d-flex justify-content-between">
                            <span>Phí ship</span>
                            <span class="c-total-price">
                                {{ number_format($fee_ship) }} đ</span>
                        </div>
                        <div class="single-total-content d-flex justify-content-end">
                            {{-- <a href="#">Calculate shipping</a>
                            --}}
                        </div>
                        <div class="single-total-content d-flex justify-content-between">
                            <span>Tổng</span>
                            <span class="c-total-price">
                                {{ number_format($subtotal + $fee_ship) }} đ</span>
                        </div>
                            <a href="{{ route('checkout') }}">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="" role="alert">
            <h4>
                <strong>Giỏ hàng trống</strong>
                , quay lại <strong><a href="{{ route('home') }}">Trang chủ</a></strong> để tiếp tục mua hàng.
            </h4>
            <a href="{{ route('home') }}" class="btn btn-green text-white btn-lg">Quay lại</a>
        </div>
        @endif

    </div>
    <!-- Cart Area End -->
@stop
