@extends('dashboard.layouts.master')
@section('css')
    @toastr_css
@section('title')
تعديل اختبار 
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
تعديل اختبار :{{$quizzes->name}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                       
                            <form action="{{route('Quizz.update','test')}}" method="post" autocomplete="off">
                            {{ method_field('patch') }}
                                @csrf

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">اسم الأختبار باللغة العربية</label>
                                        <input type="text" name="Name_ar" class="form-control" 
                                        value="{{$quizzes->getTranslation('name','ar')}}">
                                        <input type="hidden" name="Quizzid" value="{{$quizzes->id}}" >
                                    </div>
                                    <div class="col">
                                        <label for="title">اسم الأختبار باللغة الانجليزية</label>
                                        <input type="text" name="Name_en" class="form-control"
                                        value="{{$quizzes->getTranslation('name','en')}}">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputState">المادة الدراسية</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Subject_id">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($subjects as $subjects)
                                                <option value="{{$subjects->id}}" {{$subjects->id==$quizzes->subject_id?'selected':''}}>{{$subjects->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                      
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputState">المرحلة الدراسية</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}" {{$grade->id==$quizzes->Grade_id?'selected':''}}>{{$grade->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="inputState">الصف الدراسي</label>
                                        <select name="Class_id" class="custom-select">
                                           <option value="{{$quizzes->Classroom_id}}">{{$quizzes->ClassRoom->Name_Class}}</option>
                                        </select>
                                    </div>


                                   <div class="form-group col">
                                    <label for="section_id">الفصل</label>
                                    <select class="custom-select mr-sm-2" name="section_id">
                                    <option value="{{$quizzes->section_id}}">{{$quizzes->Sections->Name_Section}}</option>
                                    </select>
                                   </div>

                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
                            </form>
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
@endsection