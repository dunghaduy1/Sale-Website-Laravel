@extends('frontend.master')
@section('title', 'Danh sách sản phẩm')
@section('main')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-12 text-center headingt">
        <div class="container">
            <h1>Tìm kiếm</h1>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
                </ul>
                Tìm kiếm được ({{ $products->count()? :0 }}) kết quả
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- Shop Area Start -->
    <div class="shop-area pt-110 mt-30 pb-60 blog-column bg-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-wrapper">
                        {{-- <h3>Layered Navigation</h3> --}}
                        {{-- <form action="{{ route('sort') }}" method="post">
                            @csrf --}}
                            <div class="sidebar-widget danh-muc">
                                <h3>Danh mục</h3>
                                <div class="sidebar-widget-option-wrapper">
                                    @foreach ($category_pro as $value)
                                        @if ($value->parent_id == 0)
                                            <div class="sidebar-widget-option">
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('danh-muc', ['slug' => $value->slug]) }}"
                                                            class="font-weight-bold">
                                                            <h5 class="text-cate">
                                                                <i class="fa fa-list-alt mr-2" aria-hidden="true"></i>
                                                                {{ $value->name }}
                                                                <span>
                                                                    @if ($value->products->count() != 0)
                                                                        {{ $value->products->count() }}
                                                                    @endif
                                                                </span>
                                                            </h5>
                                                        </a>
                                                        @foreach ($category_pa as $valu)
                                                            @if ($valu->parent_id == $value->id)
                                                                <ul>
                                                                    <li class="ml-4">
                                                                        <a
                                                                            href="{{ route('danh-muc', ['slug' => $valu->slug]) }}">
                                                                            <h6 class="text-cate-s">
                                                                                <i class="fa fa-bars mr-2"
                                                                                    aria-hidden="true"></i>
                                                                                {{ $valu->name }}
                                                                                <span>
                                                                                    @if ($valu->products->count() != 0)
                                                                                        ({{ $valu->products->count() }})
                                                                                    @endif
                                                                                </span>
                                                                            </h6>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            @endif
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            {{-- <div class="sidebar-widget price-widget">
                                <h3>Lọc theo giá</h3>
                                <div class="price-slider-container">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <div class="slider-values">
                                            <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="sidebar-widget">
                                <h3>Size</h3>
                                <div class="sidebar-widget-option-wrapper">
                                    @foreach ($attr as $value)
                                        <div class="sidebar-widget-option">
                                            <input type="checkbox" id="{{ $value->value }}-{{ $value->id }}" name="attr"
                                                value="{{ $value->id }}">
                                            <label for="{{ $value->value }}-{{ $value->id }}">{{ $value->value }}
                                                <span>(4)</span></label>
                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}
                            <span class="qty-hide">
                                <button class="btn bg-green text-white" type="submit" id="submit">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                </button>
                            </span>
                    </div>
                    <div class="sidebar-banner-img">
                        @foreach ($ads as $item)
                            <img src="{{ url('public/uploads') }}/{{ $item->value }}" alt="" class="w-100 mb-10">
                        @endforeach
                        <div class="fb-page" data-href="https://www.facebook.com/forgetmenotteashop/" data-width="380"
                            data-hide-cover="false" data-show-facepile="false">
                        </div>
                    </div>
                </div>
                <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8">
                    <div class="ht-product-tab">
                        <div class="ht-tab-content">
                            <div class="nav" role="tablist">
                                <a class="active grid" href="#grid" data-toggle="tab" role="tab" aria-selected="true"
                                    aria-controls="grid"><i class="fa fa-th"></i></a>
                                <a class="list" href="#list" data-toggle="tab" role="tab" aria-selected="false"
                                    aria-controls="list"><i class="fa fa-list"></i></a>
                            </div>
                            <div class="shop-items">
                                <span>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                                    {{ $products->total() }} ({{ $products->lastPage() }} Pages)
                                </span>
                            </div>
                        </div>
                        {{-- <div class="shop-results-wrapper">
                            <div class="shop-results"><span>Show:</span>
                                <div class="shop-select">
                                    <select name="page" id="page">
                                        <option value="6">6</option>
                                        <option value="9">9</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                            </div>
                            <div class="shop-results"><span>Sắp xếp:</span>
                                <div class="shop-select sort-sx">
                                    <select name="sort" id="sort">
                                        <option value="position">Sắp xếp mặc định</option>
                                        <option value="p-name">Sắp xếp theo mới nhất</option>
                                        <option value="p-name-za">Sắp xếp theo giảm dần</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </form> --}}
                    </div>
                    <div class="ht-product-shop tab-content text-center">
                        <div class="tab-pane active show fade" id="grid" role="tabpanel">
                            <div class="custom-row">
                                @foreach ($products as $product)
                                    @if ($product->id_detail != 0)
                                        <div class="custom-col">
                                            <div class="single-product-item">
                                                <div class="product-image image-cus">
                                                    <a
                                                        href="{{ route('product-detail', ['slug' => $product->slug, 'id_detail' => $product->id_detail]) }}">
                                                        <img src="{{ url('public/uploads') }}/{{ $product->image }}" alt="">
                                                        @if ($product->discount > 0)
                                                            <div class="pro-discount text-center">-{{ $product->discount }}%
                                                            </div>
                                                        @endif
                                                    </a>
                                                    @if ($product->quantity > 0)
                                                        <div class="product-hover">
                                                            <ul class="hover-icon-list">
                                                                <li>
                                                                    @if (Auth::check())
                                                                        <a
                                                                            href="{{ route('add-wishlist', ['id_user' => Auth::guard('user')->user()->id, 'id_detail' => $product->id_detail]) }}"><i
                                                                                class="icon icon-Heart"></i></a>
                                                                    @else
                                                                        <a class="" data-toggle="modal" href='#dang-nhap'><i
                                                                                class="icon icon-Heart"></i></a>
                                                                    @endif
                                                                </li>
                                                                <li>
                                                                    <a href="{{ url()->current() }}"><i
                                                                            class="icon icon-Restart"></i></a>
                                                                </li>
                                                            </ul>
                                                            <form action="{{ route('add-cart', $product->id_detail) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="p-cart-btn">Thêm vào giỏ
                                                                    hàng</button>
                                                            </form>
                                                        </div>
                                                    @else
                                                        <div class="product-hover">
                                                            <ul class="hover-icon-list bg-danger p-5">
                                                                <li>
                                                                    <h3>Hết hàng</h3>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="product-text mt-3">
                                                    {{-- <div class="product-rating">
                                                        <i class="fa fa-star-o color"></i>
                                                        <i class="fa fa-star-o color"></i>
                                                        <i class="fa fa-star-o color"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div> --}}
                                                    <h5><a
                                                            href="{{ route('product-detail', ['slug' => $product->slug, 'id_detail' => $product->id_detail]) }}">{{ $product->name }}</a>
                                                    </h5>
                                                    @if ($product->discount > 0)
                                                        <div class="pro-price">
                                                            <span
                                                                class="new-price">{{ number_format($product->price - ($product->price * $product->discount) / 100) }}đ</span>
                                                            <span
                                                                class="old-price">{{ number_format($product->price) }}đ</span>
                                                        </div>
                                                    @else
                                                        <div class="pro-price">
                                                            <span
                                                                class="new-price">{{ number_format($product->price) }}đ</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade text-left" id="list" role="tabpanel">
                            @foreach ($products as $product)
                                @if ($product->id_detail != 0)
                                    <div class="single-product-item">
                                        <div class="product-image image-cus">
                                            <a href="{{ route('product-detail', ['slug' => $product->slug,
                                                'id_detail' => $product->id_detail]) }}">
                                                <img src="{{ url('public/uploads') }}/{{ $product->image }}" alt="">
                                                @if ($product->discount > 0)
                                                    <div class="pro-discount text-center hide">-{{ $product->discount }}%
                                                    </div>
                                                @endif
                                            </a>
                                            @if ($product->quantity > 0)
                                                <div class="product-hover">
                                                    <ul class="hover-icon-list">
                                                        <li>
                                                            @if (Auth::check())
                                                                <a
                                                                    href="{{ route('add-wishlist', ['id_user' => Auth::guard('user')->user()->id, 'id_detail' => $product->id_detail]) }}"><i
                                                                        class="icon icon-Heart"></i></a>
                                                            @else
                                                                <a class="" data-toggle="modal" href='#dang-nhap'><i
                                                                        class="icon icon-Heart"></i></a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            <a href="{{ url()->current() }}"><i
                                                                    class="icon icon-Restart"></i></a>
                                                        </li>
                                                    </ul>
                                                    <form action="{{ route('add-cart', $product->id_detail) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" class="p-cart-btn">Thêm vào giỏ hàng</button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="product-hover">
                                                    <ul class="hover-icon-list bg-danger p-3">
                                                        <li>
                                                            <h3>Hết hàng</h3>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="product-text mt-3">
                                            {{-- <div class="product-rating">
                                                <i class="fa fa-star-o color"></i>
                                                <i class="fa fa-star-o color"></i>
                                                <i class="fa fa-star-o color"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div> --}}
                                            <h5><a
                                                    href="{{ route('product-detail', ['slug' => $product->slug, 'id_detail' => $product->id_detail]) }}">{{ $product->name }}</a>
                                            </h5>
                                            @if ($product->discount > 0)
                                                <div class="pro-price">
                                                    <span
                                                        class="new-price">{{ number_format($product->price - ($product->price * $product->discount) / 100) }}đ</span>
                                                    <span class="old-price">{{ number_format($product->price) }}đ</span>
                                                </div>
                                            @else
                                                <div class="pro-price">
                                                    <span class="new-price">{{ number_format($product->price) }}đ</span>
                                                </div>
                                            @endif
                                            <div class="text-desc">
                                                <p>{{ $product->meta_desc }}</p>
                                            </div>
                                            <div class="pro-btn">
                                                <form action="{{ route('add-cart', $product->id_detail) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="p-cart-btn default-btn">Thêm vào giỏ
                                                        hàng</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    {{-- {{ $products->links() }} --}}
                    @if ($products->hasPages())
                        <div class="pagination-wrapper">
                            <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                                {{ $products->total() }}
                                ({{ $products->lastPage() }} Pages)</p>
                            <nav aria-label="navigation">
                                <ul class="pagination">
                                    @if ($products->currentPage() - 1 > 0)
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $products->previousPageUrl() }}">
                                                << /a>
                                        </li>
                                    @endif
                                    @for ($i = 1; $i <= $products->lastPage(); $i++)

                                        <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}"><a
                                                class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a></li>
                                    @endfor
                                    @if ($products->currentPage() < $products->lastPage())
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $products->nextPageUrl() }}">></a></li>
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $products->url($products->lastPage()) }}">>|</a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Area End -->
@stop
