@extends('backend.master')
@section('title', 'Cập nhật banner')
@section('namepage', 'Banner')
@section('main')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('banner.update', $banner->id) }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    {{-- tên banner --}}
                                    <div class="form-group">
                                        <label for="name">Tên Banner</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nhập tiêu đề"
                                            name="name" onkeyup="ChangeToSlug()" value="{{ $banner->name }}">
                                        @error('name')
                                        <span class="text-red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- end tên banner --}}
                                </div> {{-- end col --}}
                                {{-- slug --}}
                                <div class="col">
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug"
                                            value={{ $banner->slug }}>
                                        @error('slug')
                                        <span class="text-red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> {{-- end slug --}}
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{-- tên title --}}
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề"
                                            name="title" onkeyup="ChangeToSlug()" value="{{ $banner->title }}">
                                        @error('title')
                                        <span class="text-red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- end tên title --}}
                                </div> {{-- end col --}}
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" id="input" value="1"
                                                    {{ $banner->status == 1 ? 'checked' : '' }}>
                                                Hiện
                                            </label>
                                            <label>
                                                <input type="radio" name="status" id="input" value="0"
                                                    {{ $banner->status == 0 ? 'checked' : '' }}>
                                                Ẩn
                                            </label>
                                        </div>
                                    </div>
                                    {{-- end trạng thái --}}
                                </div>
                            </div>

                            {{-- Hình ảnh --}}
                            <div class="col">
                                <div class="form-group">
                                    <label for="get_image">Hình ảnh</label>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalImage"
                                        id="get_image">
                                        <i class="bx bx-image-add"></i>
                                    </button>
                                    <input type="text" class="form-control hide" id="image" placeholder="" name="image">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="card text-center">
                                            <img class="card-img-top w-75"
                                                src="{{ url('/public/uploads/') }}/{{ $banner->image }}" id="img">
                                        </div>
                                    </div>
                                </div>
                                @error('image')
                                <span class="text-red">{{ $message }}</span>
                                @enderror
                            </div> {{-- end hình ảnh --}}
                            {{-- nội dung - content --}}
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea name="content" id="content" class="form-control" rows="5">
                                {{ $banner->content }}
                                </textarea>
                            </div>
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                        </form>
                    </div>
                    <!-- Modal 1 image-->
                    <div class="modal fade" id="modalImage" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Quản lý upload file</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <iframe src="{{ url('filemanager') }}/dialog.php?type=1&field_id=image"
                                        class="upload-image"></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end modal -->
                </div> <!-- end card body -->
            </div> <!-- end card	 -->
        </div><!-- end col -->
    </div><!-- end row -->
@stop
