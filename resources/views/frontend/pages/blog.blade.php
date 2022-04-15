@extends('frontend.master')
@section('title', 'Tin tức')
@section('main')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-12 text-center">
        <div class="container">
            <h1>Tin tức</h1>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- Post Area Start -->
    <div class="post-area blog-area pt-110 pb-60 blog-column">
        <div class="container">
            <div class="row">
                <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8">
                    <div class="row text-center">
                        @foreach ($blog as $value)
                            <div class="col-lg-6 col-md-6">
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
                                                <span>{{ $value->admins->name }}</span></span>
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
                    </div>
                    @if ($blog->hasPages())
                        <div class="pagination-wrapper">
                            <p>Showing {{ $blog->firstItem() }} to {{ $blog->lastItem() }} of {{ $blog->total() }}
                                ({{ $blog->lastPage() }} Pages)</p>
                            <nav aria-label="navigation">
                                <ul class="pagination">
                                    @if ($blog->currentPage() > 1)
                                        <li class="page-item"><a class="page-link" href="{{ $blog->previousPageUrl() }}">
                                                < </a>
                                        </li>
                                    @endif
                                    @for ($i = 1; $i <= $blog->lastPage(); $i++)

                                        <li class="page-item {{ $blog->currentPage() == $i ? 'active' : '' }}"><a
                                                class="page-link" href="{{ $blog->url($i) }}">{{ $i }}</a></li>
                                    @endfor
                                    @if ($blog->currentPage() < $blog->lastPage())
                                        <li class="page-item"><a class="page-link" href="{{ $blog->nextPageUrl() }}">></a>
                                        </li>
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $blog->url($blog->lastPage()) }}">>|</a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
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
                                                                @if ($value->count() != 0)
                                                                    ({{ $value->blogs->count() }})
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
                                                                                @if ($valu->blogs->count() != 0)
                                                                                    ({{ $valu->blogs->count() }})
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
                            <div class="fb-page" data-href="https://www.facebook.com/forgetmenotteashop/"
                                    data-width="380" data-hide-cover="false" data-show-facepile="false">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post Area End -->
@stop
