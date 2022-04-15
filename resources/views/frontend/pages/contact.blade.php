@extends('frontend.master')
@section('title','Giới thiệu')
@section('main')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-12 text-center">
    <div class="container">
        <h1>Liên hệ</h1>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Contact Area Start -->
<div class="contact-area fix mb-60">
    <div class="contact-address pt-110 bg-white">
        <h1 class="contact-title">LIÊN HỆ VỚI CHÚNG TÔI</h1>
        <div class="contact-info">
            <p>
                @if($intro==null)
                Giới thiệu về công ty
                @else
                {!! $intro->value !!}
                @endif
            </p>
            <div class="contact-list-wrapper">
                <div class="contact-list">
                    <i class="fa fa-fax"></i>
                    <span>
                        @if($address==null)
                        Address : Địa chỉ demo
                        @else
                        Address : {!! $address->value !!}
                        @endif
                    </span>
                </div>
                <div class="contact-list">
                    <i class="fa fa-envelope-o"></i>
                    <span>
                        @if($email==null)
                                        Email : Địa chỉ demo
                                        @else
                                        email : {!! $email->value !!}
                                        @endif
                    </span>
                </div>
                <div class="contact-list">
                    <i class="fa fa-phone"></i>
                    <span> 
                        @if($phone==null)
                        Phone : Địa chỉ demo
                        @else
                        Phone : {!! $phone->value !!}
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <div class="working-time">
            <h2>Giờ làm việc</h2>
            @if($worktime==null)
            <span><span>Monday – Saturday:</span>  08AM – 22PM</span>
                                        @else
                                        {!! $worktime->value !!}
                                        @endif
        </div>
    </div>
    <div class="contact-form pt-110">
        @if($gmap==null)
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59585.571537634634!2d105.75589415347793!3d21.028755581722667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab5756f91033%3A0x576917442d674bfd!2zQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1596896332049!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        @else
        {!! $gmap->value !!}
        @endif
    </div>
</div>
<!-- Contact Area End -->
    @stop