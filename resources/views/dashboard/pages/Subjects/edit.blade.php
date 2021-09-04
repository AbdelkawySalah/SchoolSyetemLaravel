<div class="modal fade" id="edit_subject{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Subject.update','test')}}" method="post">
                                                    {{ method_field('patch') }}
                                @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">تعديل مادة دراسية</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="form-row">
                                    <div class="col">
                                        <label for="title">اسم المادة باللغة العربية</label>
                                        <input type="text" name="Name_ar"
                                               value="{{ $subject->getTranslation('name', 'ar') }}"
                                               class="form-control">
                                        <input type="hidden" name="subjectid" value="{{$subject->id}}">
                                    </div>
                                    <div class="col">
                                        <label for="title">اسم المادة باللغة الانجليزية</label>
                                        <input type="text" name="Name_en"
                                               value="{{ $subject->getTranslation('name', 'en') }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputState">المرحلة الدراسية</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($Grades as $grade)
                                                <option
                                                    value="{{$grade->id}}" {{$grade->id == $subject->Grade_id ?'selected':''}}>{{$grade->Name }}
                                                </option>
                                                   
                                               
                                            @endforeach
                                        </select>
                                    </div>

                                                <div class="form-group col">
                                                    <label for="inputState">الصف الدراسي</label>
                                                    <select name="Class_id" class="custom-select">
                                                        <option
                                                            value="{{ $subject->Classroom_id }}">{{ $subject->ClassRooms->Name_Class }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{ trans('My_Classes_trans.Edit') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>