@extends('frontend.master')
@section('title', 'Trang đăng nhập')
@section('main')
    <div class="container mt-40 bg-1">
        <div class="row justify-content-center pb-60 pt-90">
            <div class="col-md-8 col-lg-8 col-xl-8">
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
                                    <h3 class="text-white">Chào mừng bạn !</h3>
                                    <h4 class="text-white">Đăng nhập</h4>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ url('public') }}/backend/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="p-2">
                            <form method="POST" action="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Nhập email" name="email">
                                    @error('email')
                                    <span class="text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu"
                                        name="password">
                                    @error('password')
                                    <span class="text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                 <div><a href="{{ route('recover') }}" class="text-primary">Quên mật khẩu?</a>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Ghi nhớ tôi</label>
                                </div>
                                <button type="submit" class="btn btn-green text-white">Đăng nhập</button>
                            </form>
                            <div class="mt-2">
                                <p>Bạn chưa có tài khoản? <a href="{{ route('dang-ky') }}" class="text-primary">Đăng ký</a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Register Form-->
@stop
