@extends('frontend.master')
@section('title','Profile')
@section('main')
<div class="breadcrumb-area bg-12 text-center">
    <div class="container">
        <h1>Tài khoản của tôi</h1>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href=" }}">Profile</a></li>
            </ul>
        </nav>
    </div>
</div>
<div class="shop-area pt-50">
    <div class="container mt-25">
        <div class="checkout-tabs">
            <div class="row">
                <div class="col-xl-2 col-sm-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <div id="sidebar-menu">
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li aria-expanded="false">
                                <a class="nav-link " href="{{ route('profile',$user->id) }}">
                                    <p class="font-weight-bold">Tài khoản của tôi</p>
                                </a>
                            </li>
                            <li aria-expanded="false">
                                <a class="nav-link" href="{{ route('change-pass',$user->id) }}">
                                    <p class="font-weight-bold">Thay đổi mật khẩu</p>
                                </a>
                            </li>
                            <li aria-expanded="false">
                                <a class="nav-link" href="{{ route('order-frontend', Auth::user()->id) }}">
                                    <p class="font-weight-bold">Đơn mua</p>
                                </a>
                            </li>
                            <li aria-expanded="false">
                                <a class="nav-link" href="">
                                    <p class="font-weight-bold">Lịch sử mua hàng</p>
                                </a>
                            </li>
                            <li aria-expanded="false">
                                <a class="nav-link" href="{{ route('wishlist',Auth::user()->id) }}">
                                    <p class="font-weight-bold">Sản phẩm ưa thích</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-xl-10 col-sm-9">
                    @if(Session::has('success'))
                    <div class="alert bg-green text-white alert-dismissible fade show" role="alert">
                        {{Session::get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{Session::get('error')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @yield('main-pro');
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>
</div>
@stop