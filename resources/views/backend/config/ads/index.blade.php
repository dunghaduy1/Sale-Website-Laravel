@extends('backend.master')
@section('title', 'Ads')
@section('namepage', 'Cấu hình')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-sm-left">
                                <a href="{{ route('ads.create') }}"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                        class="mdi mdi-plus mr-1"></i>Thêm mới ads</a>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <table id="datatable-buttons"
                                class="table table-bordered nowrap dataTable no-footer dtr-inline table-hover" role="grid"
                                aria-describedby="datatable-buttons_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting">#</th>
                                        <th class="sorting">Hình ảnh</th>
                                        <th class="sorting">Tên ads</th>
                                        <th class="sorting">Trạng thái</th>
                                        <th class="sorting">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ads as $value)
                                        <tr>
                                            <td class="" tabindex="0">{{ $loop->index + 1 }}</td>
                                            <td class="sorting_1"><img src="{{ url('public/uploads') }}/{{ $value->value }}"
                                                    alt="" width="100px"></td>
                                            <td class="sorting_1">{{ $value->name }}</td>
                                            <td>{!! $value->status == 1
                                                ? '<span
                                                    class="badge badge-pill badge-soft-success font-size-12">Hiện</span>'
                                                : '<span class="badge badge-pill badge-soft-danger font-size-12">Ẩn</span>'
                                                !!}</td>
                                            <td>
                                                <div class="row ">
                                                    <div class="col-3 ml-3">
                                                        <!-- Sửa -->
                                                        <a href="{{ route('ads.edit', $value->id) }}" class=" text-primary"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Sửa"><i
                                                                class="mdi mdi-pencil btn-success btn "></i></a>
                                                    </div>
                                                    <div class="col">
                                                        <!-- Xóa -->
                                                        <form action="{{ route('ads.destroy', $value->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger mdi mdi-close"
                                                                onclick="return confirm('Xóa ads -{{ $value->name }}- không?')"
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
