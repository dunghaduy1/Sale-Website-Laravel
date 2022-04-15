@extends('frontend.master')
@section('title', 'Xác nhận email')
@section('main')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container bg-1">
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
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                                    <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank"
                                        class="mt-2 btn btn-green text-white">Chuyển tới gmail của bạn.</a>
                    @else
                    <div class="card overflow-hidden">
                        <div class="bg-green">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-white p-4 mt-4">
                                        <h3 class="text-white">Chào mừng bạn !</h3>
                                        <h4 class="text-white">Xác nhận mail để đặt lại mật khẩu</h4>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ url('public') }}/backend/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                            </div>
                            <div class="p-2">
                                    <form class="form-horizontal" action="" method="POST">
                                        @csrf
                                        <div class="form-group ">
                                            <label for="useremail">Email</label>
                                            <input type="email" class="form-control" id="useremail"
                                                placeholder="Enter email" name="email">
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-12 ">
                                                <button class="btn btn-green text-white w-md waves-effect waves-light"
                                                    type="submit">
                                                    Xác nhận
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
