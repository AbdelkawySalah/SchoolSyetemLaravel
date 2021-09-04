@extends('dashboard.layouts.master-teacher')
@section('css')
    @toastr_css
@section('title')
قائمة صفوف المعلمين
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
قائمة صفوف المعلمين
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
                           
                            <a href="{{route('TeacherSection.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">اضافة صف دراسي  للمعلم </a><br><br> 
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم المعلم</th>
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
                                            <td>{{$TeacherSection->teacher->Name}}</td>
                                            <td>{{$TeacherSection->grade->Name}}</td>
                                            <td>{{$TeacherSection->classroom->Name_Class}}</td>
                                            <td>{{$TeacherSection->section->Name_Section}}</td>
                                            <td>{{$TeacherSection->subject->name}}</td>

                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editteachersection{{ $TeacherSection->id }}" title="تعديل"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteteachersection{{ $TeacherSection->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            @include('dashboard.pages.Teachers.TeacherSections.edit')
                                           @include('dashboard.pages.Teachers.TeacherSections.delete')
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
<script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $('select[name="section_id"]').empty();
                            $('select[name="Class_id"]').append('<option selected disabled >أختر من القائمة</option>');
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
 
<!-- fillsection -->
      
<script>
        $(document).ready(function () {
            $('select[name="Class_id"]').on('change', function () {
                var Class_id = $(this).val();
                if (Class_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_Sections') }}/" + Class_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $('select[name="section_id"]').append('<option selected disabled >أختر من القائمة</option>');
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
<!-- fillsection -->
    @toastr_js
    @toastr_render
@endsection