<div class="modal fade" id="AddQuizz{{$TeacherSection->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Quizz.store','test')}}" method="post" autocomplete="off">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">اضافة اختبار لمادة {{$TeacherSection->subject->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                    <div class="col">
                                                                        <label for="title">اسم لأختبار باللغة العربية</label>
                                                                        <input type="text" name="Name_ar" class="form-control" required>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="title">اسم الأختبار باللغة الانجليزية</label>
                                                                        <input type="text" name="Name_en" class="form-control" required>
                                                                        <input type="hidden" name="teachersectionid" value="{{$TeacherSection->id}}">
                                                                        <input type="hidden" name="teacherid" value="{{$TeacherSection->teacher_id}}">

                                                                    </div>
                                                             </div>
                                                             <div class="form-row">
                                                                    <div class="col">
                                                                        <label for="title">تاريخ الأختبار</label>
                                                                        <div class='input-group date'>
                                                                           <input class="form-control" type="text"  id="datepicker-action" name="Quizze_Date" data-date-format="yyyy-mm-dd"  required>
                                                                          </div>
                                                                    </div>
                                                                    
                                                             </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{trans('Teachers_trans.Save')}}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>