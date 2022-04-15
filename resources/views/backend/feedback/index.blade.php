@extends('backend.master')
@section('title', 'Danh sách feedback')
@section('namepage', 'Feedback')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-sm-left">
                                <a href="" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                        class="mdi mdi-plus mr-1"></i>Thêm mới danh mục</a>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <table id="datatable-buttons"
                                class="table table-bordered   dataTable  dtr-inline table-hover" role="grid"
                                aria-describedby="datatable-buttons_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting">#</th>
                                        <th class="sorting">Tên sản phẩm</th>
                                        <th class="sorting">Người đánh giá</th>
                                        <th class="sorting">Star</th>
                                        <th class="sorting" style="width:5px">Nội dung</th>
                                        <th class="sorting">Trạng thái</th>
                                        <th class="sorting">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feedback as $value)
                                        <tr role="row" class="odd">
                                            <td class="dtr-control" tabindex="0">{{ $loop->index + 1 }}</td>
                                            <td class="sorting_1">{{ $value->products->name }}</td>
                                            <td class="sorting_1">{{ $value->users->name }}</td>
                                            <td class="sorting_1">
                                                @for ($i = 0; $i < $value->star; $i++)
                                                    <i class="fa fa-star text-warning"></i>
                                                @endfor
                                            </td>
                                            <td class="sorting_1" style="width:5px">{{ $value->content }}</td>
                                            <td>{!! $value->status == 1 ? '<span
                                                    class="badge badge-pill badge-soft-success font-size-12">Hiện</span>' :
                                                '<span class="badge badge-pill badge-soft-danger font-size-12">Ẩn</span>'
                                                !!}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col">
														<!-- Ẩn -->
														@if ($value->status==1)
														<form action="{{ route('feedback.update', $value->id) }}"
                                                            method="POST">
                                                            @csrf
															@method('PUT')
															<input class="form-control" type="hidden" name="status" value="0">
															<button class="btn btn-danger mdi mdi-eye-off"
                                                                type="submit" title="" data-original-title="Ẩn feedback"
                                                                data-toggle="tooltip" onclick="return confirm('Ẩn feedback không?')">
                                                            </button>
                                                        </form>
														@else
														<form action="{{ route('feedback.update', $value->id) }}"
                                                            method="POST">
                                                            @csrf
															@method('PUT')
															<input class="form-control" type="hidden" name="status" value="1">
                                                            <button class="btn btn-success mdi mdi-eye"
                                                                type="submit" title="" data-original-title="Hiện feedback"
                                                                data-toggle="tooltip" onclick="return confirm('Hiện feedback không?')">
                                                            </button>
                                                        </form>
														@endif
                                                        
                                                    </div>
                                                    {{-- <div class="col">
                                                        <!-- Xóa -->
                                                        <form action="{{ route('feedback.destroy', $value->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger mdi mdi-close"
                                                                onclick="return confirm('Xóa danh mục -{{ $value->name }}- không?')"
                                                                type="submit" title="" data-original-title="Xóa"
                                                                data-toggle="tooltip">
                                                            </button>

                                                        </form>
                                                    </div> --}}
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
