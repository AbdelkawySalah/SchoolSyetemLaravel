<!DOCTYPE html>
<html lang="en">
@section('title')
{{trans('main_trans.Main_title')}}welecome student
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('dashboard.layouts.head')
</head>

<body style="font-family: 'Cairo', sans-serif">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

 <div id="pre-loader">
     <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
 </div>

        <!--=================================
 preloader -->

        @include('dashboard.layouts.main-header-user')


        <!--=================================
 Main content -->
        <!-- main-content -->
        <br><br>
        <div class="content-wrapper">

            <!-- widgets -->
           
            <!-- Orders Status widgets-->
            <div class="row">
                <div class="col-xl-8 mb-30">
                    <div class="card h-100">
                        <div class="btn-group info-drop">
                            <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="text-primary ti-reload"></i>أظهار الأختبار</a>
                                <a class="dropdown-item" href="#"><i class="text-secondary ti-eye"></i>
                                    نتائج الأختبارات</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-block d-md-flexx justify-content-between">
                                <div class="d-block">
                                    <h5 class="card-title">الأختبارات  </h5>
                                </div>
                                <div class="d-flex">
                                <a href="" 
                                    class="btn btn-success btn-block m-t-20" style="height:50px">
                                    ابدء الأختبارات
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


           
            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('dashboard.layouts.footer-scripts')

</body>

</html>
php