@extends('backend.master')
@section('title', 'Danh sách đơn hàng')
@section('namepage', 'Đơn hàng')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-buttons"
                                class="table  table-bordered  dataTable no-footer  table-hover" role="grid"
                                aria-describedby="datatable-buttons_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting">#</th>
                                        <th class="sorting">Tên khách hàng</th>
                                        <th class="sorting">Tổng tiền</th>
                                        <th class="sorting">Địa chỉ giao hàng</th>
                                        <th class="sorting">Ghi chú</th>
                                        <th class="sorting">Trạng thái</th>
                                        <th class="sorting">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr role="row" class="odd">
                                            <td class="dtr-control" tabindex="0">{{ $loop->index + 1 }}</td>
                                            <td class="sorting_1">{{ $order->users->name }}</td>
                                            <td class="sorting_1">{{ number_format($order->total_price) }} đ</td>
                                            <td class="sorting_1">{{ $order->address_ship }}</td>
                                            <td class="sorting_1">{{ $order->note }}</td>
                                            <td>
                                                @if ($order->status == 0)
                                                    <span class="badge badge-secondary ">Chưa xử lý</span>
                                                @endif
                                                @if ($order->status == 1)
                                                    <span class="badge badge-warning">Đã xử lý</span>
                                                @endif
                                                @if ($order->status == 2)
                                                    <span class="badge badge-success">Đang giao hàng</span>
                                                @endif
                                                @if ($order->status == 3)
                                                    <span class="badge badge-success">Đã nhận hàng</span>
                                                @endif
                                                @if ($order->status == 4)
                                                    <span class="badge badge-danger">Đã hủy hàng</span>
                                                @endif
                                            <td class="text-center">
                                                <a href="{{ route('order_detail_backend', $order->id) }}"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Chi tiết đơn hàng"><i
                                                        class="mdi mdi-eye btn-info btn"></i></a>
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
