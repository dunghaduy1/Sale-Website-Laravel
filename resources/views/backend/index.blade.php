@extends('backend.master')
@section('title','Trang chủ')
@section('namepage','Trang chủ')
@section('main')
<div class="row">
  <div class="col-lg-12">
      <div class="card">
          <div class="card-body">
              <div class="row">
                      <div class="media">
                          <div class="mr-3">
                              <img src="{{url('public')}}/backend/images/companies/img-6.png" alt="" class="avatar-md rounded-circle img-thumbnail">
                          </div>
                          <div class="media-body align-self-center">
                                  <h1 class="">Chào mừng bạn đến trang quản lý bán hàng trà hoa</h1>
                              </div>
                          </div>
                      </div>
              </div>
              <!-- end row -->
          </div>
      </div>
  </div>
</div>
@stop