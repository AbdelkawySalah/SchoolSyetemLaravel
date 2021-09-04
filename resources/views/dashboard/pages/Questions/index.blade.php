@extends('dashboard.layouts.master')
@section('css')
    @toastr_css
@section('title')
قائمة الأسئلة
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
قائمة الأسئلة
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
                           
                            <a href="{{route('Question.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">اضافة سؤال جديد </a><br><br> 
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>السؤال</th>
                                            <th>الإجابات</th>
                                            <th>الإجابة الصحيحة</th>
                                            <th>الدرجة</th>
                                            <th>إسم الإختبار</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        @foreach($questions as $question)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$question->question}}</td>
                                            <td>{{$question->answers}}</td>
                                            <td>{{$question->right_answer}}</td>
                                            <td>{{$question->score}}</td>
                                            <td>{{$question->quizze->name}}</td>
                                                <td>
                                                    <a href="{{route('Question.edit',$question->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Question{{ $question->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                           @include('dashboard.pages.Questions.delete')
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