@extends('dashboard.layouts.master')
@section('css')
    @toastr_css
@section('title')
قائمة الأختبارات
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
قائمة الأختبارات
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                           
                            <a href="{{route('Quizz.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">اضافة أختبار جديد </a><br><br> 
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم الأختبار</th>
                                            <th>المرحلة الدراسية</th>
                                            <th>الصف الدراسي</th>
                                            <th>القسم</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                         <tbody>
                                        @foreach($quizzes as $quizz)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$quizz->name}}</td>
                                            <td>{{$quizz->Grades->Name}}</td>
                                            <td>{{$quizz->ClassRoom->Name_Class}}</td>
                                            <td>{{$quizz->Sections->Name_Section}}</td>
                                                <td>
                                                    <a href="{{route('Quizz.edit',$quizz->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Quizz{{ $quizz->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                                    <a href="{{route('Question.show',$quizz->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>

                                           @include('dashboard.pages.Quizzes.delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection