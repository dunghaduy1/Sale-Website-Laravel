@extends('frontend.user.main')
@section('title','Profile')
@section('main-pro')
<div class="card">
    <div class="card-body">
        <div class="col-5">
                <h4 class="card-title">Thay đổi mật khẩu</h4>
                <form method="POST" action="" class="">
                    @csrf
                    <div class="form-group">
                        <label for="password" class="text-warning">Nhập mật khẩu cũ</label>
                        <input type="password" class="form-control " placeholder="Nhập họ và tên" id="password" name="password" value="">
                        @error('password')
                        <span class="text-red">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="new_password" class="text-success">Nhập mật khẩu mới</label>
                        <input type="password" class="form-control" placeholder="Nhập họ và tên" id="new_password" name="new_password" value="">
                        @error('new_password')
                        <span class="text-red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="r_password" class="text-success">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control " placeholder="Nhập họ và tên" id="r_password" name="r_password" value="">
                        @error('r_password')
                        <span class="text-red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                       <a href="{{ route('recover') }}" class="text-danger">Quên mật khẩu</a>
                   </div>
                   <button type="submit" class="btn btn-success">Đổi mật khẩu</button>
               </form>
           </div>
   </div>
</div>
@stop
