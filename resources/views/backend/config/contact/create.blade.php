@extends('backend.master')
@section('title', 'Thêm mới contact')
@section('namepage', 'Cấu hình')
@section('main')
    <div class="row">
        @if (!$intro)
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('contact.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            <h4 class="text-red">Thêm mới intro</h4>
                            @csrf
                            <input type="hidden" class="form-control" id="name" placeholder="Tên contact" name="name"
                                value="intro">
                            @error('name')
                            <span class="text-red">{{ $message }}</span>
                            @enderror
                            <input type="hidden" class="form-control" id="slug" placeholder="Slug" name="slug"
                                value="intro">
                            <input type="hidden" class="form-control" readonly id="" placeholder="Slug" name="type"
                                value="3">
                            <div class="form-group">
                                <label for="">Status</label>
                                <div class="radio ml-3">
                                    <label>
                                        <input type="radio" name="status" id="input" value="1" checked="checked">
                                        Hiện
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="input" value="0">
                                        Ẩn
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="intro">Nội dung</label>
                                <textarea name="value" id="intro" class="form-control ckedit" rows="5"></textarea>
                            </div>
                            <button class="btn btn-info" type="submit" title="Thêm mới">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end card body -->
        </div> <!-- end card	 -->
        @endif
        @if(!$email)
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('contact.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            <h4 class="text-red">Thêm mới Email</h4>
                            @csrf
                            <input type="hidden" class="form-control" id="name" placeholder="Tên contact" name="name"
                                value="email">
                            @error('name')
                            <span class="text-red">{{ $message }}</span>
                            @enderror
                            <input type="hidden" class="form-control" id="slug" placeholder="Slug" name="slug"
                                value="email">
                            <input type="hidden" class="form-control" readonly id="" placeholder="Slug" name="type"
                                value="3">
                            <div class="form-group">
                                <label for="">Status</label>
                                <div class="radio ml-3">
                                    <label>
                                        <input type="radio" name="status" id="input" value="1" checked="checked">
                                        Hiện
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="input" value="0">
                                        Ẩn
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Nội dung</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="value">

                            </div>
                            <button class="btn btn-info" type="submit" title="Thêm mới">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end card body -->
        </div> <!-- end card	 -->
        @endif
        @if(!$phone)
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('contact.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            <h4 class="text-red">Thêm mới phone</h4>
                            @csrf
                            <input type="hidden" class="form-control" id="name" placeholder="Tên contact" name="name"
                                value="phone">
                            @error('name')
                            <span class="text-red">{{ $message }}</span>
                            @enderror
                            <input type="hidden" class="form-control" id="slug" placeholder="Slug" name="slug"
                                value="phone">
                            <input type="hidden" class="form-control" readonly id="" placeholder="Slug" name="type"
                                value="3">
                            <div class="form-group">
                                <label for="">Status</label>
                                <div class="radio ml-3">
                                    <label>
                                        <input type="radio" name="status" id="input" value="1" checked="checked">
                                        Hiện
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="input" value="0">
                                        Ẩn
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Nội dung</label>
                                <input type="text" class="form-control" id="phone" placeholder="phone" name="value">
                            </div>
                            <button class="btn btn-info" type="submit" title="Thêm mới">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end card body -->
        </div> <!-- end card	 -->
        @endif
        @if(!$address)
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('contact.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            <h4 class="text-red">Thêm mới Address</h4>
                            @csrf
                            <input type="hidden" class="form-control" id="name" placeholder="Tên contact" name="name"
                                value="address">
                            @error('name')
                            <span class="text-red">{{ $message }}</span>
                            @enderror
                            <input type="hidden" class="form-control" id="slug" placeholder="Slug" name="slug"
                                value="address">
                            <input type="hidden" class="form-control" readonly id="" placeholder="Slug" name="type"
                                value="3">
                            <div class="form-group">
                                <label for="">Status</label>
                                <div class="radio ml-3">
                                    <label>
                                        <input type="radio" name="status" id="input" value="1" checked="checked">
                                        Hiện
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="input" value="0">
                                        Ẩn
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Nội dung</label>
                                <input type="text" class="form-control" id="address" placeholder="Address" name="value">

                            </div>
                            <button class="btn btn-info" type="submit" title="Thêm mới">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end card body -->
        </div> <!-- end card	 -->
        @endif
        @if(!$worktime)
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('contact.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            <h4 class="text-red">Thêm mới Work time</h4>
                            @csrf
                            <input type="hidden" class="form-control" id="name" placeholder="Tên contact" name="name"
                                value="worktime">
                            @error('name')
                            <span class="text-red">{{ $message }}</span>
                            @enderror
                            <input type="hidden" class="form-control" id="slug" placeholder="Slug" name="slug"
                                value="worktime">
                            <input type="hidden" class="form-control" readonly id="" placeholder="Slug" name="type"
                                value="3">
                            <div class="form-group">
                                <label for="">Status</label>
                                <div class="radio ml-3">
                                    <label>
                                        <input type="radio" name="status" id="input" value="1" checked="checked">
                                        Hiện
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="input" value="0">
                                        Ẩn
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="worktime">Nội dung</label>
                                <input type="text" class="form-control" id="worktime" placeholder="work time" name="value">
                            </div>
                            <button class="btn btn-info" type="submit" title="Thêm mới">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end card body -->
        </div> <!-- end card	 -->
        @endif
    </div><!-- end row -->
    @if(!$gmap)
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('contact.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            <h4 class="text-red">Thêm mới Google map</h4>
                            @csrf
                            <input type="hidden" class="form-control" id="name" placeholder="Tên contact" name="name"
                                value="gmap">
                            @error('name')
                            <span class="text-red">{{ $message }}</span>
                            @enderror
                            <input type="hidden" class="form-control" id="slug" placeholder="Slug" name="slug" value="gmap">
                            <input type="hidden" class="form-control" readonly id="" placeholder="Slug" name="type"
                                value="3">
                            <div class="">
                                <div class="">
                                    <div class="form-group col-6">
                                        <label for="text-gmap">Link nhúng iframe</label>
                                        <input type="text" class="form-control" id="text-gmap" placeholder="Nhập link"
                                            name="value">
                                    </div>
                                </div>
                                <div id="gmap">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.725809555813!2d105.80887841388765!3d21.00362539401416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac996d7831ff%3A0xfd2eed2d5abbd7ab!2zUXVhbiBOaMOibiwgSG_DoG4gS2nhur9tLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1596373920297!5m2!1svi!2s"
                                        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                                        aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <div class="radio ml-3">
                                    <label>
                                        <input type="radio" name="status" id="input" value="1" checked="checked">
                                        Hiện
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="input" value="0">
                                        Ẩn
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-info" type="submit" title="Thêm mới">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end card body -->
        </div> <!-- end card	 -->
    </div><!-- end col -->
        @endif
@stop
