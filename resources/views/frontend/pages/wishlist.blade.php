@extends('frontend.master')
@section('title', 'Wishlist')
@section('main')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-12 text-center">
        <div class="container">
            <h1>Sản phẩm yêu thích</h1>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm yêu thích</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- Wishlist Area Start -->
    <div class="wishlist-area table-area pt-90 pb-30">
        <div class="container">
            @if ($wishlist->count() > 0)
                @if (Session::has('success'))
                    <div class="alert bg-green text-white alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table product-table text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="table-image">image</th>
                                <th class="table-p-name">Product Name</th>
                                <th>size</th>
                                <th class="table-p-price">Unit Price</th>
                                <th class="table-stock">Stock Status</th>
                                <th class="table-remove">remove</th>
                                <th class="table-add-cart">Add</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlist as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td class="table-image">
                                        <a
                                            href="{{ route('product-detail', ['slug' => $item->product_details->products->slug, 'id_detail' => $item->product_details->id]) }}">
                                            <img src="{{ url('public/uploads') }}/{{ $item->product_details->products->image }}"
                                                alt="" width="50px">
                                        </a>
                                    </td>
                                    <td class="table-p-name">
                                        <a
                                            href="{{ route('product-detail', ['slug' => $item->product_details->products->slug, 'id_detail' => $item->product_details->id]) }}">
                                            {{ $item->product_details->products->name }}
                                        </a>
                                    </td>
                                    <td>{{ is_numeric($item->product_details->attrs->value) ? $item->product_details->attrs->value . 'g' : $item->product_details->attrs->value }}
                                    </td>
                                    <td class="table-p-price">
                                        @if ($item->product_details->discount > 0)
                                            <p>
                                                <span class="line-through">
                                                    {{ number_format($item->product_details->price) }} đ
                                                </span>
                                                {{ number_format($item->product_details->price - ($item->product_details->discount / 100) * $item->product_details->price) }}
                                                đ</p>
                                        @else
                                            <p>{{ number_format($item->product_details->price) }} đ</p>
                                        @endif
                                    </td>
                                    <td class="table-stock">
                                        @if ($item->product_details->quantity > 0)
                                            <span>
                                                Còn hàng
                                            </span>
                                        @else
                                            <span class="text-red">
                                                Hết hàng
                                            </span>
                                        @endif
                                    </td>
                                    <td class="table-remove">
                                        <a href="{{ route('remove-wishlist', $item->id) }}"
                                            onclick="return confirm('Xóa sản phẩm -{{ $item->product_details->products->name }}- không?')""><i
                                                                class=" fa fa-trash">
                                            </i></a>
                                    </td>
                                    <td class="table-add-cart product-hover">
                                        @if ($item->product_details->quantity > 0)
                                            <form action="{{ route('add-cart', $item->product_details->id) }}"
                                                method="POST">
                                                @csrf
                                                {{-- <input type="hidden" name="qty"
                                                    value="1"> --}}
                                                <button type="submit" class="btn-cart table-add-cart">Thêm vào giỏ hàng</button>
                                            </form>
                                        @else
                                            <a href="{{ route('shop') }}" class="table-add-cart">Shop</a>
                                        @endif
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-update d-flex justify-content-end mt-3">
                    <a href="{{ route('destroy-wishlist', Auth::user()->id) }}" class="btn btn-danger btn-lg">Xóa tất cả</a>
                </div>
            @else
                <div class="" role="alert">
                    <h4>
                        <strong>Giỏ hàng trống</strong>
                        , quay lại <strong><a href="{{ route('shop') }}">shop</a></strong> để tiếp tục mua hàng.
                    </h4>
                    <a href="{{ route('shop') }}" class="btn btn-green text-white btn-lg">Quay lại</a>
                </div>
            @endif
        </div>
    </div>
    <!-- Wishlist Area End -->
@stop
