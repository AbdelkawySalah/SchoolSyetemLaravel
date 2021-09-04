@extends('dashboard.layouts.master')
@section('css')
    @toastr_css
@section('title')
تعديل سؤال 
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
تعديل سؤال : {{$question->question}}
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
                       
                            <form action="{{route('Question.update','test')}}" method="post" autocomplete="off">
                               {{ method_field('patch') }}
                               {{ csrf_field() }}

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">اسم السؤال باللغة العربية</label>
                                        <input type="text" name="Name_ar" class="form-control"
                                               value="{{$question->getTranslation('question','ar')}}" required>
                                     <input type="hidden" name="questionid" value="{{$question->id}}" />
                                    </div>
                                    <div class="col">
                                        <label for="title">اسم السؤال باللغة الانجليزية</label>
                                        <input type="text" name="Name_en" class="form-control"
                                               value="{{$question->getTranslation('question','en')}}" required>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>الأجابات باللغة العربية : <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="answer_ar" id="exampleFormControlTextarea1" rows="3" required>
                                          {{$question->getTranslation('answers','ar')}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>الأجابات باللغة الانجليزية : <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="answer_en" id="exampleFormControlTextarea1" rows="3" required>
                                        {{$question->getTranslation('answers','en')}}
                                        </textarea>
                                    </div>
                                </div>
                              </div>
                              <br>
                              <div class="form-row">
                                    <div class="col">
                                        <label for="title">الأجابة الصحيحة باللغة العربية</label>
                                        <input type="text" name="rightanswer_ar" class="form-control"
                                               value="{{$question->getTranslation('right_answer','ar')}}" required>
                                    </div>
                                    <div class="col">
                                        <label for="title">لأجابة الصحيحة باللغة الانجليزية</label>
                                        <input type="text" name="rightanswer_en" class="form-control"
                                               value="{{$question->getTranslation('right_answer','en')}}" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputState">إسم الأختبار</label>
                                        <select class="custom-select my-1 mr-sm-2" name="quizze_id">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($quizze as $quizze)
                                                <option value="{{$quizze->id}}" {{$question->quizze_id == $quizze->id?'selected':''}}>{{$quizze->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="title">الدرجة</label>
                                        <select class="custom-select my-1 mr-sm-2" name="score_id">
                                                <option selected disabled> حدد الدرجة...</option>
                                                <option value="5" {{$question->score == 5 ?'selected':''}}>5</option>
                                                <option value="10" {{$question->score == 10 ?'selected':''}}>10</option>
                                                <option value="15" {{$question->score == 15 ?'selected':''}}>15</option>
                                                <option value="20" {{$question->score == 20 ?'selected':''}}>20</option>
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