@extends('frontend.master')
@section('title', 'Đặt hàng')
@section('main')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-12 text-center">
        <div class="container">
            <h1>Đặt hàng</h1>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đặt hàng</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <div class="coupon-area pt-110">
        <div class="container">
            <div class="coupon-accordion">
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert bg-green text-white alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                @if (!Auth::check())
                    <h3>Bạn chưa đăng nhập? <span id="showlogin">Chọn vào để đăng nhập</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">
                                Nếu bạn đã mua sắm với chúng tôi trước đây, vui lòng nhập thông tin của bạn vào các ô bên
                                dưới.
                                Nếu bạn là khách hàng mới, vui lòng đăng kí tài khoản.
                            </p>
                            <form action="{{ route('post-dang-nhap') }}" method="POST">
                                @csrf
                                <p class="form-row-first">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="email" name="email" id="email" placeholder="Nhập email" required />
                                </p>
                                <p class="form-row-last">
                                    <label for="password">Mật khẩu <span class="required">*</span></label>
                                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required />
                                </p>
                                <label>
                                    <input type="checkbox" />
                                    Ghi nhớ tôi
                                </label>
                                <p>Bạn chưa có tài khoản. <a href="{{ route('dang-ky') }}" class="text-primary">Đăng ký</a>
                                </p>
                                <p class="form-row">
                                    <input type="submit" value="Đăng nhập" />
                                </p>
                                <p class="lost-password">
                                    <a href="{{ route('recover') }}">Quên mật khẩu?</a>
                                </p>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- coupon-area end -->
    <!-- checkout-area start -->
    <div class="checkout-area pb-30">
        <div class="container">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    @if(Auth::check())
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="checkbox-form your-order bg-white">
                            <h3>Thông tin thanh toán<a href="{{ route('profile',Auth::user()->id) }}"><span class="ml-4 btn btn-green text-white">Sửa</span></a></h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout-form-list">
                                        <label>Tên người nhận hàng <span class="required">*</span></label>
                                        <input type="text" readonly placeholder="Tên người nhận" name="name"
                                            value="{{ Auth::user()->name }}" />
                                    </div>
                                </div>
                                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}" />
                                <input type="hidden" name="total_price" value="{{ $subtotal + $fee_ship }}" />
                                <input type="hidden" name="status" value="0" />

                                <div class="col-lg-12">
                                    <div class="checkout-form-list">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" readonly placeholder="Email" name="email"
                                            value="{{ Auth::user()->email }}" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout-form-list">
                                        <label>Số điện thoại <span class="required">*</span></label>
                                        <input type="text" readonly placeholder="Số điện thoại" name="phone"
                                            value="{{ Auth::user()->phone }}" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout-form-list">
                                        <label>Địa chỉ của tôi<span class="required">*</span></label>
                                        <input type="text" readonly placeholder="Street address" name="address"
                                            value="{{ Auth::user()->address }}" id="old_addr"/>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout-form-list">
                                        <label>Địa chỉ nhận hàng<span class="required">*</span></label>
                                        <input type="text" placeholder="Street address" name="address_ship"
                                            value="" id="new_addr"required/>
                                    </div>
                                    <input type="checkbox" name="" id="addr" >
                                    <label for="addr">Giống địa chỉ của tôi</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h3 class="mt-2 font-weight-bold">Vui lòng đăng nhập</h3>
                    </div>
                    @endif
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="your-order">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-total">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $item)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ $item->name }} <strong class="product-quantity"> ×
                                                        {{ $item->qty }}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{{ number_format($item->price * $item->qty) }}
                                                        đ</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Tổng giỏ hàng</th>
                                            <td><span class="amount">{{ number_format($subtotal) }} đ</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <label>
                                                            <span class="amount">{{ number_format($fee_ship) }} đ</span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Tổng đơn hàng</th>
                                            <td>
                                                <strong><span class="amount">{{ number_format($fee_ship + $subtotal) }}
                                                        đ</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="order-button-payment">
                                    <input class="default-btn" type="submit" value="Đặt hàng" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout-area end -->
@stop
