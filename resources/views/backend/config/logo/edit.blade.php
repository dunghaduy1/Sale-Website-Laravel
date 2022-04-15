@extends('backend.master')
@section('title', 'Cập nhật Logo')
@section('namepage', 'Cấu hình')
@section('main')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('logo.update', $logo->id) }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Logo </label>
                                        <input type="text" class="form-control" id="name""
                                                        name=" name" value="{{ $logo->name }}" onkeyup="ChangeToSlug()">
                                        @error('name')
                                        <span class="text-red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    {{-- slug --}}
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug"
                                            value="{{ $logo->slug }}">
                                        @error('slug')
                                        <span class="text-red">{{ $message }}</span>
                                        @enderror
                                    </div> {{-- end tên slug --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="get_image">Hình ảnh </label>
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#modalImage" id="get_image">
                                            <i class="bx bx-image-add"></i>
                                        </button>
                                        <input type="text" class="form-control hide" id="image" placeholder="" name="value">
                                    </div>
                                    @error('value')
                                    <span class="text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" id="input" value="1"
                                                    {{ $logo->status == 1 ? 'checked' : '' }}>
                                                Hiện
                                            </label>
                                            <label>
                                                <input type="radio" name="status" id="input" value="0"
                                                    {{ $logo->status == 0 ? 'checked' : '' }}>
                                                Ẩn
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"></div>
                                    {{-- <label for="">Type</label> --}}
                                    <input type="hidden" class="form-control" name="type"
                                        value="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="card text-center col-3">
                                        <img class="card-img-top"
                                            src="{{ url('/public/uploads/') }}/{{ $logo->value }}" id="img">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-info" type="submit">Cập nhật</button>
                        </form>
                    </div>
                </div>
                <!-- Modal 1 image-->
                <div class="modal fade" id="modalImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                    aria-hidden="true">
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
