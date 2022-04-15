@extends('frontend.user.main')
@section('title','Profile')
@section('main-pro')
<div class="card">
    <div class="card-body">
        <div class="tab-content" id="v-pills-tabContent">
            <div>
                <h4 class="card-title">Tài khoản của tôi</h4>
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Họ và tên</label>
                                <input type="text" class="form-control" placeholder="Nhập họ và tên" id="name" name="name" value="{{ $user->name }}">
                                @error('name')
                                <span class="text-red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
                                @error('email')
                                <span class="text-red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại" value="{{ $user->phone }}">
                                @error('phone')
                                <span class="text-red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Giới tính</label>
                                <div class="radio">
                                 <label>
                                     <input type="radio" name="gender" id="input" value="1" {{ $user->gender==1?'checked':'' }}>
                                     Nam
                                 </label>
                                 <label>
                                     <input type="radio" name="gender" id="input" value="0" {{ $user->gender==0?'checked':'' }}>
                                     Nữ
                                 </label>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="address" class="">Địa chỉ:</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="1 Hoàng Quốc Việt, Hà Nội" value="{{ $user->address }}">
                            @error('address')
                            <span class="text-red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="birthday">Sinh nhật</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}">
                            @error('birthday')
                            <span class="text-red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="image" id="avatar" value="">
                </div>
                @error('image')
				<span class="text-red">{{$message}}</span>
				@enderror
                <div class="form-group">
                    <img src="{{ url('public/uploads/Users') }}/{{ $user->avatar }}" alt="" class="w-25">
                </div>
                <button type="submit" class="btn btn-success">Cập nhật</button>
            </form>
            <!--End of Update Form-->
        </div>
    </div>
</div>
</div>
@stop