@extends('dashboard.layouts.master')
@section('css')
    @toastr_css
@section('title')
اضافة سؤال جديد
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
اضافة سؤال جديد : {{$quizze->name}}
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
                      <h5>السؤال رقم >>>> {{$question->count()+1}}</h5>
                      <hr>
                            <form action="{{route('Question.store')}}" method="post" autocomplete="off">
                                @csrf

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">اسم السؤال باللغة العربية</label>
                                        <input type="text" name="Name_ar" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label for="title">اسم السؤال باللغة الانجليزية</label>
                                        <input type="text" name="Name_en" class="form-control" required>
                                        <input type="text" name="Quiezzid" class="form-control" value="{{$quizze->id}}">
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>الأجابات باللغة العربية : <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="answer_ar" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>الأجابات باللغة الانجليزية : <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="answer_en" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                    </div>
                                </div>
                              </div>
                              <br>
                              <div class="form-row">
                                    <div class="col">
                                        <label for="title">الأجابة الصحيحة باللغة العربية</label>
                                        <input type="text" name="rightanswer_ar" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label for="title">لأجابة الصحيحة باللغة الانجليزية</label>
                                        <input type="text" name="rightanswer_en" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    
                                    <div class="col">
                                        <label for="title">الدرجة</label>
                                        <select class="custom-select my-1 mr-sm-2" name="score_id">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                        </select>
                                   </div>
                                </div>
                                <br>
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
   
@endsection