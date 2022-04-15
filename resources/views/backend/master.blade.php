<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('public') }}/backend/images/favicon.ico">
    <!-- admin lte -->
    <link href="{{ url('public') }}/backend/css/AdminLTE.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ url('public') }}/backend/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
    type="text/css" />
    <!-- Icons Css -->
    <link href="{{ url('public') }}/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ url('public') }}/backend/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Bootrstrap touchspin -->
    <link href="{{ url('public') }}/backend/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css"
    rel="stylesheet" />
    <!-- Pick -->
    <link href="{{ url('public') }}/backend/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"
    type="text/css">
    <link href="{{ url('public') }}/backend/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"
    rel="stylesheet" type="text/css">
    <link href="{{ url('public') }}/backend/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet"
    type="text/css">
    <link href="{{ url('public') }}/backend/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css"
    rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ url('public') }}/backend/libs/@chenfengyuan/datepicker/datepicker.min.css">

    <!-- DataTables -->
    <link href="{{ url('public') }}/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
    <link href="{{ url('public') }}/backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ url('public') }}/backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />
    <!-- select2 css -->
    <link href="{{ url('public') }}/backend/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ url('public') }}/backend/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <!-- css custom -->
    <link href="{{ url('public') }}/backend/css/style.css" rel="stylesheet" type="text/css" />
