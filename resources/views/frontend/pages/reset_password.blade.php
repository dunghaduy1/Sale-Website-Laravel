@extends('frontend.master')
@section('title', 'Đặt lại mật khẩu')
@section('main')
    <div class="container mt-40 bg-1">
        <div class="row justify-content-center pb-60 pt-90">
            <div class="col-md-8 col-lg-8 col-xl-8 ">
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
                                    <h4 class="text-white">Đặt lại mật khẩu</h4>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ url('public') }}/backend/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="p-2">
                            <form class="form-horizontal" action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="token" value="{{ $info }}" hidden="">
                                </div>
                                <div class="form-group">
                                    <label for="userpassword">Nhập mật khẩu mới</label>
                                    <input type="password" class="form-control" id="userpassword"
                                        placeholder="Nhập mật khẩu" name="password">
                                        @error('password')
                        <span class="text-red">{{$message}}</span>
                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="confirm">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" id="confirm"
                                        placeholder="Nhập lại mật khẩu" name="confirm">
                                        @error('confirm')
                        <span class="text-red">{{$message}}</span>
                        @enderror
                                </div>

                                {{-- <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div> --}}

                                <div class="mt-3">
                                    <button class="btn btn-green text-white btn-block waves-effect waves-light" type="submit">
                                        Đặt lại mật khẩu
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
