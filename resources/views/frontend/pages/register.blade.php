@extends('frontend.master')
@section('title', 'Trang đăng ký')
@section('main')
    <div class="container mt-40 bg-1">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10 col-xl-10 pb-60 pt-90">
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
                <div class="card overflow-hidden">
                    <div class="bg-green">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-white p-4 mt-4">
                                    <h2 class="text-white">Chào mừng bạn !</h2>
                                    <h3 class="text-white">Đăng ký</h3>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ url('public') }}/backend/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="p-2">
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">Họ và tên</label>
                                            <input type="text" class="form-control" placeholder="Nhập họ và tên" id="name"
                                                name="name">
                                            @error('name')
                                            <span class="text-red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email">
                                            @error('email')
                                            <span class="text-red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="password">Mật khẩu</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Nhập mật khẩu">
                                            @error('password')
                                            <span class="text-red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="re_password">Nhập lại mật khẩu</label>
                                            <input type="password" class="form-control" id="re_password" name="re_password"
                                                placeholder="Nhập lại mật khẩu">
                                            @error('re_password')
                                            <span class="text-red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại</label>
                                            <input type="tel" class="form-control" name="phone" id="phone"
                                                placeholder="Nhập số điện thoại">
                                            @error('phone')
                                            <span class="text-red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-8">
                                                <label for="avatar">Avatar</label>
                                                <input type="file" name="image" id="avatar" class="" placeholder="Chọn ảnh">
                                                @error('image')
                                                <span class="text-red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="">Giới tính</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="gender" id="input" value="1"
                                                            checked="checked">
                                                        Nam
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="gender" id="input" value="0">
                                                        Nữ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="address" class="">Địa chỉ:</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="1 Hoàng Quốc Việt, Hà Nội">
                                            @error('address')
                                            <span class="text-red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="birthday">Sinh nhật</label>
                                            <input type="date" class="form-control" id="birthday" name="birthday">
                                            @error('birthday')
                                            <span class="text-red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-green text-white">Đăng ký</button>
                            </form>
                            <div class="mt-2 ">
                                <div>
                                    <p>Bạn đã có tài khoản ? <a href="{{ route('dang-nhap') }}"
                                            class="font-weight-medium text-primary">
                                            Đăng nhập</a> </p>
                                </div>
                            </div>
                            <!--End of Register Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
