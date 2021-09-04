@extends('dashboard.layouts.master-teacher')

@section('css')
    @toastr_css
@section('title')
   لوحة تحكم - المدرس
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
لوحة تحكم - المدرس
@stop
<!-- breadcrumb -->
@endsection
@section('content')

        <!--=================================
 Main content -->
        <!-- main-content -->
       
                <div class="row">
                    <div class="col-sm-6" >
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif"></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
           
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h4>الفصول</h4>
                                    <h4>الدراسية</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                               <a href="">عرض</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">Orders</p>
                                    <h4>656</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Total sales
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">Revenue</p>
                                    <h4>$65656</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Sales Per Week
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fa fa-twitter highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">Followers</p>
                                    <h4>62,500+</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Just Updated
                            </p>
                        </div>
                    </div>
                </div>
            </div>
         

            <div class="calendar-main mb-30">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>المرحلة الدراسية</th>
                                            <th>الصف الدراسي</th>
                                            <th>الفصل</th>
                                            <th>المادة</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                         <tbody>
                                      
                                        @foreach($TeacherSection as $TeacherSection)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$TeacherSection->grade->Name}}</td>
                                            <td>{{$TeacherSection->classroom->Name_Class}}</td>
                                            <td>{{$TeacherSection->section->Name_Section}}</td>
                                            <td>{{$TeacherSection->subject->name}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#AddQuizz{{ $TeacherSection->id }}" title="اضافة اختبار"><i class="fa fa-edit"></i></button>
                                                    <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#showquizze{{ $TeacherSection->id }}" title="عرض الأختبارات"><i class="fa fa-edit"></i></button>
                                                    <input type="hidden" id="quizzid" value="{{$TeacherSection->id}}" />
                                                </td>
                                            </tr>
                                            @include('dashboard.Teacher.quizze')
                                            @include('dashboard.Teacher.showquizze')

                                        @endforeach
                                    </table>
                                </div>
                        </div>
                    </div>

                </div>
            </div>
          
 @endsection
  
    @section('js')

    @toastr_js
    @toastr_render
@endsection
