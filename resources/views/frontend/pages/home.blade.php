@extends('frontend.master')
@section('title','Trang chủ')
@section('main')
	        <!-- Hero Area Start -->
            <div class="ht-hero-section fix">
                <div class="ht-hero-slider">
                    @if($banner->count()>0)
                    @foreach ($banner as $value)
                        <!-- Single Slide Start -->
                    <div class="ht-single-slide" style="background-image: url({{url('public/uploads')}}/{{$value->image}})">
                        <div class="ht-hero-content-one container">
                            {{-- <h3>For Get Me Not</h3> --}}
                            <h1 class="cssanimation leDoorCloseLeft sequence title-logo">{{$value->title}}</h1>
                         <p>{{$value->content}}</p>
                            {{-- <a href="{{route('shop')}}" class="default-btn large circle blue hover-blue uppercase">Shop now</a> --}}
                        </div>
                    </div>
                    <!-- Single Slide End -->
                    @endforeach
                    @else
                    <div class="ht-single-slide" style="background-image: url({{url('public/uploads')}}/Banners/banner1.jpg)">
                    </div>
                    <div class="ht-single-slide" style="background-image: url({{url('public/uploads')}}/Banners/banner2.jpg)">
                    </div>
                    <div class="ht-single-slide" style="background-image: url({{url('public/uploads')}}/Banners/banner3.jpg)">
                    </div>
                    @endif
                </div>
            </div>
        <!-- Protuct Area Start -->
        <div class="product-area bg-1 pt-110 pb-80 product-two-area">
            <div class="container">
                <div class="section-title text-center">
                    <div class="section-img d-flex justify-content-center">
                        <img src="{{url('public')}}/frontend/img/icon/title.png" alt="">
                    </div>
                    <h2><span> </span>Sản phẩm mới</h2>
                </div>
            </div>
            <div class="container">
                <div class="product-tab-list nav" role="tablist">
                    <a class="active" href="#tab1" data-toggle="tab" role="tab" aria-selected="true" aria-controls="tab1">Trà mix</a>
                    <a href="#tab2"  class="" data-toggle="tab" role="tab" aria-selected="false" aria-controls="tab2">Trà mộc</a>
                    {{-- <a href="#tab3" data-toggle="tab" role="tab" aria-selected="false" aria-controls="tab3">juices</a> --}}
                    {{-- <a href="#tab4" data-toggle="tab" role="tab" aria-selected="false" aria-controls="tab4">bread</a> --}}
                </div>
                <div class="tab-content text-center">
                    <div class="tab-pane active show fade" id="tab1" role="tabpanel">
                        <div class="product-carousel">
                            @if($product_mix->count()>0)
                            @foreach ($product_mix as $product)
                            @if (($product->id_detail != 0) && ($product->quantity > 0) )
                                    <div class="custom-col">
                                        <div class="single-product-item">
                                            <div class="product-image image-cus">
                                                <a
                                                    href="{{ route('product-detail', ['slug' => $product->slug, 'id_detail' => $product->id_detail]) }}">
                                                    <img src="{{ url('public/uploads') }}/{{ $product->image }}" alt="">
                                                    @if ($product->discount > 0)
                                                        <div class="pro-discount text-center">-{{ $product->discount }}%</div>
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
                                                                <a href="{{ url()->current() }}"><i class="icon icon-Restart"></i></a>
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
                                                                <h3 >Hết hàng</h3>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="product-text mt-3">
                                                <div class="product-rating">
                                                    {{-- <i class="fa fa-star-o color"></i>
                                                    <i class="fa fa-star-o color"></i>
                                                    <i class="fa fa-star-o color"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i> --}}
                                                </div>
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
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @else
                            {{-- Hết hàng --}}
                            <div class="custom-col">
                                <div class="single-product-item">
                                    <div class="product-image image-cus">
                                        <a href="#">
                                            <img src="{{ url('public/uploads') }}/Products/2.jpg" alt="">
                                                <div class="pro-discount text-center">-10%</div>
                                        </a>
                                            <div class="product-hover">
                                                <ul class="hover-icon-list bg-danger p-5">
                                                    <li>
                                                        <h3 >Hết hàng</h3>
                                                    </li>
                                                </ul>
                                            </div>
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
                                                href="#">Trà Long Nhãn – Táo Đỏ – Kỳ Tử</a>
                                        </h5>
                                            <div class="pro-price">
                                                <span class="new-price">250,000 đ</span>
                                                <span class="old-price">200,000 đ</span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Còn hàng --}}
                            <div class="custom-col">
                                <div class="single-product-item">
                                    <div class="product-image image-cus">
                                        <a href="#">
                                            <img src="{{ url('public/uploads') }}/Products/tra-duong-thanh-14501.jpg" alt="">
                                                <div class="pro-discount text-center">-10%</div>
                                        </a>
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
                                                        <a href="{{ url()->current() }}"><i class="icon icon-Restart"></i></a>
                                                    </li>
                                                </ul>
                                                <form action="{{ route('add-cart', $product->id_detail) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="p-cart-btn">Thêm vào giỏ
                                                                    hàng</button>
                                                            </form>
                                            </div>
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
                                                href="#">Mộc Hương Trà</a>
                                        </h5>
                                            <div class="pro-price">
                                                <span class="new-price">300,000 đ</span>
                                                <span class="old-price">280,000 đ</span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-col">
                                <div class="single-product-item">
                                    <div class="product-image image-cus">
                                        <a href="#">
                                            <img src="{{ url('public/uploads') }}/Products/TB2oXz4bqigSKJjSsppXXabnpXa_3125193854-500x500.jpg" alt="">
                                                {{-- <div class="pro-discount text-center"></div> --}}
                                        </a>
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
                                                        <a href="{{ url()->current() }}"><i class="icon icon-Restart"></i></a>
                                                    </li>
                                                </ul>
                                                <form action="{{ route('add-cart', $product->id_detail) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="p-cart-btn">Thêm vào giỏ
                                                                    hàng</button>
                                                            </form>
                                            </div>
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
                                                href="#">Trà Ngọc Nữ</a>
                                        </h5>
                                            <div class="pro-price">
                                                <span class="new-price">300,000 đ</span>
                                                <span class="old-price"></span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-col">
                                <div class="single-product-item">
                                    <div class="product-image image-cus">
                                        <a href="#">
                                            <img src="{{ url('public/uploads') }}/Products/tra-duong-thanh-14501.jpg" alt="">
                                                <div class="pro-discount text-center">-15%</div>
                                        </a>
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
                                                        <a href="{{ url()->current() }}"><i class="icon icon-Restart"></i></a>
                                                    </li>
                                                </ul>
                                                <form action="{{ route('add-cart', $product->id_detail) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="p-cart-btn">Thêm vào giỏ
                                                                    hàng</button>
                                                            </form>
                                            </div>
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
                                                href="#">Trà Dưỡng Thanh</a>
                                        </h5>
                                            <div class="pro-price">
                                                <span class="new-price">212,500 đ</span>
                                                <span class="old-price">250,000đ đ</span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-col">
                                <div class="single-product-item">
                                    <div class="product-image image-cus">
                                        <a href="#">
                                            <img src="{{ url('public/uploads') }}/Products/92830712_526790721290408_7917789656333156352_o.jpg" alt="">
                                                <div class="pro-discount text-center">-18%</div>
                                        </a>
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
                                                        <a href="{{ url()->current() }}"><i class="icon icon-Restart"></i></a>
                                                    </li>
                                                </ul>
                                                <form action="{{ route('add-cart', $product->id_detail) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="p-cart-btn">Thêm vào giỏ
                                                                    hàng</button>
                                                            </form>
                                            </div>
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
                                                href="#">Thanh Can Trà</a>
                                        </h5>
                                            <div class="pro-price">
                                                <span class="new-price">123,000 đ</span>
                                                <span class="old-price">150,000 đ</span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                        <div class="product-carousel">
                            @if($product_moc->count()>0)
                            @foreach ($product_moc as $product)
                            @if (($product->id_detail != 0) && ($product->quantity > 0) )
                                    <div class="custom-col">
                                        <div class="single-product-item">
                                            <div class="product-image image-cus">
                                                <a
                                                    href="{{ route('product-detail', ['slug' => $product->slug, 'id_detail' => $product->id_detail]) }}">
                                                    <img src="{{ url('public/uploads') }}/{{ $product->image }}" alt="">
                                                    @if ($product->discount > 0)
                                                        <div class="pro-discount text-center">-{{ $product->discount }}%</div>
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
                                                                <a href="{{ url()->current() }}"><i class="icon icon-Restart"></i></a>
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
                                                                <h3 >Hết hàng</h3>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="product-text mt-3">
                                                <div class="product-rating">
                                                    {{-- <i class="fa fa-star-o color"></i>
                                                    <i class="fa fa-star-o color"></i>
                                                    <i class="fa fa-star-o color"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i> --}}
                                                </div>
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
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @else
                            {{-- Hết hàng --}}
                            <div class="custom-col">
                                <div class="single-product-item">
                                    <div class="product-image image-cus">
                                        <a href="#">
                                            <img src="{{ url('public/uploads') }}/Products/2.jpg" alt="">
                                                <div class="pro-discount text-center">-10%</div>
                                        </a>
                                            <div class="product-hover">
                                                <ul class="hover-icon-list bg-danger p-5">
                                                    <li>
                                                        <h3 >Hết hàng</h3>
                                                    </li>
                                                </ul>
                                            </div>
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
                                                href="#">Trà Long Nhãn – Táo Đỏ – Kỳ Tử</a>
                                        </h5>
                                            <div class="pro-price">
                                                <span class="new-price">250,000 đ</span>
                                                <span class="old-price">200,000 đ</span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Còn hàng --}}
                            <div class="custom-col">
                                <div class="single-product-item">
                                    <div class="product-image image-cus">
                                        <a href="#">
                                            <img src="{{ url('public/uploads') }}/Products/tra-duong-thanh-14501.jpg" alt="">
                                                <div class="pro-discount text-center">-10%</div>
                                        </a>
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
                                                        <a href="{{ url()->current() }}"><i class="icon icon-Restart"></i></a>
                                                    </li>
                                                </ul>
                                                <form action="{{ route('add-cart', $product->id_detail) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="p-cart-btn">Thêm vào giỏ
                                                                    hàng</button>
                                                            </form>
                                            </div>
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
                                                href="#">Mộc Hương Trà</a>
                                        </h5>
                                            <div class="pro-price">
                                                <span class="new-price">300,000 đ</span>
                                                <span class="old-price">280,000 đ</span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-col">
                                <div class="single-product-item">
                                    <div class="product-image image-cus">
                                        <a href="#">
                                            <img src="{{ url('public/uploads') }}/Products/TB2oXz4bqigSKJjSsppXXabnpXa_3125193854-500x500.jpg" alt="">
                                                {{-- <div class="pro-discount text-center"></div> --}}
                                        </a>
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
                                                        <a href="{{ url()->current() }}"><i class="icon icon-Restart"></i></a>
                                                    </li>
                                                </ul>
                                                <form action="{{ route('add-cart', $product->id_detail) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="p-cart-btn">Thêm vào giỏ
                                                                    hàng</button>
                                                            </form>
                                            </div>
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
                                                href="#">Trà Ngọc Nữ</a>
                                        </h5>
                                            <div class="pro-price">
                                                <span class="new-price">300,000 đ</span>
                                                <span class="old-price"></span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-col">
                                <div class="single-product-item">
                                    <div class="product-image image-cus">
                                        <a href="#">
                                            <img src="{{ url('public/uploads') }}/Products/tra-duong-thanh-14501.jpg" alt="">
                                                <div class="pro-discount text-center">-15%</div>
                                        </a>
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
                                                        <a href="{{ url()->current() }}"><i class="icon icon-Restart"></i></a>
                                                    </li>
                                                </ul>
                                                <form action="{{ route('add-cart', $product->id_detail) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="p-cart-btn">Thêm vào giỏ
                                                                    hàng</button>
                                                            </form>
                                            </div>
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
                                                href="#">Trà Dưỡng Thanh</a>
                                        </h5>
                                            <div class="pro-price">
                                                <span class="new-price">212,500 đ</span>
                                                <span class="old-price">250,000đ đ</span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-col">
                                <div class="single-product-item">
                                    <div class="product-image image-cus">
                                        <a href="#">
                                            <img src="{{ url('public/uploads') }}/Products/92830712_526790721290408_7917789656333156352_o.jpg" alt="">
                                                <div class="pro-discount text-center">-18%</div>
                                        </a>
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
                                                        <a href="{{ url()->current() }}"><i class="icon icon-Restart"></i></a>
                                                    </li>
                                                </ul>
                                                <form action="{{ route('add-cart', $product->id_detail) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="p-cart-btn">Thêm vào giỏ
                                                                    hàng</button>
                                                            </form>
                                            </div>
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
                                                href="#">Thanh Can Trà</a>
                                        </h5>
                                            <div class="pro-price">
                                                <span class="new-price">123,000 đ</span>
                                                <span class="old-price">150,000 đ</span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Protuct Area End -->
        <!-- Blog Area Start -->
        <div class="blog-area pb-95">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <div class="section-img d-flex justify-content-center">
                        <img src="{{url('public')}}/frontend/img/icon/title.png" alt="">
                    </div>
                    <h2><span></span>Tin tức mới nhất</h2>
                </div>
            </div>
            <div class="container">
                <div class="custom-row">
                    <div class="blog-carousel">
                    @if($blog->count()>0)
                        @foreach ($blog as $value)
                        <div class="custom-col text-center">
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="{{ route('blog_detail', ['slug' => $value->slug, 'id' => $value->id]) }}"><img
                                            src="{{ url('public/uploads') }}/{{ $value->image }}" alt=""></a>
                                </div>
                                <div class="blog-text">
                                    <h4><a
                                            href="{{ route('blog_detail', ['slug' => $value->slug, 'id' => $value->id]) }}">{{ $value->name }}</a>
                                    </h4>
                                    <div class="post-meta">
                                        <span class="author-name">post by:
                                            <span>{{ $value->admins->name }}</span>
                                        </span>
                                        - <span class="post-date"> {{ $value->created_at }}</span>
                                    </div>
                                    <p>{{ $value->meta_desc }}
                                    </p>
                                    <a href="{{ route('blog_detail', ['slug' => $value->slug, 'id' => $value->id]) }}"
                                        class="default-btn">Read more</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="custom-col text-center">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="#">
                                <img src="{{ url('public/uploads') }}/Blogs/hinh-anh-buon-dep_044703914.jpg" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <h4><a href="#">TRÀ MỘC LÀ GÌ? 5 CÁCH PHÂN BIỆT TRÀ MỘC VÀ TRÀ TẨM</a>
                                </h4>
                                <div class="post-meta">
                                    <span class="author-name">post by:
                                        <span>admin</span>
                                    </span>
                                    - <span class="post-date"> 2020-08-08 01:27:15</span>
                                </div>
                                <p>
                                    Trà Ô Long hiện nay chỉ chiểm khoảng 2% lượng trà tiêu thụ trên toàn thế giới. Tuy nhiên, trà Ô Long luôn được thế giới đánh giá cao bởi hương vị phong phú, chất lượng cao và nhiều lợi ích tốt cho sức khỏe. Trong bài viết này, chúng ta sẽ cùng bàn về “Uống trà Ô Long có tác dụng gì? Vì sao trà Ô Long lại có giá cao hơn các loại trà khác?”Nguồn gốc trà Ô...
                                </p>
                                <a href="#" class="default-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col text-center">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="#">
                                <img src="{{ url('public/uploads') }}/Blogs/hinh-anh-buon-dep_044703914.jpg" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <h4><a href="#">CHẤT LIỆU ẤM TRÀ</a>
                                </h4>
                                <div class="post-meta">
                                    <span class="author-name">post by:
                                        <span>admin</span>
                                    </span>
                                    - <span class="post-date"> 2020-08-08 01:27:15</span>
                                </div>
                                <p>
                                    Trà Ô Long hiện nay chỉ chiểm khoảng 2% lượng trà tiêu thụ trên toàn thế giới. Tuy nhiên, trà Ô Long luôn được thế giới đánh giá cao bởi hương vị phong phú, chất lượng cao và nhiều lợi ích tốt cho sức khỏe. Trong bài viết này, chúng ta sẽ cùng bàn về “Uống trà Ô Long có tác dụng gì? Vì sao trà Ô Long lại có giá cao hơn các loại trà khác?”Nguồn gốc trà Ô...
                                </p>
                                <a href="#" class="default-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col text-center">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="#">
                                <img src="{{ url('public/uploads') }}/Blogs/hinh-anh-buon-dep_044703914.jpg" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <h4><a href="#">Tin tức 1</a>
                                </h4>
                                <div class="post-meta">
                                    <span class="author-name">post by:
                                        <span>admin</span>
                                    </span>
                                    - <span class="post-date"> 2020-08-08 01:27:15</span>
                                </div>
                                <p>
                                    Trà Ô Long hiện nay chỉ chiểm khoảng 2% lượng trà tiêu thụ trên toàn thế giới. Tuy nhiên, trà Ô Long luôn được thế giới đánh giá cao bởi hương vị phong phú, chất lượng cao và nhiều lợi ích tốt cho sức khỏe. Trong bài viết này, chúng ta sẽ cùng bàn về “Uống trà Ô Long có tác dụng gì? Vì sao trà Ô Long lại có giá cao hơn các loại trà khác?”Nguồn gốc trà Ô...
                                </p>
                                <a href="#" class="default-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col text-center">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="#">
                                <img src="{{ url('public/uploads') }}/Blogs/hinh-anh-buon-dep_044703914.jpg" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <h4><a href="#">Hướng dẫn thanh toán</a>
                                </h4>
                                <div class="post-meta">
                                    <span class="author-name">post by:
                                        <span>admin</span>
                                    </span>
                                    - <span class="post-date"> 2020-08-08 01:27:15</span>
                                </div>
                                <p>
                                    Trà Ô Long hiện nay chỉ chiểm khoảng 2% lượng trà tiêu thụ trên toàn thế giới. Tuy nhiên, trà Ô Long luôn được thế giới đánh giá cao bởi hương vị phong phú, chất lượng cao và nhiều lợi ích tốt cho sức khỏe. Trong bài viết này, chúng ta sẽ cùng bàn về “Uống trà Ô Long có tác dụng gì? Vì sao trà Ô Long lại có giá cao hơn các loại trà khác?”Nguồn gốc trà Ô...
                                </p>
                                <a href="#" class="default-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col text-center">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="#">
                                <img src="{{ url('public/uploads') }}/Blogs/hinh-anh-buon-dep_044703914.jpg" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <h4><a href="#">Uống trà ô long có tác dụng gì</a>
                                </h4>
                                <div class="post-meta">
                                    <span class="author-name">post by:
                                        <span>admin</span>
                                    </span>
                                    - <span class="post-date"> 2020-08-08 01:27:15</span>
                                </div>
                                <p>
                                    Trà Ô Long hiện nay chỉ chiểm khoảng 2% lượng trà tiêu thụ trên toàn thế giới. Tuy nhiên, trà Ô Long luôn được thế giới đánh giá cao bởi hương vị phong phú, chất lượng cao và nhiều lợi ích tốt cho sức khỏe. Trong bài viết này, chúng ta sẽ cùng bàn về “Uống trà Ô Long có tác dụng gì? Vì sao trà Ô Long lại có giá cao hơn các loại trà khác?”Nguồn gốc trà Ô...
                                </p>
                                <a href="#" class="default-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End -->
@stop