@extends('frontend.master')
@section('title', 'Chi tiết tin tức')
@section('main')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-12 text-center">
        <div class="container">
            <h1>Chi tiết tin tức</h1>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết tin tức</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- Post Area Start -->
    <div class="post-area blog-area pt-110 pb-60 post-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-wrapper">
                        {{-- <div class="sidebar-widget sidebar-search-widget">
                            <h3>Search</h3>
                            <form action="#" class="sidebar-search-box">
                                <input type="text" placeholder="Search...">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div> --}}
                        <div class="sidebar-widget danh-muc">
                            <h3>Danh mục</h3>
                            <div class="sidebar-widget-option-wrapper">
                                @foreach ($category_blog as $value)
                                    @if ($value->parent_id == 0)
                                        <div class="sidebar-widget-option">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('danh-muc-blog', ['slug' => $value->slug]) }}"
                                                        class="font-weight-bold">
                                                        <h5 class="text-cate">
                                                            <i class="fa fa-list-alt mr-2" aria-hidden="true"></i>
                                                            {{ $value->name }}
                                                            <span>
                                                                @if ($value->blog != 0)
                                                                    {{ $value->blog }}
                                                                @endif
                                                            </span>
                                                        </h5>
                                                    </a>
                                                    @foreach ($category_parent as $valu)
                                                        @if ($valu->parent_id == $value->id)
                                                            <ul>
                                                                <li class="ml-4">
                                                                    <a
                                                                        href="{{ route('danh-muc-blog', ['slug' => $valu->slug]) }}">
                                                                        <h6 class="text-cate-s">
                                                                            <i class="fa fa-bars mr-2"
                                                                                aria-hidden="true"></i>
                                                                            {{ $valu->name }}
                                                                            <span>
                                                                                @if ($valu->blog != 0)
                                                                                    ({{ $valu->blog }})
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
                        <div class="sidebar-banner-img">
                            @foreach ($ads as $item)
                                <img src="{{ url('public/uploads') }}/{{ $item->value }}" alt="" class="w-100 mb-10">
                            @endforeach
                            <div class="instagram-image ">
                                <div class="fb-page" data-href="https://www.facebook.com/forgetmenotteashop/"
                                    data-width="380" data-hide-cover="false" data-show-facepile="false">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="single-post-item text-center pb-70">
                        <h3 class="single-post-title"><a href="blog-details.html">{{ $blog->name }}</a></h3>
                        <div class="single-post-meta">
                            <span> Posts by : {{ $blog->admins->name }}</span>
                            <span>{{ $blog->created_at }}</span>
                                    <div class="fb-share-button"
                                    data-href="{{ url()->current() }}"
                                    data-layout="button_count" data-size="small">
                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                                            Chia sẻ</a></div>
                        </div>
                        <div class="single-post-img">
                            <img src="{{ url('public/uploads') }}/{{ $blog->image }}" alt="">
                        </div>
                        <div class="single-post-info-text text-left">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post Area End -->

@stop
