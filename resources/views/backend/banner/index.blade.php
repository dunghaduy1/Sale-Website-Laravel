@extends('backend.master')
@section('title', 'Danh sách banner')
@section('namepage', 'Banner')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-sm-left">
                                <a href="{{ route('banner.create') }}"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                        class="mdi mdi-plus mr-1"></i>Thêm mới banner</a>
                            </div>
						</div>
                        <div class="col-sm-12">
                            <table id="datatable-buttons"
                            class="table table-bordered nowrap dataTable no-footer dtr-inline table-hover"
                            role="grid" aria-describedby="datatable-buttons_info">
                                <thead>
                                    <tr >
                                        <th >#</th>
                                        <th >Hình ảnh</th>
                                        <th >Tên banner</th>
                                        <th >Tên title</th>
                                        <th >Trạng thái</th>
                                        <th >Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banner as $value)
                                        <tr>
                                            <td >{{ $loop->index + 1 }}</td>
                                            <td><img src="{{ url('public/uploads') }}/{{ $value->image }}" alt="" width="100px"></td>
                                            <td >{{ $value->name }}</td>
                                            <td >{{ $value->title }}</td>
                                            <td>{!! $value->status == 1 ? '<span
                                                    class="badge badge-pill badge-soft-success font-size-12">Hiện</span>' :
                                                '<span class="badge badge-pill badge-soft-danger font-size-12">Ẩn</span>'
                                                !!}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <!-- Sửa -->
                                                        <a href="{{ route('banner.edit', $value->id) }}"
                                                            class=" text-primary" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Sửa"><i
                                                                class="mdi mdi-pencil btn-success btn "></i></a>
                                                    </div>
                                                    <div class="col">
                                                        <!-- Xóa -->
                                                        <form action="{{ route('banner.destroy', $value->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger mdi mdi-close"
                                                                onclick="return confirm('Xóa banner -{{ $value->name }}- không?')"
                                                                type="submit" title="" data-original-title="Xóa"
                                                                data-toggle="tooltip">
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- end col -->

@stop