<!-- tui charts Css -->
<link href="{{ url('public') }}/backend/libs/tui-chart/tui-chart.min.css" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{ route('backend') }}" class="logo logo-light">
                            <h4 class="text-white mt-3 font-weight-bold">Trang chủ</h4>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                    id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>
            <div class="d-flex">
                <div class="dropdown d-inline-block d-lg-none ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                aria-labelledby="page-header-search-dropdown">
                <form class="p-3">
                    <div class="form-group m-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..."
                            aria-label="Recipient's username">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i
                                    class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user"
                src="{{ url('public') }}/backend/images/companies/img-6.png" alt="Header Avatar">
                <span class="d-none d-xl-inline-block ml-1">
                    {{ Session::get('admin')->name }}
                </span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i
                    class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header> <!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- <li class="menu-title">Menu</li> --}}
                        {{--  <li>
                    <a href="{{ route('backend') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right">03</span>
                        <span>Trang chủ</span>
                    </a>
                </li> --}}
                {{-- <li class="menu-title">Apps</li> --}}
                <li>
                    <li class=""><a href="{{ route('category.index') }}" aria-expanded="false"><i
                        class="bx bx-data"></i>Quản lý danh mục</a></li>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                            <i class="bx bx-store"></i>
                            <span>Quản lý sản phẩm</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="true" style="">
                            <li class=""><a href="{{ route('product.index') }}" aria-expanded="true"><i
                                class="bx bx-package"></i>Sản phẩm</a>
                            </li>
                            <li class=""><a href="{{ route('attr.index') }}" aria-expanded="false"><i
                                class="bx bx-purchase-tag-alt"></i>Thuộc tính sản phẩm</a>
                            </li>
                            <li>
                                <li class=""><a href="{{route('feedback.index')}}" aria-expanded="false"><i class="bx bx-message"></i>Feedback</a>
                                </li>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <li class=""><a href="{{route('order_backend')}}" aria-expanded="false"><i class="bx bx-cart"></i>Quản lý đơn hàng</a></li>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                            <i class="bx bx-detail"></i>
                            <span>Thống kê</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="true" style="">
                            <li class="">
                                <a href="{{ route('thong-ke-ton-kho') }}" aria-expanded="true">
                                    <i class="bx bxl-product-hunt"></i>Tồn kho</a>
                            </li>
                            <li class="">
                                <a href="{{ route('thong-ke-ban-chay') }}" aria-expanded="false">
                                    <i class="bx bx-star"></i>Bán chạy</a>
                            </li>
                            <li>
                                <li class="">
                                    <a href="{{route('thong-ke-doanh-thu')}}" aria-expanded="false">
                                        <i class="bx bx-money"></i>Doanh thu</a>
                                </li>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <li class=""><a href="{{ route('blog.index') }}" aria-expanded="false"><i
                            class="bx bx-news"></i>Quản lý tin tức</a></li>
                        </li>
                        <li>
                            <li class=""><a href="{{ route('banner.index') }}" aria-expanded="false"><i
                                class="bx bx-images"></i>Quản lý banner</a></li>
                            </li>
                            <li>
                                <li class=""><a href="{{ route('user.index') }}" aria-expanded="false"><i
                                    class="bx bx-user"></i>Quản lý tài khoản</a></li>
                                </li>
                                <li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                                    <i class="bx bx-cog"></i>
                                    <span>Quản lý cấu hình</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="true" style="">
                                    <li class=""><a href="{{ route('logo.index') }}" aria-expanded="true"><i
                                        class="bx bx-image"></i>Logo</a>
                                    </li>
                                    <li class=""><a href="{{ route('ads.index') }}" aria-expanded="true"><i
                                        class="bx bx-image"></i>Ads</a>
                                    </li>
                                    <li class=""><a href="{{ route('contact.index') }}" aria-expanded="false"><i
                                        class="bx bxs-contact"></i>contact</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Sidebar -->
                        </div>
                    </div>
                    <!-- Left Sidebar End -->
                    <!-- ============================================================== -->
                    <!-- Start right Content here -->
                    <!-- ============================================================== -->
                    <div class="main-content">
                        <div class="page-content">
                            <div class="container-fluid">
                                <!-- start page title -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box d-flex align-items-center justify-content-between">
                                            <h4 class="mb-0 font-size-18">@yield('title')</h4>
                                            <div class="page-title-right">
                                                <ol class="breadcrumb m-0">
                                                    <li class="breadcrumb-item"><a
                                                        href="javascript: void(0);">@yield('namepage')</a></li>
                                                        <li class="breadcrumb-item active">@yield('title')</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(Session::has('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{Session::get('success')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			@endif
			@if(Session::has('error'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{Session::get('error')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			@endif
                                    <!-- end page title -->
                                    @yield('main')
                                </div>
                                <!-- container-fluid -->
                            </div>
                            <!-- End Page-content -->
                        <footer class="footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script> Shop_teaa.
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-sm-right d-none d-sm-block">
                                            Design & Develop by Ha Duy Dung
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                    <!-- end main content-->

                </div>
                <!-- END layout-wrapper -->
                <!-- Right Sidebar -->

                <!-- /Right-bar -->
                <!-- Right bar overlay-->
                <div class="rightbar-overlay"></div>


                <!-- JAVASCRIPT -->
                <script src="{{ url('public') }}/backend/libs/jquery/jquery.min.js"></script>
                <script src="{{ url('public') }}/backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="{{ url('public') }}/backend/libs/metismenu/metisMenu.min.js"></script>
                <script src="{{ url('public') }}/backend/libs/simplebar/simplebar.min.js"></script>
                <script src="{{ url('public') }}/backend/libs/node-waves/waves.min.js"></script>
                <!-- App js -->
                <script src="{{ url('public') }}/backend/js/app.js"></script>

                <!-- Required datatable js -->
                <script src="{{ url('public') }}/backend/libs/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="{{ url('public') }}/backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
                <!-- Buttons examples -->
                <script src="{{ url('public') }}/backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
                <script src="{{ url('public') }}/backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
                <script src="{{ url('public') }}/backend/libs/jszip/jszip.min.js"></script>
                <script src="{{ url('public') }}/backend/libs/pdfmake/build/pdfmake.min.js"></script>
                <script src="{{ url('public') }}/backend/libs/pdfmake/build/vfs_fonts.js"></script>
                <script src="{{ url('public') }}/backend/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
                <script src="{{ url('public') }}/backend/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
                <script src="{{ url('public') }}/backend/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
                <!-- Responsive examples -->
                <script src="{{ url('public') }}/backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
                <script src="{{ url('public') }}/backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
                </script>
                <!-- Datatable init js -->
                <script src="{{ url('public') }}/backend/js/pages/datatables.init.js"></script>

                <!-- select 2 plugin -->
                <script src="{{ url('public') }}/backend/libs/select2/js/select2.min.js"></script>
                <!-- dropzone plugin -->
                <script src="{{ url('public') }}/backend/libs/dropzone/min/dropzone.min.js"></script>
                <!-- init js -->
                <script src="{{ url('public') }}/backend/js/pages/ecommerce-select2.init.js"></script>


                <!-- Ion Range Slider-->
                <script src="{{ url('public') }}/backend/libs/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
            </script>

            <script src="{{ url('public') }}/backend/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
            <script src="{{ url('public') }}/backend/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
            <script src="{{ url('public') }}/backend/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
            <script src="{{ url('public') }}/backend/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
            <script src="{{ url('public') }}/backend/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
            <script src="{{ url('public') }}/backend/libs/@chenfengyuan/datepicker/datepicker.min.js"></script>
            <!-- Bootrstrap touchspin -->
            <script src="{{ url('public') }}/backend/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

            <script src="{{ url('public') }}/backend/js/pages/ecommerce-cart.init.js"></script>
    <script src="{{ url('public') }}/backend/js/pages/form-advanced.init.js"></script>

    <!-- ck editor -->
    <script type="text/javascript" src="{{ url('public') }}/backend/ckeditor/ckeditor.js"></script>

    <!-- slug -->
    <script src="{{ url('public') }}/backend/js/slug.js"></script>
    <!-- ckedittor custom url image-->
    <script>
        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '../../filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
            filebrowserUploadUrl: '../../filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
            filebrowserImageBrowseUrl: '../../filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
        });

    </script>
    {{-- lấy ảnh từ reponsive filemanager --}}
    <script src="{{ url('public') }}/backend/js/getImage.js"></script>
    {{--  use jquery to build a dynamic add/ remove form  --}}
    <script src="{{ url('public') }}/backend/js/dynamic.js"></script>
     <!-- tui charts plugins -->
     <script src="{{ url('public') }}/backend/libs/tui-chart/tui-chart-all.min.js"></script>
     <!-- tui charts map -->
     <script src="{{ url('public') }}/backend/libs/tui-chart/maps/usa.js"></script>
     <!-- tui charts plugins -->
     <script src="{{ url('public') }}/backend/js/pages/tui-charts.init.js"></script>
    <script>
        $("#name").keyup(function(event) {
            var name = $("#name").val();
            //Đổi ký tự có dấu thành không dấu
            name = name.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            name = name.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            name = name.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            name = name.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            name = name.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            name = name.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            name = name.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            name = name.replace(
                /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            var arr = name.split(" ");
            var sku = [];
            for (i = 0; i < arr.length; i++) {
                sku += arr[i].charAt(0);
            }
            sku = sku.toUpperCase();
            // console.log(arr);
            // console.log(sku);
            var d = new Date().getMilliseconds();
            $('#sku').val(sku + d);
        });
        $("#id_attr").change(function(event) {
            var sku_detail = $('#sku').text();
            var id_attr = $('#id_attr option:selected').text();
            var sku_done = sku_detail + id_attr;
            console.log(sku_detail, id_attr);
            $('#sku_detail').val(sku_done);
        });
    </script>
    <script>
        $('#text-gmap').change(function(event) {
            var text=$('#text-gmap').val();
            // console.log(text);
            $('#gmap').html(text);
        });
    </script>
</body>

</html>
