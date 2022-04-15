@extends('backend.master')
@section('title', 'contact')
@section('namepage', 'Cấu hình')
@section('main')
    @if ($config->count() < 5)
        <a href="{{ route('contact.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">
            <i class="mdi mdi-plus mr-1"></i>
            Thêm mới contact
        </a>
    @endif
    {{-- end buttton --}}
    <div class="container">
        <div class="row">
            @if ($intro || $address || $email || $phone)
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="font-weight-bold">Contact</h2>
                            <hr>
                            <p>
                                <a href="{{ route('contact.edit', $intro->id) }}" class=" text-primary"
                                    data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"><i
                                        class="mdi mdi-pencil btn-success btn btn-sm"></i>
                                </a>{{ $intro->value }}
                            </p>
                            <div>
                                <p><a href="{{ route('contact.edit', $address->id) }}" class=" text-primary"
                                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"><i
                                            class="mdi mdi-pencil btn-success btn btn-sm"></i>
                                    </a></i>
                                    Address : {!! $address->value !!}
                                </p>
                                <p><a href="{{ route('contact.edit', $phone->id) }}" class=" text-primary"
                                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"><i
                                            class="mdi mdi-pencil btn-success btn btn-sm"></i>
                                    </a><i class="icon icon-Phone"></i>
                                    Phone : {!! $phone->value !!}
                                </p>
                                <p><a href="{{ route('contact.edit', $email->id) }}" class=" text-primary"
                                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"><i
                                            class="mdi mdi-pencil btn-success btn btn-sm"></i>
                                    </a><i class="icon icon-Mail"></i>
                                    Email : {!! $email->value !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($worktime)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="">
                                    <h2 class="font-weight-bold">Work time</h2>
                                </div>
                                <div class="col">

                                    <a href="{{ route('contact.edit', $worktime->id) }}" class=" text-primary"
                                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"><i
                                            class="mdi mdi-pencil btn-success btn "></i></a>
                                </div>
                            </div>
                            <hr>
                            {{ $worktime->value }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @if ($gmap)
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="">
                                <h2 class="font-weight-bold">Gmap</h2>
                            </div>
                            <div class="col">
                                <a href="{{ route('contact.edit', $gmap->id) }}" class=" text-primary" data-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Sửa"><i
                                        class="mdi mdi-pencil btn-success btn "></i></a>
                            </div>
                        </div>
                        <hr>
                        <div class="w-100">
                            {!! $gmap->value !!}
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
        @endif
    </div>
@stop
